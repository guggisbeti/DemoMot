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
            <div class="section no-pad-bot" id="index-banner">
                <div class="container">
                    <br><br>
                    <h1 class="header center red-text text-darken-4">Bienvenue !</h1>
                    <div class="row center">
                        <h5 class="header col s12 light">Vous êtes sur le site de réservation du chalet Yamilé</h5>
                    </div>
                    <div class="row center">
						<!-- Bouton d'envoi à la page inscription.php avec comme type inscription -->
                        <a href="inscription.php?type=inscription" id="download-button" class="btn-large waves-effect waves-light blue-grey darken-2">S'inscrire</a>
                    </div>
                    <br><br>
					<!-- Slider materialize comportant les image générale du chalet-->
					  <div class="slider">
						<ul class="slides">
						  <li>
							<img src="../../resources/image/slider1.JPG">
							<div class="caption left-align">
							  <h3>Les Chaux</h3>
							  <h5 class="light grey-text text-lighten-3">Mer de nuage sur les Chaux</h5>
							</div>
						  </li>
						  <li>
							<img src="../../resources/image/slider2.JPG">
							<div class="caption left-align">
							  <h3>Anzeindaz</h3>
							</div>
						  </li>
							<li>
								<img src="../../resources/image/slider4.JPG">
								<div class="caption right-align">
									<h3>Miroir d'Argentine</h3>
								</div>
							</li>
						  <li>
							<img src="../../resources/image/slider3.JPG">
							<div class="caption right-align">
							  <h3>Lion du Miroir d'Argentine</h3>
							</div>
						  </li>
						</ul>
					  </div>
                </div>
            </div>
                <br><br>
        </main>
        <?php
        include "include/footer.php";
        ?>
	<!--Materializecss Slider-->
	<script>
		$(document).ready(function () {
			$('.slider').slider({full_width: true});
		});
	</script>
