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
    //Si le type est modify ou reTry, reprend les données depuis l'URL
    if($_GET['type'] == "modify" || $_GET['type'] == "reTry")
    {
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
                            <input <?php if($_GET['type'] == "modify" || $_GET['type'] == "reTry"){ echo "value=\"$name\""; }?> id="name" type="text" name="name" class="validate">
                            <label for="name">Nom*</label>
                        </div>
                          <!-- Champ Prénom -->
                        <div class="input-field col s6">
                            <input <?php if($_GET['type'] == "modify" || $_GET['type'] == "reTry"){ echo "value=\"$firstname\""; }?> id="firstname" type="text" name="firstname" class="validate">
                            <label for="firstname">Prénom*</label>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Champ age -->
                        <div class="input-field col s6">
                            <input <?php if($_GET['type'] == "modify" || $_GET['type'] == "reTry"){ echo "value=\"$age\""; }?> id="age" type="text" name="age" class="validate">
                            <label for="age">Age*</label>
                        </div>
                        <!-- Champ email -->
                        <div class="input-field col s6">
                            <input <?php if($_GET['type'] == "modify" || $_GET['type'] == "reTry"){ echo "value=\"$email\""; }?> id="email" type="text" name="email" class="validate">
                            <label for="email">Adresse e-mail*</label>
                        </div>
                    </div>
                      <!-- Champ ami de -->
                    <div class="radioButton">
                        <p class="grey-text">Vous êtes l'ami de* :</p>
                        <p>
                            <input <?php if($_GET['type'] == "modify" && $friendOf == 1 || $_GET['type'] == "reTry" && $friendOf == 1){ echo "checked=\"checked\""; }?> name="friendOf" type="radio" id="test1" value="1"/>
                            <label for="test1">Magali Nunez</label>
                        </p>
                        <p>
                            <input <?php if($_GET['type'] == "modify" && $friendOf == 2 || $_GET['type'] == "reTry" && $friendOf == 2){ echo "checked=\"checked\""; }?> name="friendOf" type="radio" id="test2" value="2"/>
                            <label for="test2">Blaise Guggisberg</label>
                        </p>
                        <p>
                            <input <?php if($_GET['type'] == "modify" && $friendOf == 3 || $_GET['type'] == "reTry" && $friendOf == 3){ echo "checked=\"checked\""; }?> name="friendOf" type="radio" id="test3" value="3"/>
                            <label for="test3">Yves Guggisberg</label>
                        </p>
                        <p>
                            <input <?php if($_GET['type'] == "modify" && $friendOf == 4 || $_GET['type'] == "reTry" && $friendOf == 4){ echo "checked=\"checked\""; }?> name="friendOf" type="radio" id="test4" value="4"/>
                            <label for="test4">Patrick Guggisberg</label>
                        </p>
                    </div>
                     <!-- Champ login -->
                    <div class="row">
                        <div class="input-field col s12">
                            <input <?php if($_GET['type'] == "modify"|| $_GET['type'] == "reTry"){ echo "value=\"$login\""; }?> id="login" type="text" name="login" class="validate">
                            <label for="login">Login*</label>
                        </div>
                    </div>
                       <!-- Champ mot de passe -->
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
