<?php
/**
 * Created by PhpStorm.
 * User: antho
 * Date: 05/01/2017
 * Time: 11:50
 */

namespace ProjetPHP\Metier;


class CommentaireFabrique
{
    protected static function validateTitre(&$titre){
        if(!ExpressionsRegexUtils::isValidLatin1WithNumbersAndPunctuation($titre,0,50)){
            $tmp = $titre; $titre = "";
            throw new \Exception("erreur, titre\"".$tmp."\"incorrect");
        }
    }
    protected static function validateAuteur(&$auteur){
        if(!ExpressionsRegexUtils::isValidLatin1WithNumbersAndPunctuation($auteur,0,50)){
            $tmp = $auteur; $auteur = "";
            throw new \Exception("erreur, auteur\"".$tmp."\"incorrect");
        }
    }

    protected static function validateId(&$id){
        if(!ExpressionsRegexUtils::isValidLatin1WithNumbersAndPunctuation($id,0,50)){
            $tmp = $id; $id = "$tmp";
            throw new \Exception("erreur, chemin\"".$tmp."\"incorrect");
        }
    }

    protected static function validateTexte(&$texte){
        if(!ExpressionsRegexUtils::isValidLatin1WithNumbersAndPunctuation($texte,0,50)){
            $tmp = $texte; $texte = "";
            throw new \Exception("erreur, nbAvisFav\"".$tmp."\"incorrect");
        }
    }

    protected static function validateDate(&$date){
        if(!ExpressionsRegexUtils::isValidLatin1WithNumbersAndPunctuation($date,0,50)){
            $tmp = $date; $date = "";
            throw new \Exception("erreur, periodeMiseEnLigne\"".$tmp."\"incorrect");
        }
    }

    public static function validateInstance(&$dataError,&$commentaire){
        $dataError = array();
        try{
            self::validateTitre($commentaire->titre);
        }catch (\Exception $e){
            $dataError['titre']=$e->getMessage();
        }
        try{
            self::validateAuteur($commentaire->auteur);
        }catch (\Exception $e){
            $dataError['auteur']=$e->getMessage();
        }
        try{
            self::validateChemin($commentaire->id);
        }catch (\Exception $e){
            $dataError['id']=$e->getMessage();
        }
        try{
            self::validateNbAvisFav($commentaire->texte);
        }catch (\Exception $e){
            $dataError['texte']=$e->getMessage();
        }
        try{
            self::validateNbAvisDeFav($commentaire->date);
        }catch (\Exception $e){
            $dataError['date']=$e->getMessage();
        }
    }
// il faut faire cette methode et donc la classe commentairevalidationS
    public static function getValidInstance(&$dataError,&$inputArray,$policy = \ProjetPHP\Controleur\ValidationUtils::SANITIZE_POLICY_DISCARD_HTML_NOQUOTE){
        //Construction d'une instance filtrée
        CommentaireFabrique::validationInput($inputArray,$commentaire,$policy);
        //validation suivant la logique métier
        self::validateInstance($dataError,$commentaire);
        return $commentaire;
    }
}