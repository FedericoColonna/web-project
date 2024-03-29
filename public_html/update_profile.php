<?php
    session_start();
    include_once '../application_files/back_end/be-validation_functs.php';
    if (isset($_POST['submit'])) {
        require_once '../application_files/back_end/db-user.php';

        $current_email = $_SESSION['email'];
        $user_updated["firstname"] = trim($_POST['firstname']);
        $user_updated["lastname"] = trim($_POST['lastname']);
        $user_updated["email"] = trim($_POST['email']);
        $user_updated["country"] = isset($_POST['country']) && !empty(trim($_POST['country'])) ? trim($_POST['country']) : NULL;
        $user_updated["phone_number"] = isset($_POST['phone_number']) && !empty(trim($_POST['phone_number'])) ? trim($_POST['phone_number']) : NULL;
        $user_updated["address"] = isset($_POST['address']) && !empty(trim($_POST['address'])) ? trim($_POST['address']) : NULL;
        $user_updated["zipcode"] = isset($_POST['zipcode']) && !empty(trim($_POST['zipcode'])) ? trim($_POST['zipcode']) : NULL;
        $user_updated["nickname"] = isset($_POST['nickname']) && !empty(trim($_POST['nickname'])) ? trim($_POST['nickname']) : NULL;
        
        $user = getUser($current_email);
        $user_updated["id"] = $user["id"];

        if (emptyUpdate($user_updated)) {
            header("Location: show_profile.php?error=emptyinput");
            exit();  
        } if (doesNotContainOnlyLetter($user_updated["firstname"]) ) {
            header("Location: show_profile.php?error=invalidfirstname");
            exit();
        } if (doesNotContainOnlyLetter($user_updated["lastname"]) ) {
            header("Location: show_profile.php?error=invalidlastname");
            exit();
        } if (doesNotContainOnlyLetter($user_updated["country"])) {
            header("Location: show_profile.php?error=invalidCountry");
            exit();
        } if (isInvalidEmail($user_updated["email"])) {
            header("Location: show_profile.php?error=invalidemail");
            exit();
        } if (updateUser($user_updated) == -1) {
            header("Location: show_profile.php?errror=smtfailed");
        } else {
            $_SESSION['email'] = $user_updated["email"];
            header("Location: show_profile.php?error=none");
            
        }
    } else{
        header("Location: show_profile.php");
    }

