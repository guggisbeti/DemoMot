<?php
session_start();
/**
 * ETML
 * User: Timothée Guggisberg
 * Date: 31.05.2017
 * Brief : Page de check de la page inscription.php afin de vérifier les donnée entrée avec des regex puis les inserer dans la BDD si les champs sont juste
 */

include "include/head.php";

$id = $_SESSION['user'];
$type = $_GET['type'];

$name = $_POST['name'];
$firstname = $_POST['firstname'];
$age = $_POST['age'];
$email = $_POST['email'];
$login = $_POST['login'];
$password = $_POST['password'];
if(isset($_POST['friendOf']) == 1) {
    $friendOf = $_POST['friendOf'];
}
else
{
    echo 'Le bouton radio "Vous êtes l\'ami de" est obligatoire, veuillez le remplir.<br>';
    ?>
    <meta http-equiv="refresh" content="3; URL=inscription.php?type=reTry&login=<?php echo $login ?>&friendOf=<?php echo $friendOf ?>&name=<?php echo $name ?>&firstname=<?php echo $firstname ?>&age=<?php echo $age ?>&email=<?php echo $email ?>">
    <?php
}

if($name == "" || $firstname == "" || $age == "" || $email == "" || $login == "" || $password == "" )
{
    echo "Certains champs sont vides, veuillez les remplir.";
    ?>
    <meta http-equiv="refresh" content="3; URL=inscription.php?type=reTry&login=<?php echo $login ?>&friendOf=<?php echo $friendOf ?>&name=<?php echo $name ?>&firstname=<?php echo $firstname ?>&age=<?php echo $age ?>&email=<?php echo $email ?>">
    <?php
}
else
{
    $check = true;

    if(!preg_match("#^[A-Z]{1}[a-zA-Z àé'-üöè]+$#",$name))
    {
        echo 'Le champ "Nom" est mal écrit<br>';
        ?>
        <meta http-equiv="refresh" content="3; URL=inscription.php?type=reTry&login=<?php echo $login ?>&friendOf=<?php echo $friendOf ?>&name=<?php echo $name ?>&firstname=<?php echo $firstname ?>&age=<?php echo $age ?>&email=<?php echo $email ?>">
        <?php
        $check = false;
    }
    if(!preg_match("#^[A-Z]{1}[a-zA-Z àé'-üöè]+$#",$firstname))
    {
        echo 'Le champ "Prénom" est mal écrit<br>';
        ?>
        <meta http-equiv="refresh" content="3; URL=inscription.php?type=reTry&login=<?php echo $login ?>&friendOf=<?php echo $friendOf ?>&name=<?php echo $name ?>&firstname=<?php echo $firstname ?>&age=<?php echo $age ?>&email=<?php echo $email ?>">
        <?php
        $check = false;
    }
    if(!preg_match("#^(\d?[1-9]|[1-9]0)$#",$age))
    {
        echo 'Le champ "Age" est mal écrit<br>';
        ?>
        <meta http-equiv="refresh" content="3; URL=inscription.php?type=reTry&login=<?php echo $login ?>&friendOf=<?php echo $friendOf ?>&name=<?php echo $name ?>&firstname=<?php echo $firstname ?>&age=<?php echo $age ?>&email=<?php echo $email ?>">
        <?php
        $check = false;
    }
    if(!preg_match("#^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,3}$#",$email))
    {
        echo 'Le champ "Adresse e-mail" est mal écrit<br>';
        ?>
        <meta http-equiv="refresh" content="3; URL=inscription.php?type=reTry&login=<?php echo $login ?>&friendOf=<?php echo $friendOf ?>&name=<?php echo $name ?>&firstname=<?php echo $firstname ?>&age=<?php echo $age ?>&email=<?php echo $email ?>">
        <?php
        $check = false;
    }

    if($check == true)
    {
        $pass = password_hash($password, PASSWORD_DEFAULT);

        $connector = new PDOLink();

        if($type == "reTry" || $type == "inscription") {
            //2ème : Faire la requête
            //Inserer la requête dans un variable "query"
            $query = "INSERT INTO `t_user`(`useLogin`, `usePassword`, `useName`, `useFirstName`, `useAge`, `useEmail`, `useFriendOf`, `IsAdmin`) VALUES ('$login','$pass','$name','$firstname',$age,'$email',$friendOf,0)";
        }
        elseif($type == "modify") {
            $query = "UPDATE `t_user` SET `useLogin`='$login',`usePassword`='$pass',`useName`='$name',`useFirstName`='$firstname',`useAge`='$age',`useEmail`='$email',`useFriendOf`=$friendOf WHERE idUser=$id";
        }
        //Lance la requête
        $req = $connector->executeQuery($query);

        if($type == "reTry" || $type == "inscription") {
            echo "Les données ont été insérées";
        }
        elseif($type == "modify") {
            echo "Les données ont été changée correctement";
        }
        ?>
        <meta http-equiv="refresh" content="3; URL=index.php">
        <?php
        //Ecrase la requête
        $connector->closeCursor($req);
        //Stop la connexion
        $connector->destructObject();
    }
}