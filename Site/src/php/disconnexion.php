<?php
session_start();
/**
 * ETML
 * User: Timothée Guggisberg
 * Date: 31.05.2017
 * Brief : Page de deconnexion du site, invisible
 */

$_SESSION['connected'] = 0;
$_SESSION['admin'] = 0;
?>
<meta http-equiv="refresh" content="0; URL=index.php">

