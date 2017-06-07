<?php
session_start();
/**
 * ETML
 * User: Timothée Guggisberg
 * Date: 31.05.2017
 * Brief : Page de check de la page reservation.php tout en transformant les dates afin de pouvoir bien les mettres dans la base de donnée
 */

include "include/head.php";

$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];
$id = $_POST['id'];


if($startDate == "" || $endDate == "" || $id == "" || $id == 0)
{
    echo "Certains champs sont vides, veuillez les remplir.";
    ?>
    <meta http-equiv="refresh" content="3; URL=reservation.php">
    <?php
}
else
{
    $connector = new PDOLink();

        //2ème : Faire la requête
        //Inserer la requête dans un variable "query"
        $query = "INSERT INTO `t_resevation`(`resStartDate`, `resEndDate`, `resValidate`, `idUser`) VALUES ('$startDate','$endDate',0,$id)";

        //Lance la requête
        $req = $connector->executeQuery($query);

        echo "Les données ont été insérées, votre demande va être gérée par un administrateur";

        ?>
        <meta http-equiv="refresh" content="3; URL=index.php">
        <?php

        //Ecrase la requête
        $connector->closeCursor($req);
        //Stop la connexion
        $connector->destructObject();
}