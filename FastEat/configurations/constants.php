<?php
/**
 * Created by PhpStorm.
 * User: jiamingdong
 * Date: 3/28/16
 * Time: 6:14 PM
 */

define("APPLICATION_NAME", "FastEat");
define("APPLICATION_ROOT", "http://" . $_SERVER["SERVER_NAME"] . "/" . APPLICATION_NAME);
define("CSS", APPLICATION_ROOT."/resources/css");
define("JS", APPLICATION_ROOT."/resources/js");
define("CONTROLLER", APPLICATION_ROOT."/controllers");
define("VIEWS", APPLICATION_ROOT."/views");

define("mysql_HOSTNAME", "localhost");
define("mysql_PORT", "3306");
define("mysql_USERNAME", "root");
define("mysql_PASSWORD", "");
define("mysql_DATABASE","FastEatDB");

define("user_type_CUSTOMER", "0");
define("user_type_STAFF", "1");

define("item_type_APPETIZER", "0");
define("item_type_SOUP", "1");
define("item_type_BEVERAGE", "2");
define("item_type_MEAT", "3");
define("item_type_SALAD", "4");
?>