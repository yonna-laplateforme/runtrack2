<?php

class Userpdo
{
    private $PDO;
    private $id;
    public $login;
    public $email;
    public $firstname;
    public $lastname;

    public function __construct($PDO)
    {
        $this->PDO = $PDO;
        $this->id = null;
        $this->login = '';
        $this->email = '';
        $this->firstname = '';
        $this->lastname = '';
    }

    public function register($login, $password, $email, $firstname, $lastname)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->PDO->prepare("
            INSERT INTO utilisateurs (login, password, email, firstname, lastname)
            VALUES (?, ?, ?, ?, ?)
        ");

        $stmt->execute([$login, $hashedPassword, $email, $firstname, $lastname]);

        $this->connect($login, $password);

        return $this->getAllInfos();
    }

    public function connect($login, $password)
    {
        $stmt = $this->PDO->prepare("SELECT * FROM utilisateurs WHERE login = ?");
        $stmt->execute([$login]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $this->id = $user['id'];
            $this->login = $user['login'];
            $this->email = $user['email'];
            $this->firstname = $user['firstname'];
            $this->lastname = $user['lastname'];
            return true;
        }
        return false;
    }

    public function disconnect()
    {
        $this->id = null;
        $this->login = '';
        $this->email = '';
        $this->firstname = '';
        $this->lastname = '';
    }

    public function delete()
    {
        if ($this->isConnected()) {
            $stmt = $this->PDO->prepare("DELETE FROM utilisateurs WHERE id = ?");
            $stmt->execute([$this->id]);
            $this->disconnect();
        }
    }

    public function update($login, $password, $email, $firstname, $lastname)
    {
        if (!$this->isConnected()) return false;

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->PDO->prepare("
            UPDATE utilisateurs
            SET login = ?, password = ?, email = ?, firstname = ?, lastname = ?
            WHERE id = ?
        ");

        $stmt->execute([
            $login,
            $hashedPassword,
            $email,
            $firstname,
            $lastname,
            $this->id
        ]);

        $this->login = $login;
        $this->email = $email;
        $this->firstname = $firstname;
        $this->lastname = $lastname;

        return true;
    }

    public function isConnected()
    {
        return $this->id !== null;
    }

    public function getAllInfos()
    {
        if (!$this->isConnected()) return null;

        return [
            'id' => $this->id,
            'login' => $this->login,
            'email' => $this->email,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname
        ];
    }
}
