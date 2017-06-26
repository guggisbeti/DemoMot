<?php
session_start();
/**
 * ETML
 * User: Timothée Guggisberg
 * Date: 30.05.2017
 * Brief : Page d'inscription au site web
 */

//Si le type étant dans l'URL est NULL, renvoi sur la page d'accueil
if(isset($_GET['type']) == 0) {
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
    //Si le type est modify ou reTry, reprend les données depuis l'URL ajout des isset afin de cacher les erreurs si l'utilisateur change le nom de l'URL
    if ($_GET['type'] == "modify" && isset($_GET['login']) && isset($_GET['friendOf']) && isset($_GET['name']) && isset($_GET['firstname']) && isset($_GET['age']) && isset($_GET['email']) || $_GET['type'] == "reTry" && isset($_GET['login']) && isset($_GET['friendOf']) && isset($_GET['name']) && isset($_GET['firstname']) && isset($_GET['age']) && isset($_GET['email'])) {
        $name = $_GET['name'];
        $firstname = $_GET['firstname'];
        $age = $_GET['age'];
        $email = $_GET['email'];
        $friendOf = $_GET['friendOf'];
        $login = $_GET['login'];
    }
    $type = $_GET['type'];
    ?>
    <div class="row">
        <!-- Envoi à la vérification de l'inscription avec le type, si le type est reTry ou modify, insere les valeur de l'utilisateur dans chaque champ sauf le mot de passe -->
        <form class="col s12" id="inscriptionForm" action="checkInscription.php?type=<?php echo $type ?>" method="post">
            <div class="row">
                <h3 class="red-text text-darken-4">Inscription</h3>
                <div class="row">
                    <!-- Champ nom -->
                    <div class="input-field col s6">
                        <!-- Si l'URL est modify ou reTry ajoute le champ nom dans la valeur -->
                        <input <?php if ($_GET['type'] == "modify" && isset($_GET['login']) && isset($_GET['friendOf']) && isset($_GET['name']) && isset($_GET['firstname']) && isset($_GET['age']) && isset($_GET['email']) || $_GET['type'] == "reTry" && isset($_GET['login']) && isset($_GET['friendOf']) && isset($_GET['name']) && isset($_GET['firstname']) && isset($_GET['age']) && isset($_GET['email'])) {
                            echo "value=\"$name\"";
                        } ?> id="name" type="text" name="name" class="validate">
                        <label for="name">Nom*</label>
                    </div>
                    <!-- Champ Prénom -->
                    <div class="input-field col s6">
                        <!-- Si l'URL est modify ou reTry ajoute le champ prénom dans la valeur -->
                        <input <?php if ($_GET['type'] == "modify" && isset($_GET['login']) && isset($_GET['friendOf']) && isset($_GET['name']) && isset($_GET['firstname']) && isset($_GET['age']) && isset($_GET['email']) || $_GET['type'] == "reTry" && isset($_GET['login']) && isset($_GET['friendOf']) && isset($_GET['name']) && isset($_GET['firstname']) && isset($_GET['age']) && isset($_GET['email'])) {
                            echo "value=\"$firstname\"";
                        } ?> id="firstname" type="text" name="firstname" class="validate">
                        <label for="firstname">Prénom*</label>
                    </div>
                </div>
                <div class="row">
                    <!-- Champ age -->
                    <div class="input-field col s6">
                        <!-- Si l'URL est modify ou reTry ajoute le champ age dans la valeur -->
                        <input <?php if ($_GET['type'] == "modify" && isset($_GET['login']) && isset($_GET['friendOf']) && isset($_GET['name']) && isset($_GET['firstname']) && isset($_GET['age']) && isset($_GET['email']) || $_GET['type'] == "reTry" && isset($_GET['login']) && isset($_GET['friendOf']) && isset($_GET['name']) && isset($_GET['firstname']) && isset($_GET['age']) && isset($_GET['email'])) {
                            echo "value=\"$age\"";
                        } ?> id="age" type="text" name="age" class="validate">
                        <label for="age">Age*</label>
                    </div>
                    <!-- Champ email -->
                    <div class="input-field col s6">
                        <!-- Si l'URL est modify ou reTry ajoute le champ email dans la valeur -->
                        <input <?php if ($_GET['type'] == "modify" && isset($_GET['login']) && isset($_GET['friendOf']) && isset($_GET['name']) && isset($_GET['firstname']) && isset($_GET['age']) && isset($_GET['email']) || $_GET['type'] == "reTry" && isset($_GET['login']) && isset($_GET['friendOf']) && isset($_GET['name']) && isset($_GET['firstname']) && isset($_GET['age']) && isset($_GET['email'])) {
                            echo "value=\"$email\"";
                        } ?> id="email" type="text" name="email" class="validate">
                        <label for="email">Adresse e-mail*</label>
                    </div>
                </div>
                <!-- 1er if : Si les champs de l'URL comportant les données à mettre dans les champs du formulaire ne sont pas défini, reste par défaut, sécurité pour cacher les erreurs  si l'utilisateur change les données dans l'URL -->
                <!-- 2ème if : Champ ami de (4 if afin de vérifier si l'URL est modify ou reTry ET qu'il est l'ami d'un des 4 -> met le bouton radio directement coché)-->
                <div class="radioButton" id="switch">
                    <p class="grey-text">Vous êtes l'ami de* :</p>
                    <p>
                        <input <?php if(isset($_GET['login']) && isset($_GET['friendOf']) && isset($_GET['name']) && isset($_GET['firstname']) && isset($_GET['age']) && isset($_GET['email'])){ if ($_GET['type'] == "modify" && $friendOf == 1 || $_GET['type'] == "reTry" && $friendOf == 1) {
                            echo "checked=\"checked\"";
                        }} ?> name="friendOf" type="radio" id="test1" value="1"/>
                        <label for="test1">Magali Nunez</label>
                    </p>
                    <p>
                        <input <?php if(isset($_GET['login']) && isset($_GET['friendOf']) && isset($_GET['name']) && isset($_GET['firstname']) && isset($_GET['age']) && isset($_GET['email'])){ if ($_GET['type'] == "modify" && $friendOf == 2 || $_GET['type'] == "reTry" && $friendOf == 2) {
                            echo "checked=\"checked\"";
                        }} ?> name="friendOf" type="radio" id="test2" value="2"/>
                        <label for="test2">Blaise Guggisberg</label>
                    </p>
                    <p>
                        <input <?php if(isset($_GET['login']) && isset($_GET['friendOf']) && isset($_GET['name']) && isset($_GET['firstname']) && isset($_GET['age']) && isset($_GET['email'])){ if ($_GET['type'] == "modify" && $friendOf == 3 || $_GET['type'] == "reTry" && $friendOf == 3) {
                            echo "checked=\"checked\"";
                        }} ?> name="friendOf" type="radio" id="test3" value="3"/>
                        <label for="test3">Yves Guggisberg</label>
                    </p>
                    <p>
                        <input <?php if(isset($_GET['login']) && isset($_GET['friendOf']) && isset($_GET['name']) && isset($_GET['firstname']) && isset($_GET['age']) && isset($_GET['email'])){ if ($_GET['type'] == "modify" && $friendOf == 4 || $_GET['type'] == "reTry" && $friendOf == 4) {
                            echo "checked=\"checked\"";
                        }} ?> name="friendOf" type="radio" id="test4" value="4"/>
                        <label for="test4">Patrick Guggisberg</label>
                    </p>
                </div>
                <!-- Champ login -->
                <div class="row">
                    <div class="input-field col s12">
                        <!-- Si l'URL est modify ou reTry ajoute le champ login dans la valeur -->
                        <input <?php if ($_GET['type'] == "modify" && isset($_GET['login']) && isset($_GET['friendOf']) && isset($_GET['name']) && isset($_GET['firstname']) && isset($_GET['age']) && isset($_GET['email']) || $_GET['type'] == "reTry" && isset($_GET['login']) && isset($_GET['friendOf']) && isset($_GET['name']) && isset($_GET['firstname']) && isset($_GET['age']) && isset($_GET['email'])) {
                            echo "value=\"$login\"";
                        } ?> id="login" type="text" name="login" class="validate">
                        <label for="login">Login*</label>
                    </div>
                </div>
                <!-- Champ mot de passe -->
                <div class="row">
                    <div class="input-field col s12">
                        <!-- Aucun if pour le mot de passe -->
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
}
?>
