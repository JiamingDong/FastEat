<?php
    require_once("views/fdn_header.php");
?>
    <link rel="stylesheet" type="text/css" href="resources/css/indexstyle.css">
    <!-- Custom CSS -->
    <link href="resources/css/fast_eat.css" rel="stylesheet">

    <div class="brand">Fast Eat</div>
    <div class="address-bar">183 Rutgers Road | Piscataway, NJ 08854 | 312.401.5683</div>
    <div class="row" style="margin-bottom: 50px;">
        <div class="large-2 columns">&nbsp;</div>
        <div class="large-8 columns">
            <div class="signup-panel">
                <p class="welcome" style="color: lightgoldenrodyellow;">Welcome to FastEat!</p>
                <form action="controllers/auth_controller.php" method="post">
                    <?php
                    if (isset($_SESSION["errors"])) {
                        ?>
                        <div class="row collapse">
                            <div class="small-10 columns error">
                                    <?php
                                    $errors = $_SESSION["errors"];
                                    if (isset($errors["auth"])) {
                                        echo '<div data-alert class="alert-box alert radius">
                                                <strong>Error!</strong> - '.$errors["auth"].'
                                                <a href="#" class="close">&times;</a>
                                              </div>';
                                    }
                                    ?>
                            </div>
                        </div>
                        <?php
                    }
                    ?>

                    <?php
                    if(isset($_SESSION["success"])){
                        ?>
                        <div class="row collapse">
                            <div class="small-6 columns success">
                                <?php
                                echo "<span class='success'>".$_SESSION["success"]."</span>";
                                ?>
                            </div>
                        </div>
                        <div class="clearfix" />
                        <?php
                    }
                    ?>

                    <div class="row collapse">
                        <div class="small-2 columns">
                            <span class="prefix"><i class="fi-mail" style="color: dodgerblue;"></i></span>
                        </div>
                        <div class="small-10  columns">
                            <input type="email" name="email" value="
                            <?php
                                if(isset($_SESSION['remember_me']) && $_SESSION['remember_me'] != "empty") {
                                    echo $_SESSION['remember_me'];
                                }
                            ?>" placeholder="Enter Your Email" /><?php
                                if(isset($errors["validation_email"])) {
                                    echo '<div data-alert class="alert-box alert radius">
                                            <strong>Error!</strong> - '.$errors["validation_email"].'
                                            <a href="#" class="close">&times;</a>
                                          </div>';
                                }
                            ?>
                        </div>
                    </div>
                    <div class="row collapse">
                        <div class="small-2 columns ">
                            <span class="prefix"><i class="fi-lock" style="color: dodgerblue;"></i></span>
                        </div>
                        <div class="small-10 columns ">
                            <input type="password" value="" name="password" placeholder="Enter Your Password" /><?php
                            if(isset($errors["validation_password"])) {
                                echo '<div data-alert class="alert-box alert radius">
                                            <strong>Error!</strong> - '.$errors["validation_password"].'
                                            <a href="#" class="close">&times;</a>
                                          </div>';
                            }
                            ?>
                        </div>
                    </div>

                    <div class="row collapse">
                        <div class="small-2 columns ">
                            &nbsp;
                        </div>
                        <div class="small-10 columns ">
                            <input type="submit" name="action" class="button" value="Login"/>
                        </div>
                    </div>

                    <div class="row collapse">
                        <div class="small-3 large-3 medium-3 columns">
                            <input id="remember_me" name="remember_me" type="checkbox"
                                <?php
                                if(isset($_SESSION['remember_me']) && $_SESSION['remember_me'] != "empty") {
                                    echo 'checked="checked"';
                                }
                                ?>
                            ><label for="remember_me" style="color: slategrey;">Remember me</label>
                        </div>
                    </div>
                </form>

                <p align="left" style="color: lightgoldenrodyellow;">New user? <a href="views/registration_form.php">Sign up here &raquo</a></p>
            </div>
        </div>
        <div class="large-2 columns">&nbsp;</div>
    </div>

    <script>
        $('.alert-box > a.close').click(function() { $(this).closest('[data-alert]').fadeOut(); });
    </script>
<?php
    require_once("views/footer.php");
    session_unset();
    session_destroy();
?>