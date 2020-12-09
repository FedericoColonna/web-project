<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    
<title>Login</title>
<link rel="stylesheet" href="node_modules/bootswatch/dist/cyborg/bootstrap.min.css">

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

                <div class="form-group has-success">
                    <label class="form-control-label" for="inputValid">Email</label>
                    <input id="email" type="email" name="email" class="form-control" id="inputValid">
                </div>
                <div class="form-group has-success">
                    <label class="form-control-label" for="inputValid">Password</label>
                    <input id="pass" type="password"  name="pass" class="form-control" id="inputValid">
                </div>

                    <div class="row">
                        <div class="col-md-6 col-12">
                            
                        </div>
                    
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" name="login" class="btn btn-primary">Login</button>
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
