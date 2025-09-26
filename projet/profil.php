<?php
session_start();
$mysqli = new mysqli('localhost', 'root', 'root', 'livreor');

// Vérifie que l'utilisateur est connecté
if (!isset($_SESSION['utilisateurs'])) {
    header("Location: connexion.php");
    exit();
}

$userSession = $_SESSION['utilisateurs'];
$userId = $userSession['id'];
$login = $userSession['login'];

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newLogin = trim($_POST['login'] ?? '');
    $newPassword = trim($_POST['password'] ?? '');
    $confirmPassword = trim($_POST['confirm'] ?? '');

    if (empty($newLogin) || empty($newPassword) || empty($confirmPassword)) {
        $_SESSION['error'] = "Tous les champs sont requis.";
    } elseif ($newPassword !== $confirmPassword) {
        $_SESSION['error'] = "Les mots de passe ne correspondent pas.";
    } else {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $stmt = $mysqli->prepare("UPDATE utilisateurs SET login = ?, password = ? WHERE id = ?");
        $stmt->bind_param("ssi", $newLogin, $hashedPassword, $userId);

        if ($stmt->execute()) {
            $_SESSION['utilisateurs']['login'] = $newLogin;
            $_SESSION['success'] = "Profil mis à jour avec succès.";
            header("Location: profil.php");
            exit();
        } else {
            $_SESSION['error'] = "Erreur lors de la mise à jour : " . $stmt->error;
        }
        $stmt->close();
    }
}

// Récupération des messages une seule fois
$success = $_SESSION['success'] ?? '';
$error = $_SESSION['error'] ?? '';
unset($_SESSION['success'], $_SESSION['error']);

// Récupération du login actuel depuis la BDD
$stmt = $mysqli->prepare("SELECT login FROM utilisateurs WHERE id = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$data = $stmt->get_result()->fetch_assoc();
$currentLogin = $data['login'] ?? $login;
$stmt->close();
?>

<?php ob_start(); ?>

<div class="mainform">
    <div class="card">
        <div class="btn-group">
            <button class="btn active">Modifier mon profil</button>
        </div>

        <div class="form-container">
            <?php if (!empty($error)): ?>
                <div class="message error"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <?php if (!empty($success)): ?>
                <div class="message success"><?= htmlspecialchars($success) ?></div>
            <?php endif; ?>

            <form action="profil.php" method="post" class="form active" id="Edit-Profil">
                <div class="input-group">
                    <label for="login">Nouveau login :</label>
                    <input type="text" name="login" id="login" value="<?= htmlspecialchars($currentLogin) ?>" required>
                </div>

                <div class="input-group">
                    <label for="password">Nouveau mot de passe :</label>
                    <input type="password" name="password" id="password" required>
                </div>

                <div class="input-group">
                    <label for="confirm">Confirmer le mot de passe :</label>
                    <input type="password" name="confirm" id="confirm" required>
                </div>

                <div class="input-group">
                    <input type="submit" class="btn" value="Mettre à jour">
                </div>

                <div class="input-group">
                    <a href="commentaire.php" class="btn" id="btncommentaire"> Laisse ton commentaire </a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
require_once "layout.php";
?>