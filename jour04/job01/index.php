<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>


  <form action="" method="get">
    <label for="age">Age</label>
    <input type="text" name="age" id="text">
    <br>

    <label for="Nom:"> Nom</label>
    <input type="text" name="nom" id="text">
    <br>

    <label for="prénom">Prénom</label>
    <input type="text" name="prénom" id="text">
    <br>

    <input type="submit" value="valider">
  </form>
</body>

</html>

<?php
//Je prépare un compteur, qui commence à zéro.
$i = 0;
//Je fais une bouble ou je regarde chaque informations qui parvient en partant des clés et de leurs valeurs .

foreach ($_GET as $clé => $valeurs) {
  // a chaque fois que je vois une information qui existe (vrai?) (grâce à "isset"),
  //j’ajoute +1 a mon compteur $i
  if (  ($_GET[$clé])) {

    $i = $i + 1;
  }
}
// si il envoi des arguments donc $i superrieur à 0 (rien) alors j'affiche le nombre d'argument envoyés
if ($i > 0) {
  echo "Le nombre d'arguments GET envoyés est : $i";
}
?>