<?php
/**
 * Created by PhpStorm.
 * User: antho
 * Date: 14/12/2016
 * Time: 21:49
 */

namespace  ProjetPHP\Persistance;


use ProjetPHP\Metier\Morceau;
use ProjetPHP\Persistance\DataBaseManager;

/**
 * Class MorceauGateway
 * cette classe permet d'agir sur la base de données des morceaux
 * @package ProjetPHP\DAL
 */
class MorceauGateway
{
    /**
     * @return array retourne un tableau composé de tous les morceaux
     */
    public function getAll(){
        $donnees =  \ProjetPHP\Persistance\DataBaseManager::getInstance()->prepareAndExecuteQuery("select * from morceau order by nbAvisFav DESC");
        foreach($donnees as $ligne){
            $tab[] = new \ProjetPHP\Metier\Morceau($ligne['titre'],$ligne['auteur'],$ligne['chemin'],$ligne['nbAvisFav'],$ligne['nbAvisDeFav'],$ligne['nbAvisIndif'],$ligne['details'],$ligne['dureeEcoute'],$ligne['anneeParution'],$ligne['periodeMiseEnLigne']);
        }
        return $tab;
    }

    /**
     * @param $titre
     * @param $auteur
     * @param $chemin
     * @param $details
     * @param $dureeEcoute
     * @param $anneeParution
     * @param $periodeMiseEnLigne
     * permet d'ajouter un morceau à la base de données
     */
    public function ajoutMorceau($titre,$auteur,$chemin,$details,$dureeEcoute,$anneeParution, $periodeMiseEnLigne){

        \ProjetPHP\Config\Config::getAuthData($db_host, $db_name, $db_user, $db_password);
        $bdd=new \PDO($db_host.$db_name,$db_user,$db_password);

        $req=$bdd->exec('Insert into morceau values(\''.$titre.'\',\''.$auteur.'\',\''.$chemin.'\',0,0,0,\''.$details.'\',\''.$dureeEcoute.'\',\''.$anneeParution.'\',\''.$periodeMiseEnLigne.'\')');
        return $req;

    }

    /**
     * @param $titre titre du morceau recherché
     * @return Morceau retourne le morceau correspondant
     */
    public function getTitreByNom(&$dataError,$titre){
        if(isset($titre)){
            $args=array($titre);
            $queryResults=DataBaseManager::getInstance()->prepareAndExecuteQuery('Select * from morceau where titre=?',$args);
            //si l'execution a réussi
            if(isset($queryResults)&& is_array($queryResults)){
                //si un et un seul morceau a été trouvé
                if(count($queryResults)==1){
                    $row = $queryResults[0];
                    $morceau=\ProjetPHP\Metier\MorceauFabrique::getValidInstance($dataError,$row);
                    $dataError = array_merge($dataError);
                    return $morceau;
                }else{
                    $dataError['persistance']="morceau ".$titre." introuvable";
                }
            }else {
                $dataError['persistance']="Impossible d'accéder aux données";
            }
        }else{
            $dataError['persistance']="morceau ".$titre." introuvable";
        }
        return null;
    }

    /**
     * @param $avis
     * @param $titre titre du morceau
     * permet d'ajouter un avis à un morceau
     */
    public function ajouterAvis($avis,$titre){
        if($avis=="Favorable"){
            $args=array($titre);
            $req=DataBaseManager::getInstance()->prepareAndExecuteQuery('UPDATE morceau SET nbAvisFav=nbAvisFav+1 WHERE titre=?',$args);
        }
        if($avis=="Defavorable"){
            $args=array($titre);
            $req=DataBaseManager::getInstance()->prepareAndExecuteQuery('UPDATE morceau SET nbAvisDeFav=nbAvisDeFav+1 WHERE titre=?',$args);
        }
        if($avis=="Indifferent"){
            $args=array($titre);
            $req=DataBaseManager::getInstance()->prepareAndExecuteQuery('UPDATE morceau SET nbAvisIndif=nbAvisIndif+1 WHERE titre=?',$args);
        }





    }

}