<?php
session_start();
/**
 * ETML
 * User: Timothée Guggisberg
 * Date: 07.06.2017
 * Brief : Page invisible supprimant le message demandé
 */

//Si il n'est pas connecté ou pas admin, renvoi à la page d'accueil
if($_SESSION['connected'] == 0 || $_SESSION['admin'] == 0)
{
    echo '<meta http-equiv="refresh" content="0; URL=index.php">';
}
else {
    include 'include/PDOLink.php';
    $id = $_GET['id'];
    $connector = new PDOLink();

    //2ème : Faire la requête
    //Inserer la requête dans un variable "query"
    $query = "DELETE FROM `t_message` WHERE idMessage = $id";

    //Lance la requête
    $req = $connector->executeQuery($query);

    //Ecrase la requête
    $connector->closeCursor($req);
    //Stop la connexion
    $connector->destructObject();

    header('Location: message.php');
}
?>
