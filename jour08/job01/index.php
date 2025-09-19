


<?php
session_start();
//Si nombre de visite existe
 if(isset($_SESSION['nbVisite'])){
//ajoute + 1 a chaque fois 
$_SESSION['nbVisite']++;
//sinon affiche le nombre de visite a la valeur zero
}else {
    $_SESSION['nbVisite'] = 0;
}
//et si j'appuie sur reset remet a la valeur initiale
if(isset($_POST['reset'])){
$_SESSION['nbVisite'] = 0;
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
    nombres de visites : <?php echo $_SESSION['nbVisite'];?>
<form method="post">
  <input type="submit" name="reset" value="reset">

</form>
</body>
</html>





}