<?php 
    
    require_once 'db-connection.php';
    require_once 'db-user.php';
    if (isset($_POST['passwordchange'])) {

        $user_email= trim($_POST['email2']);
        $old_password = trim($_POST['old']);
        $new_password = trim($_POST['new']);
        $confirm_new_password = trim($_POST['confirmnew']);

        $user = getUser($user_email);
        $user_id = $user['id'];
        $hashed_password = $user['hashed_password'];
        $password_correct = password_verify($old_password, $hashed_password);

        if ($password_correct === false) {
            header("Location: ../change_password_page.php?error=wrongPassword");
            exit();
        }
        if (passwordMatch($new_password, $confirm_new_password) !== false) {
            header("Location: ../change_password_page.php?error=wrongPasswordMatch");
            exit();

        } else { 
            $new_hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            updatePassword($user_id, $new_hashed_password);
            header("Location: ../show_profile.php?error=errorNone");
            exit();

        }





    }
    function updatePassword($id, $password) {
        GLOBAL $conn;
        if ($stmt = mysqli_prepare($conn, "UPDATE user SET hashed_password = ? WHERE id = ?;")) {
            mysqli_stmt_bind_param($stmt, "si", $password, $id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
                    
            return;
        } else {
            return -1;
        }
    } 
    function passwordMatch($password, $password_to_check) {
        if($password !== $password_to_check) {
            return false;
        }
        return false; 
    } 