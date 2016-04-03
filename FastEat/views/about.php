<?php
/**
 * Created by PhpStorm.
 * User: jiamingdong
 * Date: 3/29/16
 * Time: 12:50 PM
 */

require_once (__DIR__ . "/../configurations/config.php");
require_once (__DIR__ . "/../controllers/ensure_session.php");
require_once (__DIR__ . "/../services/data_service.php");

$current_user = "Undefined user";
$current_user_obj = array();
if(isset($_SESSION["current_user"])){
    $current_user = $_SESSION["current_user"];
    $current_user_obj = get_user($current_user);
}

require_once("header.php");
require_once (__DIR__ . "/nav_bar.php");
?>

<div class="container">
    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <hr>
                <h2 class="intro-text text-center">About
                    <strong>Fast Eat</strong>
                </h2>
                <hr>
            </div>
            <div class="col-md-6">
                <img class="img-responsive img-border-left" src="../resources/img/slide-2.jpg" alt="">
            </div>
            <div class="col-md-6">
                <p>This is a group project in PHP class of Marlabs Inc.</p>
                <p>The user can sign in and sign up as both a customer or a restaurant staff.</p>
                <p>The staff can decide what items are on each menu while the customers can choose one item from each category on a menu.</p>
                <p>After that, the customer can choose the quantity of their meals and place order.</p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <hr>
                <h2 class="intro-text text-center">Our Team:
                    <strong>The Devil's Rejects</strong>
                </h2>
                <hr>
            </div>
            <div class="col-sm-6 text-center">
                <img width="300" height="260" src="https://lh3.googleusercontent.com/-szdjRsswLvQ/AAAAAAAAAAI/AAAAAAAAAIg/CG7A9m8yI0Y/s100-c-k-no/photo.jpg" alt=Jiaming Dong">
                <h3>Jiaming Dong
                    <small>Administrator</small>
                </h3>
            </div>
            <div class="col-sm-6 text-center">
                <img width="300" height="260" src="https://i.ytimg.com/vi/qSufrWXQSxg/hqdefault.jpg" alt="Max Geng">
                <h3>Max Geng
                    <small>Customer Service</small>
                </h3>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

</div>

<?php
require_once ("footer.php");
?>

