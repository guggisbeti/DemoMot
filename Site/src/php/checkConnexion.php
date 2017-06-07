<?php
session_start();
/**
 * ETML
 * User: Timothée Guggisberg
 * Date: 31.05.2017
 * Brief : Page de vérification des mots de passe et login lors de connexion, attribution du droit admin
 */

include "include/head.php";

//Vérification du login et du password et implémentation dans un variable
$login = htmlspecialchars(trim($_POST['login']));
$password = htmlspecialchars(trim($_POST['password']));

//Si le login ou le password sont vide retourne à la connexion
if($login == "" || $password == "" )
{
    echo "Certains champs sont vides, veuillez les remplir.";
    ?>
    <meta http-equiv="refresh" content="2; URL=connexion.php">
    <?php
}
else
{
    //Instanciation de la classe PDOLink
    $connector = new PDOLink();

    //2ème : Faire la requête
    //Inserer la requête dans un variable "query"
    $query = "SELECT `idUser`, `useLogin`, `usePassword`, `useName`, `IsAdmin`, `useName`, `useFirstName` FROM `t_user`";

    //Lance la requête
    $req = $connector->executeQuery($query);

    //Préparation des données à être affichées
    $data = $connector->prepareData($req);

    //Mise en place des session suivant les identifiant donné
    foreach($data as $pass)
    {
        //Si des champs match ensemble
        if(password_verify($password, $pass['usePassword']) && $login == $pass['useLogin'])
        {
            //Session de connexion
            $_SESSION['connected'] = 1;
            //Session ayant l'id de l'utilisateur
            $_SESSION['user'] = $pass['idUser'];
            //S/il n'est pas admin crée la session utilisateur
            if($pass['IsAdmin'] == 0)
            {
                $_SESSION['admin'] = 0;
            }
            //Sinon crée la session admin
            else
            {
                $_SESSION['admin'] = 1;
            }

            //Phrase avant la redirection de bienvenue
            echo "Bonjour " . $pass['useFirstName'] . " " . $pass['useName'] . "<br> Vous allez être redirigé vers la page d'accueil";
            ?>
            <meta http-equiv="refresh" content="2; URL=index.php">
            <?php
            break;
        }
    }
        //Si le mot de passe ou le login est inccorect redirection sur la page de connexion
        echo "Login ou mot de passe incorrect";
        ?>
        <meta http-equiv="refresh" content="2; URL=connexion.php">
        <?php



    //Ecrase la requête
    $connector->closeCursor($req);
    //Stop la connexion
    $connector->destructObject();
}