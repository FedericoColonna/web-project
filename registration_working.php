<?php

function containsAllMandatoryFields($user) {
    if (empty($user["email"]) || empty($user["password"]) || empty($user["firstname"]) || empty($user["lastname"]) || empty($user["confirm"])){
        return false;
    }
    return true;
}

function emptyOptionalField($value) {
    if(empty($value)){
        return true;
    }
    return false;
}

function containsOnlyLetter($value) {
    if(preg_match("/^[a-zA-Z]*$/", $value)) {
        return true;
    }
    return false;
}

function isValidEmail($email){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    }
    return false;
  
}
   
function passwordMatch($password, $password_to_check) {
        if($password == $password_to_check) {
            return true;
        }
        return false;
    }

function emailAlreadyRegistered($email){
        $user = getUser($email);
        if (!is_null($user["id"])) {
            return true;
        }
        return false;
    }



    
if(isset($_POST['submit'])) {
        require_once 'back_end/db-user.php';

        $user["firstname"] = trim($_POST['firstname']);
        $user["lastname"] = trim($_POST['lastname']);
        $user["email"] = trim($_POST['email']);
        $user["password"] = trim($_POST['pass']);
        $user["confirm"] = trim($_POST['confirm']);
        $user["country"] = isset($_POST['country']) ? trim($_POST['country']) : "country";
        $user["phone_number"] = isset($_POST['phone_number']) ? trim($_POST['phone_number']) : "123456789";
        $user["address"] = isset($_POST['address']) ? trim($_POST['address']) : "address";
        $user["zipcode"] = isset($_POST['zipcode']) ? trim($_POST['zipcode']) : "1234";
        $user["nickname"] = isset($_POST['nickname']) ? trim($_POST['nickname']) : "nickname";
        
    
        if (!containsAllMandatoryFields($user)) {
            header("Location: /registration.php?error=emptyinput");
            exit();
        } if (!containsOnlyLetter($user["firstname"])) {
            header("Location: /registration.php?error=invalidfirstname");
            exit();
        } if (!containsOnlyLetter($user["lastname"])) {
            header("Location: /registration.php?error=invalidlastname");
            exit();
        } if (!containsOnlyLetter($user["country"])) {
            header("Location: /registration.php?error=invalidCountry");
            exit();
        } if (!isValidEmail($user["email"])) {
            header("Location: /registration.php?error=invalidemail");
            exit();
        } if (!passwordMatch($user["password"], $user["confirm"])) {
            header("Location: /registration.php?error=pwdwrongmatch");
            exit();
        } if (emailAlreadyRegistered($user["email"])) {
            header("Location: /registration.php?error=stmtfailed");
            exit();
        }if (emptyOptionalField($user["country"])) {
            $user["country"] = NULL;
        }if (emptyOptionalField($user["phone_number"])) {
            $user["phone_number"] = NULL;
        }    
        $user["hashed_password"] = password_hash($user["password"], PASSWORD_DEFAULT);
          
    if (createUser($user) == -1) {
        header("Location: /registration.php?error=stmtfailed");
    } else {
        header("Location: /login.php?error=none");
    }
    
    exit();
}    
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    
<title>SignUp</title>
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
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
            <div class="col-sm-4">
                <h1>Create your account:</h1>
            </div>
            <div class="col-sm-4">
                <form id="myform" action="/registration.php" method="POST">
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
?>
 <?php include'commons/footer.php';?>
</body>
</html>
