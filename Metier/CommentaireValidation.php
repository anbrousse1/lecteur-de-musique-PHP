<?php
/**
 * Created by PhpStorm.
 * User: antho
 * Date: 05/01/2017
 * Time: 21:41
 */

namespace ProjetPHP\Metier;


class CommentaireValidation
{
    public static function filtrerCommentaire($commentaire,$reversed,$policy){
        ValidationUtils::filterString($commentaire->id,$reversed,$policy);
        ValidationUtils::filterString($commentaire->titre,$reversed,$policy);
        ValidationUtils::filterString($commentaire->auteur,$reversed,$policy);
        ValidationUtils::filterString($commentaire->texte,$reversed,$policy);
        ValidationUtils::filterString($commentaire->date,$reversed,$policy);
    }

    public static function validationInput($inputArray,&$commentaire,$policy){
        if(!is_object($commentaire)|| !preg_match("/Commentaire$/",get_class($commentaire))){
            // si $morceau n'est pas une instacne de Morceau alors on en créée une
            $commentaire = \ProjetPHP\Metier\Commentaire::getDefaultInstance();
        }
        //initialisation des attributs
        $commentaire->id=$inputArray['id'];
        $commentaire->titre=$inputArray['titre'];
        $commentaire->auteur=$inputArray['auteur'];
        $commentaire->texte=$inputArray['texte'];
        $commentaire->date=$inputArray['date'];
        //filtrage des attributs
        self::filterMorceau($commentaire,false,$policy);
    }

}