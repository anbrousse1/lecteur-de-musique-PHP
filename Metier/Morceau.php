<?php
/**
 * Created by PhpStorm.
 * User: antho
 * Date: 13/12/2016
 * Time: 11:30
 */

namespace ProjetPHP\Metier;

/**
 * Class Morceau
 * @package Metier
 * Cette classe correspond au morcau de musique.
 */
class Morceau
{
    /**
     * @var titre du morceau
     */
    public $titre;
    public function getTitre(){return $this->titre;}
    public function setTitre($titre){$this->titre = $titre;}

    /**
     * @var auteur du morceau
     */
    public $auteur;
    public function getAuteur(){return $this->auteur;}
    public function setAuteur($auteur){$this->auteur = $auteur;}

    /**
     * @var chemin de la photo du morceau
     */
    public $chemin;
    public function getChemin(){return $this->chemin;}
    public function setChemin($chemin){$this->chemin = $chemin;}

    /**
     * @var nombre d'avis favorable du morceau
     */
    public $nbAvisFav;
    public function getNbAvisFav(){return $this->nbAvisFav;}
    public function setNbAvisFav($nbAvisFav){$this->nbAvisFav = $nbAvisFav;}

    /**
     * @var nombre d'avis défavorable du morceau
     */
    public $nbAvisDeFav;
    public function getNbAvisDeFav(){return $this->nbAvisDeFav;}
    public function setNbAvisDeFav($nbAvisDeFav){$this->nbAvisDeFav = $nbAvisDeFav;}

    /**
     * @var nombre d'avis indifférent du morceau
     */
    public $nbAvisIndif;
    public function getNbAvisIndif(){return $this->nbAvisIndif;}
    public function setNbAvisIndif($nbAvisIndif) {$this->nbAvisIndif = $nbAvisIndif;}

    /**
     * @var details concernant le morceau
     */
    public $details;
    public function getDetails(){return $this->details;}
    public function setDetails($details){$this->details = $details;}

    /**
     * @var durée d'écoute du morceau
     */
    public $dureeEcoute;
    public function getDureeEcoute(){return $this->dureeEcoute;}
    public function setDureeEcoute($dureeEcoute){$this->dureeEcoute = $dureeEcoute;}

    /**
     * @var année de parution du morceau
     */
    public $anneeParution;
    public function getAnneeParution(){return $this->anneeParution;}
    public function setAnneeParution($anneeParution){$this->anneeParution = $anneeParution;}

    /**
     * @var periode de mise en ligne du morceau
     */
    public $periodeMiseEnLigne;
    public function getPeriodeMiseEnLigne(){return $this->periodeMiseEnLigne;}
    public function setPeriodeMiseEnLigne($periodeMiseEnLigne){$this->periodeMiseEnLigne = $periodeMiseEnLigne;}

    /**
     * Morceau constructor.
     * @param $titre
     * @param $auteur
     * @param $chemin
     * @param $nbAvisFav
     * @param $nbAvisDeFav
     * @param $nbAvisindif
     * @param $details
     * @param $dureeEcoute
     * @param $anneParution
     * @param $periodeMiseEnLigne
     */
    public function __construct($titre,$auteur,$chemin,$nbAvisFav,$nbAvisDeFav,$nbAvisIndif,$details,$dureeEcoute,$anneeParution, $periodeMiseEnLigne)
    {
        $this->setTitre($titre);
        $this->setAuteur($auteur);
        $this->setChemin($chemin);
        $this->setNbAvisFav($nbAvisFav);
        $this->setNbAvisDeFav($nbAvisDeFav);
        $this->setNbAvisIndif($nbAvisIndif);
        $this->setDetails($details);
        $this->setDureeEcoute($dureeEcoute);
        $this->setAnneeParution($anneeParution);
        $this->setPeriodeMiseEnLigne($periodeMiseEnLigne);
    }

    public function toHTML()
    {
        $mess = $this->getTitre()." de ".$this->getAuteur()." ".$this->getDetails()." paru en ".$this->getAnneeParution()." durée d'écoute : ".$this->getDureeEcoute()
            ." Mise en ligne :".$this->getPeriodeMiseEnLigne()."<br/>";
        return $mess;
    }


    public static function getDefaultInstance(){
        $morceau = new self("","","","","","","","","","");
        return $morceau;
    }


}