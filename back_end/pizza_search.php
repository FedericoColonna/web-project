<?php
    session_start();
    if (isset($_POST['pizza_name'])) {
        require_once 'db-topping.php';
        require_once 'db-pizza_topping.php';
        require_once 'db-pizza.php';



        $pizza_ids_to_return = array_map(function($pizza){
            return $pizza["id"];
        }, getAllPizzas());

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
            $pizza_name_to_search = $_POST['pizza_name'];
            $unfiltered_pizzas = getPizzas($pizza_ids_to_return);
            if (empty($pizza_name_to_search)) {
                $_SESSION['pizzas'] = $unfiltered_pizzas;
            } else {
                $_SESSION['pizzas'] = array_filter($unfiltered_pizzas, function($pizza) use($pizza_name_to_search){
                    return strpos($pizza["name"], $pizza_name_to_search) !== false;
                    //return true;
                });
            }
        }

        header("Location: ../reserved_page.php?error=none");
    } else{
        header("Location: ../reserved_page.php");
    }

    function extract_pizza_id($pizza_topping_id) {
        return $pizza_topping_id["pizza_id"];
    }
