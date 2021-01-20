<?php
    session_start();
    if (isset($_POST['update'])) {
        require_once 'db-user.php';
        $current_email = $_SESSION['email'];
        $firstname = trim($_POST['firstname']);
        $lastname = trim($_POST['lastname']);
        $maybe_new_email = trim($_POST['email']);
        $country = trim($_POST['country']);
        $user = getUser($current_email);

        if (updateUser($user["id"], $maybe_new_email, $firstname, $lastname, $country) == 0) {
            $_SESSION['email'] = $maybe_new_email;
            header("Location: ../show_profile.php?error=none2");
        } else {
            header("Location: ../show_profile.php?errror=smtfailed");
        }
    } else{
        header("Location: ../show_profile.php");
    }