<?php
/**
 * Created by PhpStorm.
 * User: jiamingdong
 * Date: 3/29/16
 * Time: 12:29 PM
 */

function validate($value, $noChars) {
    $valid = isset($value);
    if ($valid) {
        $valid = hasRequiredLength($value, $noChars);
    }

    return $valid;
}

function hasRequiredLength($value, $noChars) {
    $valid = false;
    $trimmedValue = trim($value);
    if (strlen($trimmedValue) >= $noChars) {
        $valid = true;
    }
    return $valid;
}

?>