<?php

/**
 * Created by PhpStorm.
 * User: jiamingdong
 * Date: 3/29/16
 * Time: 12:57 PM
 */
require_once ("database_connection.php");

class User
{
    public $user_id;
    public $user_name;
    public $password;
    public $salt;
    public $email;
    public $user_type;
    public $enabled;

    public static function get_user_object($email) {
        //fasteatlog("User.php | trying to retrieve user object: $email");
        $query = "SELECT * FROM Users WHERE email='" . $email . "'";
        $connection = get_connection();
        $resultSet = mysqli_query($connection, $query);
        //fasteatlog("User.php | resultSet: " . print_r($resultSet, true));
        $record = mysqli_fetch_array($resultSet);
        //fasteatlog("User.php | record: " . print_r($record, true));
        $user = null;
        if ($record) {
            //fasteatlog("User.php | trying to convert stdclass to map");
            $user = $record;
        }
        //fasteatlog("User.php | user: " . print_r($user, true));
        return $user;
    }

    public static function add_user_object($user) {
        $username = $user["username"];
        $email = $user["email"];
        $password = $user["password"];
        $salt = $user["salt"];
        $usertype = $user["usertype"];

        $statement = "INSERT INTO Users (user_name, email, password, salt, user_type, enabled)
                     VALUES ('$username', '$email', '$password', '$salt', '$usertype', true)";

        $connection = get_connection();
        if (@mysqli_query($connection, $statement)) {
            return $user;
        } else return null;
    }
}