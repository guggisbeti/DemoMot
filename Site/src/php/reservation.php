<?php
session_start();
/**
 * ETML
 * User: Timothée Guggisberg
 * Date: 30.05.2017
 * Brief : Page ayant un formulaire permettant de demander une plage horaire
 */

//Si il n'est pas connecté, renvoi à la page d'accueil
if($_SESSION['connected'] == 0)
{
    echo '<meta http-equiv="refresh" content="0; URL=index.php">';
}
else
{
?>

<!DOCTYPE html>
<?php
include "include/head.php";
?>
<body>
<?php
include "include/nav.php";
?>
<main>
    <?php
    //Utilisation de la session user afin de prendre l'id de l'utilisateur connecté
    $id = $_SESSION['user'];
    ?>
    <div class="row">
        <form class="col s12" id="inscriptionForm" action="checkReservation.php" method="post">
            <div class="row">
                <h3 class="red-text text-darken-4">Réservation</h3>
                <!-- champ pour la Date de début -->
                <input type="date" name="startDate" class="datepicker">
                <!-- champ pour la Date de fin -->
                <input type="date" name="endDate" class="datepicker">
                <!-- champ caché pour envoyer l'id -->
                <input type="hidden" name="id" value="<?php echo $id ?>">

                <input class="btn waves-effect waves-light red darken-4" type="reset" name="reset">
                <input class="btn waves-effect waves-light blue-grey darken-2" type="submit" name="action">
            </div>
        </form>
    </div>
</main>
<?php
include "include/footer.php";
}
?>
