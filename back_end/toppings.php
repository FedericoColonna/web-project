<?php
    require_once 'db-topping.php';
    function get_toppings() {
        $toppings = get_all_Toppings();
        return $toppings;
    }