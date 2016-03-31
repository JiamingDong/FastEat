<?php
/**
 * Created by PhpStorm.
 * User: jiamingdong
 * Date: 3/29/16
 * Time: 12:24 PM
 */

require_once (__DIR__."/../configurations/config.php");

function validate_credentials($form) {
    $errors = [];

    $userNameValid = validate_username($form);
    if (!$userNameValid) {
        $errors["validation_email"] = "User name is required and should be an email address";
    }

    $passwordValid = validate_password($form);
    if (!$passwordValid) {
        $errors["validation_password"] = "Password is required and should have at least 4 characters";
    }

    return $errors;
}

function validate_username($form){
    if(isset($form["email"])){
        return filter_var($form["email"], FILTER_VALIDATE_EMAIL);
    }
    return false;
}

function validate_password($form){
    if(isset($form["password"])){
        //validate
        return strlen($form['password']) >= 4;
    }
    return false;
}

?>