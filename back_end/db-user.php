 <?php
    require_once 'db-connection.php';

    function getUser($email) {
        GLOBAL $conn;
        if ($stmt = mysqli_prepare($conn, "SELECT id, first_name, last_name, hashed_password, country, phone_number, address, zipcode, nickname FROM user WHERE email = ?")) {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $id, $first_name, $last_name, $hashed_password, $country, $phone_number, $address, $zipcode, $nickname);
            mysqli_stmt_fetch($stmt);
                    
            return compact('id', 'first_name', 'last_name', 'hashed_password', 'country', 'phone_number', 'email', 'address', 'zipcode', 'nickname');
        } else {
            return -1;
        }
    }

    function updateUser($id, $email, $firstname, $lastname, $country, $address, $nickname, $phone_number, $zipcode) {
        GLOBAL $conn;
        if ($stmt = mysqli_prepare($conn, "UPDATE user SET email = ?, first_name = ?, last_name = ?, country = ?, address = ?, nickname = ?, phone_number = ?, zipcode = ? WHERE id = ?;")) {
            mysqli_stmt_bind_param($stmt, "ssssssiii", $email, $firstname, $lastname, $country, $address, $nickname, $phone_number, $zipcode, $id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
                    
            return;
        } else {
            return -1;
        }
    } 

    function createUser($email, $hashed_password, $firstname, $lastname, $country, $address, $nickname, $phone_number, $zipcode) {
        GLOBAL $conn;
        if ($stmt = mysqli_prepare($conn, "INSERT INTO user (email, hashed_password, first_name, last_name, country, address, nickname, phone_number, zipcode) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?);")) {
            mysqli_stmt_bind_param($stmt, "sssssssii", $email, $hashed_password, $firstname, $lastname, $country, $address, $nickname, $phone_number, $zipcode);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
                    
            return;
        } else {
            return -1;
        }
    }
