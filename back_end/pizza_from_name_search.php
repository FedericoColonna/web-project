<?php
    session_start();
    if (isset($_POST['pizza_name'])) {
        require_once 'db-pizza.php';

        $pizza_name = $_POST['pizza_name'];
        $pizza = getPizza($pizza_name);

        $_SESSION['pizza'] = $pizza;
        header("Location: ../reserved_page.php?error=none");
    } else{
        header("Location: ../reserved_page.php");
    }