<?php
include "header.php";
?>
<div class="container" style="margin-top:50px">
    <div class="row">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                          <h3><i class="fa fa-lock fa-4x"></i></h3>
                          <h2 class="text-center" style="color:red">Une erreure est survenue</h2>
                            <div class="panel-body">
								<ul style="list-style-type:none">
									  <li><span><a href="Login.php">Réessayer</a></span></li>
									  <li><span><a href="forgotten_password.php">Mot de de passe oublié?</a></span></li>
									  <li><span><a href="create_user.php">Pas de compte</a></span></li>
								</ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include "footer.php";
?>