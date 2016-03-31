<?php
/**
 * Created by PhpStorm.
 * User: jiamingdong
 * Date: 3/29/16
 * Time: 3:09 PM
 */

require_once(__DIR__ . "/../configurations/config.php");
require_once(__DIR__ . "/../utils/web.php");
require_once(__DIR__ . "/../utils/security.php");
require_once(__DIR__ . "/../services/registration_service.php");
require_once(__DIR__ . "/../services/data_service.php");

session_start();
$validationResult = validate_registration_form($_POST);
if (count($validationResult) > 0) {
    $_SESSION['errors'] = $validationResult;
    $url = VIEWS . "/registration_form.php";
    redirect($url);
    exit();
} else {
    $email = $_POST["email"];
    $emailAlreadyExists = verify_username_availability($email);

    if($emailAlreadyExists){
        $_SESSION["errors"] = array("email"=>"Email already exists");
        $url = VIEWS . "/registration_form.php";
        redirect($url);
        exit;
    }

    $username = $_POST["username"];
    $password = $_POST["password"];
    $usertype = $_POST["usertype"];

    $user = new_user($username, $email, $password, $usertype);
    if ($user) {
        $_SESSION["success"] = "Registration successful. Please login.";
    }

    redirect(APPLICATION_ROOT . "/index.php");
}

?>