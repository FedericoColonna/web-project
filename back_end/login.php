<?php   
    
    if (isset($_POST['login'])) {
        require_once 'db-user.php';

        $email = $_POST['email'];
        $password = $_POST['pass'];

        if (emptyLogin($email, $password) !== false) {
            header("Location: ../loginpage.php?error=emptyinput");
            exit();
        }
        loginUser($email, $password);
    } else {
        header("Location: ../loginpage.php");
        exit();
    }   
    
    function emptyLogin($email, $password){
        if (empty($email) || empty($password)) {
            return true;
        }
        return false;
    }

    function loginUser($email, $password) {
        $user = getUser($email);
        if (is_null($user["id"])) {
            header("Location: ../loginpage.php?error=wronglogin");
            exit();
        }

        $hashed_password = $user["hashed_password"];
        $password_correct = password_verify($password, $hashed_password);
        
        if ($password_correct === false) {
            header("Location: ../loginpage.php?error=wronglogin");
            exit();
        }
        session_start();
        $_SESSION["userid"] = $user["id"];
        $_SESSION["email"] = $user["email"];
    
        header("Location: ../index.php");
        exit();
    }