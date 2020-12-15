<?php
    if(isset($_POST['submit'])) {
        require_once 'db-user.php';
    
        $firstname = trim($_POST['firstname']);
        $lastname= trim($_POST['lastname']);
        $email= trim($_POST['email']);
        $password = trim($_POST['pass']);
        $confirm= trim($_POST['confirm']);
    
        if (emptySignup($firstname, $lastname, $email, $password, $confirm) !== false) {
            header("Location: ../signuppage.php?error=emptyinput");
            exit();
        } if (containsOnlyLetter($firstname) !== false) {
            header("Location: ../signuppage.php?error=invalidfirstname");
            exit();
        } if (containsOnlyLetter($lastname) !== false) {
            header("Location: ../signuppage.php?error=invalidlastname");
            exit();
        } if (invalidEmail($email) !== false) {
            header("Location: ../signuppage.php?error=invalidemail");
            exit();
        } if (passwordMatch($password, $confirm) !== false) {
            header("Location: ../signuppage.php?error=pwdwrongmatch");
            exit();
        } if (emailExists($email) !== false) {
            header("Location: ../signuppage.php?error=stmtfailed");
            exit();
        }
    }
    else {
        header("Location: ../signuppage.php");
    }
    if (createUser($email, password_hash($password, PASSWORD_DEFAULT), $firstname, $lastname) == -1) {
        header("Location: ../signuppage.php?error=stmtfailed");
    } else {
        header("Location: ../signuppage.php?error=none");
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
            return false;
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
