<?php
include "header.php";
?>

<div class="page-header">
    <h2>Création d'utilisateur</h2>
</div>

    <form role="form">
        <div class="form-group">
            <label for="userName">Nom d'utilisager:</label>
            <input type="text" class="form-control" id="userName">
        </div>
        <div class="form-group">
            <label for="pwd">Mot de passe:</label>
            <input type="password" class="form-control" id="pwd">
        </div>
        <div class="form-group">
            <label for="confirmPwd">Confirmation mot de passe:</label>
            <input type="password" class="form-control" id="confirmPwd">
        </div>
        <div class="form-group">
            <label for="email">Adresse email:</label>
            <input type="email" class="form-control" id="email">
        </div>
        <div class="form-group">
            <label for="Groupe">Langue : </label>
            <select class="form-control">
                <option>FR</option>
                <option>EN</option>
            </select>
        <div class="checkbox">
            <label><input type="checkbox" class="checkbox"> Remember me</label>
        </div>
        <div class="btn-group-vertical">
            <button type="submit" class="btn-primary">Enoyer</button>
        </div>


    </form>

<?php
include "footer.php";
?>