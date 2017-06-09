<?php
session_start();
/**
 * ETML
 * User: Timothée Guggisberg
 * Date: 07.06.2017
 * Brief : Page accessible au administrateurs du site afin de voir les messages envoyés par les utilisateurs
 */

//Si il n'est pas connecté ou pas admin, renvoi à la page d'accueil
if($_SESSION['connected'] == 0 || $_SESSION['admin'] == 0)
{
    echo '<meta http-equiv="refresh" content="0; URL=index.php">';
}
else
{
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
            <h1 class="header center red-text text-darken-4">Messages</h1>
            <div class="row center">
                <h5 class="header col s12 light">Voici tous les messages envoyés par les utilisateurs</h5>
            </div>
            <br><br>
        </div>
    </div>
    <div class="container">
        <div class="section">

            <?php
            //Variable afin que les card soit considérée comme différente entre elle avec un incrément
            $messageChange = 0;
            //Variable afin de changer la couleur des bouton 1 fois sur 2
            $changeColor = false;
            //Instanciation de la classe PDOLink
            $connector = new PDOLink();

            //2ème : Faire la requête
            //Inserer la requête dans un variable "query"
            $query = "SELECT `idMessage`, `mesMessage`, `idUser`, `useName`, `useFirstName`, `useEmail` FROM `t_message` NATURAL JOIN t_user";

            //Lance la requête
            $req = $connector->executeQuery($query);

            //Préparation des données à être affichée
            $data = $connector->prepareData($req);

            //Foreach pour expliquer les messages de tous les utilisateurs
            foreach ($data as $details) {
                ?>
                <div class="card hoverable small">
                    <div class="card-tabs ">
                        <ul class="tabs tabs-fixed-width">
                            <!-- Bouton info avec la variable messageChange dans l'URL afin qu'il soit différent pour chaque bouton -->
                            <li class="tab"><a class="active" href="#info<?php echo $messageChange ?>">Info</a></li>
                            <!-- Bouton message avec la variable messageChange dans l'URL afin qu'il soit différent pour chaque bouton -->
                            <li class="tab"><a href="#message<?php echo $messageChange ?>">Message</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-content">
                        <!-- Même fonctionnement qu'en dessus en mettant l'id changeant à chaque nouvelle card -->
                        <div id="info<?php echo $messageChange ?>">
                            <table>
                                <tr>
                                    <th>N°</th>
                                    <th>Nom</th>
                                    <th>E-Mail</th>
                                </tr>
                                <tr>
                                    <!-- Affichage de l'id du message -->
                                    <td><?php echo $details['idMessage'] ?></td>
                                    <!-- Affichage du nom et du prénom -->
                                    <td><?php echo $details['useFirstName'] . " " . $details['useName'] ?></td>
                                    <!-- Affichage de l'email -->
                                    <td><?php echo $details['useEmail'] ?></td>
                                    <!-- Bouton de suppression du message en y envoyant l'id -->
                                    <td><a onclick="return confirm('Etes-vous sur de vouloir supprimer ce message ?')" href="deleteMessage.php?id=<?php echo $details['idMessage'] ?>"
                                           id="download-button"
                                           class="btn waves-effect waves-light <?php if ($changeColor == false) {
                                               echo 'blue-grey darken-2';
                                           } else {
                                               echo 'red darken-3';
                                           } ?>">Supprimer</a></td>
                                </tr>
                            </table>
                        </div>
                        <!-- Même fonctionnement qu'en dessus en mettant l'id changeant à chaque nouvelle card -->
                        <div id="message<?php echo $messageChange ?>">
                            <!-- Affichage du message -->
                            <h5>Message :</h5>
                            <p><?php echo $details['mesMessage'] ?></p>
                        </div>
                    </div>
                </div>

                <br>
                <?php
                //Si la couleur est false, devient true et inversement
                if ($changeColor == false) {
                    $changeColor = true;
                } else {
                    $changeColor = false;
                }
                //Incrémentation de la variable afin de différencier chaque card
                $messageChange++;
            }
            ?>
        </div>
    </div>
</main>
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>

<?php
//Ecrase la requête
$connector->closeCursor($req);
//Stop la connexion
$connector->destructObject();
include "include/footer.php";
}
?>
