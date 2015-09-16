<?php
include "header.php";



// define variables and set to empty values
$user = $email = $password = $confirmPassword = $language = $image = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = test_input($_POST["user"]);
    $email = test_input($_POST["email"]);
    $password = test_input($_POST["password"]);
    $confirmPassword = test_input($_POST["confirmPassword"]);
   $language = test_input($_POST["language"]);
    $image = test_input($_POST["image"]);



    if ($_POST["password"] == $_POST["confirmPassword"]) {
        $bd = connexionBD();
        $requeteSelect = $bd->prepare("SELECT * from user");

        if (strlen($password) > 5){

            header("location: Login.php");
        }

    }



}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function validateForm($password, $confirmPassword){
    if (strcmp($password,$confirmPassword)){
        return false;
    }
}

?>


<link rel="stylesheet" type="text/css" href="create_user.css">

    <script src="create_user.js"></script>


<div class="page-header">
    <h2>Création d'utilisateur</h2>
</div>

    <form method="post" ction="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" role="form">

        <div class="form-group">
            <label for="userName">Nom d'utilisager:</label>
            <input type="text" class="form-control" name="user" id="userName" value="<?php echo $user?>"  required="required">
        </div>
        <div class="form-group">
            <label for="pwd">Mot de passe:</label>
            <input type="password" class="form-control" min="6" name="password" id="pwd" value="<?php echo $password?>" required="required" >

        </div>
        <div class="form-group">
            <label for="confirmPwd">Confirmation mot de passe:</label>
            <input type="password" class="form-control" min="6" id="confirmPwd" m name="confirmPassword" value="<?php echo $confirmPassword?>" required="required" onkeyup="checkPass(); return false;">
            <span id="confirmMessage" class="confirmMessage"></span>
</div>

        <div class="form-group">
            <label for="email">Adresse email:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $email?>" required="required">
        </div>
        <div class="form-group">
            <label for="Groupe">Langue : </label>
            <select class="form-control" name="language">
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
                        <input type="file" accept="image/png, image/jpeg, image/gif" name="image" id="avatar" required="required"/> <!-- rename it -->
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

    <script type="text/javascript">
        //let's hide the errors on page load
        $(document).ready(function() {
            $('.error').hide();
        });

        var validate = function(element) {
            if ($(element).value == "undefined" || $(element).value == undefined
                || $(element).value == null || $(element).value == "null") {
                return false;
            } return true;
        }

        function checkPass()
        {
            //Store the password field objects into variables ...
            var pass1 = document.getElementById('pwd');
            var pass2 = document.getElementById('confirmPwd');
            //Store the Confimation Message Object ...
            var message = document.getElementById('confirmMessage');
            //Set the colors we will be using ...
            var goodColor = "#66cc66";
            var badColor = "#ff6666";
            //Compare the values in the password field
            //and the confirmation field
            if(pass1.value == pass2.value){
                //The passwords match.
                //Set the color to the good color and inform
                //the user that they have entered the correct password
                pass2.style.backgroundColor = goodColor;
                message.style.color = goodColor;
                message.innerHTML = "Les mots de passe sont identique"
            }else{
                //The passwords do not match.
                //Set the color to the bad color and
                //notify the user.
                pass2.style.backgroundColor = badColor;
                message.style.color = badColor;
                message.innerHTML = "Les mots de passe ne sont pas identique"
            }
        }

    </Script>
<?php

echo "<h2>Your Input:</h2>";
echo $user;
echo "<br>";
echo $email;
echo "<br>";
echo $password;
echo "<br>";
echo $confirmPassword;
echo "<br>";
echo $image;
?>


<?php
include "footer.php";
?>