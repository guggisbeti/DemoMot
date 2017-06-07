<?php
session_start();
/**
 * ETML
 * User: Timothée Guggisberg
 * Date: 06.06.2017
 * Brief : Page de modification de la base de donnée si on modifie un evenement depuis le calendrier
 */

//Si il n'est pas connecté ou pas admin, renvoi à la page d'accueil
if($_SESSION['connected'] == 0 || $_SESSION['admin'] == 0)
{
	echo '<meta http-equiv="refresh" content="0; URL=index.php">';
}
else {

	require_once('bdd.php');
	//Si la checkbox delete a une valeur
	if (isset($_POST['delete']) && isset($_POST['id'])) {


		$id = $_POST['id'];

		$sql = "DELETE FROM events WHERE id = $id";
		$query = $bdd->prepare($sql);
		//Si la query est fausse
		if ($query == false) {
			print_r($bdd->errorInfo());
			die ('Erreur prepare');
		}
		$res = $query->execute();
		//Si l'execution a un problème
		if ($res == false) {
			print_r($query->errorInfo());
			die ('Erreur execute');
		}

	} //Si les champs de la modification ont une valeur
	elseif (isset($_POST['title']) && isset($_POST['color']) && isset($_POST['id'])) {

		$id = $_POST['id'];
		$title = $_POST['title'];
		$color = $_POST['color'];

		$sql = "UPDATE events SET  title = '$title', color = '$color' WHERE id = $id ";


		$query = $bdd->prepare($sql);
		//Si la query est fausse
		if ($query == false) {
			print_r($bdd->errorInfo());
			die ('Erreur prepare');
		}
		$sth = $query->execute();
		//Si l'execution a un problème
		if ($sth == false) {
			print_r($query->errorInfo());
			die ('Erreur execute');
		}

	}
	//Ramène au calendrier
	header('Location: indexCalendar.php');

}
?>
