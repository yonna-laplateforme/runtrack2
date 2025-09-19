<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="index.php" method="post">


        <label for="username"> Username</label>
        <input type="text" name="username" id="text">
        <br>

        <label for="password">Password </label>
        <input type="text" name="password" id="text">
        <br>

        <input type="submit" value="valider">
    </form>
</body>

</html>



<?php

echo "<br>";


if (isset($_POST['username']) && isset($_POST['password'])) {
    if ($_POST['username'] == 'Jhon' && $_POST['password'] == 'Rambo') {

        echo "C’est pas ma guerre";
    } else {
        echo htmlspecialchars($_POST['username']);
        echo "Votre pire cauchemar";
    }
}


?>