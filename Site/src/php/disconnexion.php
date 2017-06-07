<?php
session_start();
/**
 * ETML
 * User: Timothée Guggisberg
 * Date: 31.05.2017
 * Brief : Page de deconnexion du site, invisible
 */

//Mise de toutes les sessions à 0 (donc vide)
$_SESSION['connected'] = 0;
$_SESSION['admin'] = 0;
$_SESSION['user'] = 0;
?>
<!-- Redirection instantanée sur la page d'accueil -->
<meta http-equiv="refresh" content="0; URL=index.php">

