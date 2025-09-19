<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table border =1 >
        <thead>
             <tr>
                <th>prenom</th>
                <th>nom</th>
                <th>naissance</th>
            </tr>
             </thead>
        <tbody>
           
            <?php
            //connexion a la base de donné
            $serveur = "localhost";
            $utilisateur = "root";
            $mdp = "root";
            $baseDd = "jour09";
            $mySqli = new mysqli($serveur, $utilisateur, $mdp, $baseDd);


            //requete de recuperation de la base de données
            $requete = "SELECT prenom, nom, naissance FROM etudiants WHERE naissance BETWEEN '1998-01-01' AND '2018-01-01'";

            //exécution de la requete
            $resultat = $mySqli->query($requete);

            // faire une boucle
            //

            while ($ligne = $resultat->fetch_assoc()) {

                echo "<tr>";
                echo "<td>" . $ligne['prenom'] . "</td>";
                echo "<td>" . $ligne['nom'] . "</td>";
                echo "<td>" . $ligne['naissance'] . "</td>";
                echo "</tr>";
            }
            ?>

           
        <tbody>
    </table>
</body>

</html>