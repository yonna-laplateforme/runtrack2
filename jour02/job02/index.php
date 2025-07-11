
<?php
$none = [26, 37 ,88, 1111];

for ($chiffre = 0; $chiffre <= 1338; $chiffre++) {

    if (!in_array($chiffre, $none)) 
        echo "$chiffre <br />";
}
//les nombres stop bien avant 3000 donc pas vu d'interet a bloqué 3233
?>

