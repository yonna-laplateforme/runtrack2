<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <form action="index.php" method="get">
            
            
            <label for="Nom:"> Nom</label>
              <input type="text" name="nom" id="text">
            ><br>

            <label for="prénom">Prénom</label>
              <input type="text" name="prenom" id="text">
            <br>

            <input type="submit" value="valider">
        </form>
</body>
</html>



<?php
$unArgument = false;

// je fais une première boucle qui vérifie s’il y a au moins un argument dans $_GET
foreach ($_GET as $cle => $valeur) {
    if (isset($_GET[$cle])) {
        $unArgument= true;
        break;
    }
}

// SI on a détecté au moins un argument GET
if ($unArgument) {
    echo "<table border='1'>";
    echo "<tr><th>Argument</th>
          <th>Valeur</th></tr>";

    foreach ($_GET as $cle => $valeur) {
        if (isset($_GET[$cle])) {
            echo "<tr><td>" .($cle) . "</td><td>" .($valeur) . "</td></tr>";
        }
    }

    echo "</table>";
}
?>

