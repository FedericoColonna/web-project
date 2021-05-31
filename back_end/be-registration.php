<?php
    require_once 'back_end/db-user.php';
    $user["firstname"] = trim($_POST['firstname']);
    $user["lastname"] = trim($_POST['lastname']);
    $user["email"] = trim($_POST['email']);
    $user["password"] = trim($_POST['pass']);
    $user["confirm"] = trim($_POST['confirm']);
    $user["country"] = isset($_POST['country']) && !empty(trim($_POST['country'])) ? trim($_POST['country']) : NULL;
    $user["phone_number"] = isset($_POST['phone_number']) && !empty(trim($_POST['phone_number'])) ? trim($_POST['phone_number']) : NULL;
    $user["address"] = isset($_POST['address']) && !empty(trim($_POST['address'])) ? trim($_POST['address']) : NULL;
    $user["zipcode"] = isset($_POST['zipcode']) && !empty(trim($_POST['zipcode'])) ? trim($_POST['zipcode']) : NULL;
    $user["nickname"] = isset($_POST['nickname']) && !empty(trim($_POST['nickname'])) ? trim($_POST['nickname']) : NULL;
    

    if (isInvalidEmail($user["email"])) {
        header("Location: /registration.php?error=invalidemail");
        exit();
    } if (doesNotContainAllMandatoryFields($user)) {
        header("Location: /registration.php?error=emptyinput");
        exit();
    } if (doesNotContainOnlyLetter($user["firstname"])) {
        header("Location: /registration.php?error=invalidfirstname");
        exit();
    } if (doesNotContainOnlyLetter($user["lastname"])) {
        header("Location: /registration.php?error=invalidlastname");
        exit();
    } if (!is_null($user["country"]) && !doesNotContainOnlyLetter($user["country"])) {
        header("Location: /registration.php?error=invalidCountry");
        exit();
    } if (passwordDoesNotMatch($user["password"], $user["confirm"])) {
        header("Location: /registration.php?error=pwdwrongmatch");
        exit();
    } if (emailAlreadyRegistered($user["email"])) {
        header("Location: /registration.php?error=stmtfailed");
        exit();
    }
    
    $user["hashed_password"] = password_hash($user["password"], PASSWORD_DEFAULT);      
    if (createUser($user) == -1) {
        header("Location: /registration.php?error=stmtfailed");
    } else {
        header("Location: /login.php?error=none");
    }
    
    exit();
    
 