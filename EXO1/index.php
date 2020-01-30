<?php
// Variable pour changer le titre du head
$page = 'Exercice 1';
// Insertion du header avec barre de navigation
include '../header.php';
// Lier le fichier parameter.php à l'index.php
require_once 'params.php';
// Connexion à la bases est correct
$dsn = 'mysql:dbname=colyseum;host=localhost';
// Vérification de la connexion à la base de donnée
try {
    /* Création d'une classe PDO dans une variable avec en paramétres 
      le pilote, l'utilisateur et le mot de passe de la base de donnée */
    $db = new PDO($dsn, USER, PASSWD);
    // fonction qui sert à pouvoir afficher un message d'erreur en cas d'échec de connexion
} catch (Execption $ex) {
    // Message d'erreur que l'on veut afficher
    die('La connexion à la base de donnée a échoué');
}
// Fin de la vérification de la connexion à la base de donnée
// Variable qui sert à lire la table client
$sql  = 'SELECT `lastName`, `firstName` FROM `clients`';
//
$usersQueryStat = $db->query($sql);
//
$usersList = $usersQueryStat->fetchAll(PDO::FETCH_ASSOC);
// Début de la boucle foreach qui sert à afficher notre tableau
foreach ($usersList as $user):
    ?>
    <p> <?= $user['firstName'] . ' ' . $user['lastName']; ?> </p>
    <?php
endforeach;
// Fin de la boucle foreach