<?php
/**
 * Created by PhpStorm.
 * User: antho
 * Date: 03/01/2017
 * Time: 18:03
 */

namespace ProjetPHP\Metier;
use \ProjetPHP\Controleur\ValidationUtils as ValidationUtils; //raccourci classe

class MorceauValidation
{
    public static function filterMorceau($morceau,$reversed,$policy){
        ValidationUtils::filterString($morceau->titre,$reversed,$policy);
        ValidationUtils::filterString($morceau->auteur,$reversed,$policy);
        ValidationUtils::filterString($morceau->chemin,$reversed,$policy);
        ValidationUtils::filterString($morceau->nbAvisFav,$reversed,$policy);
        ValidationUtils::filterString($morceau->nbAvisDeFav,$reversed,$policy);
        ValidationUtils::filterString($morceau->nbAvisIndif,$reversed,$policy);
        ValidationUtils::filterString($morceau->details,$reversed,$policy);
        ValidationUtils::filterString($morceau->dureeEcoute,$reversed,$policy);
        ValidationUtils::filterString($morceau->anneeParution,$reversed,$policy);
        ValidationUtils::filterString($morceau->periodeMiseEnLigne,$reversed,$policy);
    }

    public static function validationInput($inputArray,&$morceau,$policy){
        if(!is_object($morceau)|| !preg_match("/Morceau$/",get_class($morceau))){
            // si $morceau n'est pas une instacne de Morceau alors on en créée une
            $morceau = \ProjetPHP\Metier\Morceau::getDefaultInstance();
        }
        //initialisation des attributs
        $morceau->titre=$inputArray['titre'];
        $morceau->auteur=$inputArray['auteur'];
        $morceau->chemin=$inputArray['chemin'];
        $morceau->nbAvisFav=$inputArray['nbAvisFav'];
        $morceau->nbAvisDeFav=$inputArray['nbAvisDeFav'];
        $morceau->nbAvisIndif=$inputArray['nbAvisIndif'];
        $morceau->details=$inputArray['details'];
        $morceau->dureeEcoute=$inputArray['dureeEcoute'];
        $morceau->anneeParution=$inputArray['anneeParution'];
        $morceau->periodeMiseEnLigne=$inputArray['periodeMiseEnLigne'];
        //filtrage des attributs
        self::filterMorceau($morceau,false,$policy);
    }
}