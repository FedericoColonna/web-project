 <?php
    require_once 'db-connection.php';

    function getUser($email) {
        GLOBAL $conn;
        if ($stmt = mysqli_prepare($conn, "SELECT id, first_name, last_name, hashed_password, country FROM user WHERE email = ?")) {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $id, $first_name, $last_name, $hashed_password, $country);
            mysqli_stmt_fetch($stmt);
                    
            return compact('id', 'email', 'first_name', 'last_name', 'hashed_password', 'country');
        } else {
            return -1;
        }
    }

    function updateUser($id, $email, $firstname, $lastname, $country) {
        GLOBAL $conn;
        if ($stmt = mysqli_prepare($conn, "UPDATE user SET first_name = ?, last_name = ?, email = ?, country = ? WHERE id = ?;")) {
            mysqli_stmt_bind_param($stmt, "ssssi", $firstname, $lastname, $email, $country, $id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
                    
            return;
        } else {
            return -1;
        }
    } 

    function createUser($email, $hashed_password, $firstname, $lastname, $country) {
        GLOBAL $conn;
        if ($stmt = mysqli_prepare($conn, "INSERT INTO user (email, hashed_password, first_name, last_name, country) VALUES(?, ?, ?, ?, ?);")) {
            mysqli_stmt_bind_param($stmt, "sssss", $email, $hashed_password, $firstname, $lastname, $country);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
                    
            return;
        } else {
            return -1;
        }
    }
