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
// Fin de la vérification de la connexion à la base de donnée
// Variable qui sert à lire la table client
$db->exec("SET CHARACTER SET utf8");
$sql  = 'SELECT `lastName`, `firstName` FROM `clients` WHERE `lastName` LIKE \'M%\' ORDER BY `lastName` ASC';
$clientQueryStat = $db->query($sql);
$clientList = $clientQueryStat->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>prénom du client</th>
                        <th>nom du client</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
// Début de la boucle foreach qui sert à afficher notre tableau
                    foreach ($clientList as $key => $client):
                        ?>
                        <tr> 
                            <td><?= $key + 1 ?></td>
                            <td><?= $client['firstName'] ?></td>
                            <td><?= $client['lastName'] ?> </td>
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