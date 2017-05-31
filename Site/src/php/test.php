<?php
/**
 * Created by PhpStorm.
 * User: guggisbeti
 * Date: 31.05.2017
 * Time: 15:13
 */


$date = "21.43.2016";

$date_array = explode(".",$date);
$var_day = $date_array[0]; //Partie pour le jour
$var_month = $date_array[1]; //Partie pour le mois
$var_year = $date_array[2]; //Partie pour l'année

//Mise des trois partie ensemble avec les "-" entre 2
echo $new_date_format = "$var_year-$var_day-$var_month";

