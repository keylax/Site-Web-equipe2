<?php

function get_username($userid){
	$bd = connexionBD();
	$requeteSelect = $bd->prepare("SELECT NAME from user WHERE ID_USER = :id"); 
	
	$requeteSelect->execute(array('id' => $userid));
	while($lignes=$requeteSelect->fetch(PDO::FETCH_OBJ))
	{
		$name = $lignes->NAME;
		return $name;
	}
	$requeteSelect->closeCursor();

	unset($bd);
}

function user_exists($email){
	$bd = connexionBD();
	$requeteSelect = $bd->prepare("SELECT * from user"); 
	
	$requeteSelect->execute();
	while($lignes=$requeteSelect->fetch(PDO::FETCH_OBJ))
	{
		if ($lignes->EMAIL == $email){
			return true;
		}
	}
	$requeteSelect->closeCursor();

	unset($bd);
}


?>