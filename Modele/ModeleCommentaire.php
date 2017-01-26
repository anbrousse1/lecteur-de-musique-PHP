<?php
/**
 * Created by PhpStorm.
 * User: Anthony
 * Date: 11/01/2017
 * Time: 22:03
 */

namespace ProjetPHP\Modele;


class ModeleCommentaire extends Model
{
    private $commentaire;
    private $title;

    public function getData(){
        return $this->commentaire;
    }

    public function getTitle(){
        return $this->title;
    }

    public static function getModelDeaultCommentaire(){
        $model = new self(array());
        $model->commentaire = \ProjetPHP\Metier\Commentaire::getDefaultInstance();
        $model->title="saisie d'un morceau";
        return $model;
    }

    public static function getModelCommentaireCreate($titre,$auteur,$commentaire,$date){
        $model = new self(array());
        $model->commentaire=\ProjetPHP\Persistance\CommentaireGateway::ajoutCommentaire($titre,$auteur,$commentaire,$date);
        $model->title="Le Commentaire a été ajouté";
        return $model;

    }

}