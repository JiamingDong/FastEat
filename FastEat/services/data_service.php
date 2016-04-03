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
require_once (__DIR__ . "/../models/Item.php");

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

function all_items() {
    return Item::get_all_items();
}

function item_in_menu($item_id, $menu_id) {
    return Item::item_is_in_menu($item_id, $menu_id);
}

function add_item($item_id, $menu_id) {
    Item::add_item_to_menu($item_id, $menu_id);
}

function delete_item($item_id, $menu_id) {
    Item::delete_item_from_menu($item_id, $menu_id);
}

function get_all_items($menu_id) {
    return Menu::get_all_item_ids($menu_id);
}

function get_item($item_id) {
    return Item::get_item_by_id($item_id);
}