<!DOCTYPE html>
<html lang="en">  
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
<title>Reserved</title> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
 integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
 crossorigin="anonymous"></script>  
</head>
<body>


<link rel="stylesheet" type="text/css" href="signupstyle.css">
<?php $currentPage = 'Reserved'; ?>
<?php include'commons/navbar.php'; ?>
<?php 
    if(isset($_SESSION['userid'])){
        echo "Welcome to the restricted area";
    }
    else{
        header("location: loginpage.php");
    }
?>

</body>
</html>