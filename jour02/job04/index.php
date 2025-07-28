     

<?php
//PARCOURIR les nombres de 1 à 100
for ($i = 1; $i <= 100; $i++) 
{

//SI $i est divisible par 3 et donne 0 ET QUE $i N'EST PAS divisible par 5 ALORS
       
   
    if($i % 3==0 && $i % 5 !=0) {
         //affiche fizz
        echo "fizz<br>";

//SINON SI $i est divisible par 5 et donne 0 ET QUE $i N'EST PAS divisible par 3 ALORS
       
   
}   elseif ($i % 5==0 && $i %3!=0) {
         //affiche buzz
        echo "buzz<br>"; 

//SINON SI $i est divisible par 5 et donne 0 ET QUE $i EST AUSSI divisible par 3 donc donne une résultat de 0 ALORS
       
   
}   elseif ($i %3==0 && $i %5==0) {
         //affiche fizzbuzz
    echo "FizzBuzz<br>";
//ET SINON continue $i normalement avec retour a la ligne
}   else {
        
        echo $i . "<br>";
    
}
}?>