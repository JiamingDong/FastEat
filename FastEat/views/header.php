<?php
/**
 * Created by PhpStorm.
 * User: jiamingdong
 * Date: 3/30/16
 * Time: 3:53 PM
 */
require_once (__DIR__."/../configurations/config.php");
if (session_id() == '' || !isset($_SESSION)) {
    session_start();
}
?>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-touchspin/3.1.1/jquery.bootstrap-touchspin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-touchspin/3.1.1/jquery.bootstrap-touchspin.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-touchspin/3.1.1/jquery.bootstrap-touchspin.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-touchspin/3.1.1/jquery.bootstrap-touchspin.min.js"></script>

    <title><?php echo APPLICATION_NAME; ?></title>

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
</head>
<body>
    <!-- Custom CSS -->
    <link href="../resources/css/fast_eat.css" rel="stylesheet">

    <div class="brand">Fast Eat</div>
    <div class="address-bar">183 Rutgers Road | Piscataway, NJ 08854 | 312.401.5683</div>