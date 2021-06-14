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

    function updateUser($user) {
        GLOBAL $conn;
        if ($stmt = mysqli_prepare($conn, "UPDATE user SET email = ?, first_name = ?, last_name = ?, country = ?, address = ?, nickname = ?, phone_number = ?, zipcode = ? WHERE id = ?;")) {
            mysqli_stmt_bind_param($stmt, "ssssssiii", $user["email"], $user["firstname"], $user["lastname"], $user["country"], $user["address"], $user["nickname"], $user["phone_number"], $user["zipcode"], $user["id"]);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
                    
            return;
        } else {
            return -1;
        }
    } 

    //$email, $hashed_password, $firstname, $lastname, $country, $address, $nickname, $phone_number, $zipcode
    function createUser($user) {
        GLOBAL $conn;
        if ($stmt = mysqli_prepare($conn, "INSERT INTO user (email, hashed_password, first_name, last_name, country, address, nickname, phone_number, zipcode) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?);")) {
            mysqli_stmt_bind_param($stmt, "sssssssii", $user["email"], $user["hashed_password"], $user["firstname"], $user["lastname"], $user["country"], $user["address"], $user["nickname"], $user["phone_number"], $user["zipcode"]);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
                    
            return;
        } else {
            return -1;
        }
    }
