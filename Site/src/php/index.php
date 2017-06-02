<?php
session_start();
/**
 * ETML
 * User: Timothée Guggisberg
 * Date: 30.05.2017
 * Brief : Page index du site du chalet ainsi que la page d'accueil
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
                    <h1 class="header center red-text text-darken-4">Bienvenue !</h1>
                    <div class="row center">
                        <h5 class="header col s12 light">Vous êtes sur le site de réservation du chalet Yamilé</h5>
                    </div>
                    <div class="row center">
                        <a href="inscription.php?type=inscription" id="download-button" class="btn-large waves-effect waves-light blue-grey darken-2">S'inscrire</a>
                    </div>
                    <br><br>
					<!-- Slider materialize -->
					  <div class="slider">
						<ul class="slides">
						  <li>
							<img src="../../resources/image/ando.jpg"> <!-- random image -->
							<div class="caption center-align">
							  <h3>This is our big Tagline!</h3>
							  <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
							</div>
						  </li>
						  <li>
							<img src="../../resources/image/ando1.jpg"> <!-- random image -->
							<div class="caption left-align">
							  <h3>Left Aligned Caption</h3>
							  <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
							</div>
						  </li>
						  <li>
							<img src="../../resources/image/ando2.jpg"> <!-- random image -->
							<div class="caption right-align">
							  <h3>Right Aligned Caption</h3>
							  <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
							</div>
						  </li>
						  <li>
							<img src="../../resources/image/ando3.jpg"> <!-- random image -->
							<div class="caption center-align">
							  <h3>This is our big Tagline!</h3>
							  <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
							</div>
						  </li>
						</ul>
					  </div>
						  

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
			<!--Materializecss Slider-->
			<script>
				$(document).ready(function () {
					$('.slider').slider({full_width: true});
				});
			</script>   
        <?php
        include "include/footer.php";
        ?>
