<?php
session_start();
// On commence une session qui garde en memoire tout ce quil se passe sur le jeu entre chaques click

// Si c'est la première fois qu'on lance la page la grille n'existe pas encore.
if (!isset($_SESSION['grille'])) {
    $_SESSION['win'] = false;
    // Alor on crée une grille vide avec 3 lignes et 3 colonnes, chaque case a un "-"
    $_SESSION['grille'] = [
        ['-', '-', '-'],
        ['-', '-', '-'],
        ['-', '-', '-']
    ];
    // On dit que c'est au joueur "X" de commencer
    $_SESSION['joueur'] = 'X';
    // Pas de message à afficher pour l'instant
    $_SESSION['message'] = '';
}



// Si on a cliqué sur le bouton "Réinitialiser la partie"
if (isset($_POST['reset'])) {
    $_SESSION['win'] = false;
    // On remet la grille vide avec des "-"
    $_SESSION['grille'] = [
        ['-', '-', '-'],
        ['-', '-', '-'],
        ['-', '-', '-']
    ];

    // Le joueur "X" recommence
    $_SESSION['joueur'] = 'X';

    // On enlève le message
    $_SESSION['message'] = '';

    // On recharge la page pour repartir à zéro
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Si on a cliqué sur une case de la grille (un bouton avec la valeur "case")
if (isset($_POST['case'])) {
    // On récupère la position de la case cliquée (exemple : "1-2" = ligne 1, colonne 2)

    list($row, $col) = explode('-', $_POST['case']);



    // Si la case est vide (c'est-à-dire qu'il y a un "-")
    if ($_SESSION['grille'][$row][$col] == '-') {
        // On remplit cette case avec le symbole du joueur actuel ("X" ou "O")
        $_SESSION['grille'][$row][$col] = $_SESSION['joueur'];

        // On récupère la grille et le joueur actuel dans des variables pour vérifier la victoire
        $g = $_SESSION['grille'];
        $j = $_SESSION['joueur'];

        // On commence par dire qu'il n'y a pas de gagnant
        $_SESSION['win'] = false;


        // On vérifie chaque ligne si toutes les cases sont du même joueur
        for ($i = 0; $i < 3; $i++) {
            if ($g[$i][0] == $j && $g[$i][1] == $j && $g[$i][2] == $j) $_SESSION['win'] = true;
        }
        // On vérifie chaque colonne de la même manière
        for ($i = 0; $i < 3; $i++) {
            if ($g[0][$i] == $j && $g[1][$i] == $j && $g[2][$i] == $j) $_SESSION['win'] = true;
        }
        // On vérifie les deux diagonales
        if ($g[0][0] == $j && $g[1][1] == $j && $g[2][2] == $j) $_SESSION['win'] = true;
        if ($g[0][2] == $j && $g[1][1] == $j && $g[2][0] == $j) $_SESSION['win'] = true;

        // Si on a un gagnant
        if ($_SESSION['win']) {
            // On écrit un message pour dire qui a gagné
            $_SESSION['message'] = "$j a gagné ! ";

            // C'est encore au joueur "X" de commencer la nouvelle partie
            $_SESSION['joueur'] = 'X';
        } else {
            // Si pas de gagnant, on regarde si la grille est pleine (plus de "-")
            $plein = true;
            foreach ($g as $ligne) {
                if (in_array('-', $ligne)) $plein = false; // Il reste au moins une case vide
            }
            // Si la grille est pleine et personne n'a gagné
            if ($plein) {
                // On dit que c'est un match nul et on réinitialise la partie
                $_SESSION['message'] = "Match nul ! ";

                $_SESSION['joueur'] = 'X';
            } else {
                // Sinon, on change de joueur (de "X" à "O" ou de "O" à "X")
                $_SESSION['joueur'] = ($_SESSION['joueur'] == 'X') ? 'O' : 'X';
                // On enlève le message, la partie continue
                $_SESSION['message'] = '';
            }
        }
    }
}
?>

<body>
    <h1>Le morpion de Yonna</h1>
    <form method="post"> <!-- Formulaire pour envoyer les clics au serveur -->

        <!-- Si on a un message à afficher (victoire ou match nul), on l'affiche ici -->
        <?php if (!empty($_SESSION['message'])): ?>
            <p><strong><?php echo $_SESSION['message']; ?></strong></p>
        <?php endif; ?>

        <table> <!-- On crée une table pour afficher la grille -->
            <?php for ($i = 0; $i < 3; $i++): ?> <!-- Pour chaque ligne -->
                <tr> <!-- Ligne de la table -->
                    <?php for ($j = 0; $j < 3; $j++): ?> <!-- Pour chaque colonne -->
                        <td> <!-- Une case de la table -->
                            <?php if ($_SESSION['grille'][$i][$j] == '-'): ?>
                                <!-- Si la case est vide, on met un bouton cliquable avec un "-" -->
                                <button type="submit" name="case" value="<?php echo "$i-$j"; ?>" <?php if ($_SESSION['win']) echo 'disabled' ?>>-</button>
                            <?php else: ?>
                                <!-- Si la case est remplie, on met un bouton désactivé avec le symbole du joueur -->
                                <button type="button" disabled><?php echo $_SESSION['grille'][$i][$j]; ?></button>
                            <?php endif; ?>
                        </td>
                    <?php endfor; ?>
                </tr>
            <?php endfor; ?>
        </table>

        <br>
        <!-- Un bouton pour réinitialiser la partie à tout moment -->
        <button type="submit" name="reset">Réinitialiser la partie</button>

    </form>
</body>