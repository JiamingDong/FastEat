<?php
/**
 * Created by PhpStorm.
 * User: jiamingdong
 * Date: 3/29/16
 * Time: 12:38 PM
 */

require_once(__DIR__ . "/../utils/web.php");

function dev_error_handler($errno , $errstr, $errfile, $errline, $errcontext){
    if(session_id() == '' || !isset($_SESSION)) {
        // session isn't started
        session_start();
    }
    /* OR php 5.4+ onwards this could be used
    session_status() == PHP_SESSION_ACTIVE
    */
    $error = array (
        "code"=>$errno,
        "desc"=>$errstr,
        "file"=>$errfile,
        "line"=>$errline,
        "context"=>$errcontext
    );

    $_SESSION["ERROR_INFO"] = $error;
    redirect("/" . APPLICATION_NAME . "/views/dev_errors.php");
    exit();
}

function prod_error_handler($errno , $errstr, $errfile, $errline, $errcontext){
    redirect("/" . APPLICATION_NAME . "/views/prod_errors.php");
    exit();
}

function fasteatlog($msg){
    error_log($msg.PHP_EOL, 3, null);
}

?>