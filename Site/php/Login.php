<?php
include "header.php";

if (isset($_SESSION['userid'])){
	header('location:index.php');
}
?>

<form class="form-signin" action="traitement_login.php" method="post">
    <h2 class="form-signin-heading">Connection</h2>
    <label for="inputEmail" class="sr-only">Adresse email</label>
    <input type="email" id="inputEmail" class="form-control" placeholder="Adresse Email" required="" autofocus="" name="inputEmail" value="<?php if (isset($_COOKIE['user_email'])){echo $_COOKIE['user_email'];}?>">
	</br>
	<label for="inputPassword" class="sr-only">Mot de passe</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Mot de passe" required="" name="inputPassword">
    <div class="checkbox">
        <label>
            <input type="checkbox" value="true" name="rememberMe"> Se souvenir de moi
        </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>
	<span><a href="forgotten_password.php">Mot de de passe oublié?</a></span>
    <span class="pull-right"><a href="create_user.php">Nouvel usager</a></span>
</form>


<?php
include "footer.php";
?>