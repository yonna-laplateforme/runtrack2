<?php
session_start();
require_once "bdd.php"; // Connexion à la base

$message = '';
$login = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['inscription'])) {
    $login     = trim($_POST['login'] ?? '');
    $password  = trim($_POST['password'] ?? '');
    $confirm   = trim($_POST['password_confirm'] ?? '');

    if (empty($login) || empty($password) || empty($confirm)) {
        $message = "Tous les champs sont requis.";
    } elseif ($password !== $confirm) {
        $message = "Les mots de passe ne correspondent pas.";
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO utilisateurs (login, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $login, $hashedPassword);

        if ($stmt->execute()) {
            // Stocker le message de succès en session et rediriger vers connexion.php
            $_SESSION['message'] = "✅Inscription réussie ! Connectez-vous.";
           
            exit;
        } else {
            $message = " Erreur : " . $stmt->error;
        }

        $stmt->close();
    }
}

// Affichage du message stocké en session (flash message)
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']); // Supprime le message après affichage
     header("Location: connexion.php");
}

ob_start();
?>

<body>
    <div class="mainform">
        <div class="card">
            <div class="btn-group">
                <button class="btn" data-form="Sign-Up">Inscription</button>
            </div>
            <div class="form-container">
                <?php if (!empty($message)): ?>
                    <div class="message">
                        <?= htmlspecialchars($message) ?>
                    </div>
                <?php endif; ?>

                <form action="inscription.php" class="form active" id="Sign-Up" method="post">
                    <div class="input-group">
                        <label for="login">Identifiant</label>
                        <input type="text" name="login" id="login" required value="<?= htmlspecialchars($login) ?>">
                    </div>
                    <div class="input-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" name="password" id="password" required>
                    </div>
                    <div class="input-group">
                        <label for="password_confirm">Confirmer le mot de passe</label>
                        <input type="password" name="password_confirm" id="password_confirm" required>
                    </div>
                    <div class="input-group">
                        <input type="submit" class="btn" name="inscription" value="S'inscrire">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<?php
$content = ob_get_clean();
require_once "layout.php";
?>