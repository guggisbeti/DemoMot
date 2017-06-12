<?php
//Raccourci de la connexion PDO incluse sur toutes les page en rapport avec le calendrier

//Essaye la connexion, sinon envoi un message d'erreur à l'utilisateur
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=db_reservation;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
