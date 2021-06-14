 <?php
    require_once 'db-connection.php';

    function getPizzas($ids) {
        GLOBAL $conn;
        $in = str_repeat('?,', count($ids) - 1) . '?'; // placeholders
        if ($stmt = mysqli_prepare($conn, "SELECT id, name, price FROM pizza WHERE id IN ($in)")) {
            $types = str_repeat('i', count($ids)); //types
            mysqli_stmt_bind_param($stmt, $types, ...$ids);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $id, $name, $price);
            $ret = [];
            while (mysqli_stmt_fetch($stmt)) {
                array_push($ret, compact('id', 'name', 'price'));
            }
            return $ret;
        } else {
            return -1;
        }
    }

    function getAllPizzas() {
        GLOBAL $conn;
        if ($stmt = mysqli_prepare($conn, "SELECT id, name, price FROM pizza")) {
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $id, $name, $price);
            $ret = [];
            while (mysqli_stmt_fetch($stmt)) {
                array_push($ret, compact('id', 'name', 'price'));
            }
            return $ret;
        } else {
            return -1;
        }
    }

    function getPizza($pizza_name) {
        GLOBAL $conn;
        if ($stmt = mysqli_prepare($conn, "SELECT id, name, price  FROM pizza WHERE name LIKE ?")) {
            mysqli_stmt_bind_param($stmt, "s", $pizza_name);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $id, $name, $price);
            mysqli_stmt_fetch($stmt);
                    
            return compact('id', 'name', 'price');
        } else {
            return -1;
        }
    }

