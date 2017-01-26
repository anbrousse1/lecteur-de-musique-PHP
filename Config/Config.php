<?php
/**
 * Created by PhpStorm.
 * User: antho
 * Date: 16/12/2016
 * Time: 10:43
 */

namespace ProjetPHP\Config;


class Config
{
    /**
     * Données nécessaires à la connexion à la base de données
    */
    public static function getAuthData(&$db_host, &$db_name, &$db_user, &$db_password){
        $db_host = 'mysql:host=localhost;dbname=';
        $db_name = "musique";
        $db_user ="anbrousse1";
        $db_password ="11/05/1997";
    }

    public static function getVues(){
        //Racine du site
        global $rootDirectory;
        //Répertoire contenant les vues
        $vueDirectory = $rootDirectory."Vue/";
        return array(
            "default"=>$vueDirectory."Accueil.php",
            "afficherMorceaux"=>$vueDirectory."VueMorceau.php",
            "AjoutCommentaire"=>$vueDirectory."AjoutCommentaire.php",
            "rechercher"=>$vueDirectory."VueRecherche.php",
            "ajout"=>$vueDirectory."AjouterMorceau.php",
            "resultatAjout"=>$vueDirectory."MorceauAjout.php",
            "connexion"=>$vueDirectory."Connexion.php",
            "resultatConnexion"=>$vueDirectory."resultatConnexion.php",
            "SuppressionCommentaire"=>$vueDirectory."SuppressionCommentaire.php",
            "deconnexion"=>$vueDirectory."Deconnexion.php"
        );
    }

    public static function getVuesErreur(){
        //Racine du site
        global $rootDirectory;
        //Répertoire contenant les vues
        $vueDirectory = $rootDirectory."Vue/";
        return array(
            "default"=>$vueDirectory."VueErreurDefault.php"

        );
    }

    public static function getRootURI(){
        global $rootURI; // varaible globale initialisée dans index.php
        return $rootURI;
    }


}