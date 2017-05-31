<?php
session_start();
/**
 * ETML
 * User: Timothée Guggisberg
 * Date: 30.05.2017
 * Brief : Page de connexion au site web
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
    <?php
    ?>
    <div class="row">
        <form class="col s12" id="connexionForm" action="checkConnexion.php" method="post">
            <div class="row">
                <h3 class="red-text text-darken-4">Connexion</h3>

                <div class="row">
                    <div class="input-field col s12">
                        <input id="login" type="text" name="login" class="validate">
                        <label for="login">Login</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="password" type="password" name="password" class="validate">
                        <label for="password">Mot de passe</label>
                    </div>
                </div>
                <input class="btn waves-effect waves-light red darken-4" type="reset" name="reset">
                <input class="btn waves-effect waves-light blue-grey darken-2" type="submit" name="action" value="Se connecter">
            </div>
        </form>
    </div>
</main>
<?php
include "include/footer.php";
?>
