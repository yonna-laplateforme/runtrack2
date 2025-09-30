<?php
// Connexion a la bdd avec mysqli
// Affiche les erreurs Mysqli automatiquement
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli('localhost', 'root', 'root', 'Classes');
$mysqli->set_charset('utf8mb4');
?>