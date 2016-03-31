<?php
/**
 * Created by PhpStorm.
 * User: jiamingdong
 * Date: 3/30/16
 * Time: 1:59 PM
 */

?>
<!-- Navigation -->
<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
            <a class="navbar-brand" href="index.html">Fast Eat</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="home.php">Home</a>
                </li>
                <li>
                    <a href="#"><?php echo $current_user_obj["user_name"];?></a>
                </li>
                <li>
                </li>
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">Options <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="about.php">About</a></li>
                        <li class="divider"></li>
                        <li><a href="../controllers/auth_controller.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>