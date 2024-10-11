<?php

function pendu_random(array $array, string $categorie) : string
{
    if($categorie == "")
    {
        // Choisir une catégorie aléatoire parmi les clés du tableau
        $categories = array_keys($array);
        $randomCategorie = $categories[rand(0, count($categories) - 1)];
        
        // Choisir un élément aléatoire dans la catégorie choisie
        return $array[$randomCategorie][rand(0, count($array[$randomCategorie]) - 1)];
    }
    
    // Vérifier si la catégorie spécifiée existe dans le tableau
    if (!isset($array[$categorie])) {
        throw new InvalidArgumentException("La catégorie spécifiée n'existe pas.");
    }
    
    // Choisir un élément aléatoire dans la catégorie spécifiée
    return $array[$categorie][rand(0, count($array[$categorie]) - 1)];
}

function boolTab(string $tab) : array
{
    $size = strlen($tab);
    $boolTab = [];
    while($size > 0)
    {
        $boolTab[] = false;
        $size--;
    }
    return $boolTab;
}

function print_Cat(array $array) : void
{
    echo "Voicis les catégories disponibles : " . PHP_EOL . PHP_EOL;
    foreach($array as $key => $value)
        echo $key . " ";
    echo PHP_EOL;
}

function demandeUtilisateur(array $array) : string
{
    print_Cat($array);
    $choix = readline();
    if($choix == "")
        return $choix;
    else
    {
        while(!isset($array[$choix]))
        {
            echo "Veuillez choisir une catégorie valide : ";
            $choix = readline();
            if($choix == "")
                return $choix;
        }
    }
    return $choix;
}
function jsonConverte($path) : array
{
    
    $contenue = file_get_contents($path);
    $data = json_decode($contenue, true);

    return $data;
}

function categorie(array $array) : string
{
    foreach($array as $key => $value)
    {
        echo $key . " : " . $value . PHP_EOL;
    }

    echo "Choisissez une catégorie : ";
    $choix = readline();

    return $array[$choix];
}

function str_len(string $mot) : int
{
    $i = 0;
    while (isset($mot[$i]))
        $i++;
    return $i;
}
function printString(string $mot, array $bool, string $letter) : void
{
    $size = strlen($mot);

    $i = 0;
    while($i < $size)
    {
        if($mot[$i] == $letter)
            $bool[$i] = true;
        $i++;
    }
}

function demandeChar() : string
{

    do{
        $letter = readline("Veillez introduire une lettre : ");
    } while(!ctype_alpha($letter) || strlen($letter) != 1);
    
    return ($letter);
}

function corresBool(string $lettre, string $mot, array &$bool) : bool
{
    $i = 0;
    $size = strlen($mot);
    $found = false;

    while($i < $size)
    {
        if($mot[$i] == $lettre)
        {
            $bool[$i] = true;
            $found = true;
        }
        $i++;
    }
    return ($found);
}

function afficherPendu(string $mot, array $bool) : void
{
    $i = 0;
    $size = strlen($mot);
    while($i < $size)
    {
        if($bool[$i] == true)
            echo $mot[$i];
        else
            echo "_";
        $i++;
    }
    echo PHP_EOL;
}

function finish(array &$bool) : bool
{
    $i = 0;
    $size = count($bool);

    while($i < $size)
    {
        if($bool[$i] == false)
            return false;
        $i++;
    }
    echo PHP_EOL . "Bravo vous avez gagné !" . PHP_EOL;
    return (true);
} 

function pendu(string $mot, array $bool) : void
{
    $vie = 7;

    while($vie > 0 && !finish($bool))
    {
        echo "Il vous reste " . $vie . " vies". PHP_EOL;
        $letter = demandeChar();
        $corres = corresBool($letter,$mot,$bool);
        if(!$corres)
            $vie--;
        afficherPendu($mot,$bool);
        if($vie == 0)
            echo "Vous avez perdu DOMMAGE !" . PHP_EOL;
    }

}
/*
    Fonction principale du jeu du pendu...

    N'hésitez pas à utiliser d'autres fichiers avec les outils d'importation appropriés.

    Il se peut que vous ayez besoin d'utiliser des fonctions prédéfinies que nous n'avons pas vues.

    Voici quelques fonctions dont vous pourriez avoir besoin : 
        array_rand() : permet de sélectionner une clé de tableau aléatoirement.
        array_search() : permet de vérifier si une valeur existe dans un tableau.
        isset() : permet de vérifier si un élément existe.
        strlen() : permet de connaître le nombre de caractères présent dans une chaîne.
        strpos() : permet de savoir si un caractère est présent dans une chaîne.
        ctype_lower() : permet de vérifie qu'une chaîne est en minuscules.
        str_repeat() : permet de répéter un nombre défini de fois un même caractère.
        range() : permet de génèrer une séquence de nombres ou de caractères sous forme de tableau.

    https://www.php.net/manual/fr/
*/
?>