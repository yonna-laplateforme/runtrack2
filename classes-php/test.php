<?php
require_once 'user-pdo.php';

try {
    // connexion a la bdd
    $PDO = new PDO('mysql:host=localhost;dbname=Classes', 'root', 'root');
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $user = new Userpdo($PDO);

    // Inscription si pas le meme login
    $infos = $user->register('yonna', 'monmot1', 'yonna@example.com', 'yoyo', 'mer');

    echo "Inscription réussie, infos utilisateur :\n";
    print_r($infos);
}

//     //déconnexion
//     $user->disconnect();

//     //connexion
//     $connectOk = $user->connect('monlogin', 'monpassword');
//     if ($connectOk) {
//         echo "Connexion réussie !\n";
//         print_r($user->getAllInfos());
//     } else {
//         echo "Échec de la connexion.\n";
//     }

//     // Maj des infos
//     $user->update('monlogin2', 'newpassword', 'nouvel@email.com', 'Jean', 'Dupont');

//     echo "Après mise à jour :\n";
//     print_r($user->getAllInfos());

//     //Supprimer un utilisateur
//     $user->delete();
//     echo "Utilisateur supprimé.\n";

catch (PDOException $e) {
  echo "Erreur PDO : " . $e->getMessage();
 }
