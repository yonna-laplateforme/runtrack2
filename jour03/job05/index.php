<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  
  <?php
  //je creer mes variables $str $i index et un tableau lettre $lettre
$str = "On n'est pas le meilleur quand on le croit mais quand on le sait";
$i= 0;
$estUneVoyelle=false;

// je defini mes voyelles avec la variable $v
$v= ['a', 'e', 'i', 'o', 'u', 'y', 'A', 'E', 'I', 'O', 'U', 'Y'];

//je creer un tableau associatif avec des clés consonnes et voyelles qui commencent à 0
$dic = [
    "consonnes" => 0,
    "voyelles" => 0
];
//je fais une boucle while qui va lire ma phrase tant qu'elle à des lettres à lire       youhou !! et je rajoute isset pour vérifié si c'est défini (vrai?)


while (isset($str[$i])){
    $lettre = $str[$i];

    foreach ($v as $voyelle ){
        if($lettre == $voyelle){
            $dic['voyelles']++;
            $estUneVoyelle = true;
        }
    }
        if($estUneVoyelle == false && $lettre !=' ' && $lettre != "'"){
            $dic['consonnes']++;
        }
   
   $i++;
   $estUneVoyelle=false;
}

echo "<table border='1'>";
echo "<thead><tr><th>Consonnes</th><th>Voyelles</th></tr></thead>";
echo "<tbody><tr><td>{$dic['consonnes']}</td><td>{$dic['voyelles']}</td></tr></tbody>";
echo "</table>";

?>
</body>
</html>

