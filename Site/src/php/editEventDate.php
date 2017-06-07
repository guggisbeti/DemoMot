<?php
session_start();
/**
 * ETML
 * User: Timothée Guggisberg
 * Date: 06.06.2017
 * Brief : Page de modification de la base de donnée si on bouge de place un evenement
 */

//Si il n'est pas connecté ou pas admin, renvoi à la page d'accueil
if($_SESSION['connected'] == 0 || $_SESSION['admin'] == 0)
{
	echo '<meta http-equiv="refresh" content="0; URL=index.php">';
}
else {

	// Connexion à la base de données
	require_once('bdd.php');

	//Si tous les éléments sont vide
	if (isset($_POST['Event'][0]) && isset($_POST['Event'][1]) && isset($_POST['Event'][2])) {

		$id = $_POST['Event'][0];
		$start = $_POST['Event'][1];
		$end = $_POST['Event'][2];

		$sql = "UPDATE events SET  start = '$start', end = '$end' WHERE id = $id ";


		$query = $bdd->prepare($sql);
		//Si la préparation a un problème
		if ($query == false) {
			print_r($bdd->errorInfo());
			die ('Erreur prepare');
		}
		$sth = $query->execute();
		//Si l'execution a un problème
		if ($sth == false) {
			print_r($query->errorInfo());
			die ('Erreur execute');
		} else {
			die ('OK');
		}

	}

}
?>
