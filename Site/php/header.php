<?php
include "dbconnector.php"
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    //<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <script src="../jquery-2.1.4.min.js"></script>
    <script src="bootstrap.min.js"></script>



</head>

<body s>

    <div class="navbar-wrapper">
        <div class="container-fluid">
            <nav class="navbar navbar-static-top">
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
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="#" class="">Home</a></li>

                            <li class=" dropdown"><a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Departments <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">View Departments</a></li>
                                    <li><a href="#">Add New</a></li>
                                </ul>
                            </li>
                            <li class=" dropdown"><a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Managers <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">View Managers</a></li>
                                    <li><a href="#">Add New</a></li>
                                </ul>
                            </li>
                            <li class=" dropdown"><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Staff <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">View Staff</a></li>
                                    <li><a href="#">Add New</a></li>
                                    <li><a href="#">Bulk Upload</a></li>
                                </ul>
                            </li>
                            <li class=" down"><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">HR <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Change Time Entry</a></li>
                                    <li><a href="#">Report</a></li>
                                </ul>
                            </li>

                        </ul>
                        <ul class="nav navbar-nav pull-right">
                            <li class=" dropdown"><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <?php if(isset($_SESSION['user'])){
                                        echo $_SESSION["user"];
                                    }
                                    else echo "Visiteur";
                                    ?>
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="create_user.php"></a>kkkkk</li>
                                    <li><a href="#">My Profile</a></li>
                                </ul>
                            </li>
                            <li class=""><a href="Login.php">Login</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <div class="container" style="z-index: -1;">
