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

        if (emptyUpdate($firstname,$lastname, $maybe_new_email)!== false) {
            header("Location: ../show_profile.php?error=emptyinput");
            exit();  
        } if (containsOnlyLetter($firstname) !== false) {
            header("Location: ../show_profile.php?error=invalidfirstname");
            exit();
        } if (containsOnlyLetter($lastname) !== false) {
            header("Location: ../show_profile.php?error=invalidlastname");
            exit();
        } if (containsOnlyLetter($country) !== false) {
            header("Location: ../show_profile.php?error=invalidCountry");
            exit();
        } if (invalidEmail($maybe_new_email) !== false) {
            header("Location: ../show_profile.php?error=invalidemail");
            exit();        
        } if (updateUser($user["id"], $maybe_new_email, $firstname, $lastname, $country, $address, $nickname, $phone_number, $zipcode) == 0) {
            $_SESSION['email'] = $maybe_new_email;
            header("Location: ../show_profile.php?error=none2");
        } else {
            header("Location: ../show_profile.php?errror=smtfailed");
        }
    } else{
        header("Location: ../show_profile.php");
    }



    function emptyUpdate($firstname, $lastname, $maybe_new_email) {
        if (empty($maybe_new_email) || empty($firstname) || empty($lastname)){
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
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
