<?php
/**
 * Created by PhpStorm.
 * User: jiamingdong
 * Date: 3/29/16
 * Time: 10:25 AM
 */

require_once (__DIR__."/../configurations/config.php");
require_once (__DIR__."/../utils/web.php");
require_once (__DIR__."/../utils/security.php");
require_once (__DIR__."/../services/auth_service.php");
require_once (__DIR__."/../services/data_service.php");

if (session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}

if (isset($_POST['action']) && $_POST['action'] == "Login") {
    //Retrieve username & password
    $validationResult = validate_credentials($_POST);

    if (count($validationResult) > 0) {
        fasteatlog("auth_controller.php | credentials validation failed");
        $_SESSION["errors"] = $validationResult;
        $url = APPLICATION_ROOT."/index.php";
        redirect($url);
        exit();
    }

    fasteatlog("auth_controller.php | credentials validation successful");
    $email = $_POST["email"];
    $password = $_POST["password"];

    fasteatlog("auth_controller.php | trying to retrieve user record");
    $user = get_user($email);

    if ($user) {
        fasteatlog("auth_controller.php | retrieved user record");
        $salt = $user["salt"];
        $enteredPassword = encrypt_password($password, $salt);
        $savedPassword = $user["password"];
        $accountEnabled = $user["enabled"];
        fasteatlog("auth_controller.php | Password match: " . ($savedPassword === $enteredPassword));
        fasteatlog("auth_controller.php | Account enabled: $accountEnabled");
        if ($savedPassword === $enteredPassword && $accountEnabled) {
            fasteatlog("auth_controller.php | auth valid");
            if(session_id() == '' || !isset($_SESSION)) {
                // session isn't started
                session_start();
                session_regenerate_id(true);
            }
            //valid user
            $_SESSION["current_user"] = $user["email"];

            // Set the remember me if the user click the 'remember me' check box
            if($_POST['remember_me']) {
                $_SESSION['remember_me'] = $user['email'];
            } else {
                if(isset($_SESSION['remember_me']) && $_SESSION['remember_me'] != "empty") {
                    $_SESSION['remember_me'] = "empty";
                }
            }

            setcookie('remember_me', $_POST['email'], $year);

            //redirect to home page
            redirect(VIEWS . "/home.php");
            exit();
        } else {
            fasteatlog("auth_controller.php | auth invalid");
            $errors = [];
            $errors["auth"] = "Authentication failed. Please check username and password";
            $_SESSION["errors"] = $errors;
            $url = APPLICATION_ROOT . "/index.php";
            redirect($url);
            exit();
        }
    } else {
        fasteatlog("auth.php | user account not found");
        $errors = [];
        $errors["auth"] = "Authentication failed. Please check username and password";
        $_SESSION["errors"] = $errors;
        $url = APPLICATION_ROOT . "/index.php";
        redirect($url);
        exit();
    }
} else {
    fasteatlog("auth_controller.php | invalid request");
    redirect(APPLICATION_ROOT . "/index.php");
    exit();
}

?>
