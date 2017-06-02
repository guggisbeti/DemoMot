<?php
session_start();
/**
 * ETML
 * User: Timothée Guggisberg
 * Date: 30.05.2017
 * Brief : Page de présentation du chalet montrant des photo du chalet
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
            <h1 class="header center red-text text-darken-4">Présentation du chalet</h1>
            <div class="row center">
                <h5 class="header col s12 light">Voici quelques photos du chalet Yamilé</h5>
            </div>

            <br><br>

            <img class="materialboxed left" width="650" height="432" src="../../resources/image/ando.jpg">
            <h1 class="blue-grey-text text-darken-2 left" id="titleGallery">Hello</h1>
            <img class="materialboxed right" width="650" height="432" src="../../resources/image/ando1.jpg">
            <h1 class="red-text text-darken-3 right" id="titleGallery">Hello</h1>
            <img class="materialboxed left" width="650" height="432" src="../../resources/image/ando2.jpg">
            <h1 class="blue-grey-text text-darken-2 left" id="titleGallery">Hello</h1>
            <img class="materialboxed right" width="650" height="432" src="../../resources/image/ando3.jpg">
            <h1 class="red-text text-darken-3 right" id="titleGallery">Hello</h1>

        </div>
    </div>


    <div class="container">
        <div class="section">



        </div>
        <br><br>

        <div class="section">

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
