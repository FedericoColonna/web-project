<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    
<title>Login</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
 integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
 crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<?php $currentPage = 'Login'; ?>
<?php include'commons/navbar.php';?>
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
                <form action="/back_end/login.php" method="POST">
                    <div class="form-group"> <input type="email" id="email" name="email" class="form-control" placeholder="Email"> </div>
                    <div class="form-group"> <input type="password" class="form-control" id="pass" name="pass" placeholder="Password"> </div>
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group form-check"> <input type="checkbox" class="form-check-input" id="exampleCheck1"> <label class="form-check-label" for="exampleCheck1">Keep me logged in</label> </div>
                        </div>
                        <div class="col-md-6 col-12 bn">link</div>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" name="login" class="btn btn-block btn-lg"><i>Login</i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php

    if (isset($_GET["error"])) {

        if($_GET["error"] == "emptyinput"){
            echo "<p>Fill in all fields!</p>";
        }
        else if ($_GET["error"] == "wronglogin") {
            echo "<p>Incorrect login information!</p>";

        }
        
}
?>
</body>
</html>
