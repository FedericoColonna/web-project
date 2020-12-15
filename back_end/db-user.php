 <?php
    require_once 'db-connection.php';

    function getUser($email) {
        GLOBAL $conn;
        if ($stmt = mysqli_prepare($conn, "SELECT id, first_name, last_name, hashed_password FROM user WHERE email = ?")) {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $id, $first_name, $last_name, $hashed_password);
            mysqli_stmt_fetch($stmt);
                    
            return compact('id', 'first_name', 'last_name', 'hashed_password');
        } else {
            return -1;
        }
    }

    function updateUser($id, $email, $firstname, $lastname) {
        GLOBAL $conn;
        if ($stmt = mysqli_prepare($conn, "UPDATE user SET first_name = ?, last_name = ?, email = ? WHERE id = ?;")) {
            mysqli_stmt_bind_param($stmt, "sssi", $firstname, $lastname, $email, $id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
                    
            return;
        } else {
            return -1;
        }
    } 

    function createUser($email, $hashed_password, $firstname, $lastname) {
        GLOBAL $conn;
        if ($stmt = mysqli_prepare($conn, "INSERT INTO user (email, hashed_password, first_name, last_name) VALUES(?, ?, ?, ?);")) {
            mysqli_stmt_bind_param($stmt, "ssss", $email, $hashed_password, $firstname, $lastname);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
                    
            return;
        } else {
            return -1;
        }
    }
