<?php
session_start();
/**
 * ETML
 * User: Timothée Guggisberg
 * Date: 30.05.2017
 * Brief : Page de présentation du chalet montrant des photo du chalet
 */

//Si il n'est pas connecté, renvoi à la page d'accueil
if($_SESSION['connected'] == 0)
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
            <h1 class="header center red-text text-darken-4">Présentation du chalet</h1>
            <div class="row center">
                <h5 class="header col s12 light">Voici quelques photos du chalet Yamilé</h5>
            </div>

            <br><br>
            <!-- Affichage de toutes les images du chalet avec une petite désciption pour chaque photo -->
            <img class="materialboxed left" width="650" height="432" src="../../resources/image/slider1.JPG">
            <h1 class="blue-grey-text text-darken-2 left" id="titleGallery">les Chaux</h1>
            <img class="materialboxed right" width="650" height="432" src="../../resources/image/slider2.JPG">
            <h1 class="red-text text-darken-3 right" id="titleGallery">Anzeindaz</h1>
            <img class="materialboxed left" width="650" height="432"    src="../../resources/image/slider3.JPG">
            <h1 class="blue-grey-text text-darken-2 left" id="titleGallery">Miroir d'Argentine</h1>
            <img class="materialboxed right" width="650" height="432" src="../../resources/image/slider4.JPG">
            <h1 class="red-text text-darken-3 right" id="titleGallery">Miroir d'Argentine</h1>

        </div>
    </div>
    <br><br>
</main>

<?php
include "include/footer.php";
}
?>
