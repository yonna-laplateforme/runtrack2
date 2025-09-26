<?php
session_start();
// On détruit toutes les variables de session
session_destroy();
header("Location: accueil.php");
exit();