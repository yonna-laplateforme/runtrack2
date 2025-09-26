<?php ob_start(); ?>

<?php
session_start();
$mysqli = new mysqli('localhost', 'root', 'root', 'livreor');

// Récupération de tous les commentaires avec le nom des utilisateurs
$result = $mysqli->query("
    SELECT commentaires.*, utilisateurs.login 
    FROM commentaires 
    JOIN utilisateurs ON commentaires.id_utilisateur = utilisateurs.id 
    ORDER BY date DESC
");
?>

<div class="titrecoms">
    <h1>Notre Livre d’Or</h1>
</div>

<?php while ($row = $result->fetch_assoc()): ?>
    <div class="coms">
        <p><strong>Posté le <?= date("d/m/Y", strtotime($row['date'])) ?> par <?= htmlspecialchars($row['login']) ?> :</strong></p>
        <p><?= nl2br(htmlspecialchars($row['commentaire'])) ?></p>
    </div>
<?php endwhile; ?>

<div class="retour">
    <a href="accueil.php">⬅ Retour à l’accueil</a>
</div>

<?php
$content = ob_get_clean();
require_once "layout.php";
?>
