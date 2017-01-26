<?php
/**
 * Created by PhpStorm.
 * User: antho
 * Date: 05/01/2017
 * Time: 11:47
 */

namespace ProjetPHP\Persistance;
use ProjetPHP\Metier\Morceau;
use ProjetPHP\Persistance\DataBaseManager;

/**
 * Class CommentaireGateway
 * cette classe permet d'agir sur la base de données des commentaires
 * @package ProjetPHP\DAL
 */
class CommentaireGateway
{
    /**
     * @param $dataError
     * @param $titre titre du morceau
     * @return array retourne le commentaire
     */
    public function getCommentaireByTitre(&$dataError,$titre){
        if(isset($titre)){
            $args=array($titre);
            $donnees=DataBaseManager::getInstance()->prepareAndExecuteQuery('Select * from commentaire where titre=? order by date',$args);
            foreach ($donnees as $ligne){
                $tab[]=new \ProjetPHP\Metier\Commentaire($ligne['id'],$ligne['titre'],$ligne['auteur'],$ligne['texte'],$ligne['date']);
            }
            return $tab;
        }


    }

    public function getNbCommentaire(&$dataError,$titre){
        if(isset($titre)){
            $args=array($titre);
            $donnees=DataBaseManager::getInstance()->prepareAndExecuteQuery('Select count(*) from commentaire where titre=?',$args);
            foreach ($donnees as $ligne){
                $res=$ligne;
            }
            return $res;
        }
    }

        public static function ajoutCommentaire($titre,$auteur,$commentaire,$date){

        \ProjetPHP\Config\Config::getAuthData($db_host, $db_name, $db_user, $db_password);
        $bdd=new \PDO($db_host.$db_name,$db_user,$db_password);


        $req=$bdd->exec('Insert into commentaire values(0,\''.$titre.'\',\''.$auteur.'\',\''.$commentaire.'\',\''.$date.'\')');
        return $req;

    }

    public function suppressionCommentaire($id){

        \ProjetPHP\Config\Config::getAuthData($db_host, $db_name, $db_user, $db_password);
        $bdd=new \PDO($db_host.$db_name,$db_user,$db_password);


        $req=$bdd->exec('Delete from commentaire where id='.$id);
        return $req;

    }

}