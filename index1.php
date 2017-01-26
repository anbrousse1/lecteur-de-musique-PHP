<?php
session_start();
$rootDirectory = dirname(__FILE__)."/";
require_once ($rootDirectory.'/Config/Autoload.php');
\ProjetPHP\Config\Autoload::load_PSR_4('ProjetPHP\\');

$urlWithoutQueryString = explode("?",$_SERVER['REQUEST_URI'])[0];
$scriptWithoutExtension = explode(".php",$_SERVER['REQUEST_URI'])[0];
$longueurRootURI = strrpos($scriptWithoutExtension,'/');
$rootURI = substr($_SERVER['REQUEST_URI'],0,$longueurRootURI);

// création de l'instance du controleur
$cont = new \ProjetPHP\Controleur\Controleur();

?>

