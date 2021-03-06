<?php
session_start();
/**
 * ETML
 * User: Timothée Guggisberg
 * Date: 07.06.2017
 * Brief : Page d'insertion du message dans la base de donnée
 */

include "include/head.php";

//Prise de l'id de l'utilisateur
$id = $_SESSION['user'];
//Vérification du message s'il n'y a que des espace ou autre
$message = htmlspecialchars(trim($_POST['message']));

//Si le message est vide, redirection sur l'envoi
if($message == "")
{
    echo "Votre message est vide.";
    ?>
    <meta http-equiv="refresh" content="2; URL=sendMessage.php">
    <?php
}
//Si le message est plus grand que 600 caractères
if(!preg_match("#^.{1,600}$#",$message))
{
    echo 'Votre message est trop grand (600 caractères maximum)';
    ?>
    <meta http-equiv="refresh" content="3; URL=sendMessage.php?type=reTry&message=<?php echo $message ?>">
    <?php
}

//Sinon insère le message dans la base de donnée
else
{
    //Instanciation de la classe PDOLink
    $connector = new PDOLink();

    //2ème : Faire la requête
    //Inserer la requête dans un variable "query"
    $query = "INSERT INTO `t_message`(`mesMessage`, `idUser`) VALUES ('$message',$id)";

    //Lance la requête
    $req = $connector->executeQuery($query);

    echo 'Votre message a été envoyé correctement';

    //Ecrase la requête
    $connector->closeCursor($req);
    //Stop la connexion
    $connector->destructObject();

    //Redirection sur l'accueil
    echo '<meta http-equiv="refresh" content="2; URL=index.php">';
}
?>
<!-- Chargement -->
<div class="preloader-wrapper big active">
    <div class="spinner-layer spinner-blue">
        <div class="circle-clipper left">
            <div class="circle"></div>
        </div><div class="gap-patch">
            <div class="circle"></div>
        </div><div class="circle-clipper right">
            <div class="circle"></div>
        </div>
    </div>
