<?php
    include_once '../application_files/back_end/be-validation_functs.php';
    
    if(isset($_POST['submit'])) {
        include_once '../application_files/back_end/be-registration.php'; 
    }    
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    
<title>SignUp</title>
<link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
<link rel="manifest" href="site.webmanifest">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
 integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

 <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
 crossorigin="anonymous"></script>
 
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<?php $currentPage = 'SignUp'; ?>
<?php include'../application_files/commons/navbar.php';?>

</head>
<body>
<div id= "mydiv" class="container">
    <div class="input-group">
        <div class="row">
            <div class="col-sm-4">
                <h1>Create your account:</h1>
            </div>
            <div class="col-sm-4">
                <form id="myform" action="registration.php" method="POST">
                    <div class="form-group">
                        <label class="label" for="firstname">First name:</label><br>
                        <input class="form-control" type="text" id="firstname" name="firstname" required><br>
                    </div>  
                    <div class="form-group">
                        <label class="label" for="lastname">Last name:</label><br>
                        <input class="form-control" type="text" id="lastname" name="lastname" required><br>
                    </div>    
                    <div class="form-group">    
                        <label class="label" for="email">Email:</label><br>
                        <input class="form-control" type="email" id="email" name="email" required><br>
                    </div>    
                    <div class="form-group">  
                        <label class="label" for="pass">Password:</label><br>
                        <input class="form-control" type="password" id="pass" name="pass" required><br>
                    </div>
                    <div class="form-group">  
                        <label class="label" for="confirm">Confirm Password:</label><br>
                        <input class="form-control" type="password" id="confirm" name="confirm" required><br><br>
                    </div>
                    <div class="form-group">
                        <label class="label" for="country">Country (optional):</label><br>
                        <input class="form-control" type="text" id="country" name="country"><br>
                    </div>
                    <div class="form-group">
                        <label class="label" for="phone_number">Phone Number (optional):</label><br>
                        <input class="form-control" type="tel" id="phone_number" pattern="[0-9]{10}" name="phone_number"><br>
                        <small>Format: 0123456789</small><br><br>
                    </div>      
                    <div class="form-group">
                        <label class="label" for="address">Address (optional):</label><br>
                        <input class="form-control" type="text" id="address" name="address"><br>
                    </div>
                    <div class="form-group">
                        <label class="label" for="zipcode">Zipcode (optional):</label><br>
                        <input class="form-control" type="text" id="zipcode" name="zipcode"><br>
                    </div>
                    <div class="form-group">
                        <label class="label" for="nickname">Nickname (optional):</label><br>
                        <input class="form-control" type="text" id="nickname" name="nickname"><br>
                    </div>
                    <div class="form-group">      
                        <input type="submit" id="input-submit" class="btn btn-success" value="Submit" name="submit">
                    </div>
                </form>    
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>
</div>

<?php

    if (isset($_GET["error"])) {

        if($_GET["error"] == "emptyinput"){
            echo '<p class="warning">Fill in all required fields!</p>';
        }
        else if ($_GET["error"] == "invalidfirstname") {
            echo '<p class="warning">Use only letters for your first name!</p>';

        }
        else if ($_GET["error"] == "invalidlastname") {
            echo '<p class="warning">Use only letters for your last name!</p>';

        }
        else if ($_GET["error"] == "invalidemail") {
            echo '<p class="warning">Choose a valid email!</p>';
        }
        else if ($_GET["error"] == "pwdwrongmatch") {
            echo '<p class="warning">The passwords do not match!</p>';
        }
        
        else if ($_GET["error"] == "stmtfailed") {
            echo '<p class="warning">Something went wrong sing up again!</p>';
        }
        else if ($_GET["error"] == "none") {
            echo '<p class="warning">You have signed up!</p>';
            
        } 
        else if($_GET["error"] == "invalidCountry") {
            echo '<p class="warning">Use only letters for your country name!</p>';
        }
        
}

   include'../application_files/commons/footer.php';
?>
</body>
</html>
