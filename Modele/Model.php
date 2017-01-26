<?php
/**
 * Created by PhpStorm.
 * User: antho
 * Date: 03/01/2017
 * Time: 16:01
 */

namespace ProjetPHP\Modele;

/**
 * Class Model
 * @package ProjetPHP\Modele
 * cette classe permet de factoriser le code concernant les données d'erreur.
 */
class Model
{
    // dictionnaire d'erreur(couple type=>message)
    protected $dataError ;

    /**
     * @return array|bool retourne false si il n'y a pas d'erreur ou alors le tableau d'erreur
     */
    public function getError(){
        if(empty($this->dataError)){
            return false;
        }
        return $this->dataError;
    }

    /**
     * Model constructor.
     * @param array $dataError tableau dont les valeurs sont des messages d'erreur
     */
    public function __construct($dataError =array())
    {
        $this->dataError=$dataError;
    }
}