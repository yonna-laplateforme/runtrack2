
<?php
$str = "Certaines choses changent, et d'autres ne changeront jamais.";

for($i = 0; isset($str[$i]); $i++){
   
    if (isset($str[$i+1])) 
    {
        echo $str[$i+1];
    } 
        else 
    {
        echo $str[0];
    }
}
?>






