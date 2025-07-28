

<?php

//je definis des variables hauteur et (longueur)
$hauteur = 10;
$largeur = 20;

//je parcours ma hauteur de 1 à 10
for ($j = 1; $j <= $hauteur; $j++) {
    // la je parcours ma largeur de 1 à 20
    for ($i = 1; $i <= $largeur; $i++) {
        //Si $j est égale à 1 qui est mon point de départ (HAUTEUR) OU $j est égale À ma hauteur 10 donc mon dernier point à 10  OU que $i qui mon point d'arrivé (largeur) est égale à 1 ou qu'il est egale à 20 donc la largeur alors tu affiches *
        if ($j == 1 || $j == $hauteur || $i == 1 || $i == $largeur) {
            echo "* &nbsp";
        //SINON tu n'affiches rien di tout (des espaces)!!!!!!
        } else {
            echo "&nbsp;&nbsp;&nbsp;&nbsp"; 
        }
    }
    echo "<br>";
}

?>
