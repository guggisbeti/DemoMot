<?php
session_start();
/**
 * ETML
 * User: Timothée Guggisberg
 * Date: 06.06.2017
 * Brief : Page d'ajout d'un evenement dans la base de donnée et donc sur le calendrier
 */

// Connexion à la base de données
require_once('bdd.php');
//Si les champs sont rempli
if (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['color'])){
	
	$title = $_POST['title'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	$color = $_POST['color'];

	$sql = "INSERT INTO events(title, start, end, color) values ('$title', '$start', '$end', '$color')";
	

	$query = $bdd->prepare( $sql );
	//En cas de problème avec le prepare
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$sth = $query->execute();
	//En cas de problème avec execute
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}
	//Si le l'insertion ci-dessus provient de la page reservation.php, supprime la demande de reservation
	if($_GET['type'] == "reservation") {
		include 'include/PDOLink.php';
		$id = $_GET['id'];
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
	}


}
//Direction sur le calendrier
header('Location: indexCalendar.php');
	
?>
