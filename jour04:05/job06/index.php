<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
   
<form action="index.php" method="post">
        <label for="nombre"> Nombre </label>
        <input type="text" name="nombre" id= "text">
        <input type="submit" value="valider">
    </form>

</body>
</html>



<?php

if(isset($_POST['nombre'])) {
  
    if ($_POST['nombre'] % 2 == 0) {

    echo $_POST['nombre'] .  " est paire ";
 
} else {
   
    echo $_POST['nombre'] . " est impaire ";
    
  }
}
?>