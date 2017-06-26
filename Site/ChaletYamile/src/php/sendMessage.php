<?php
session_start();
/**
 * ETML
 * User: Timothée Guggisberg
 * Date: 07.06.2017
 * Brief : Page d'envoi de message accessible au utilisateur
 */

//Si il n'est pas connecté, renvoi à la page d'accueil OU si le type étant dans l'URL est NULL, renvoi sur la page d'accueil
if($_SESSION['connected'] == 0 || isset($_GET['type']) == 0)
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

    //Si le type est reTry ou si message n'existe pas
    if($_GET['type'] == "reTry" && isset($_GET['message']))
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
                                      class="materialize-textarea"><?php if($_GET['type'] == "reTry" && isset($_GET['message'])){echo $message;} ?></textarea>
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
    <footer id="footerBar" class="page-footer red darken-4">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">Création</h5>
                    <p class="grey-text text-lighten-4">Bonjour à tous, je suis apprenti informaticien, n'hésitez pas à me conseiller en cas de bugs ou autres problèmes trouvés sur le site, le template du site vient du Framework <a target="_blank" href="http://materializecss.com/" class="white-text">Materialize</a></p>
                </div>
                <!-- Adresse email pour l'aide technique -->
                <div class="col l3 s12">
                    <h5 class="white-text">Aide technique</h5>
                    <ul>
                        <li><a class="white-text" href="mailto:timguggis@yahoo.fr">timguggis@yahoo.fr</a></li>
                        <li><a class="white-text" href="mailto:timguggis@yahoo.fr">timguggis@yahoo.fr</a></li>
                        <li><a class="white-text" href="mailto:timguggis@yahoo.fr">timguggis@yahoo.fr</a></li>
                        <li><a class="white-text" href="mailto:timguggis@yahoo.fr">timguggis@yahoo.fr</a></li>
                    </ul>
                </div>
                <!-- Adresse email pour le contact -->
                <div class="col l3 s12">
                    <h5 class="white-text">Contact</h5>
                    <ul>
                        <li><a class="white-text" href="mailto:timguggis@yahoo.fr">timguggis@yahoo.fr</a></li>
                        <li><a class="white-text" href="mailto:timguggis@yahoo.fr">timguggis@yahoo.fr</a></li>
                        <li><a class="white-text" href="mailto:timguggis@yahoo.fr">timguggis@yahoo.fr</a></li>
                        <li><a class="white-text" href="mailto:timguggis@yahoo.fr">timguggis@yahoo.fr</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Copyright du site -->
        <div class="footer-copyright">
            <div id="copyrightFooter" class="container">
                © 2017 Copyright par Timothée Guggisberg
            </div>
        </div>
    </footer>
    </body>
    <?php
}
?>
