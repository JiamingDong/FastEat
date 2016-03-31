<?php
/**
 * Created by PhpStorm.
 * User: jiamingdong
 * Date: 3/29/16
 * Time: 12:36 PM
 */
require_once (__DIR__ . "/../configurations/config.php");
require_once (__DIR__ . "/../utils/security.php");

// require DAOs
require_once (__DIR__ . "/../models/User.php");
require_once (__DIR__ . "/../models/Menu.php");

function get_user($email) {
    return User::get_user_object($email);
}

function verify_username_availability($email){
    $exists = false;

    if(get_user($email)){
        $exists = true;
    }

    return $exists;
}

function new_user($username, $email, $password, $usertype) {
    $salt = generate_salt();
    $encPassword = encrypt_password($password, $salt);

    $user = array("username"=>$username,
                  "email"=>$email,
                  "password"=>$encPassword,
                  "salt"=>$salt,
                  "usertype"=>$usertype);

    return User::add_user_object($user);
}

function all_menus() {
    return Menu::get_all_menus();
}

function get_menu($menu_id) {
    return Menu::get_menu_by_id($menu_id);
}