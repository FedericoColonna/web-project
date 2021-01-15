<?php
    if (isset($_POST['update'])) {
        require_once 'db-user.php';

        $firstname = trim($_POST['firstname']);
        $lastname= trim($_POST['lastname']);
        $email= trim($_POST['email']);
        $country = trim($_POST['country']);

        $user = getUser($email);
        if (updateUser($user["id"], $email, $firstname, $lastname, $country) == 0) {
            header("Location: ../show_profile.php?error=none");
        } else {
            header("Location: ../show_profile.php?errror=smtfailed");
        }
    } else{
        header("Location: ../show_profile.php");
    }