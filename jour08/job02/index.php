<?php
$cookie_name = 'nbVisite';


?>

<?php
//Si nombre de visite existe
if (isset($_COOKIE['nbVisite'])) {
    //ajoute + 1 a chaque fois 
    setcookie("nbVisite", $_COOKIE['nbVisite'] + 1);
    //sinon affiche le nombre de visite a la valeur zero
} else {
    setcookie("nbVisite", 0,  time() + (86400 * 30), "/");
}
//et si j'appuie sur reset je remet a la valeur initiale
if (isset($_POST['reset'])) {
    //reinitialise mon setcookie à 0
    setcookie("nbVisite", 0);
    //je fais un refresh à 0 pour qu'il s'affiche
    header("Location: index.php");
    exit;
}







//Créez une variable de session nommée “nbvisites”. A chaque fois que la page est
//visitée, ajoutez 1. Afficher le contenu de cette variable.
//Ajoutez un bouton nommé “reset” qui permet de réinitialiser ce compteur.
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    nombres de visites : <?php echo $_COOKIE['nbVisite']; ?>
    <form method="post">
        <input type="submit" name="reset" value="reset">

    </form>
</body>

</html>