<?php
$str='I\'m sorry Dave I\'m afraid I can\'t do that.';
$i= 0;
$Tabvoyelle = ['a', 'e', 'i', 'o', 'u','y' ,'I' ,'A' ,'E' ,'O' ,'U' ,'Y'];

for($i = 0; isset($str[$i]); $i++){
   
    foreach($Tabvoyelle as $voyelle){
        if($str[$i] == $voyelle){
            echo $str[$i];
        }
    }

}
?>