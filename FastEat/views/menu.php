<?php
/**
 * Created by PhpStorm.
 * User: jiamingdong
 * Date: 3/31/16
 * Time: 12:52 AM
 */

require_once (__DIR__ . "/../configurations/config.php");
require_once (__DIR__ . "/../controllers/ensure_session.php");
require_once (__DIR__ . "/../controllers/actions_controller.php");
require_once (__DIR__ . "/../services/data_service.php");

$current_user = "Undefined user";
$current_user_obj = array();
if(isset($_SESSION["current_user"])){
    $current_user = $_SESSION["current_user"];
    $current_user_obj = get_user($current_user);
}

$current_menu_id = $_GET["menu_id"];

echo "<script type='text/javascript'>var menu_json_str = '".json_encode(get_menu($current_menu_id))."';</script>";

require_once("header.php");
require_once (__DIR__ . "/nav_bar.php");
?>

<script type="text/javascript">
    var current_menu = JSON.parse(menu_json_str);
    $(function () {
        $("#menu_name").text(current_menu.menu_name);
        $("img#menu_img").attr("src", current_menu.image_url);
        $("p#menu_desc").text(current_menu.menu_description);
    });
</script>

<div class="container">
    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <hr>
                <h2 class="intro-text text-center">
                    <strong id="menu_name">Untitled</strong> Cuisine
                </h2>
                <hr>
                <img id = "menu_img" style="height: 403px;" class="img-responsive img-border img-left" src="../resources/img/intro-pic.jpg" alt="">
                <hr class="visible-xs">
                <p id="menu_desc"></p>
            </div>
        </div>
    </div>
    <?php
    if ($current_user_obj["user_type"] == user_type_CUSTOMER) {
        // display customer interface
        require_once ("customer_interface.php");
    } else {
        // display restaurant staff interface
        require_once ("staff_interface.php");
    }
    ?>
</div>



<?php
require_once ("footer.php");
?>