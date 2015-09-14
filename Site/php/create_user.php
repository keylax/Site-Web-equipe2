<?php
include "header.php";
?>

    <div class="container-fluid">
        <div class="page-header">
            <h1>Creation d'utilisateur</h1>
        </div>
        <form name="connexion" id="connexion" action="login.php" onsubmit="return message(this)" method="post"  class="form-group">
            <div class="form-group">
                <label for="Nom">Nom : </label>
                <td><input type="text" name="user" id="user" class="form-control" /></td>
            </div>
            <div class="form-group">
                <label for="Mot de passe">Mot de passe : </label>
                <td><input type="password" name="motdepasse" id="motdepasse" class="form-control" /></td>
            </div>
            <div class="form-group">
                <label for="adresse courriel">Adresse courriel : </label>
                <td><input type="text" name="adresse courriel" id="adresse courriel" class="form-control" /></td>
            </div>
            <div class="form-group">
                <label for="numeroTel">Numéro de téléphone : </label>
                <td><input type="text" name="numeroTel" id="numeroTel" class="form-control" /></td>
            </div>
            <input type="submit" name="envoyer" id="envoyer" value="Envoyer" class="btn-primary" /></td>

            <div id="resultat"></div>
        </form>
    </div>


<?php
include "footer.php";
?>