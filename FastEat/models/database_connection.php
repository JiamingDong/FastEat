<?php
/**
 * Created by PhpStorm.
 * User: jiamingdong
 * Date: 3/29/16
 * Time: 1:09 PM
 */
require_once(__DIR__ . "/../configurations/config.php");

function get_connection() {
    //fasteatlog("database_connection.php | trying to retrieve mysql connection using: " . mysql_HOSTNAME . ", " . mysql_USERNAME . ", " . mysql_DATABASE . ", " . mysql_PORT);
    $connection = mysqli_connect(mysql_HOSTNAME,mysql_USERNAME,mysql_PASSWORD,mysql_DATABASE,mysql_PORT);
    if(!$connection){
        //fasteatlog("database_connection.php | Could not retrieve mysql connection");
        //there was an error
        $errorDescription = mysqli_connect_error();
        trigger_error($errorDescription, E_USER_ERROR);
    }

    return $connection;
}

