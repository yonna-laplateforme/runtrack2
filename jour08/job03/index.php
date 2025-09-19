<?php
session_start();

//si je clique sur reset j'ouvre un tableau vide (a chaque fois)
if (isset($_POST['reset'])) {
    $_SESSION['prenoms'] = [];
}

// Si le bouton "submit" est cliqué on ajoute 
if (isset($_POST['submit'])) {
    $prenom = trim($_POST['prenom']);
    // On ajoute le prénom à la session s'il n'est pas vide (!empty)
    if (!empty($prenom)) {
        $_SESSION['prenoms'][] = $prenom;
    }
}

// Initialiser la variable de session si elle n'existe pas (!isset)
if (!isset($_SESSION['prenoms'])){
    $_SESSION['prenoms'] = [];


}   
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="prenom">
        <button type="submit" name="submit">Submit</button>
        <button type="submit" name="reset">Reset</button>
    </form>
    <ul>
        <?php foreach ($_SESSION['prenoms'] as $pren): ?>
    <li> <?php echo "$pren" ?> </li>
         <?php endforeach; ?>
    </ul>
</body>
</html>