<?php
/**
 * Created by PhpStorm.
 * User: jiamingdong
 * Date: 3/29/16
 * Time: 12:29 PM
 */

function encrypt_password($pass,$salt){
    return md5($pass . $salt);
}

function generate_salt($length = 8) {
    return substr(md5(uniqid(mt_rand(), true)), 0, $length);
}

?>