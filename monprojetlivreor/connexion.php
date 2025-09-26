<?php
session_start();

// Connexion à la base de données
$mysqli = new mysqli('localhost', 'root', 'root', 'livreor');

// Initialisation des variables
$login = '';
$error = '';

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (empty($login) || empty($password)) {
        $error = " Tous les champs sont requis.";
    } else {
        // Préparation de la requête
        $stmt = $mysqli->prepare("SELECT * FROM utilisateurs WHERE login = ?");
        $stmt->bind_param("s", $login);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        // Vérification du mot de passe
        if ($user && password_verify($password, $user['password'])) {
            // Création de la session utilisateur
            $_SESSION['utilisateurs'] = [
                'id' => $user['id'],
                'login' => $user['login']
            ];
            header("Location: profil.php");
            exit();
        } else {
            $error = " Identifiants incorrects.";
        }

        $stmt->close();
    }
}

// Capture du contenu pour layout.php
ob_start();
?>

<!-- HTML -->
<body>
    <div class="mainform">
        <div class="card">
            <div class="btn-group">
                <button class="btn">Connexion</button>
            </div>
            <div class="form-container">
                <?php if (!empty($error)): ?>
                    <div class="message" style="color: red;">
                        <?= htmlspecialchars($error) ?>
                    </div>
                <?php endif; ?>

                <form action="connexion.php" class="form active" method="post">
                    <div class="input-group">
                        <label for="login">Identifiant</label>
                        <input type="text" name="login" id="login" required value="<?= htmlspecialchars($login) ?>">
                    </div>
                    <div class="input-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" name="password" id="password" required>
                    </div>
                    <div class="input-group">
                        <input type="submit" class="btn" value="Se connecter">
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
