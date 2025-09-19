<?php
// Récupérer le type depuis l'URL (méthode GET)
$type = $_GET['type'] ?? null;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un média</title>
</head>
<body>

<h1>Ajouter un média</h1>

<?php if (!$type): ?>
    <!-- Formulaire GET : Choix du type -->
    <form method="get" action="">
        <label for="type">Type de média :</label>
        <select name="type" id="type" required>
            <option value="">-- Sélectionnez --</option>
            <option value="book">Livre</option>
            <option value="movie">Film</option>
            <option value="game">Jeu vidéo</option>
        </select>
        <button type="submit">Valider</button>
    </form>

<?php else: ?>
    <!-- Formulaire POST : Ajout du média -->
    <form method="post" action="submit.php">
        <input type="hidden" name="type" value="<?= htmlspecialchars($type) ?>">

        <!-- Champs communs -->
        <p><strong>Type sélectionné :</strong> <?= ucfirst($type) ?></p>

        <label for="title">Titre :</label>
        <input type="text" name="title" id="title" required><br><br>

        <label for="description">Description :</label>
        <textarea name="description" id="description" rows="3"></textarea><br><br>

        <label for="stock">Stock :</label>
        <input type="number" name="stock" id="stock" value="1" min="0"><br><br>

        <?php if ($type === 'book'): ?>
            <!-- Champs spécifiques Livre -->
            <label for="author">Auteur :</label>
            <input type="text" name="author" id="author"><br><br>

            <label for="isbn">ISBN :</label>
            <input type="text" name="isbn" id="isbn"><br><br>

            <label for="pages">Nombre de pages :</label>
            <input type="number" name="pages" id="pages"><br><br>

        <?php elseif ($type === 'movie'): ?>
            <!-- Champs spécifiques Film -->
            <label for="director">Réalisateur :</label>
            <input type="text" name="director" id="director"><br><br>

            <label for="duration">Durée (en minutes) :</label>
            <input type="number" name="duration" id="duration"><br><br>

            <label for="year">Année :</label>
            <input type="number" name="year" id="year" min="1900" max="<?= date('Y') ?>"><br><br>

        <?php elseif ($type === 'game'): ?>
            <!-- Champs spécifiques Jeu vidéo -->
            <label for="studio">Studio :</label>
            <input type="text" name="studio" id="studio"><br><br>

            <label for="platform">Plateforme :</label>
            <select name="platform" id="platform">
                <option value="PC">PC</option>
                <option value="PlayStation">PlayStation</option>
                <option value="Xbox">Xbox</option>
                <option value="Nintendo">Nintendo</option>
                <option value="Mobile">Mobile</option>
            </select><br><br>
        <?php endif; ?>

        <button type="submit">Ajouter</button>
    </form>
<?php endif; ?>

</body>
</html>