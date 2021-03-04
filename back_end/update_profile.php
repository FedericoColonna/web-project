<?php
    session_start();
    if (isset($_POST['update'])) {
        require_once 'db-user.php';
        $current_email = $_SESSION['email'];
        $firstname = trim($_POST['firstname']);
        $lastname = trim($_POST['lastname']);
        $maybe_new_email = trim($_POST['email']);
        $country = trim($_POST['country']);
        $phone_number = trim($_POST['phone_number']);
        $address = ($_POST['address']);
        $zipcode = trim($_POST['zipcode']);
        $nickname = trim($_POST['nickname']);
        $user = getUser($current_email);

        if (updateUser($user["id"], $maybe_new_email, $firstname, $lastname, $country, $address, $nickname, $phone_number, $zipcode) == 0) {
            $_SESSION['email'] = $maybe_new_email;
            header("Location: ../show_profile.php?error=none2");
        } else {
            header("Location: ../show_profile.php?errror=smtfailed");
        }
    } else{
        header("Location: ../show_profile.php");
    }