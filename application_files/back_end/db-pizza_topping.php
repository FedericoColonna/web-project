<?php
    
    require_once 'db-connection.php';

    function getPizzaToppingsByToppingId($topping_id) {
        GLOBAL $conn;

        if ($stmt = mysqli_prepare($conn, "SELECT pizza_id, topping_id FROM pizza_topping WHERE topping_id = ?")) {
            mysqli_stmt_bind_param($stmt, 'd', $topping_id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $pizza_id, $topping_id);
            $ret = [];
            while (mysqli_stmt_fetch($stmt)) {
                array_push($ret, compact('pizza_id', 'topping_id'));
            }
            return $ret;
        } else {
            return -1;
        }
    }

    function getPizzaToppingsByPizzaId($pizza_id) {
        GLOBAL $conn;

        if ($stmt = mysqli_prepare($conn, "SELECT pizza_id, topping_id FROM pizza_topping WHERE pizza_id = ?")) {
            mysqli_stmt_bind_param($stmt, 'd', $pizza_id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $pizza_id, $topping_id);
            $ret = [];
            while (mysqli_stmt_fetch($stmt)) {
                array_push($ret, compact('pizza_id', 'topping_id'));
            }
            return $ret;
        } else {
            return -1;
        }
    }


   
    









