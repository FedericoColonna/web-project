<?php
    if(isset($_POST['submit'])) {
        require_once 'db-user.php';
    
        $firstname = trim($_POST['firstname']);
        $lastname= trim($_POST['lastname']);
        $email= trim($_POST['email']);
        $password = trim($_POST['pass']);
        $confirm= trim($_POST['confirm']);
        $country= trim($_POST['country']);
        
    
        if (emptySignup($firstname, $lastname, $email, $password, $confirm) !== false) {
            header("Location: ../signup_page.php?error=emptyinput");
            exit();
        } if (containsOnlyLetter($firstname) !== false) {
            header("Location: ../signup_page.php?error=invalidfirstname");
            exit();
        } if (containsOnlyLetter($lastname) !== false) {
            header("Location: ../signup_page.php?error=invalidlastname");
            exit();
        } if (containsOnlyLetter($country) !== false) {
            header("Location: ../signup_page.php?error=invalidCountry");
            exit();
        } if (invalidEmail($email) !== false) {
            header("Location: ../signup_page.php?error=invalidemail");
            exit();
        } if (passwordMatch($password, $confirm) !== false) {
            header("Location: ../signup_page.php?error=pwdwrongmatch");
            exit();
        } if (emailExists($email) !== false) {
            header("Location: ../signup_page.php?error=stmtfailed");
            exit();
        } if(emptyOptionalField($country)) {
            $country = "country";
        }

    }
    else {
        header("Location: ../signup_page.php");
    }
    if (createUser($email, password_hash($password, PASSWORD_DEFAULT), $firstname, $lastname, $country) == -1) {
        header("Location: ../signup_page.php?error=stmtfailed");
    } else {
        header("Location: ../signup_page.php?error=none");
    }
    
    function emptySignup($firstname, $lastname, $email, $password, $confirm) {
        if (empty($email) || empty($password) || empty($firstname) || empty($lastname) || empty($confirm)){
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }
    function emptyOptionalField($country) {
        if(empty($country)){
            $result = true;
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
    function passwordMatch($password, $password_to_check) {
        if($password !== $password_to_check) {
            return true;
        }
        return false;
    }

    function emailExists($email){
        $user = getUser($email);
        if (is_null($user["id"])) {
            return false;
        }
        return true;
    }
