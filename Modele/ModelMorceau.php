<?php
/**
 * Created by PhpStorm.
 * User: Anthony
 * Date: 12/01/2017
 * Time: 16:50
 */

namespace ProjetPHP\Modele;


class ModelMorceau
{
    private $morceau;
    private $title;

    public function getData(){
        return $this->morceau;
    }

    public function getTitle(){
        return $this->title;
    }

    public static function getModelDefaultCommentaire(){
        $model = new self(array());
        $model->morceau = \ProjetPHP\Metier\Morceau::getDefaultInstance();
        $model->title="saisie d'un morceau";
        return $model;
    }


}