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



<div class="container rounded profilediv mt-5">
    <div>
        <form method="post" action="/back_end/pizza_from_name_search.php">
        <h1>SEARCH FOR PIZZAS FROM NAME</h1>
        <div>
            <input type="text" class="myform" name="pizza_name">
            <button type="submit" class="btn btn-primary profile-button" id="search-btn1" value="Search">Search</button>
        </div>
        </form>
        <div class="container rounded profilediv mt-5">
            <?php
                if (isset($_SESSION['pizza'])) {
                    $pizza = $_SESSION['pizza'];

                        echo '<table>';
                            echo '<tr>';
                                echo '<th>N°</th>';
                                echo '<th>PIZZA</th>';
                                echo '<th>PRICE</th>';
                            echo '</tr>';
                            echo '<tr>';
                                echo '<td>'.$pizza["id"];'</td>';
                                echo '<td>'.$pizza["name"];'</td>';
                                echo '<td>'.$pizza["price"];'</td>';
                            echo '</tr>';
                        echo '</table>';
                        echo '<br>';
                }
            ?>
        </div>
    </div>

    <div>
        <form method="post" action="/back_end/pizza_from_toppings_search.php">
            <h1>SEARCH FOR PIZZAS FROM TOPPINGS</h1>
            <input type="text" class="form-control" name="topping_name1">
            <select name="topping_names[]" multiple>
                <option value="mozzarella">mozzarella</option>
                <option value="pomodoro">pomodoro</option>
                <option value="stracchino">stracchino</option>
                <option value="gorgonzola">gorgonzola</option>
            </select>
            <button type="submit" class="btn btn-primary profile-button" value="Search">Search</button>
        </form>
        <div class="container rounded profilediv mt-5">
            <?php
                if (isset($_SESSION['pizzas'])) {
                    $pizzas = $_SESSION['pizzas'];
                    echo '<table>';
                        echo '<tr>';
                            echo '<th>N°</th>';
                            echo '<th>PIZZA</th>';
                            echo '<th>PRICE</th>';
                        echo '</tr>';
                    foreach($pizzas as $pizza) {
                        echo '<tr>';
                            echo '<td>'.$pizza["id"];'</td>';
                            echo '<td>'.$pizza["name"];'</td>';
                            echo '<td>'.$pizza["price"];'</td>';
                        echo '</tr>';
                    }
                    echo '</table>';
                    echo '<br>';
                }
            ?>
        </div>
    </div>
</div>




</body>
</html>