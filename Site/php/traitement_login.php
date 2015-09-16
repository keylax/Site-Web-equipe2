<?php
include "header.php";
?>
<?php

if(isset($_POST['submit'])) { 
	$bd = connexionBD();
	$emailAdress = $_POST["inputEmail"];
	$password = $_POST["inputPassword"];
	$rememberMe = $_POST["rememberMe"];
	
	if (user_exists($emailAdress)){
		$requeteSelect = $bd->prepare("SELECT PASSWORD, ID_USER from user where EMAIL = :emailAdress"); 

		$requeteSelect->execute(array("emailAdress" => $emailAdress));

		while($lignes=$requeteSelect->fetch(PDO::FETCH_OBJ))
		{
			if ($lignes->PASSWORD == $password){
				if (!isset($_SESSION['userid'])){
					$_SESSION['userid'] = $lignes->ID_USER;
					
					if ($rememberMe == 'true'){
						setcookie('user_email', $emailAdress, time()+3600);	
						setcookie('user_password', $lignes->PASSWORD, time()+3600);
					}
					
					$requeteSelect->closeCursor();
					unset($bd);
					
					header('location:index.php');
				}
			}
			else {
				header('location:bad_login.php');
			}
		}
		
	}
	else {
		header('location:bad_login.php');
	}
}


?>
