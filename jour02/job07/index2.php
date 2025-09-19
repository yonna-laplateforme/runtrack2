<?php
$hauteur = 10;
//je parcour ma huateur de 0 à 5
for ($i = 0; $i < $hauteur; $i++) {

    for ($j = $hauteur; $j > $i; $j--) {
        echo "&nbsp;&nbsp";
    }
    echo "/";

    for ($m = 0; $m < $i + $i; $m++) {
        if ($i == $hauteur - 1) {
            echo "_";
        } else {
            echo "&nbsp;&nbsp";
        }
    }
    echo "\\";
    echo "<br>";
}
