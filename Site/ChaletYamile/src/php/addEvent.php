<?php
session_start();
/**
 * ETML
 * User: Timothée Guggisberg
 * Date: 06.06.2017
 * Brief : Page d'ajout d'un evenement dans la base de donnée et donc sur le calendrier
 */

//Si il n'est pas connecté ou pas admin, renvoi à la page d'accueil
if($_SESSION['connected'] == 0 || $_SESSION['admin'] == 0)
{
	echo '<meta http-equiv="refresh" content="0; URL=index.php">';
}
	//Sinon lance la page
	else
	{
	// Connexion à la base de données
	require_once('bdd.php');

		$title = htmlspecialchars(trim($_POST['title']));
		$start = htmlspecialchars(trim($_POST['start']));
		$end = htmlspecialchars(trim($_POST['end']));
		if(isset($_POST['color'])) {
			$color = htmlspecialchars(trim($_POST['color']));
		}

	//Si les champs sont rempli
	if (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['color'])) {

		$sql = "INSERT INTO events(title, start, end, color) values ('$title', '$start', '$end', '$color')";

		$query = $bdd->prepare($sql);
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
		if ($_GET['type'] == "reservation") {
			include 'include/PDOLink.php';
			$id = $_GET['id'];
			$connector = new PDOLink();

			//2ème : Faire la requête
			//Inserer la requête dans un variable "query"
			$query = "UPDATE `t_resevation` SET `resValidate`= 1 WHERE idReservation = $id";

			//Lance la requête
			$req = $connector->executeQuery($query);

			//Ecrase la requête
			$connector->closeCursor($req);
			//Stop la connexion
			$connector->destructObject();
		}
		//Redirection sur le calendrier
		header('Location: indexCalendar.php');
	}
	else
	{
		?>
		<p>Veuillez remplir le champ "Couleur"</p>
		<!-- Chargement -->
		<div class="preloader-wrapper big active">
			<div class="spinner-layer spinner-blue">
				<div class="circle-clipper left">
					<div class="circle"></div>
				</div><div class="gap-patch">
					<div class="circle"></div>
				</div><div class="circle-clipper right">
					<div class="circle"></div>
				</div>
			</div>
		</div>

		<!-- Redirection de 2 sec sur la page des reservations -->
		<meta http-equiv="refresh" content="2; URL=acceptReservation.php">
		<?php
	}
}
?>
