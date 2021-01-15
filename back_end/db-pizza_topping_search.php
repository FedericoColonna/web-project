<?php
    require_once 'db-connection.php';

    $query1 = "SELECT @topping_id:=id FROM topping WHERE name ='pomodoro';";
    $query2 = "SELECT @pizza_id:=pizza_id FROM pizza_topping WHERE topping_id=@topping_id;";
    $query3 = "SELECT * FROM pizza WHERE id=@pizza_id;";
    









