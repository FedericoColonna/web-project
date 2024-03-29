<?php
    if (isset($_POST['pizza_name'])) {
        include_once '../application_files/back_end/be-pizza_search.php';
    } 
?>
<!DOCTYPE html>
<html lang="en">  
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
<title>Pizzas</title> 
<link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
<link rel="manifest" href="site.webmanifest">
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
<?php $currentPage = 'Pizzas'; ?>
<?php 
    include'../application_files/commons/navbar.php';
    if (!isset($_SESSION['userid'])) {
            header("Location: logout.php");
            exit;
    }
?>

<?php require_once '../application_files/back_end/toppings.php'; ?>
<?php
function checkbox_topping_name($topping_name) {
return <<<HTML
    <option value="{$topping_name}">{$topping_name}</option>
HTML;
}
?>

<div id="cart-container">
    <div id="cart-header" class="container rounded profilediv mt-5">
        <h1>Cart</h1>
    </div>
    <div id="cart2" class="container rounded profilediv mt-5">
        <table>
            <tr>
                <th>name</th>
                <th>price</th>
                <th>quantity</th>
                <th>total</th>
            </tr>
        </table>
        <div>
            Total: <span id='total-cart'>0</span>€
        </div>
    </div>
    <div id="cart-buttons" class="container rounded profilediv mt-5">
        <button onclick="endedTransaction();" class="btn btn-success">Pay</button> 
        <button id="clear-cart" class="btn btn-danger">Clear</button> 
    </div>
</div>
 
<div class="container rounded profilediv mt-5">
    <div class="input-group">
            <div id="search">
                <form method="post" action="pizzas_page.php">
                    <h1>PIZZA SEARCH:</h1>
                    <input type="text" class="search-bar" placeholder="Type a pizza's name" name="pizza_name">
                    <select class="selectpicker" name="topping_names[]" data-live-search="true" multiple>
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
                    echo '<td>'.$pizza["name"].'<br>'.$pizza["toppings"].'</td>';
                    echo '<td>'.$pizza["price"].'</td>';
                    echo '<td>';
                    echo '<button ';
                    echo ' onclick="change();"';
                    echo ' class="btn btn-primary profile-button add-to-cart" ';
                    echo ' data-name="'.$pizza["name"].'" ';
                    echo ' data-price="'.$pizza["price"].'" ';
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
        var price = $(this).attr("data-price");
        shoppingCart.addToCart(name, 1, price);
        displayCart();
    });

    var appendCartElement = function(element) {
        var price = element["price"];
        var quantity = element["quantity"];
        $("#cart2 > table").append(
            $("<tr data-name='" + element["name"] + "'>"
            + "<td>" + element["name"] + "</td>"
            + "<td>" + price + "€</td>"
            + "<td>" + quantity + "</td>"
            + "<td>" + price*quantity + "€</td>"
            + "</tr>")
        );
;
    }

    var displayCart = function() {
        console.log("displayCart");
        cart = shoppingCart.getCart();
        var total = 0;
        cart.forEach(cartElement => {
            console.log("cart element: " + JSON.stringify(cartElement));
            $("tr[data-name='" + cartElement["name"] + "']").remove();
            appendCartElement(cartElement);
            total += cartElement["quantity"] * cartElement["price"];
        });
        $("#total-cart").text(total);
    }

    $("#clear-cart").click(function(event){
        shoppingCart.clearCart();
        displayCart();
        $("tr[data-name").remove();
        $("#total-cart").text(0);
        document.getElementById("cart-container").style.visibility="hidden";
    });

    displayCart();
    
</script>
<?php include'../application_files/commons/footer.php';?>
</body>
</html>