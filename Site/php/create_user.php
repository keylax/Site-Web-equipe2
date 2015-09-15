<?php
include "header.php";
?>


<link rel="stylesheet" type="text/css" href="create_user.css">

    <script src="create_user.js"></script>


<div class="page-header">
    <h2>Création d'utilisateur</h2>
</div>

    <form  role="form">

        <div class="form-group">
            <label for="userName">Nom d'utilisager:</label>
            <input type="text" class="form-control" name="" id="userName"  required="required">
        </div>
        <div class="form-group">
            <label for="pwd">Mot de passe:</label>
            <input type="password" class="form-control" name="password" id="pwd"  required="required" >

        </div>
        <div class="form-group">
            <label for="confirmPwd">Confirmation mot de passe:</label>
            <input type="password" class="form-control" id="confirmPwd" name="confirmPassword"  required="required">
        </div>
        <div class="form-group">
            <label for="email">Adresse email:</label>
            <input type="email" class="form-control" id="email"  required="required">
        </div>
        <div class="form-group">
            <label for="Groupe">Langue : </label>
            <select class="form-control">
                <option>FR</option>
                <option>EN</option>
            </select>

            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                        <!-- image-preview-filename input [CUT FROM HERE]-->
                        <label for="Groupe">Avatar : </label>
                        <div class="input-group image-preview">
                            <input type="text" class="form-control image-preview-filename" disabled="disabled" > <!-- don't give a name === doesn't send on POST/GET -->
                <span class="input-group-btn">
                    <!-- image-preview-clear button -->
                    <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                        <span class="glyphicon glyphicon-remove"></span> Clear
                    </button>
                    <!-- image-preview-input -->
                    <div class="btn btn-default image-preview-input">
                        <span class="glyphicon glyphicon-folder-open"></span>
                        <span class="image-preview-input-title">Browse</span>
                        <input type="file" accept="image/png, image/jpeg, image/gif" name="input-file-preview" id="avatar" required="required"/> <!-- rename it -->
                    </div>
                </span>
                        </div><!-- /input-group image-preview [TO HERE]-->
                    </div>
                </div>
            </div>
        <div class="btn-group-vertical">
            <button type="submit" class="btn-primary" >Enoyer</button>
        </div>
    </form>




<?php
include "footer.php";
?>