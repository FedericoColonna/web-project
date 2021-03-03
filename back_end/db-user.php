 <?php
    require_once 'db-connection.php';

    function getUser($email) {
        GLOBAL $conn;
        if ($stmt = mysqli_prepare($conn, "SELECT id, first_name, last_name, hashed_password, country, phone_number FROM user WHERE email = ?")) {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $id, $first_name, $last_name, $hashed_password, $country, $phone_number);
            mysqli_stmt_fetch($stmt);
                    
            return compact('id', 'first_name', 'last_name', 'hashed_password', 'country', 'phone_number', 'email');
        } else {
            return -1;
        }
    }

    function updateUser($id, $email, $firstname, $lastname, $country, $phone_number) {
        GLOBAL $conn;
        if ($stmt = mysqli_prepare($conn, "UPDATE user SET email = ?, first_name = ?, last_name = ?, country = ?, phone_number = ? WHERE id = ?;")) {
            mysqli_stmt_bind_param($stmt, "ssssii", $email, $firstname, $lastname, $country, $phone_number, $id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
                    
            return;
        } else {
            return -1;
        }
    } 

    function createUser($email, $hashed_password, $firstname, $lastname, $country, $phone_number) {
        GLOBAL $conn;
        if ($stmt = mysqli_prepare($conn, "INSERT INTO user (email, hashed_password, first_name, last_name, country, phone_number) VALUES(?, ?, ?, ?, ?, ?);")) {
            mysqli_stmt_bind_param($stmt, "sssssi", $email, $hashed_password, $firstname, $lastname, $country, $phone_number);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
                    
            return;
        } else {
            return -1;
        }
    }
