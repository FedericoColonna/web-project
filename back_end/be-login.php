<?php

    $email = $_POST['email'];
    $password = $_POST['pass'];

    if (emptyLogin($email, $password)) {
        header("Location: /login.php?error=emptyinput");
        exit();
    }
    $user = getUser($email);
    if (is_null($user["id"])) {
        header("Location: /login.php?error=wronglogin2");
        exit();
    }

    $hashed_password = $user["hashed_password"];
    $password_correct = password_verify($password, $hashed_password);
    
    if ($password_correct === false) {
        header("Location: /login.php?error=wronglogin3");
        exit();
    }
    session_start();
    $_SESSION["userid"] = $user["id"];
    $_SESSION["email"] = $email;


    header("Location: /show_profile.php");
    exit();
        
