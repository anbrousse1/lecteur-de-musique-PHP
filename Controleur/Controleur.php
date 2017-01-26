<?php

/**
 * Created by PhpStorm.
 * User: antho
 * Date: 03/01/2017
 * Time: 15:48
 */
namespace  ProjetPHP\Controleur;
/**
 * Class Controleur
 * @package ProjetPHP\Controleur
 * identifie l'action et appelle la méthode pour construire le modele correspondant
 * appelle aussi la vue correspondante
 * gere aussi les exceptions et appelle les vues d'erreur.
 */
class Controleur
{
    function __construct()
    {
        try{
            // récupération de l'action
            $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : "";
            // distinction des cas suivants l'action

            switch ($action){
                case "resultatConnexion" : require (\ProjetPHP\Config\Config::getVues()['resultatConnexion']);
                    break;
                case "ajout" : require (\ProjetPHP\Config\Config::getVues()['ajout']);
                    break;
                case "resultatAjout" : require (\ProjetPHP\Config\Config::getVues()['resultatAjout']);
                    break;
                case "rechercher" : require (\ProjetPHP\Config\Config::getVues()['rechercher']);
                    break;
                case "afficherMorceaux" : require (\ProjetPHP\Config\Config::getVues()['afficherMorceaux']);
                break;
                case "AjoutCommentaire" : require (\ProjetPHP\Config\Config::getVues()['AjoutCommentaire']);
                    break;
                case "connexion" : require (\ProjetPHP\Config\Config::getVues()['connexion']);
                    break;
                case "SuppressionCommentaire" : require(\ProjetPHP\Config\Config::getVues()['SuppressionCommentaire']);
                    break;
                case "deconnexion" : require(\ProjetPHP\Config\Config::getVues()['deconnexion']);
                    break;
                default : require(\ProjetPHP\Config\Config::getVues()["default"]);
                break;
            }
        }catch (\Exception $e){//page d'erreur par défaut
            $model = new \ProjetPHP\Modele\Model(array('exception'=> $e->getMessage()));
            require(\ProjetPHP\Config\Config::getVuesErreur()['default']);
        }

    }

    private function actionAjoutcommentaire(){
        $raw = isset($_REQUEST['titre']) ? $_REQUEST['titre'] : "";
        $titre=filter_var($raw,FILTER_SANITIZE_STRING);

        if (isset($_POST['valider'])) {
            if (isset($_POST['commentaire'])) {
                $commentaire = $_POST['commentaire'];
                $date = date('d-m-Y H:i:s');
                $auteur = $_SESSION['login'];
                $id = "";
            }
        }

        $model = \ProjetPHP\Modele\ModeleCommentaire::getModelCommentaireCreate($titre,$auteur,$commentaire,$date);

        if($model->getError()===false){
            require \ProjetPHP\Config\Config::getVues()['AjoutCommentaire'];
        }else {
            require \ProjetPHP\Config\Config::getVuesErreur()['default'];
        }

    }

}