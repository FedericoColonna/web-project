<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
<title>Cart</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
 integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
 crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>


<?php $currentPage = 'Cart'; ?>
<?php include'commons/navbar.php';?>
</head>
<body>
    <button class="add-to-cart">add to cart</button>
    <button class="remove-from-cart">remove from cart</button>
        

    <div id="cart">test</div>

    <div>
        <select class="selectpicker" multiple data-live-search="true">
            <option>Mustard</option>
            <option>Ketchup</option>
            <option>Relish</option>
        </select>
    </div>

    <script src="js/shopping-cart.js"></script>
    <script>
        $(".add-to-cart").click(function(event) {
            console.log(".add-to-cart");
            event.preventDefault();

            shoppingCart.addToCart('margherita', 1);
            displayCart();
        });
        $(".remove-from-cart").click(function(event) {
            console.log(".remove-from-cart");
            event.preventDefault();

            shoppingCart.removeFromCart('margherita');
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