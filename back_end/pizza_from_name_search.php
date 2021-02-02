<?php
    session_start();
    // $query1 = "SELECT @topping_id:=id FROM topping WHERE name ='pomodoro';";
    //$query2 = "SELECT @pizza_id:=pizza_id FROM pizza_topping WHERE topping_id=@topping_id;";
    //$query3 = "SELECT * FROM pizza WHERE id=@pizza_id;";
    if (isset($_POST['pizza_name'])) {
        require_once 'db-pizza.php';

        $pizza_name = $_POST['pizza_name'];
        $pizza = getPizza($pizza_name);

        $_SESSION['pizza'] = $pizza;
        header("Location: ../reservedpage.php?error=none");
    } else{
        header("Location: ../reservedpage.php");
    }