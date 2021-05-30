<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    
<title>Homepage</title>
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

<?php $currentPage = 'Home'; ?>
<?php include'commons/navbar.php';?> 

</head>
<body>
    
    <div class="jumbotron jumbotron-fluid">
        <img src="imgs/BeeLogo4.png" alt="bee logo" width="300" height="200">
        <img src="imgs/Pizza-forno-a-legna.jpg" alt="oven" width="600" height="300">
    <div class="container">
        <h1 id="banner">Welcome to Lucky Bee's Pizza</h1>      
        <h2>You can bet we're busy!</h2>
    </div>
    </div>
    <div class="container">
        <div class="row">        
            <div class="col-md-6 col-sm-6 text-right">
                <img id="oven2" src="imgs/pizzeria-forno-a-legna.jpg" alt="pizza in oven" width="500" height="300">
            </div>
            <div  class="col-md-6 col-sm-6">
                <h1>WHO are we?:</h1>      
                <p>We're the best pizza place in town, come visit us in our pizzeria or 
                <a href="registration.php">SIGN UP</a> to get your order delivered home, either way you won't be disappointed buzz ;)</p>
            </div>
        </div>
    </div>
    <div id="cont2" class="container">
        <div class="row">      
            <div class="col-md-6 col-sm-6 text-right">
                <img id="farmers" src="imgs/farmers.jpeg" alt="farmers" width="500" height="300">
            </div>  
            <div class="col-md-6 col-sm-6 ">
                <h1>WHY are we the best?:</h1>      
                <p>For our pizzas we only use fresh produce ingredients, coming straight out of the farms of our trusted local farmers. </p>
            </div>
        </div>
    </div>
    <div id="cont3" class="container">
        <div class="row">        
            <div class="col-md-6 col-sm-6 text-right">
                <img id="town" src="imgs/casper.jpeg" alt="farmers" width="500" height="300">
            </div>
            <div class="col-md-6 col-sm-6">
                <h1>WHERE are we?:</h1>      
                <p>We are located in <a href="aboutus_page.php">CASPER</a>, a beautiful town of our gorgeous State: Wyoming.</p>
            </div>
        </div>
    </div>
    
    <?php include'commons/footer.php';?>
</body>
</html>
