<!-- En utilisant php et mysqli, connectez-vous à la base de données “jour09”. A l’aide d’une
requête SQL, récupérez l’ensemble des informations de la table etudiants. Affichez le
résultat de cette requête dans un tableau html. La première ligne de votre tableau html
(thead) doit contenir le nom des champs. Les suivantes (tbody) doivent contenir les
données présentes dans votre base de données. -->


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
                <th> Superficie totale</th>
           
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
            $requete = "SELECT SUM(superficie) AS superficie FROM etage;";

            //exécution de la requete
            $resultat = $mySqli->query($requete);

            // faire une boucle
            //

            while ($ligne = $resultat->fetch_assoc()) {

                echo "<tr>";
                echo "<td>" . $ligne['superficie'] . "</td>";
              

                echo "</tr>";
            }
            ?>

           
        <tbody>
    </table>
</body>

</html>