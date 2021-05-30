<?php
    session_start();
    if (isset($_POST['submit'])) {
        require_once 'back_end/db-user.php';

        $current_email = $_SESSION['email'];
        $user_updated["firstname"] = trim($_POST['firstname']);
        $user_updated["lastname"] = trim($_POST['lastname']);
        $user_updated["email"] = trim($_POST['email']);
        $user_updated["country"] = isset($_POST['country']) ? trim($_POST['country']) : "country";
        $user_updated["phone_number"] = isset($_POST['phone_number']) ? trim($_POST['phone_number']) : "123456789";
        $user_updated["address"] = isset($_POST['address']) ? trim($_POST['address']) : "address";
        $user_updated["zipcode"] = isset($_POST['zipcode']) ? trim($_POST['zipcode']) : "1234";
        $user_updated["nickname"] = isset($_POST['nickname']) ? trim($_POST['nickname']) : "nickname";
        
        $user = getUser($current_email);
        $user_updated["id"] = $user["id"];
        if (emptyUpdate($user_updated)) {
            header("Location: /show_profile.php?error=emptyinput");
            exit();  
        } if (containsOnlyLetter($user_updated["firstname"]) ) {
            header("Location: /show_profile.php?error=invalidfirstname");
            exit();
        } if (containsOnlyLetter($user_updated["lastname"]) ) {
            header("Location: /show_profile.php?error=invalidlastname");
            exit();
        } if (containsOnlyLetter($user_updated["country"])) {
            header("Location: /show_profile.php?error=invalidCountry");
            exit();
        } if (invalidEmail($user_updated["email"])) {
            header("Location: /show_profile.php?error=invalidemail");
            exit();
        } if (updateUser($user_updated) == 1) {
            $_SESSION['email'] = $user_updated["email"];
            header("Location: /show_profile.php?error=none");
        } else {
            header("Location: /show_profile.php?errror=smtfailed");
        }
    } else{
        header("Location: /show_profile.php");
    }



    function emptyUpdate($user) {
        if (empty($user["email"]) || empty($user["firstname"]) || empty($user["lastname"])){
            return true;
        }
        return false;
    }
   
    function containsOnlyLetter($value) {
        if(!preg_match("/^[a-zA-Z]*$/", $value)) {
            return true;
        }
        return false;
    }

    function invalidEmail($email){
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;

    }
