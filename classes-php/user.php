<?php

require_once 'bdd.php';

class User
{
    // Propriété privée pour stocker la connexion à la base
    private $mysqli;


    private $id;
    public $login;
    public $email;
    public $firstname;
    public $lastname;

    //constructeur de la classe

    public function __construct($mysqli)
    {
        $this->mysqli = $mysqli;

        // On initialise les propriétés avec des valeurs par défaut pas d'utilisateur connectés
        $this->id = null;
        $this->login = '';
        $this->email = '';
        $this->firstname = '';
        $this->lastname = '';
    }

    //inscription d'un nouvel utilisateur

    public function register($login, $password, $email, $firstname, $lastname)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // preparation de la requete sql

        $stmt = $this->mysqli->prepare("
            INSERT INTO utilisateurs (login, password, email, firstname, lastname)
            VALUES (?, ?, ?, ?, ?)
        ");

        //lier les variables aux emplacements vides de la requete
        $stmt->bind_param("sssss", $login, $hashedPassword, $email, $firstname, $lastname);

        //exécution de la requete
        $stmt->execute();

        //connexion automatique apres inscription
        $this->connect($login, $password);

        //retourne toutes les infos de l'utilisateur
        return $this->getAllInfos();
    }


    //Connexion de l'utilisateur

    public function connect($login, $password)
    {
        // On prépare une requête SQL pour récupérer l'utilisateur selon le login
        $stmt = $this->mysqli->prepare("SELECT * FROM utilisateurs WHERE login = ?");
        $stmt->bind_param("s", $login); // "s" = string

        //exécution de la requête
        $stmt->execute();

        //on récupère le résultat
        $result = $stmt->get_result();
        //resultat ligne par ligne resultat tableau associatif
        $user = $result->fetch_assoc();

        //SI un utilisateur est trouvé et que le mot de passe correspond
        if ($user && password_verify($password, $user['password'])) {
            //on remplit les propriétés avec les infos de l'utilisateur
            $this->id = $user['id'];
            $this->login = $user['login'];
            $this->email = $user['email'];
            $this->firstname = $user['firstname'];
            $this->lastname = $user['lastname'];

            //si la connexion est reussi
            return true;
        }
        //si la connexion ne fonctionne pas
        return false;
    }

    //deconnexion de l'utilisateur

    public function disconnect()
    {
        //réinitialise toutes les propriétés elles sont vides
        $this->id = null;
        $this->login = '';
        $this->email = '';
        $this->firstname = '';
        $this->lastname = '';
    }


    //supprimer un compte utilisateur

    public function delete()
    {
        //on regarde d'abord si un utilisateur est connecté
        if ($this->isConnected()) {
            //preparer la requête pour supprimer l'utilisateur selon son id
            $stmt = $this->mysqli->prepare("DELETE FROM utilisateurs WHERE id = ?");
            $stmt->bind_param("i", $this->id);

            //execution de la requete
            $stmt->execute();

            //deconnexion utilisateur de l'objet
            $this->disconnect();
        }
    }


    //maj des infos

    public function update($login, $password, $email, $firstname, $lastname)
    {
        //si pas d'utilisateur connecté alors on ne fait rien
        if (!$this->isConnected()) return false;

        //chiffré le nouveau mdp
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        //preparer la requete pour faire la maj
        $stmt = $this->mysqli->prepare("
            UPDATE utilisateurs
            SET login = ?, password = ?, email = ?, firstname = ?, lastname = ?
            WHERE id = ?
        ");

        //lier les variables aux emplacement vide de la requete "sssssi" représente string *5 et integer*1 
        $stmt->bind_param("sssssi", $login, $hashedPassword, $email, $firstname, $lastname, $this->id);

        //execution de la requete
        $stmt->execute();

        //maj des propriétés des 'objets'
        $this->login = $login;
        $this->email = $email;
        $this->firstname = $firstname;
        $this->lastname = $lastname;

        return true;
    }

   
    // Vérifie si un utilisateur est connecté
  
    public function isConnected()
    {
        // Si l'id est défini, alors un utilisateur est connecté
        return $this->id !== null;
    }


    // Récupère toutes les infos de l'utilisateur sous forme de tableau
  
    public function getAllInfos()
    {
        // Si aucun utilisateur connecté, on retourne null
        if (!$this->isConnected()) return null;

        // Sinon on retourne les infos
        return [
            'id' => $this->id,
            'login' => $this->login,
            'email' => $this->email,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname
        ];
    }


    // methode get() pour chaque info

    public function getLogin()
    {
        return $this->login;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function getLastname()
    {
        return $this->lastname;
    }
}
