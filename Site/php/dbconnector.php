<?php

define("BD_HOTE", "127.0.0.1");
define("BD_NOM", "tp_web");
define("BD_UTILISATEUR", "root");
define("BD_MOT_PASSE", "");

function connexionBD(){
	try
	{
		
		$bdd = new PDO('mysql:host='.BD_HOTE.';dbname='.BD_NOM, BD_UTILISATEUR, BD_MOT_PASSE, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
		
		return $bdd;
	}
	catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}
}
?>

