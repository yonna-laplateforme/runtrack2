<?php

function occurrences($str, $char) {
    $compteur = 0;
    $i = 0;

   //je parcours tant que ma condition est vrai
    while (isset($str[$i])) {
    
        if ($str[$i] === $char) {
        $compteur++;
    }
        $i++;
    }

    return $compteur;
}
echo occurrences("salut je suis paula", "a" );
?>



