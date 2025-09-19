<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST">
        <select id="style" name="style">
            <option value="style1.css">Style 1</option>
            <option value="style2.css">Style 2</option>
            <option value="style3.css">Style 3</option>
            <input type="submit" value="Valider">
        </select>
    </form>
</body>

</html>

<?php
if (isset($_POST["style"])) {
    $styleSel = $_POST["style"];
    $style1 = "style1.css";
    $style2 = "style2.css";
    $style3 = "style3.css";

    if ($styleSel === $style1) {
        echo '<link rel="stylesheet" href="style1.css">';
    }
    if ($styleSel === $style2) {
        echo '<link rel="stylesheet" href= "style2.css">';
    }
    if ($styleSel === $style3) {
        echo '<link rel="stylesheet" href="style3.css">';
    }
}



?>