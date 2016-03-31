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

echo "<script type='text/javascript'>var menus_json_str = '".json_encode(all_menus())."';</script>";

require_once("header.php");
require_once (__DIR__ . "/nav_bar.php");
?>

<script>
    $(function() {
        var menus = JSON.parse(menus_json_str);
        var menu_num = menus.length;

        for (var i = 0; i < menu_num; i++) {
            // add indicators
            var li_elem = $("<li></li>");
            li_elem.attr({"data-target":"#carousel-example-generic",
                                 "data-slide-to":i});
            if (i == 0) li_elem.addClass("active");

            var indicator_list = $("ol#indicator_list");
            li_elem.appendTo(indicator_list);

            // wrapper for slides
            var item_div = $("<div></div>");
            item_div.addClass("item");
            if (i == 0) item_div.addClass("active");

            var title = $("<h1></h1>");
            title.addClass("brand-before");
            title.text(menus[i]["menu_name"]);

            var img = $("<img />").css("height", "531px").addClass("img-responsive img-full").attr({"src":menus[i]["image_url"], "alt":"Image not accessible!"});
            var img_link = $("<a href='menu.php?menu_id=" + menus[i]["menu_id"] + "'></a>");
            img.appendTo(img_link);

            item_div.append(title).append(img_link);
            $("#menu_slides").append(item_div);
        }
    });
</script>

<div class="container">
    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <hr>
                <h2 class="intro-text text-center">Pick up a
                    <strong>Menu</strong> below
                </h2>
                <hr>
            </div>
            <div class="col-lg-12 text-center">
                <div id="carousel-example-generic" class="carousel slide">
                    <!-- Indicators -->
                    <ol id="indicator_list" class="carousel-indicators hidden-xs">

                    </ol>

                    <!-- Wrapper for slides -->
                    <div id="menu_slides" class="carousel-inner">

                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="icon-prev"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="icon-next"></span>
                    </a>
                </div>

                <h2 class="brand-before">
                    <small>Welcome to</small>
                </h2>
                <h1 class="brand-name">Fast Eat</h1>
                <hr class="tagline-divider">
                <h2>
                    <small>By
                        <strong>Jiaming Dong & Max Geng</strong>
                    </small>
                </h2>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <hr>
                <h2 class="intro-text text-center">Build a website
                    <strong>worth visiting</strong>
                </h2>
                <hr>
                <img class="img-responsive img-border img-left" src="../resources/img/intro-pic.jpg" alt="">
                <hr class="visible-xs">
                <p>The boxes used in this template are nested inbetween a normal Bootstrap row and the start of your column layout. The boxes will be full-width boxes, so if you want to make them smaller then you will need to customize.</p>
                <p>A huge thanks to <a href="http://join.deathtothestockphoto.com/" target="_blank">Death to the Stock Photo</a> for allowing us to use the beautiful photos that make this template really come to life. When using this template, make sure your photos are decent. Also make sure that the file size on your photos is kept to a minumum to keep load times to a minimum.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc placerat diam quis nisl vestibulum dignissim. In hac habitasse platea dictumst. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <hr>
                <h2 class="intro-text text-center">Beautiful boxes
                    <strong>to showcase your content</strong>
                </h2>
                <hr>
                <p>Use as many boxes as you like, and put anything you want in them! They are great for just about anything, the sky's the limit!</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc placerat diam quis nisl vestibulum dignissim. In hac habitasse platea dictumst. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
            </div>
        </div>
    </div>

</div>

<?php
require_once ("footer.php");
?>
