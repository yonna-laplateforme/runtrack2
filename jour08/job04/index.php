<!--Créez un formulaire de connexion qui contient un input de type de text nommé
“prenom” et un bouton submit nommé “connexion”. Lorsque l’on valide le formulaire, le
prénom est ajouté dans un cookie. Si un utilisateur a déjà entré son prénom, n'affichez
plus le formulaire de connexion. A la place, écrivez “Bonjour prenom !” et ajouter un
bouton “Déconnexion” nommé “deco”. Lorsque l’utilisateur se déconnecte, il faut à
nouveau afficher le formulaire de connexion.-->

<?php
// SI on reçoit une requête AVEC le bouton "deco"  
if (isset($_POST['deco'])) {
    // ALORS on supprime le cookie "prenom" en le réglant à une date passée ça le détruit
    setcookie('prenom', '', time() - 3600);
    // ensuite on recharge la page pour actualiser l'affichage et on retourne sur le formulaire
    header('Location: index.php');
    exit();
}

// SINON SI on reçoit une requête avec le bouton "connexion" 
if (isset($_POST['connexion'])) {
    // ALORS on récupère le prénom envoyé dans le formulaire
    $prenom = $_POST['prenom'];
    // ça creer un COOKIE "prenom" avec cette valeur qui dure 1 heure
    setcookie('prenom', $prenom, time() + 3600);
    // ensuite on recharge la page pour afficher le message 
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>job04</title>
</head>

<body>
    <?php
    // SI un cookie "prenom" existe c'est que l'utilisateur est dej connecté 
    if (isset($_COOKIE['prenom'])) {
        // ALORS on affiche "Bonjour [prenom]"
        echo "Bonjour " . ($_COOKIE['prenom']) . " !";
        // On affiche aussi un formulaire avec un bouton "Déconnexion"
    ?>
        <form method="POST">
            <button type="submit" name="deco">Déconnexion</button>
        </form>
    <?php
    }
    // SINON si pas de cookie alors pas de connexion 
    //  du coup on affiche le formulaire de connexion voili voilou !!!!
    else {
    ?>
        <form method="POST">
            <input type="text" name="prenom" required>
            <button type="submit" name="connexion">Connexion</button>
        </form>
    <?php
    }
    ?>
</body>

</html>

<!-- Si le bouton “Déconnexion” est cliqué → supprime cookie → recharge page
     Sinon si le formulaire “Connexion” est envoyé → créer cookie → recharge page
     Sinon on affiche soit le message “Bonjour prenom” + bouton déconnexion si le cookie existe,
     ou le formulaire si le cookie n'existe pas.-->