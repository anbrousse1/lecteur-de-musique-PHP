<?php
/**
 * Created by PhpStorm.
 * User: antho
 * Date: 21/12/2016
 * Time: 20:06
 */
$rootDirectory = dirname(__FILE__)."/";
require_once ($rootDirectory.'/Config/Autoload.php');
\ProjetPHP\Config\Autoload::load_PSR_4('ProjetPHP\\');



$mg=new ProjetPHP\DAL\MorceauGateway();

$cg=new ProjetPHP\DAL\CommentaireGateway();
/*
$date = date('d-m-Y H:i:s');
echo $date;
/*
$a="salut";
if($a=="salut"){
    echo "ok";
}*/
/*
$nom="Apologie";
$tab=$cg->getNbCommentaire($dataError,$nom);
foreach ($tab as $ligne){
    echo $ligne;
}

$r=$cg->ajoutCommentaire();
foreach ($r as $item) {
    echo $item;
}

$nom="Apologie";
$tab=$cg->getNbCommentaire($dataError,$nom);
foreach ($tab as $ligne){
    echo $ligne;
}
/*
$nom="Apologie";
$tab=$mg->getTitreByNom($dataError,$nom);
echo $tab->titre;
echo $tab->chemin;
echo $tab->nbAvisDeFav;/*

*/
/*
echo "<audio controls=\"controls\"preload=\"none\">
                        <source src="."\"".$tab->chemin."\""."type=\"audio/mp3\" />
                        Votre navigateur n'est pas compatible
                    </audio>";

$tab=$mg->getAll();

foreach ($tab as $ligne){
    echo $ligne->toHTML();
}*/
//$nom = "selfie";
//$tab = $mg->getTitreByNom($nom);
//echo $tab;

?>