<?php
//je définis une hauteur de 5  
$hauteur = 5;


for ($i = 1; $i <= $hauteur; $i++) {

    for ($j = 0; $j < $hauteur - $i; $j++) {
        echo '0';
    }
        echo "/";
    
    for ($m = 1; $m <= $i * 2-2 ; $m++){
        
        if($i == 5){

    
         echo "_";   
        }
        
         else{
            echo "0";
        }
    }
        echo "\\<br>";

}
?>