<?php
session_start();
/**
 * ETML
 * User: Timothée Guggisberg
 * Date: 07.06.2017
 * Brief : Page d'envoi de message accessible au utilisateur
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

if($_GET['type'] == "reTry")
{
    $message = $_GET['message'];
}
?>
<main>
    <div class="row">
        <!-- Formulaire d'envoi du message dans la page de vérification de celui-ci -->
        <form class="col s12" id="inscriptionForm" action="checkMessage.php" method="post">
            <div class="row">
                <h3 class="red-text text-darken-4">Message</h3>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">mode_edit</i>
                        <!-- Zone de texte prévue por le message -->
                        <textarea data-length="600" placeholder="Envoyez votre message ici..." name="message" id="message"
                                  class="materialize-textarea"><?php if($_GET['type'] == "reTry"){echo $message;} ?></textarea>
                        <label for="message"></label>
                    </div>
                    <input class="btn waves-effect waves-light red darken-4" type="reset" name="reset">
                    <input class="btn waves-effect waves-light blue-grey darken-2" type="submit" name="action">
                </div>
        </form>
    </div>
</main>
<script>
    $(document).ready(function() {
        $('textarea#message').characterCounter();
    });
</script>
<?php
include "include/footer.php";
}
?>
