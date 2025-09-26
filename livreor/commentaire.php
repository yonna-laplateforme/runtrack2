<?php
session_start();
$mysqli = new mysqli('localhost', 'root', 'root', 'livreor');

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['utilisateurs'])) {
    header("Location: connexion.php");
    exit();
}

$error = '';
$success = '';

// Récupération de l'ID de l'utilisateur connecté
$id_utilisateur = $_SESSION['utilisateurs']['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $commentaire = trim($_POST['com'] ?? '');

    if (empty($commentaire)) {
        $error = "Le commentaire ne peut pas être vide.";
    } else {
        $stmt = $mysqli->prepare("INSERT INTO commentaires (commentaire, id_utilisateur, date) VALUES (?, ?, NOW())");
        $stmt->bind_param("si", $commentaire, $id_utilisateur);

        if ($stmt->execute()) {
            $success = "Commentaire ajouté avec succès.";
        } else {
            $error = "Erreur lors de l'ajout du commentaire : " . $stmt->error;
        }

        $stmt->close();
    }
}

// Capture pour layout.php
ob_start();
?>

<div class="mainform">
    <div class="card">
        <div class="btn-group">
            <button class="btn active">Ajouter un commentaire</button>
        </div>

        <div class="form-container">
            <?php if (!empty($error)): ?>
                <div class="message error"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <?php if (!empty($success)): ?>
                <div class="message success"><?= htmlspecialchars($success) ?></div>
            <?php endif; ?>

            <form action="commentaire.php" class="form active" method="post">
                <div class="input-group">
                    <label for="com">Votre commentaire ici </label>
                    <textarea name="com" id="com" required></textarea>
                </div>

                <div class="input-group">
                    <input type="submit" class="btn" value="Commenter">
                </div>
            </form>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
require_once "layout.php";
?>