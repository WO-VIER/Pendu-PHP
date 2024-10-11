<?php
// Appliquer la déclaration stricte des types.
declare(strict_types=1);

$chemin = __DIR__.DIRECTORY_SEPARATOR."pendu".DIRECTORY_SEPARATOR."app.php";
include $chemin;
$chemin = __DIR__.DIRECTORY_SEPARATOR."data".DIRECTORY_SEPARATOR."dictionnaire.json";

//Routine pour converire le json en Array
$jsonExtract = jsonConverte($chemin);

//Routine pour demander a l'utilisateur de choisir une categorie
$categorie = demandeUtilisateur($jsonExtract);

//Routine pour choisir un mot dans la categorie choisie si pas [random][random]
$mot = pendu_random($jsonExtract, $categorie);
$bool  = boolTab($mot);
echo var_dump($mot);
//echo var_dump(boolTab($mot));
pendu($mot,$bool);



//"medecin" demande la premiere lettre du mot
//2. 

//Vie 7


/*
    Importez le(s) fichier(s) nécessaire(s).
    Lancez la partie en appelant la fonction principale que vous aurez développé dans le fichier 'pendu/app.php'.
*/
?>