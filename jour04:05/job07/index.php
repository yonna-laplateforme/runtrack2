<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="index.php" method="post">
        <label for="hauteur"> Hauteur: </label>
        <input type="text" name="hauteur" id="text"><br>
        <label for="largeur"> Largeur:</label>
        <input type="text" name="largeur" id="text"><br>
        <input type="submit" value="valider">
    </form>

</body>

</html>



<?php

$largeur = ($_POST['largeur']);
$hauteur = ($_POST['hauteur']);

for ($i = 0; $i < $hauteur; $i++) {

    for ($j = $hauteur; $j > $i; $j--) {
        echo " &nbsp";
    }
    echo "/";
    for ($m = 0; $m < $i + $i; $m++) {

        echo "_";
    }
    echo "\\";
    echo "<br>";
}

for ($x = 0; $x <= $largeur - 1; $x++) {

    for ($y = 0; $y <= $largeur; $y++) {
        //Si $j est égale à 1 qui est mon point de départ (HAUTEUR) OU $j est égale À ma hauteur 10 donc mon dernier point à 10  OU que $i qui mon point d'arrivé (largeur) est égale à 1 ou qu'il est egale à 20 donc la largeur alors tu affiches *
        if ($x == $largeur ||  $y == 0 || $y == $largeur) {
            echo "|";
            //SINON tu n'affiches rien di tout (des espaces)!!!!!!
        } else if ($x == $largeur - 1) {
            echo "_";
        } else {
            echo "&nbsp;&nbsp;";
        }
    }
    echo "<br>";
}

?>