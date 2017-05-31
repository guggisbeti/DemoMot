<?php
session_start();
/**
 * ETML
 * User: Timothée Guggisberg
 * Date: 30.05.2017
 * Brief : Page d'inscription au site web
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
        <form class="col s12" id="inscriptionForm" action="checkInscription.php" method="post">
            <div class="row">
                <h3 class="red-text text-darken-4">Inscription</h3>
                <div class="row">
                        <div class="input-field col s6">
                            <input id="name" type="text" name="name" class="validate">
                            <label for="name">Nom*</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="firstname" type="text" name="firstname" class="validate">
                            <label for="firstname">Prénom*</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="age" type="text" name="age" class="validate">
                            <label for="age">Age*</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="email" type="text" name="email" class="validate">
                            <label for="email">Adresse e-mail*</label>
                        </div>
                    </div>
                    <div class="radioButton">
                        <p class="grey-text">Vous êtes l'ami de* :</p>
                        <p>
                            <input name="friendOf" type="radio" id="test1" value="1"/>
                            <label for="test1">Magali Nunez</label>
                        </p>
                        <p>
                            <input name="friendOf" type="radio" id="test2" value="2"/>
                            <label for="test2">Blaise Guggisberg</label>
                        </p>
                        <p>
                            <input name="friendOf" type="radio" id="test3" value="3"/>
                            <label for="test3">Yves Guggisberg</label>
                        </p>
                        <p>
                            <input name="friendOf" type="radio" id="test4" value="4"/>
                            <label for="test4">Patrick Guggisberg</label>
                        </p>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="login" type="text" name="login" class="validate">
                            <label for="login">Login*</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="password" type="password" name="password" class="validate">
                            <label for="password">Mot de passe*</label>
                        </div>
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
