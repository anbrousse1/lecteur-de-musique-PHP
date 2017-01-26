<?php
/**
 * Created by PhpStorm.
 * User: Anthony
 * Date: 10/01/2017
 * Time: 17:15
 */

namespace ProjetPHP\Metier;


class Utilisateur
{
    public $login;
    public $mdp;

    public function __construct($login,$mdp)
    {
        $this->login=$login;
        $this->mdp=$mdp;
    }

    public function toHTML()
    {
        $mess =$this->login." :"."</br>" ;
        return $mess;
    }



    public static function getDefaultInstance(){
        $user = new self("","");
        return $user;
    }
}