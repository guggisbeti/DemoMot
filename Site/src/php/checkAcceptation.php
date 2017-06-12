<?php
session_start();
/**
 * ETML
 * User: Timothée Guggisberg
 * Date: 06.06.2017
 * Brief : Page d'insertion des données acceptée par un admin
 */

//Si l'id étant dans l'URL est NULL, renvois sur la page d'accueil
if(isset($_GET['id']) == 0)
{
    echo '<meta http-equiv="refresh" content="0; URL=index.php">';
}
else {
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
        <!-- Modal -->
        <div class="row">
            <!-- Formulaire d'ajout d'un evenement -->
            <form id="inscriptionForm" class="form-horizontal" method="POST"
                  action="addEvent.php?type=reservation&id=<?php echo $_GET['id']; ?>">
                <h3 class="red-text text-darken-4">Ajouter une réservation</h3>
                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Titre</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" class="form-control" id="title" placeholder="Titre">
                    </div>
                </div>
                <div class="form-group">
                    <label for="color" class="col-sm-2 control-label">Color</label>
                    <div class="input-field">
                        <select name="color" class="form-control" id="color">
                            <option value="" disabled selected>Couleur</option>
                            <option value="#0071c5">Blaise Guggisberg - Bleu</option>
                            <option value="#40E0D0">Yves Guggisberg - Turquoise</option>
                            <option value="#FF0000">Patrick Guggisberg - Rouge</option>
                            <option value="#008000">Magali Nunez - Vert</option>
                        </select>
                    </div>
                </div>
                <?php
                //Prise de l'id de la réservation
                $id = $_GET['id'];
                //Connexion à la base de données
                $connector = new PDOLink();

                //2ème : Faire la requête
                //Inserer la requête dans un variable "query"
                $query = "SELECT `resStartDate`, `resEndDate` FROM `t_resevation` WHERE idReservation = $id";

                //Lance la requête
                $req = $connector->executeQuery($query);

                //Prépare les données à être affichées
                $data = $connector->prepareData($req);

                //Foreach pour expliquer les détail de la demande
                foreach ($data as $date) {
                    ?>
                    <div class="form-group">
                        <label for="start" class="col-sm-2 control-label">Date de départ</label>
                        <div class="col-sm-10">
                            <input type="text" name="start" class="form-control" id="start"
                                   value="<?php echo $date['resStartDate'] ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="end" class="col-sm-2 control-label">Date de fin</label>
                        <div class="col-sm-10">
                            <?php
                                //Si la date est de type YYYY-MM-DD la passe en YYYY-MM-DD + 1 (exemple : 2017-06-12 devient alors 2017-06-13) afin de l'insérer juste dans le calendrier
                               if (strstr($date['resEndDate'], "-")) {
                                    $date = preg_split("/[\/]|[-]+/", $date['resEndDate']);
                                    $date = $date[0] . "-" . $date[1] . "-" . ($date[2] + 1);
                                }
                            ?>
                            <input type="text" name="end" class="form-control" id="end"
                                   value="<?php echo $date ?>" readonly>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <a href="acceptReservation.php" class="waves-effect waves-light btn blue-grey darken-2">Annuler</a>
                <button id="saveButtonCalendar" type="submit" class="waves-effect waves-light btn red darken-3">
                    Sauvegarder
                </button>
            </form>
        </div>
    </main>
    <!-- JavaScript Materialize pour le Select du formulaire -->
    <script>
        $(document).ready(function () {
            $('select').material_select();
        });
    </script>
    <?php
    include "include/footer.php";
}
?>