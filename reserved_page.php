<!DOCTYPE html>
<html lang="en">  
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
<title>Reserved</title> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
 integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
 crossorigin="anonymous"></script>  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
</head>
<body>


<link rel="stylesheet" type="text/css" href="styles.css">
<?php $currentPage = 'Reserved'; ?>
<?php include'commons/navbar.php'; ?>
<?php require_once 'back_end/toppings.php'; ?>
<?php
function checkbox_topping_name($topping_name) {
return <<<HTML
    <option value="{$topping_name}">{$topping_name}</option>
HTML;
}
?>



<div class="container rounded profilediv mt-5">
    <div id="search">
        <form method="post" action="/back_end/pizza_search.php">
            <h1>SEARCH</h1>
            <input type="text" class="myform" name="pizza_name">
            <select class="selectpicker" name="topping_names[]" multiple data-live-search="true">
            <?php 
                $toppings = get_toppings();
                foreach($toppings as $topping) {
                    $topping_name = $topping['name'];
                    echo checkbox_topping_name($topping_name);
                }
            ?> 
            </select>
            <button type="submit" class="btn btn-primary profile-button" value="Search">Search</button>
        </form>
    </div>
    <div class="container rounded profilediv mt-5">
        <?php
        if (isset($_SESSION['pizzas'])) {
            $pizzas = $_SESSION['pizzas'];
            echo '<table id="search-result">';
                echo '<tr>';
                    echo '<th>N°</th>';
                    echo '<th>PIZZA</th>';
                    echo '<th>PRICE</th>';
                    echo '<th>ADD TO CART</th>';
                echo '</tr>';
            foreach($pizzas as $pizza) {
                echo '<tr>';
                    echo '<td>'.$pizza["id"].'</td>';
                    echo '<td>'.$pizza["name"].'</td>';
                    echo '<td>'.$pizza["price"].'</td>';
                    echo '<td>';
                    echo '<button ';
                    echo ' class="btn btn-primary profile-button add-to-cart" ';
                    echo ' data-name="'.$pizza["name"].'" ';
                    echo ' type="button">';
                    echo 'Add';
                    echo '</button>';
                    echo '</td>';
                echo '</tr>';
            }
            echo '</table>';
            echo '<br>';
        }
        ?>
    </div>
    <div id="cart">
    </div>
</div>


<script src="js/shopping-cart.js"></script>
<script>
    $("#search-result").on("click", ".add-to-cart", function(event){
        var name = $(this).attr("data-name");
        shoppingCart.addToCart(name, 1);
        displayCart();
    });


    var displayCart = function() {
        console.log("displayCart");
        cart = shoppingCart.getCart();

        $("#cart").html(JSON.stringify(cart));
        
    }

    displayCart();
</script>


</body>
</html>