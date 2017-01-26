<?php
/**
 * Created by PhpStorm.
 * User: antho
 * Date: 03/01/2017
 * Time: 17:49
 */

namespace ProjetPHP\Metier;


class MorceauFabrique
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

    protected static function validateChemin(&$chemin){
        if(!ExpressionsRegexUtils::isValidLatin1WithNumbersAndPunctuation($chemin,0,50)){
            $tmp = $chemin; $chemin = "$tmp";
            throw new \Exception("erreur, chemin\"".$tmp."\"incorrect");
        }
    }

    protected static function validateNbAvisFav(&$nbAvisFav){
        if(!ExpressionsRegexUtils::isValidLatin1WithNumbersAndPunctuation($nbAvisFav,0,50)){
            $tmp = $nbAvisFav; $nbAvisFav = "";
            throw new \Exception("erreur, nbAvisFav\"".$tmp."\"incorrect");
        }
    }

    protected static function validateNbAvisDeFav(&$nbAvisDeFav){
        if(!ExpressionsRegexUtils::isValidLatin1WithNumbersAndPunctuation($nbAvisDeFav,0,50)){
            $tmp = $nbAvisDeFav; $nbAvisDeFav = "";
            throw new \Exception("erreur, nbAvisDeFav\"".$tmp."\"incorrect");
        }
    }

    protected static function validateNbAvisIndif(&$nbAvisIndif){
        if(!ExpressionsRegexUtils::isValidLatin1WithNumbersAndPunctuation($nbAvisIndif,0,50)){
            $tmp = $nbAvisIndif; $nbAvisIndif = "";
            throw new \Exception("erreur, nbAvisIndif\"".$tmp."\"incorrect");
        }
    }

    protected static function validateDetails(&$detail){
        if(!ExpressionsRegexUtils::isValidLatin1WithNumbersAndPunctuation($detail,0,200)){
            $tmp = $detail; $detail = "";
            throw new \Exception("erreur, detail\"".$tmp."\"incorrect");
        }
    }

    protected static function validateDureeEcoute(&$dureeEcoute){
        if(!ExpressionsRegexUtils::isValidLatin1WithNumbersAndPunctuation($dureeEcoute,0,50)){
            $tmp = $dureeEcoute; $dureeEcoute = "";
            throw new \Exception("erreur, dureeEcoute\"".$tmp."\"incorrect");
        }
    }

    protected static function validateAnneeParution(&$anneeParution){
        if(!ExpressionsRegexUtils::isValidLatin1WithNumbersAndPunctuation($anneeParution,0,50)){
            $tmp = $anneeParution; $anneeParution = "";
            throw new \Exception("erreur, anneeParution\"".$tmp."\"incorrect");
        }
    }

    protected static function validatePeriodeMiseEnLigne(&$periodeMiseEnLigne){
        if(!ExpressionsRegexUtils::isValidLatin1WithNumbersAndPunctuation($periodeMiseEnLigne,0,50)){
            $tmp = $periodeMiseEnLigne; $periodeMiseEnLigne = "";
            throw new \Exception("erreur, periodeMiseEnLigne\"".$tmp."\"incorrect");
        }
    }

    public static function validateInstance(&$dataError,&$morceau){
        $dataError = array();
        try{
            self::validateTitre($morceau->titre);
        }catch (\Exception $e){
            $dataError['titre']=$e->getMessage();
        }
        try{
            self::validateAuteur($morceau->auteur);
        }catch (\Exception $e){
            $dataError['auteur']=$e->getMessage();
        }
        try{
            self::validateChemin($morceau->chemin);
        }catch (\Exception $e){
            $dataError['chemin']=$e->getMessage();
        }
        try{
            self::validateNbAvisFav($morceau->nbAvisFav);
        }catch (\Exception $e){
            $dataError['nbAvisFav']=$e->getMessage();
        }
        try{
            self::validateNbAvisDeFav($morceau->nbAvisDefav);
        }catch (\Exception $e){
            $dataError['nbAvisDefav']=$e->getMessage();
        }
        try{
            self::validateNbAvisIndif($morceau->nbAvisIndif);
        }catch (\Exception $e){
            $dataError['nbAvisIndif']=$e->getMessage();
        }
        try{
            self::validateAnneeParution($morceau->anneeParution);
        }catch (\Exception $e){
            $dataError['anneeparution']=$e->getMessage();
        }
        try{
            self::validateDureeEcoute($morceau->dureeEcoute);
        }catch (\Exception $e){
            $dataError['dureeEcoute']=$e->getMessage();
        }
        try{
            self::validateDetails($morceau->details);
        }catch (\Exception $e){
            $dataError['details']=$e->getMessage();
        }
        try{
            self::validatePeriodeMiseEnLigne($morceau->periodeMiseEnLigne);
        }catch (\Exception $e){
            $dataError['PeriodeMiseEnLigne']=$e->getMessage();
        }

    }

    public static function getValidInstance(&$dataError,&$inputArray,$policy = \ProjetPHP\Controleur\ValidationUtils::SANITIZE_POLICY_DISCARD_HTML_NOQUOTE){
        //Construction d'une instance filtrée
        MorceauValidation::validationInput($inputArray,$morceau,$policy);
        //validation suivant la logique métier
        self::validateInstance($dataError,$morceau);
        return $morceau;
    }
}