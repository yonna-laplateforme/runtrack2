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
                <th>capacite_moyenne</th>
           
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
            $requete = "SELECT AVG(capacite) AS 'capacite_moyenne' FROM salle";

            //exécution de la requete
            $resultat = $mySqli->query($requete);

            // faire une boucle
            //

            while ($ligne = $resultat->fetch_assoc()) {

                echo "<tr>";
                echo "<td>" . $ligne['capacite_moyenne'] . "</td>";
                echo "</tr>";
            }
            ?>

           
        <tbody>
    </table>
</body>

</html>