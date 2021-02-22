<?php
    session_start();

    if (isset($_POST['topping_names'])) {
        require_once 'db-topping.php';
        require_once 'db-pizza_topping.php';
        require_once 'db-pizza.php';

        $pizza_ids_to_return = [];
        $topping_names = $_POST['topping_names'];
        foreach ($topping_names as $topping_name) {
            $topping = getTopping($topping_name);
            $pizza_topping_ids = getPizzaToppingIds($topping["id"]);
            $pizza_ids = array_map('extract_pizza_id', $pizza_topping_ids);
          
            if (empty($pizza_ids_to_return)) {
                $pizza_ids_to_return = $pizza_ids;
            } else {
                $pizza_ids_to_return = array_intersect($pizza_ids_to_return, $pizza_ids);
            }
        }
        if (!empty($pizza_ids_to_return)) {
            $_SESSION['pizzas'] = getPizzas($pizza_ids_to_return);
        }
       
        header("Location: ../reserved_page.php?error=none");
    } else{
        header("Location: ../reserved_page.php");
    }

    function extract_pizza_id($pizza_topping_id) {
        return $pizza_topping_id["pizza_id"];
    }