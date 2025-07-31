
<?php
//declaré un tableau avec les nombres demandés et affiché si ils sont pair ou impair

$tableau = [200, 204, 173, 98, 171, 404, 459];

//parcourir mon tableau qui est définit on divise les nombre du tableau par 2 et si le reste est égale à zéro alors c'est un nombre paire on l'écrit et sinon ecrire impaire pour ceux qui n'ont pas un reste à 0
for ($i = 0; isset($tableau[$i]); $i++) {
  if ($tableau[$i] % 2 == 0) {

    echo $tableau[$i] . " est paire <br> ";
  } else {
    echo $tableau[$i] . " est impaire <br>";
  }
}
?>





