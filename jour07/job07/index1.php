<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post">
    
    <select name="option">
        <option value="gras">Gras</option>
        <option value="cesar">César</option>
        <option value="plateforme">Plateforme</option>

    </select><br><br>
    <input type="text" name="texte"><br><br>
    <input type="number" name="decalage"><br><br>
    <button type="submit" value="Envoyer">SUBMIT</button>
</form>
</body>
</html>
<?php

// Je crée une fonction pour faire le décalage César voir (les ressourses https://www.deleze.name/marcel/php/onlinescript/initiation/4/4-2-2.html)
function cesar($str, $decalage) {

    // Je commence à regarder la première lettre position 0
    $i = 0;

    // Tant qu’il y a encore une lettre à cette position, je continue
    while (isset($str[$i])) {

        // Je prends la lettre qui est à la position $i
        $letr = $str[$i];

        // Si la lettre est une minuscule (a à z)
        if ($letr >= 'a' && $letr <= 'z' ) {

            // Je commence à 'a' pour compter où est la lettre dans l’alphabet
            $depart = 'a';

            // J’initialise la position à 0
            $position = 0;

            // Je compte lettre par lettre jusqu’à tomber sur la lettre que j’ai
            while ($depart !== $letr) {
                $depart++;       // Je passe à la lettre suivante
                $position++;   // Je compte une lettre de plus
            }

            // Je décale la position de la lettre selon la clé (le décalage)
            $nouvellePozz = $position + $decalage;

            // Si je dépasse la lettre 'z' (position 25), je reviens au début
            while ($nouvellePozz > 25) {
                $nouvellePozz -= 26;
            }

            // Si je vais avant 'a' (position 0), je reviens à la fin
          if ($nouvellePozz < 0) {
                $nouvellePozz += 26;
            }

            // Je repars de 'a' pour avancer jusqu’à la nouvelle lettre
            $lettre = 'a';

            // Je compte combien de fois avancer dans l’alphabet
            $j = 0;
            while ($j < $nouvellePozz) {
                $lettre++;  // Je passe à la lettre suivante
                $j++;       // Je compte un pas de plus
            }

            // J’affiche la lettre décalée
            echo $lettre;
        }

        // Si la lettre est une majuscule (A à Z), je fais pareil
        elseif ($letr >= 'A' && $letr <= 'Z') {

            // Je commence à 'A' pour compter
            $depart = 'A';

            // Position de la lettre dans l’alphabet majuscule
            $position = 0;

            // Je compte lettre par lettre jusqu’à ma lettre
            while ($depart !== $letr) {
                $depart++;
                $position++;
            }

            // Je décale la position de la lettre
            $nouvellePoz = $position + $decalage;

            // Si je dépasse 'Z', je reviens au début
            while ($nouvellePoz > 25) {
                $nouvellePoz -= 26;
            }

            // Si je vais avant 'A', je reviens à la fin
            while ($nouvellePoz < 0) {
                $nouvellePoz += 26;
            }

            // Je repars de 'A' pour avancer
            $lettre = 'A';

            // Je compte combien de fois avancer
            $j = 0;
            while ($j < $nouvellePoz) {
                $lettre++;
                $j++;
            }

            // J’affiche la lettre décalée
            echo $lettre;
        }

        // Si ce n’est pas une lettre, je la laisse telle quelle
        else {
            echo $letr;
        }

        // Je passe à la lettre suivante
        $i++;
    }
}

//  je crée une fonction pour mettre en gras toutes les majuscules
function gras($str) {

    // Je commence par la première lettre (position 0)
    $i = 0;

    // Tant qu’il y a encore une lettre à cette position
    while (isset($str[$i])) {

        // Je prends la lettre à la position $i
        $letr = $str[$i];

        // Si c’est une lettre majuscule (A à Z)
        if ($letr >= 'A' && $letr <= 'Z') {

            // Je l’entoure avec une balise <strong> pour qu’elle soit en gras
            echo "<strong>" . $letr . "</strong>";
        }
        else {
            // Sinon, je l’affiche normalement
            echo $letr;
        }

        // Je passe à la lettre suivante
        $i++;
    }
}

//et la ma derniere fonction qui remplace le me d'une fin des mots par un _
// Je crée une fonction appelée plateforme qui ajoute "_" à la fin des mots qui finissent par "me"
function plateforme($str) {
    
    // Je commence à lire le texte à la première lettre (position 0)
    $i = 0;
    
    // Je prépare une nouvelle phrase vide où je vais mettre le texte modifié
    $newText = "";
    
    // Je prépare un mot vide, je vais construire chaque mot lettre par lettre
    $mot = "";
    
    // Tant que la lettre à la position $i existe dans le texte
    while (isset($str[$i])) {
        
        // Je prends la lettre actuelle
        $letr = $str[$i];
        
        // Si cette lettre est un espace, ça veut dire que le mot est fini
        if ($letr === " ") {
            
            // Je compte combien de lettres il y a dans le mot
            $longueur = 0;
            while (isset($mot[$longueur])) {
                $longueur++;
            }
            
            // Si le mot a au moins 2 lettres
            if ($longueur >= 2) {
                
                // Je regarde la lettre avant la dernière
                $avantDerniereLettre = $mot[$longueur - 2];
                
                // Je regarde la dernière lettre
                $derniereLettre = $mot[$longueur - 1];
                
                // Si ces deux lettres sont 'm' puis 'e'
                if (
                    ($avantDerniereLettre === 'm' || $avantDerniereLettre === 'M') &&($derniereLettre ==='e' || $derniereLettre ==='E'))
                    {
                    
                    // Je rajoute un "_" à la fin du mot
                    $mot .= "_";
                }
            }
            
            // Je rajoute ce mot (modifié ou pas) à ma nouvelle phrase avec un espace
            $newText .= $mot . " ";
            
            // Je vide le mot pour commencer à construire le suivant
            $mot = "";
        }
        else {
            // Sinon, la lettre fait partie du mot, donc je l'ajoute au mot en construction
            $mot .= $letr;
        }
        
        // Je passe à la lettre suivante dans le texte
        $i++;
    }
    
    // Quand on arrive à la fin du texte, il reste un dernier mot à traiter (sans espace après)
    $longueur = 0;
    while (isset($mot[$longueur])) {
        $longueur++;
    }
    
    // Même vérification que pour les autres mots
    if ($longueur >= 2) {
        $avantDerniereLettre = $mot[$longueur - 2];
        $derniereLettre = $mot[$longueur - 1];
        if (($avantDerniereLettre === 'm' || $avantDerniereLettre === 'M') &&($derniereLettre ==='e' || $derniereLettre ==='E')) {
            $mot .= "_";
        }
    }
    
    // J'ajoute le dernier mot à la nouvelle phrase
    $newText .= $mot;
    
    // Je retourne la phrase finale modifiée
    return $newText;
}

// C'est ici quon fait nos choix dans le formulaire
if (isset($_POST['texte']) && isset($_POST['option'])) {
    $texte = $_POST['texte'];
    $option = $_POST['option'];
    if ($option === "cesar" && isset($_POST['decalage'])) {
        $decalage = $_POST['decalage'];
        cesar($texte, $decalage);
    } elseif ($option === "gras") {
        gras($texte);
    } elseif ($option === "plateforme") {
       echo plateforme($texte);
    } 
}
?>