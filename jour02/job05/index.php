<?php
for ($i = 2; $i <= 1000; $i++) {
    $nombrePremier = true;
    for ($diviseur = 2; $diviseur <= 1000; $diviseur++) {
        if ($i % $diviseur == 0 && $i != $diviseur) {
            $nombrePremier = false;
        }
    }
    if ($nombrePremier) {
        echo "$i <br>";
    }
}
?>
