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
                    <h2 class="intro-text text-center">Contact
                        <strong>Fast Eat</strong>
                    </h2>
                    <hr>
                </div>
                <div class="col-md-8">
                    <!-- Embedded Google Map using an iframe - to select your location find it on Google maps and paste the link as the iframe src. If you want to use the Google Maps API instead then have at it! -->
                    <iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?hl=en&amp;ie=UTF8&amp;ll=37.0625,-95.677068&amp;spn=56.506174,79.013672&amp;t=m&amp;z=4&amp;output=embed"></iframe>
                </div>
                <div class="col-md-4">
                    <p>Phone:
                        <strong>312.401.5683</strong>
                    </p>
                    <p>
                        Email 1: <strong><a href="mailto:jiamingd@uchicago.edu">jiamingd@uchicago.edu</a></strong><br/>
                        Email 2: <strong><a href="mailto:gengruoxi2013@gmail.com">gengruoxi2013@gmail.com</a></strong>
                    </p>
                    <p>Address:
                        <strong>183 Rutgers Road
                            <br>Piscataway, NJ 08854</strong>
                    </p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Contact
                        <strong>form</strong>
                    </h2>
                    <hr>
                    <p>Please feel free to ontact us if you have any questions.</p>
                    <form role="form">
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <label>Your Name</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Your Email Address</label>
                                <input type="email" class="form-control">
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Your Phone Number</label>
                                <input type="tel" class="form-control">
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group col-lg-12">
                                <label>Your Message</label>
                                <textarea class="form-control" rows="6"></textarea>
                            </div>
                            <div class="form-group col-lg-12">
                                <input type="hidden" name="save" value="contact">
                                <button type="submit" class="btn btn-default">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
<?php
require_once ("footer.php");
?>
