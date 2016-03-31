<?php
/**
 * Created by PhpStorm.
 * User: jiamingdong
 * Date: 3/28/16
 * Time: 10:51 PM
 */
require_once("fdn_header.php");
?>

<link rel="stylesheet" type="text/css" href="../resources/css/indexstyle.css">
<!-- Custom CSS -->
<link href="../resources/css/fast_eat.css" rel="stylesheet">

<div class="brand">Fast Eat</div>
<div class="address-bar">183 Rutgers Road | Piscataway, NJ 08854 | 312.401.5683</div>

<div class="row" style="margin-bottom: 50px;">
    <div class="large-2 columns">&nbsp;</div>
    <div class="large-8 columns">
        <div class="signup-panel">
            <p class="welcome" style="color: lightgoldenrodyellow;">Create Your FastEat Account</p>

            <?php
                $errs = [];
                if (isset($_SESSION["errors"]) && count($_SESSION["errors"]) > 0) {
                    $errs = $_SESSION["errors"];
                }
            ?>

            <form action="<?php echo CONTROLLER;?>/register_controller.php" method="post">
                <div class="row collapse">
                    <div class="small-2  columns">
                        <span class="prefix"><i class="fi-torso" style="color: green;"></i></span>
                    </div>
                    <div class="small-10  columns">
                        <input type="text" name="username" placeholder="Enter Your Username">
                    </div>
                    <div class="small-8  columns">
                        <?php
                        if (isset($errs["username"])) {
                            echo "<span class='error'>".$errs["username"]."</span>";
                        }
                        ?>
                    </div>
                </div>
                <div class="row collapse">
                    <div class="small-2 columns">
                        <span class="prefix"><i class="fi-mail" style="color: green;"></i></span>
                    </div>
                    <div class="small-10  columns">
                        <input type="email" name="email" placeholder="Enter Your Email">
                    </div>
                    <div class="small-8  columns">
                        <?php
                        if (isset($errs["email"])) {
                            echo "<span class='error'>".$errs["email"]."</span>";
                        }
                        ?>
                    </div>
                </div>
                <div class="row collapse">
                    <div class="small-2 columns ">
                        <span class="prefix"><i class="fi-lock" style="color: green;"></i></span>
                    </div>
                    <div class="small-10 columns ">
                        <input type="password" name="password" placeholder="Enter Your Password">
                    </div>
                    <div class="small-8  columns">
                        <?php
                        if (isset($errs["password"])) {
                            echo "<span class='error'>".$errs["password"]."</span>";
                        }
                        ?>
                    </div>
                </div>
                <div class="row collapse">
                    <div class="small-2 columns ">
                        <span class="prefix"><i class="fi-lock" style="color: green;"></i></span>
                    </div>
                    <div class="small-10 columns ">
                        <input type="password" name="password_confirm" placeholder="Confirm Your Password">
                    </div>
                    <div class="small-8  columns">
                        <?php
                        if (isset($errs["password_confirm"])) {
                            echo "<span class='error'>".$errs["password_confirm"]."</span>";
                        }
                        ?>
                    </div>
                </div>
                <div class="row collapse">
                    <div class="small-2 columns ">
                        <span class="prefix"><i class="fi-torsos" style="color: green;"></i></span>
                    </div>
                    <div class="small-10 columns ">
                        <select name="usertype" style="height: 50px;">
                            <option value="0" selected="selected">Customer</option>
                            <option value="1">Staff</option>
                        </select>
                    </div>
                </div>
                <div class="row collapse">
                    <div class="small-2 columns ">
                        &nbsp;
                    </div>
                    <div class="small-10 columns ">
                        <input type="submit" name="action" class="button success" value="Register"/>
                    </div>
                </div>
            </form>
            <p style="color: lightgoldenrodyellow;">Already have an account? <a href="../index.php">Sign in here &raquo</a></p>
        </div>
    </div>
    <div class="large-2 columns">&nbsp;</div>
</div>

<?php
require_once ("footer.php");
?>
