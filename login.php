<?php   
    function emptyLogin($email, $password){
        if (empty($email) || empty($password)) {
            return true;
        }
        return false;
    }

    if (isset($_POST['submit'])) {
        require_once 'back_end/db-user.php';

        $email = $_POST['email'];
        $password = $_POST['pass'];

        if (emptyLogin($email, $password)) {
            header("Location: /login.php?error=emptyinput");
            exit();
        }
        $user = getUser($email);
        if (is_null($user["id"])) {
            header("Location: /login.php?error=wronglogin2");
            exit();
        }

        $hashed_password = $user["hashed_password"];
        $password_correct = password_verify($password, $hashed_password);
        
        if ($password_correct === false) {
            header("Location: /login.php?error=wronglogin3");
            exit();
        }
        session_start();
        $_SESSION["userid"] = $user["id"];
        $_SESSION["email"] = $email;

    
        header("Location: /show_profile.php");
        exit();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    
<title>Login</title>
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

<?php $currentPage = 'Login'; ?>
<?php include'commons/navbar.php'; ?>
  
    

</head>
<body>

<div class="container">
    <div class="row d-flex justify-content-center mt-5">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card py-3 px-2">
                <div class="division">
                    <div class="row">
                        <div class="col-3">
                        </div>
                        <div class="col-6"><span>SIGN IN</span></div>
                        <div class="col-3">    
                        </div>
                    </div>
                </div>
                <form action="/login.php" method="POST">
                    <div> <input class="loginfield" type="email" id="email" name="email" placeholder="Email"> </div>
                    <div> <input class="loginfield" type="password" id="pass" name="pass" placeholder="Password"> </div>
                    <div class="row">
                        <div class="col-md-6 col-12">
                            
                        </div>
                    
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" name="submit" class="btn btn-block btn-lg"><i>Login</i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php

    if (isset($_GET["error"])) {

        if($_GET["error"] == "emptyinput"){
            echo '<div id="error-box">';
            echo '<h5>Fill in all fields!</h5>';
            echo '</div>';
        }
        else if ($_GET["error"] == "wronglogin") {
            echo '<div id="error-box">';
            echo '<h5>Incorrect login information!</h5>';
            echo '</div>';
        }
        
}
?>
</body>
</html>
