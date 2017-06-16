<?php

/**
 * ETML
 * User: Timothée Guggisberg
 * Date: 31.05.2017
 * Brief : Classe contenant toute les données pour faire la connexion à la base
 */

include('config.php');

class PDOLink
{
    private $connector;

    /*
     * Constructeur qui crée la connexion entre la base de donnée et le site web
     */
    function __construct()
    {
        //1er : Connecter la base de donnée
        $this->connector = new PDO('mysql:host='. $GLOBALS['config']['host'] .';dbname='. $GLOBALS['config']['dbname'] .';charset='. $GLOBALS['config']['charset'], $GLOBALS['config']['user'], $GLOBALS['config']['password']);
    }

    /*
     * Function qui récupère la requête
     */
    function executeQuery($query)
    {
        //3ème : Recuperation des données
        //Préparation de la requête à executer
        $req = $this->connector->prepare($query);
        //Execution de la requete
        $req->execute();
        return $req;
    }

    /*
     * Function qui affiche les données
     */
    function prepareData($req)
    {
        //3ème : Recuperation des données
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    /*
     * Vide la requête
     */
    function closeCursor($req)
    {
        //5ème : Fermer la connexion et la requête
        //Ferme la requête
        $req->closeCursor();
    }

    /*
     * Function qui coupe la connexion entre la base de donnée et le site
     */
    function destructObject()
    {
        //Met la connexion à null
        $this->connector = null;
    }
}