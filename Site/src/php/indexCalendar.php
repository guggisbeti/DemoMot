<?php
session_start();
/**
 * ETML
 * User: Timothée Guggisberg
 * Date: 06.06.2017
 * Brief : Page du calendrier avec l'utilisation de Full Calendar (libraire JS)
 */

//Si il n'est pas connecté ou pas admin, renvoi à la page d'accueil
if($_SESSION['connected'] == 0)
{
	echo '<meta http-equiv="refresh" content="0; URL=index.php">';
}
else
{
require_once('bdd.php');

//Requête SQL
$sql = "SELECT id, title, start, end, color FROM events";

//Préparation de l'execution de la requête
$req = $bdd->prepare($sql);
//Execution de la requête
$req->execute();

//Affichage des données
$events = $req->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<link href="../../calendar/css/bootstrap.min.css" rel="stylesheet">

<?php
include "include/head.php";
?>

<body>
<?php
include "include/nav.php";
?>
<main>
	<div class="calendarBody">
		<!-- Page Content -->
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h1>Calendrier du chalet</h1>
					<p class="lead">Voici le calendrier avec toutes les plages horaires validées</p>
					<div id="calendar" class="col-centered">
					</div>
				</div>
			</div>
			<?php
			if($_SESSION['admin'] == 1) {
			?>
			<!-- Formualire d'insertion -->
			<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
						<!-- Fomulaire lors de l'insertion d'un event depuis le calendrier -->
						<form class="form-horizontal" method="POST" action="addEvent.php?type=admin">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
										aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="myModalLabel">Ajouter une réservation</h4>
							</div>
							<div class="modal-body">

								<div class="form-group">
									<label for="title" class="col-sm-2 control-label">Titre</label>
									<div class="col-sm-10">
										<input type="text" name="title" class="form-control" id="title"
											   placeholder="Titre">
									</div>
								</div>
								<div class="form-group">
									<label for="color" class="col-sm-2 control-label">Color</label>
									<div class="col-sm-10">
										<select name="color" class="form-control" id="color">
											<option value="">Couleur</option>
											<option value="#0071c5">Blaise Guggisberg - Bleu</option>
											<option value="#40E0D0">Yves Guggisberg - Turquoise</option>
											<option value="#FF0000">Patrick Guggisberg - Rouge</option>
											<option value="#008000">Magali Nunez - Vert</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="start" class="col-sm-2 control-label">Date de départ</label>
									<div class="col-sm-10">
										<input type="text" name="start" class="form-control" id="start" readonly>
									</div>
								</div>
								<div class="form-group">
									<label for="end" class="col-sm-2 control-label">Date de fin</label>
									<div class="col-sm-10">
										<input type="text" name="end" class="form-control" id="end" readonly>
									</div>
								</div>

							</div>
							<div class="modal-footer">
								<button id="saveButtonCalendar" type="submit"
										class="waves-effect waves-light btn red darken-3">Sauvegarder
								</button>
								<button type="button" class="waves-effect waves-light btn blue-grey darken-2"
										data-dismiss="modal">Fermer
								</button>
							</div>
						</form>
				</div>
			</div>
		</div>
		<!-- Formulaire de modification -->
		<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">

				<!-- Fomulaire lors de la modification d'un event depuis le calendrier -->
				<form class="form-horizontal" method="POST" action="editEventTitle.php">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
								aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Modifier la réservation</h4>
					</div>
					<div class="modal-body">

						<div class="form-group">
							<label for="title" class="col-sm-2 control-label">Titre</label>
							<div class="col-sm-10">
								<input type="text" name="title" class="form-control" id="title" placeholder="Titre">
							</div>
						</div>
						<div class="form-group">
							<label for="color" class="col-sm-2 control-label">Color</label>
							<div class="col-sm-10">
								<select name="color" class="form-control" id="color">
									<option value="">Couleur</option>
									<option value="#0071c5">Blaise Guggisberg - Bleu</option>
									<option value="#40E0D0">Yves Guggisberg - Turquoise</option>
									<option value="#FF0000">Patrick Guggisberg - Rouge</option>
									<option value="#008000">Magali Nunez - Vert</option>
								</select>
							</div>
						</div>
						<input type="hidden" name="id" class="form-control" id="id">
					</div>
					<div class="modal-footer">
						<button id="saveButtonCalendar" type="submit" class="waves-effect waves-light btn blue-grey darken-2">
							Sauvgarder
						</button>
						<button type="button" class="waves-effect waves-light btn blue-grey darken-2" data-dismiss="modal">
							Fermer
						</button>
						<button id="deleteButtonCalendar" name="delete" type="submit" class="waves-effect waves-light btn red darken-3">
							Supprimer
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php
	}
	?>
	<!-- jQuery Version 1.11.1 -->
	<script src="js/jquery.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>

	<!-- FullCalendar -->
	<script src='js/moment.min.js'></script>
	<script src='js/fullcalendar.min.js'></script>
		<script>
			$(document).ready(function () {

				$('#calendar').fullCalendar({
					header: {
						left: 'prev,next today',
						center: 'title',
						right: ''
					},
					editable: true,
					eventLimit: true, // allow "more" link when too many events
					selectable: true,
					selectHelper: true,
					select: function (start, end) {

						$('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
						$('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
						$('#ModalAdd').modal('show');
					},
					eventRender: function (event, element) {
						element.bind('dblclick', function () {
							$('#ModalEdit #id').val(event.id);
							$('#ModalEdit #title').val(event.title);
							$('#ModalEdit #color').val(event.color);
							$('#ModalEdit').modal('show');
						});
					},
					eventDrop: function (event, delta, revertFunc) { // si changement de position

						edit(event);

					},
					eventResize: function (event, dayDelta, minuteDelta, revertFunc) { // si changement de longueur

						edit(event);

					},
					events: [
						<?php foreach($events as $event):

						$start = explode(" ", $event['start']);
						$end = explode(" ", $event['end']);
						if ($start[1] == '00:00:00') {
							$start = $start[0];
						} else {
							$start = $event['start'];
						}
						if ($end[1] == '00:00:00') {
							$end = $end[0];
						} else {
							$end = $event['end'];
						}
						?>
						{
							id: '<?php echo $event['id']; ?>',
							title: '<?php echo $event['title']; ?>',
							start: '<?php echo $start; ?>',
							end: '<?php echo $end; ?>',
							color: '<?php echo $event['color']; ?>',
						},
						<?php endforeach; ?>
					]
				});
				<?php
				if($_SESSION['admin'] == 1) {
				?>
				function edit(event) {
					start = event.start.format('YYYY-MM-DD HH:mm:ss');
					if (event.end) {
						end = event.end.format('YYYY-MM-DD HH:mm:ss');
					} else {
						end = start;
					}

					id = event.id;

					Event = [];
					Event[0] = id;
					Event[1] = start;
					Event[2] = end;

					$.ajax({
						url: 'editEventDate.php',
						type: "POST",
						data: {Event: Event},
						success: function (rep) {
							if (rep == 'OK') {
								alert('Calendrier mis à jour');
							} else {
								alert('Une erreur a été détéctée, veuillez réessayer');
							}
						}
					});
				}
				<?php
				}
				?>
			});

		</script>
</main>
<?php
include "include/footer.php";
}
?>
