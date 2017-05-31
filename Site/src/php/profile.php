<?php
session_start();
/**
 * ETML
 * User: Timothée Guggisberg
 * Date: 31.05.2017
 * Brief : Page contenant le profile de l'utilisateur connecté, ainsi qu'un bouton dirigeant vers les réservation
 */

?>

<!DOCTYPE html>
<html>
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
    <div class="section no-pad-bot" id="index-banner">
        <div class="container">
            <br><br>
            <h1 class="header center red-text text-darken-4">Profil</h1>
            <div class="row center">
                <h5 class="header col s12 light">Voici votre profil, vous pouvez encore l'éditer ou encore réserver une plage horaires</h5>
            </div>
            <br><br>

        </div>
    </div>
    <div class="row" id="cardProfile">
        <div class="col s12 m6">
            <div class="card blue-grey darken-2">
                <div class="card-content white-text">
                    <span class="card-title red-text text-lighten-1">Détails</span>
                    <?php
                        $id = $_SESSION['user'];
                        $connector = new PDOLink();

                        //2ème : Faire la requête
                        //Inserer la requête dans un variable "query"
                        $query = "SELECT `idUser`, `useLogin`, `usePassword`, `useName`, `useFirstName`, `useAge`, `useEmail`, `useFriendOf`, `IsAdmin` FROM `t_user` WHERE idUser = $id";

                        //Lance la requête
                        $req = $connector->executeQuery($query);

                        $data = $connector->prepareData($req);

                        //Foreach pour expliquer les détail de l'utilisateur
                        foreach($data as $pass)
                        {
                            ?>
                            <table>
                                <tr>
                                    <?php
                                    ?> <td> <?php echo "Nom : " . $pass['useName'] ; ?> </td> <?php
                                    ?> <td> <?php echo "Prénom : " . $pass['useFirstName']; ?> </td> <?php
                                    ?> <td> <?php echo "Age : " . $pass['useAge']; ?> </td> <?php
                                    ?>
                                </tr>
                                <tr>
                                    <?php
                                    ?> <td> <?php echo "E-Mail : " . $pass['useEmail'] ; ?> </td> <?php
                                    ?> <td> <?php echo "Login : " . $pass['useLogin']; ?> </td> <?php
                                    ?> <td> <?php echo "Vous êtes l'ami de ";
                                                if($pass['useFriendOf'] == 1)
                                                {
                                                    echo "Magali Nunez";
                                                }
                                                elseif($pass['useFriendOf'] == 2)
                                                {
                                                    echo "Blaise Guggisberg";
                                                }
                                                elseif($pass['useFriendOf'] == 3)
                                                {
                                                    echo "Yves Guggisberg";
                                                }
                                                elseif($pass['useFriendOf'] == 4)
                                                {
                                                    echo "Patrick Guggisberg";
                                                }
                                        ?> </td> <?php
                                    ?>
                                </tr>
                            </table>
                            <?php
                        }

                        //Ecrase la requête
                        $connector->closeCursor($req);
                        //Stop la connexion
                        $connector->destructObject();
                    ?>
                </div>
                <div class="card-action">
                    <a class="red-text text-lighten-1" href="inscription.php">éditer</a>
                    <a class="red-text text-lighten-1"2 href="reservation.php">Réserver une plage horaire</a>
                </div>
            </div>
        </div>
    </div>
</main>
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>
<?php
include "include/footer.php";
?>
