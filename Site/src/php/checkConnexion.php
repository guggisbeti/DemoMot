<?php
session_start();
/**
 * ETML
 * User: Timothée Guggisberg
 * Date: 31.05.2017
 * Brief : Page de vérification des mots de passe et login lors de connexion, attribution du droit admin
 */

include "include/head.php";

$login = $_POST['login'];
$password = $_POST['password'];

if($login == "" || $password == "" )
{
    echo "Certains champs sont vides, veuillez les remplir.";
    ?>
    <meta http-equiv="refresh" content="2; URL=connexion.php">
    <?php
}
else
{
    $connector = new PDOLink();

    //2ème : Faire la requête
    //Inserer la requête dans un variable "query"
    $query = "SELECT `idUser`, `useLogin`, `usePassword`, `useName`, `IsAdmin`, `useName`, `useFirstName` FROM `t_user`";

    //Lance la requête
    $req = $connector->executeQuery($query);

    $data = $connector->prepareData($req);

    foreach($data as $pass)
    {
        if(password_verify($password, $pass['usePassword']) && $login == $pass['useLogin'])
        {
            $_SESSION['connected'] = 1;
            $_SESSION['user'] = $pass['idUser'];
            if($pass['IsAdmin'] == 0)
            {
                $_SESSION['admin'] = 0;
            }
            else
            {
                $_SESSION['admin'] = 1;
            }

            echo "Bonjour " . $pass['useFirstName'] . " " . $pass['useName'] . "<br> Vous allez être redirigé vers la page d'accueil";
            ?>
            <meta http-equiv="refresh" content="0; URL=index.php">
            <?php
            break;
        }
    }

        echo "Login ou mot de passe incorrect";
        ?>
        <meta http-equiv="refresh" content="2; URL=connexion.php">
        <?php



    //Ecrase la requête
    $connector->closeCursor($req);
    //Stop la connexion
    $connector->destructObject();
}