<?php
/**
 * Created by PhpStorm.
 * User: antho
 * Date: 05/01/2017
 * Time: 11:43
 */

namespace ProjetPHP\Metier;

/**
 * Class Commentaire
 * @package ProjetPHP\Metier
 */
class Commentaire
{
    public $id;
    public $titre;
    public $auteur;
    public $texte;
    public $date;

    public function __construct($id,$titre,$auteur,$texte,$date)
    {
        $this->id=$id;
        $this->titre=$titre;
        $this->auteur=$auteur;
        $this->texte=$texte;
        $this->date=$date;
    }

    public function toHTML()
    {
        $mess =$this->auteur." :"."</br>".$this->texte."</br> Publié le : ".$this->date."</br></br>" ;
        return $mess;
    }



    public static function getDefaultInstance(){
        $commentaire = new self("","","","","");
        return $commentaire;
    }
}