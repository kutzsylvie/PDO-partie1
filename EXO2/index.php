<?php
// Variable pour changer le titre du head
$page = 'Exercice 2';
// insertion du header avec barre de navigation
include '../header.php';
// Insertion du fichier parameter.php
include_once 'params.php';
// Enregistrement des paramétres de la base de donnée
$dsn = 'mysql:dbname=' . DB . '; host=' . HOST. '; charset=utf8';
try {
    //Variable pour ce connecter à la base de donnée
    $db = new PDO($dsn, USER, PASSWD);
    // fonction qui sert à pouvoir afficher un message d'erreur en cas d'échec de connexion
} catch (Exception $ex) {
    // Message d'erreur que l'on veut afficher 
    die('La connexion à échoué');
}
// Variable qui sert à lire la table showTypes
$sql  = 'SELECT `type` FROM `showTypes`';
//
$showTypes = $db->query($sql);
// Tableau des types de spectacles et fonction fetchALL qui indique que l'on veut un tableau associatif
$showTypesList = $showTypes->fetchAll(PDO::FETCH_ASSOC);
foreach ($showTypesList as $showtype) { ?>
<p> <?= $showtype['type'] ?> </p>
<?php } ?>