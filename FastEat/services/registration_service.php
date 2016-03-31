<?php
/**
 * Created by PhpStorm.
 * User: jiamingdong
 * Date: 3/29/16
 * Time: 3:10 PM
 */

function validate_registration_form($form) {
    $errors = [];

    $username = $form["username"];
    $email = $form["email"];
    $password = $form["password"];
    $password_confirm = $form["password_confirm"];

    $UsernameValid = (strlen($username) > 0); //Validate
    if(!$UsernameValid) {
        $errors["username"] = "Username is required";
    }

    $EmailValid = filter_var($email, FILTER_VALIDATE_EMAIL);
    if(!$EmailValid) {
        $errors["email"] = "Email is required and should be a valid email address";
    }

    $passwordValid = (strlen($password) >= 4); //Validate
    if(!$passwordValid) {
        $errors["password"] = "Password is required and should have at least 4 characters";
    }

    if (strcmp($password, $password_confirm) !== 0) {
        $errors["password_confirm"] = "The two passwords you entered are not equal";
    }

    return $errors;
}

?>