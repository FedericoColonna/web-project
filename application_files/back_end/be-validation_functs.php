<?php

function isInvalidEmail($email){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }
    return true;
  
}

function doesNotContainAllMandatoryFields($user) {
    if (empty($user["email"]) || empty($user["password"]) || empty($user["firstname"]) || empty($user["lastname"]) || empty($user["confirm"])){
        return true;
    }
    return false;
}

function emptyOptionalField($value) {
    if(empty($value)){
        return true;
    }
    return false;
}

function doesNotContainOnlyLetter($value) {
    if(preg_match("/^[a-zA-Z]*$/", $value)) {
        return false;
    }
    return true;
}

   
function passwordDoesNotMatch($password, $password_to_check) {
    if($password != $password_to_check) {
        return true;
    }
    return false;
}

function emailAlreadyRegistered($email){
    $user = getUser($email);
    if (!is_null($user["id"])) {
        return true;
    }
    return false;
}

function emptyUpdate($user) {
    if (empty($user["email"]) || empty($user["firstname"]) || empty($user["lastname"])){
        return true;
    }
    return false;
}

