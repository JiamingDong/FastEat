<!DOCTYPE html>
<?php
/**
 * Created by PhpStorm.
 * User: jiamingdong
 * Date: 3/28/16
 * Time: 5:57 PM
 */
require_once (__DIR__."/../configurations/config.php");
if (session_id() == '' || !isset($_SESSION)) {
  session_start();
}

?>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo APPLICATION_NAME; ?></title>
    <link rel="stylesheet" href="http://cdn.foundation5.zurb.com/foundation.css" />
    <link href="http://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.foundation5.zurb.com/foundation.js"></script>

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

  </head>
  <body>