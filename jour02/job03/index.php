

<?php

// POUR parcourir les nombres de 0 à 100 
for ($i = 0; $i <= 100; $i++) {
    
    //SI $i est srictement supérieur à 0 ET SI $i est strictement inferieur à 20 alors affiché en italique
    if ($i > 0 && $i < 20) {
        echo "<i>$i</i> <br/>";
} 
    //SINON SI $i est strictement supérieur à 25 ET stricetement inferieur à 50 ET QUE $i n'esdt pas 42 alors souligne les chiffres
    else if ($i > 25 && $i < 50 && $i!=42) {
        echo "<u>$i</u> <br>";
}
        //SINON SI $i est ÉGALE à 42 ALORS affiche laplateforme
    elseif ($i == 42){
        echo "laplateforme <br>";
} 
    
//SINON continu à affiché les nombres de $i normalement
    else {
        echo "$i<br />";
}
?>