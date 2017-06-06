<?php

// Connexion à la base de données
require_once('bdd.php');
//echo $_POST['title'];
if (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['color'])){
	
	$title = $_POST['title'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	$color = $_POST['color'];

	$sql = "INSERT INTO events(title, start, end, color) values ('$title', '$start', '$end', '$color')";
	
	echo $sql;
	
	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}

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
header('Location: indexCalendar.php');
	
?>
