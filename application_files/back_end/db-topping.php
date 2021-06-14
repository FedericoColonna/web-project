 <?php
    require_once 'db-connection.php';

    function getTopping($name) {
        GLOBAL $conn;
        if ($stmt = mysqli_prepare($conn, "SELECT id, name, custom_additional_price FROM topping WHERE name = ?")) {
            mysqli_stmt_bind_param($stmt, 's', $name);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $id, $name, $custom_additional_price);
            mysqli_stmt_fetch($stmt);

            return compact('id', 'name', 'custom_additional_price');
        } else {
            return -1;
        }
    }

    function getToppingById($id) {
        GLOBAL $conn;
        if ($stmt = mysqli_prepare($conn, "SELECT id, name, custom_additional_price FROM topping WHERE id = ?")) {
            mysqli_stmt_bind_param($stmt, 'd', $id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $id, $name, $custom_additional_price);
            mysqli_stmt_fetch($stmt);

            return compact('id', 'name', 'custom_additional_price');
        } else {
            return -1;
        }
    }

    function get_all_Toppings() {
        GLOBAL $conn;
        if ($stmt = mysqli_prepare($conn, "SELECT id, name, custom_additional_price FROM topping")) {
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $id, $name, $custom_additional_price);

            $ret = [];
            while (mysqli_stmt_fetch($stmt)) {
                array_push($ret, compact('id', 'name', 'custom_additional_price'));
            }
            return $ret;
        } else {
            return -1;
        }
    }
