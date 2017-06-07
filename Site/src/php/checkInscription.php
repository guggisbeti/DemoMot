<?php
session_start();
/**
 * ETML
 * User: Timothée Guggisberg
 * Date: 31.05.2017
 * Brief : Page de check de la page inscription.php afin de vérifier les donnée entrée avec des regex puis les inserer dans la BDD si les champs sont juste
 */

include "include/head.php";

//Prise dans l'URL de l'id ainsi que du type
//inscription : si il vient de la page inscription sans faire de faute
//reTry : si il à fait faux, renvoi alors à la page d'insription avec les données
//modify : si il vient depuis sont profil avec le bouton Edit afin de faire un Update plutot qu'un insert
$id = $_SESSION['user'];
$type = $_GET['type'];

//Vérification des champs + implémentation dans une variable
$name = htmlspecialchars(trim($_POST['name']));
$firstname = htmlspecialchars(trim($_POST['firstname']));
$age = htmlspecialchars(trim($_POST['age']));
$email = htmlspecialchars(trim($_POST['email']));
$login = htmlspecialchars(trim($_POST['login']));
$password = htmlspecialchars(trim($_POST['password']));
//Si le bouton radio a une valeur
if(isset($_POST['friendOf']) == 1) {
    $friendOf = $_POST['friendOf'];
}
//Sinon renvoi sur la page avec une redirection
else
{
    echo 'Le bouton radio "Vous êtes l\'ami de" est obligatoire, veuillez le remplir.<br>';
    ?>
    <meta http-equiv="refresh" content="3; URL=inscription.php?type=reTry&login=<?php echo $login ?>&friendOf=<?php echo $friendOf ?>&name=<?php echo $name ?>&firstname=<?php echo $firstname ?>&age=<?php echo $age ?>&email=<?php echo $email ?>">
    <?php
}
//Si certains champs sont vide renvoi sur la page
if($name == "" || $firstname == "" || $age == "" || $email == "" || $login == "" || $password == "" )
{
    echo "Certains champs sont vides, veuillez les remplir.";
    ?>
    <meta http-equiv="refresh" content="3; URL=inscription.php?type=reTry&login=<?php echo $login ?>&friendOf=<?php echo $friendOf ?>&name=<?php echo $name ?>&firstname=<?php echo $firstname ?>&age=<?php echo $age ?>&email=<?php echo $email ?>">
    <?php
}
//Sinon, lance les regex pour chaque champs afin de vérifier si c'est bien écrit
else
{
    //Variable check en true, va passer dans chaque regex et devient false si le regex ne match pas
    $check = true;

    //Si le nom est mal écrit
    if(!preg_match("#^[A-Z]{1}[a-zA-Z àé'-üöè]+$#",$name))
    {
        echo 'Le champ "Nom" est mal écrit<br>';
        ?>
        <meta http-equiv="refresh" content="3; URL=inscription.php?type=reTry&login=<?php echo $login ?>&friendOf=<?php echo $friendOf ?>&name=<?php echo $name ?>&firstname=<?php echo $firstname ?>&age=<?php echo $age ?>&email=<?php echo $email ?>">
        <?php
        $check = false;
    }
    //Si le prénom est mal écrit
    if(!preg_match("#^[A-Z]{1}[a-zA-Z àé'-üöè]+$#",$firstname))
    {
        echo 'Le champ "Prénom" est mal écrit<br>';
        ?>
        <meta http-equiv="refresh" content="3; URL=inscription.php?type=reTry&login=<?php echo $login ?>&friendOf=<?php echo $friendOf ?>&name=<?php echo $name ?>&firstname=<?php echo $firstname ?>&age=<?php echo $age ?>&email=<?php echo $email ?>">
        <?php
        $check = false;
    }
    //Si l'age est mal écrit
    if(!preg_match("#^(\d?[1-9]|[1-9]0)$#",$age))
    {
        echo 'Le champ "Age" est mal écrit<br>';
        ?>
        <meta http-equiv="refresh" content="3; URL=inscription.php?type=reTry&login=<?php echo $login ?>&friendOf=<?php echo $friendOf ?>&name=<?php echo $name ?>&firstname=<?php echo $firstname ?>&age=<?php echo $age ?>&email=<?php echo $email ?>">
        <?php
        $check = false;
    }
    //Si l'email est mal écrit
    if(!preg_match("#^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,3}$#",$email))
    {
        echo 'Le champ "Adresse e-mail" est mal écrit<br>';
        ?>
        <meta http-equiv="refresh" content="3; URL=inscription.php?type=reTry&login=<?php echo $login ?>&friendOf=<?php echo $friendOf ?>&name=<?php echo $name ?>&firstname=<?php echo $firstname ?>&age=<?php echo $age ?>&email=<?php echo $email ?>">
        <?php
        $check = false;
    }
    //Si tous les champs sont juste
    if($check == true)
    {
        //Hache le mot de passe afin de le mettre dans la base de données
        $pass = password_hash($password, PASSWORD_DEFAULT);

        //Instanciation de la classe PDOLink
        $connector = new PDOLink();

        //Si le type est reTry ou inscription la query devient un insert
        if($type == "reTry" || $type == "inscription") {
            //2ème : Faire la requête
            //Inserer la requête dans un variable "query"
            $query = "INSERT INTO `t_user`(`useLogin`, `usePassword`, `useName`, `useFirstName`, `useAge`, `useEmail`, `useFriendOf`, `IsAdmin`) VALUES ('$login','$pass','$name','$firstname',$age,'$email',$friendOf,0)";
        }
        //Si c'est modify, la query devient un Update
        elseif($type == "modify") {
            $query = "UPDATE `t_user` SET `useLogin`='$login',`usePassword`='$pass',`useName`='$name',`useFirstName`='$firstname',`useAge`='$age',`useEmail`='$email',`useFriendOf`=$friendOf WHERE idUser=$id";
        }
        //Lance la requête
        $req = $connector->executeQuery($query);

        //Si le type est reTry ou inscription
        if($type == "reTry" || $type == "inscription") {
            echo "Les données ont été insérées";
        }
        //Si c'est modify
        elseif($type == "modify") {
            echo "Les données ont été changée correctement";
        }
        ?>
        //R
        <meta http-equiv="refresh" content="3; URL=index.php">
        <?php
        //Ecrase la requête
        $connector->closeCursor($req);
        //Stop la connexion
        $connector->destructObject();
    }
}