
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    
  
<title>SignUp</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
 integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

 <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
 crossorigin="anonymous"></script>
 
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<?php $currentPage = 'SignUp'; ?>
<?php include'commons/navbar.php';?>
</head>
<body>
<div id= "mydiv" class="container">
    <div class="input-group">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <form id="myform" action="/back_end/registration.php" method="POST">
                    <div class="form-group">
                        <label for="firstname">First name:</label><br>
                        <input class="form-control"type="text" id="firstname" name="firstname"><br>
                    </div>  
                    <div class="form-group">
                        <label for="lastname">Last name:</label><br>
                        <input class="form-control" type="text" id="lastname" name="lastname"><br>
                    </div>    
                    <div class="form-group">    
                        <label for="email">Email:</label><br>
                        <input class="form-control" type="email" id="email" name="email"><br>
                    </div>    
                    <div class="form-group">  
                        <label for="pass">Password:</label><br>
                        <input class="form-control" type="password" id="pass" name="pass"><br>
                    </div>
                    <div class="form-group">  
                        <label for="password">Confirm Password:</label><br>
                        <input class="form-control" type="password" id="confirm" name="confirm"><br><br>
                    </div>
                    <div class="form-group">      
                        <input type="submit" class="btn btn-sm" value="Submit" name="submit">
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
            echo "<p>Fill in all fields!</p>";
        }
        else if ($_GET["error"] == "invalidfirstname") {
            echo "<p>Use only letters for your first name!</p>";

        }
        else if ($_GET["error"] == "invalidlastname") {
            echo "<p>Use only letters for your last name!</p>";

        }
        else if ($_GET["error"] == "invalidemail") {
            echo "<p>Choose a valid email!</p>";
        }
        else if ($_GET["error"] == "pwdwrongmatch") {
            echo "<p>The passwords do not match!</p>";
        }
        else if ($_GET["error"] == "emailalreadyregistered") {
            echo "<p>Email already registered!</p>";
        }
        else if ($_GET["error"] == "stmtfailed") {
            echo "<p>Something went wrong sing up again!</p>";
        }
        else if ($_GET["error"] == "none") {
            echo "<p>You have signed up!</p>";
        }
}
?>
</div>
</body>
</html>
