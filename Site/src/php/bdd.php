<?php
//Raccourci de la connexion PDO
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=db_reservation;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
