<?php
    session_start();
    //pizza_name is a string that may be empty
    //topping_names is an array of toppings that may be empty
    

    require_once 'db-topping.php';
    require_once 'db-pizza_topping.php';
    require_once 'db-pizza.php';

    $_SESSION['pizzas'] = [];

    $pizza_ids_to_return = array_map('extract_pizza_id_from_pizza', getAllPizzas());

    $topping_names = $_POST['topping_names'];
    foreach ($topping_names as $topping_name) {
        $topping = getTopping($topping_name);
        $pizza_topping_ids = getPizzaToppingsByToppingId($topping["id"]);
        $pizza_ids = array_map('extract_pizza_id_from_pizza_topping', $pizza_topping_ids);
        
        if (empty($pizza_ids_to_return)) {
            $pizza_ids_to_return = $pizza_ids;
        } else {
            $pizza_ids_to_return = array_intersect($pizza_ids_to_return, $pizza_ids);
        }
    }
    //pizza_ids_to_return contains only pizzas with all toppings in topping_names
    if (!empty($pizza_ids_to_return)) {
        $unfiltered_pizzas = getPizzas($pizza_ids_to_return);

        //1, 2, 3
        //1 ,4 ,9
        //[name= pomodor, id=2, costo=.5]
        $toppings = get_all_Toppings();
        //1 ,2, 3, 4
        //pippo, pluto, paperino, topolino
        //1 => pippo, 2 => pluto, ...
        $topping_ids = array_map('extract_topping_id_from_topping', $toppings);
        $topping_names = array_map('extract_topping_name_from_topping', $toppings);
        $id_to_topping_name_map = array_combine($topping_ids, $topping_names);
        //1 => mozzarella, 2=?
        for ($i = 0; $i < count($unfiltered_pizzas); $i++) {
            $pizza_topping_ids = getPizzaToppingsByPizzaId($unfiltered_pizzas[$i]['id']);
            //[[topping_id=2, pizza_id=3], ....]
            $topping_names = array_map(function($topping) use($id_to_topping_name_map){
                return $id_to_topping_name_map[$topping['topping_id']];
            }, $pizza_topping_ids);
            $unfiltered_pizzas[$i]['toppings'] = implode(',', $topping_names);
        }
        
        $pizza_name_to_search = $_POST['pizza_name'];
        if (empty($pizza_name_to_search)) {
            $_SESSION['pizzas'] = $unfiltered_pizzas;
        } else {
            $_SESSION['pizzas'] = array_filter($unfiltered_pizzas, function($pizza) use($pizza_name_to_search){
                return strpos($pizza['name'], $pizza_name_to_search) !== false;
            });
        }
    }

    header("Location: pizzas_page.php?error=none");
    
    function extract_pizza_id_from_pizza($pizza){
        return $pizza["id"];
    }
    function extract_pizza_id_from_pizza_topping($pizza_topping_id) {
        return $pizza_topping_id["pizza_id"];
    }

    function extract_topping_id($pizza_topping_id) {
        return $pizza_topping_id["topping_id"];
    }

    function extract_topping_id_from_topping($topping) {
        return $topping["id"];
    }

    function extract_topping_name_from_topping($topping) {
        return $topping["name"];
    }
