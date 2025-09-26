<?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livre d'Or</title>
    <link rel="stylesheet" href="style.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Parisienne&family=Poppins:wght@300;400;500;600&display=swap');
    </style>
</head>

<body>
    <header class="header">
        <div class="container">
            <nav class="lien1">
                <a href="accueil.php">Accueil</a>
                <a href="livre-or.php">Livre d'Or</a>
                <?php if (isset($_SESSION['utilisateurs'])): ?>
                    <a href="commentaire.php">Ajouter un commentaire</a>
                    <a href="profil.php">Mon profil</a>
                <?php endif; ?>
            </nav>

            <div class="lien2">
                <?php if (isset($_SESSION['utilisateurs'])): ?>


                    <span class="welcome">
                        Bonjour, <?= htmlspecialchars($_SESSION['utilisateurs']['login'] ?? 'Utilisateur') ?>
                    </span>

                    <a href="deconnexion.php" class="deconnexion">Déconnexion</a>

                <?php else: ?>
                    <a href="inscription.php" class="inscription">S'inscrire</a>
                    <a href="connexion.php" class="connexion">Se connecter</a>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <main>
        <?= $content ?>
    </main>
</body>

</html>