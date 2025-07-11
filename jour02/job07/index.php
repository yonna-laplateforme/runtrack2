<?php
       $hauteur = 5;

for ($i = 0; $i < $hauteur; $i++) {

    for ($j = 1; $j <= $hauteur - $i; $j++) {
    echo "&nbsp;";
    }
    echo "/";

    
for ($m = 0; $m < $i * 3 ; $m++){

    echo "&nbsp;";
    }

    echo "\\";

    echo "<br>";
} 

    for ($i = 0; $i < 2 * $hauteur; $i++){

        echo "_";
    }
?>







