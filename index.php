<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    
<title>Homepage</title>
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
        <p>You can bet we're busy!</p>
    </div>
    </div>
    <div class="container">
        <div class="row">        
            <div class="col-md-6 col-sm-6 text-right">
                <img id="oven2" src="imgs/pizzeria-forno-a-legna.jpg" alt="pizza in oven" width="500" height="300">
            </div>
            <div class="col-md-6 col-sm-6">
                <p>Some text heree</p>
                <h1>WHO are we?:</h1>      
                <p>Some text here </p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">        
            <div class="col-md-6 col-sm-6 ">
                <p>Some text heree</p>
                <h1>WHY are we the best?:</h1>      
                <p>Some text here </p>
            </div>
            <div class="col-md-6 col-sm-6">
                <img id="oven2" src="imgs/farmers.jpeg" alt="farmers" width="500" height="300">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">        
            <div class="col-md-6 col-sm-6 text-right">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d93645.49128007505!2d-106.39491936801414!3d42.821707319264405!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87609365c85e7a63%3A0x69cefc3917343e53!2sCasper%2C%20Wyoming%2C%20Stati%20Uniti!5e0!3m2!1sit!2sit!4v1621334286998!5m2!1sit!2sit" width="500" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="col-md-6 col-sm-6">
                <p>Some text heree</p>
                <h1>WHERE are we?:</h1>      
                <p>Some text here </p>
            </div>
        </div>
    </div>
    
</body>
</html>
