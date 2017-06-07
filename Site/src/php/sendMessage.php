<?php
session_start();
/**
 * ETML
 * User: Timothée Guggisberg
 * Date: 07.06.2017
 * Brief : Page d'envoi de message accessible au utilisateur
 */

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
    <div class="row">
        <!-- Formulaire d'envoi du message dans la page de vérification de celui-ci -->
        <form class="col s12" id="inscriptionForm" action="checkMessage.php" method="post">
            <div class="row">
                <h3 class="red-text text-darken-4">Message</h3>
                <div class="row">
                    <div class="input-field col s12">
                        <!-- Zone de texte prévue por le message -->
                        <textarea placeholder="Envoyez votre message ici..." name="message" id="message" class="materialize-textarea"></textarea>
                        <label for="message"></label>
                    </div>
                <input class="btn waves-effect waves-light red darken-4" type="reset" name="reset">
                <input class="btn waves-effect waves-light blue-grey darken-2" type="submit" name="action">
            </div>
        </form>
    </div>
</main>
<?php
include "include/footer.php";
?>
