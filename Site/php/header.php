<?php
session_start();
ob_start();
include "dbconnector.php";
include "generalFunctions.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8">
    <script src="../jquery-2.1.4.min.js"></script>
    <script src="../css/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
</head>

<body>

    <div class="navbar-wrapper">
        <div class="container-fluid">
            <nav class="navbar navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.php">Accueil</a>

                    </div>
                    <div id="navbar" class="dropdown">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="#" class="">Home</a></li>

                            <li class="dropdown"><a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Departments <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">View Departments</a></li>
                                    <li><a href="#">Add New</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Managers <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">View Managers</a></li>
                                    <li><a href="#">Add New</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Staff <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">View Staff</a></li>
                                    <li><a href="#">Add New</a></li>
                                    <li><a href="#">Bulk Upload</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">HR <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Change Time Entry</a></li>
                                    <li><a href="#">Report</a></li>
                                </ul>
                            </li>

                        </ul>
                        <ul class="nav navbar-nav pull-right" class="dropdown-menu dropdown-menu-right">
                                <?php 
								if(isset($_SESSION['userid'])){
									echo "<li class=\" dropdown\"><a href=\"#\" class=\"dropdown-toggle active\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"\" aria-expanded=\"false\">".get_username($_SESSION['userid'])."<span class=\"caret\"></span></a>";
										echo "<ul class=\"dropdown-menu\">";
											echo "<li><a href=\"#\">Change Password</a></li>";
											echo "<li><a href=\"#\">My Profile</a></li>";
										echo "</ul>";
									echo "</li>";
									echo "<li class=\"\"><a href=\"traitement_logout.php\">Déconnexion</a></li>";
                                }
								else{
									echo "<li class=\" dropdown\"><a href=\"#\" class=\"dropdown-toggle active\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"\" aria-expanded=\"false\">Visiteur<span class=\"caret\"></span></a>";
										echo "<ul class=\"dropdown-menu\">";
											echo "<li><a href=\"#\">Créer un usager</a></li>";
										echo "</ul>";
									echo "</li>";
									echo "<li class=\"\"><a href=\"Login.php\">Connexion</a></li>";
								}
                                ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</br>
</br>
    <div class="container">
