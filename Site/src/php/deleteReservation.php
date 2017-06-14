<?php
/**
 * ETML
 * User: Timothée Guggisberg
 * Date: 09.06.2017
 * Brief : Page de suppression des plages horaires demandées par les utilisateurs
 */

//Inclusion de la classe PDOLink
include 'include/PDOLink.php';
$id = $_GET['id'];
$idUser = $_GET['idUser'];
$connector = new PDOLink();

//2ème : Faire la requête
//Inserer la requête dans un variable "query"
$query = "DELETE FROM `t_resevation` WHERE idReservation = $id";

//Lance la requête
$req = $connector->executeQuery($query);

//Ecrase la requête
$connector->closeCursor($req);
//Stop la connexion
$connector->destructObject();

?>
<!-- Redirection instantanée sur la page des reservations -->
<meta http-equiv="refresh" content="0; URL=acceptReservation.php?type=sendEmail&idUser=<?php echo $idUser ?>">
