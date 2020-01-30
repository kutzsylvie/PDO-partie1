<?php
// Variable pour changer le titre du head
$page = 'Exercice 3';
// Insertion du header avec barre de navigation
include 'header.php';
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
//Afficher le titre de tous les spectacles ainsi que l'artiste, la date et l'heure. 
//        Trier les titres par ordre alphabétique. 
//        Afficher les résultat comme ceci : Spectacle par artiste, le date à heure.
//
// Fin de la vérification de la connexion à la base de donnée
// Variable qui sert à lire la table client
$db->exec("SET CHARACTER SET utf8");
$sql = 'SELECT `lastName`, `firstName`,`birthDate`,`card`, `cardNumber`,
    CASE WHEN `card` = 1  THEN "OUI" ELSE "NON"
    END AS `card` FROM `clients`';
$clientsQueryStat = $db->query($sql);
$clientsList = $clientsQueryStat->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                       <th>#</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>date de naissance</th>
                        <th>carte de fidélité</th>
                        <th>numéro de carte</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
// Début de la boucle foreach qui sert à afficher notre tableau
                    foreach ($clientsList as $key => $clients):
                        ?>
                        <tr> 
                            <td><?= $key + 1 ?></td>
                            <td><?= $clients['lastName'] ?></td>
                             <td><?= $clients['firstName'] ?></td>
                            <td><?= $clients['birthDate'] ?> </td>
                            <td><?= $clients['card'] ?> </td>
                            <td><?= $clients['cardNumber'] ?> </td>
                        </tr>
                        <?php
                    endforeach;
// Fin de la boucle foreach
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>