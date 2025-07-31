<?php
    //je definis une variable
    $str='Tous ces instants seront perdus dans le temps comme les larmes sous la pluie.';
    // je définis la position de départ qui est à 0
    $i= 0;
//PARCOURIR la longueur de la chaine de caractère jusqu'à ce que ca soit la fin puis on avance d'un caractere a chaque fois (on incrémente)
for ($i = 0; isset($str[$i]); $i++) {
    //si la position est pair (0,2,4 ...)
    if ($i % 2 == 0) {
        //on affiche en prenant en compte la position pair ou pas !
        echo $str[$i];
    }
  
  
}
?>