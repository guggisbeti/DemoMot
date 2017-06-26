<?php
session_start();
/**
 * ETML
 * User: Timothée Guggisberg
 * Date: 06.06.2017
 * Brief : Page accessible au administrateurs du site afin d'accepter les demandes envoyée par les utilisateurs
 */

//Si il n'est pas connecté ou pas admin, renvoi à la page d'accueil
if($_SESSION['connected'] == 0 || $_SESSION['admin'] == 0)
{
    echo '<meta http-equiv="refresh" content="0; URL=index.php">';
}
//Sinon lance le code de la page
else
{
?>
<!--Rip timothée c'est pas grave-->
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
            <table>
                <?php
                if($_GET['type'] == "sendEmail" && isset($_GET['idUser']))
                {
                $idUser = $_GET['idUser'];

                $connectorSel = new PDOLink();

                //2ème : Faire la requête
                //Inserer la requête dans un variable "query"
                $querySel = "SELECT `useEmail`, `useName`, `useFirstName` FROM `t_user` WHERE idUser = $idUser";

                //Lance la requête
                $reqSel = $connectorSel->executeQuery($querySel);

                $emails = $connectorSel->prepareData($reqSel);

                    //Foreach afin d'écrire une phrase à l'utilisateur pour qu'il puisse envoyer un email
                    foreach ($emails as $email) {
                    ?>
                    <tr>
                        <td>
                            Vous venez de supprimer <?php echo $email['useFirstName'] . " " . $email['useName'] . " (email : " . $email['useEmail'] . ")"?>, voulez-vous lui envoyer un email pour l'informer ?
                        </td>
                        <td>
                            <a onclick="redirect()" class="btn blue" target="_blank" href="mailto:<?php echo $email['useEmail'] ?>?subject=Réservation du chalet Yamilé&body=Bonjour <?php echo $email['useFirstName'] . " " . $email['useName'] ?>, nous vous indiquons que votre demande a malheureusement été refusée, vous pouvez toujours réessayer en vérifiant une plage horaire vide sur le calendrier">
                                Envoyer un email
                            </a>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            Si vous êtes sur Chrome : vous pouvez allez sur votre compte Gmail puis sur l'icone en haut à gauche pour accepter les mailto
                        </td>
                        <td>
                            <a class="btn blue" target="_blank" href="https://mail.google.com/mail/u/0/#inbox">
                                Mailto sur Chrome
                            </a>
                        </td>
                    </tr>
                    <?php
                    }
                    //Ecrase la requête
                    $connectorSel->closeCursor($reqSel);
                    //Stop la connexion
                    $connectorSel->destructObject();
                }
                ?>
            </table>
            <!-- Tableau avec toutes les réservations demandées par les utilisateurs -->
            <table class="responsive-table">
                <thead>
                <tr>
                    <th>N°</th>
                    <th>Nom</th>
                    <th>E-Mail</th>
                    <th>Date de début</th>
                    <th>Date de fin</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                //Instanciation de la classe PDOLink
                $connector = new PDOLink();

                //2ème : Faire la requête
                //Inserer la requête dans un variable "query"
                $query = "SELECT `idReservation`, `resStartDate`, `resEndDate`, `resValidate`, `idUser`, `useName`, `useFirstName`, `useEmail` FROM `t_resevation` NATURAL JOIN t_user WHERE resValidate = 0";

                //Lance la requête
                $req = $connector->executeQuery($query);

                $data = $connector->prepareData($req);


                //Foreach pour expliquer les détail de la demande
                foreach ($data as $details) {
                    ?>
                    <tr>
                        <td><?php echo $details['idReservation'] ?></td>
                        <td><?php echo $details['useFirstName'] . " " . $details['useName'] ?></td>
                        <td><?php echo $details['useEmail'] ?></td>
                        <td><?php
                            //Changement de la date de YYYY-MM-DD à DD.MM.YYYY
                            if (strstr($details['resStartDate'], "-")) {
                                $date = preg_split("/[\/]|[-]+/", $details['resStartDate']);
                                $date = $date[2] . "." . $date[1] . "." . $date[0];
                            }
                            echo $date;
                            ?></td>
                        <td><?php
                            //Changement de la date de YYYY-MM-DD à DD.MM.YYYY
                            if (strstr($details['resEndDate'], "-")) {
                                $date = preg_split("/[\/]|[-]+/", $details['resEndDate']);
                                $date = $date[2] . "." . $date[1] . "." . $date[0];
                            }
                            echo $date;
                            ?></td>
                        <!-- Bouton changeant de couleur une fois sur deux avec la variable $changeColor -->
                        <td><a href="checkAcceptation.php?id=<?php echo $details['idReservation'] ?>"
                               id="download-button" class="btn waves-effect waves-light blue-grey darken-2">Accepter</a></td>
                        <td><a onclick="return confirm('Etes-vous sur de vouloir supprimer cette demande ?')" href="deleteReservation.php?id=<?php echo $details['idReservation'] ?>&idUser=<?php echo $details['idUser'] ?>"
                                id="download-button" class="btn waves-effect waves-light red darken-3">Refuser</a></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
<br>
<br>
<script>
    /*
    Fonction renvoyant sur la même page mais avec un autre type
     */
    function redirect()
    {
        window.location.href = "acceptReservation.php?type=reservation";
    }
</script>

<?php
//Ecrase la requête
$connector->closeCursor($req);
//Stop la connexion
$connector->destructObject();
include "include/footer.php";
}
?>
