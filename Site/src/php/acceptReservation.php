<?php
session_start();
/**
 * ETML
 * User: Timothée Guggisberg
 * Date: 06.06.2017
 * Brief : Page accessible au administrateurs du site afin d'accepter les demandes envoyée par les utilisateurs
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
            <h1 class="header center red-text text-darken-4">Plage horaires envoyées</h1>
            <div class="row center">
                <h5 class="header col s12 light">Voici toutes les plages horaires envoyées par les utilisateurs</h5>
            </div>
            <br><br>
        </div>
    </div>
    <div class="container">
        <div class="section">
            <table class="responsive-table">
                <thead>
                <tr>
                    <th>N°</th>
                    <th>Nom</th>
                    <th>E-Mail</th>
                    <th>Date de début</th>
                    <th>Date de fin</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                    //Création de la variable changeant la couleur des boutons 1 fois sur 2 dans le foreach
                    $changeColor = false;
                    //Instanciation de la classe PDOLink
                    $connector = new PDOLink();

                    //2ème : Faire la requête
                    //Inserer la requête dans un variable "query"
                    $query = "SELECT `idReservation`, `resStartDate`, `resEndDate`, `resValidate`, `idUser`, `useName`, `useFirstName`, `useEmail` FROM `t_resevation` NATURAL JOIN t_user";

                    //Lance la requête
                    $req = $connector->executeQuery($query);

                    $data = $connector->prepareData($req);

                    //Foreach pour expliquer les détail de la demande
                    foreach($data as $details) {
                        ?>
                        <tr>
                            <td><?php echo $details['idReservation']?></td>
                            <td><?php echo $details['useFirstName'] . " " . $details['useName'] ?></td>
                            <td><?php echo $details['useEmail']?></td>
                            <td><?php
                                //Changement de la date de YYYY-MM-DD à DD.MM.YYYY
                                if (strstr($details['resStartDate'], "-"))   {
                                    $date = preg_split("/[\/]|[-]+/", $details['resStartDate']);
                                    $date = $date[2].".".$date[1].".".$date[0];
                                }
                                echo $date;
                                ?></td>
                            <td><?php
                                //Changement de la date de YYYY-MM-DD à DD.MM.YYYY
                                if (strstr($details['resEndDate'], "-"))   {
                                    $date = preg_split("/[\/]|[-]+/", $details['resEndDate']);
                                    $date = $date[2].".".$date[1].".".$date[0];
                                }
                                echo $date;
                                ?></td>
                            <!-- Bouton changeant de couleur une fois sur deux avec la variable $changeColor -->
                            <td><a href="checkAcceptation.php?id=<?php echo $details['idReservation'] ?>" id="download-button" class="btn waves-effect waves-light <?php if($changeColor == false){echo 'blue-grey darken-2';} else {echo 'red darken-3';} ?>">Accepter</a></td>
                        </tr>
                <?php
                        //Si la variable est false de vient true et inversement
                        if($changeColor == false)
                        {
                            $changeColor = true;
                        }
                        else
                        {
                            $changeColor = false;
                        }
                    }
                ?>
                </tbody>
            </table>
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
?>
