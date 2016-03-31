<?php
/**
 * Created by PhpStorm.
 * User: jiamingdong
 * Date: 3/29/16
 * Time: 7:45 PM
 */

require_once(__DIR__ . "/../configurations/constants.php");
require_once(__DIR__ . "/../utils/web.php");

if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}

if(!isset($_SESSION["current_user"])){
    redirect(APPLICATION_ROOT . "/index.php");
}

?>