<?php
/**
 * Created by PhpStorm.
 * User: Anthony
 * Date: 10/01/2017
 * Time: 17:18
 */

namespace ProjetPHP\Persistance;

/**
 * Class UtilisateurGateway
 * cette classe peremt d'agir sur la base de données des utilisateurs
 * @package ProjetPHP\DAL
 */
class UtilisateurGateway
{
    /**
     * @param $dataError
     * @param $login
     * @param $mdp
     * @return int
     * verifie si l'utilisateur est dans la base de données
     */
    public function verificationUtilisateur(&$dataError,$login,$mdp){

        \ProjetPHP\Config\Config::getAuthData($db_host, $db_name, $db_user, $db_password);
        $bdd=new \PDO($db_host.$db_name,$db_user,$db_password);

        $req=$bdd->exec('Select * from utilisateur where login=\''.$login.'\'and mdp=\''.$mdp.'\'');
        return $req;
    }
}