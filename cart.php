<?php
	include 'config.php';
	// Get the session details
	session_start();
	if(!isset($_SESSION['userid'])) { // If session is not set then redirect to Login Page
           header("Location:Login/index.html");
    }

//	$item_id=$_SESSION['itemid1'] ;
	$user_id = $_SESSION['userid'];
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Products || UniCart</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />

    <!-- Stylesheets
    ============================================= -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="style.css" type="text/css" />
    <link rel="stylesheet" href="css/dark.css" type="text/css" />
    <link rel="stylesheet" href="css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="css/animate.css" type="text/css" />
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />
    <link rel="stylesheet" href="css/responsive.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="js/vendor/modernizr.js"></script>
    <style>

    .container11 {
        border: 2px solid #dedede;
        background-color: #f1f1f1;
        border-radius: 5px;
        padding: 10px;
        margin: 10px 0;
      max-width: 800px;
        margin: auto;
        width: 60%;
    }

    .darker11 {
        border-color: #ccc;
        background-color: #ddd;
    }

    .container11::after {
        content: "";
        clear: both;
        display: table;
    }

    .container11 img {
        float: left;
        max-width: 60px;
        width: 100%;
        margin-right: 20px;
        border-radius: 50%;
    }

    .container11 img.right {
        float: right;
        margin-left: 20px;
        margin-right:0;
    }

    .time-right {
        float: right;
        color: #aaa;
    }

    .time-left {
        float: left;
        color: #999;
    }
    </style>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cart || UniCart</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
    <body class="stretched">

    	<!-- Document Wrapper
    	============================================= -->
    <!--	<div id="wrapper" class="clearfix"> -->
    <!--
    	============================================= -->
      <header id="header" class="full-header">

        <div id="header-wrap">

          <div class="container clearfix">

            <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

            <!-- Logo
            ============================================= -->
            <div id="logo">
              <a href="index.html" class="standard-logo" data-dark-logo="images/logo-dark.png"><img src="images/logo.png" alt="Canvas Logo"></a>
              <a href="index.html" class="retina-logo" data-dark-logo="images/logo-dark@2x.png"><img src="images/logo@2x.png" alt="Canvas Logo"></a>
            </div><!-- #logo end -->

            <!-- Primary Navigation
            ============================================= -->
            <nav id="primary-menu">

                          <ul>
                              <li class="mega-menu">
                                  <a href="index.php"><div>Home</div></a>

                              </li>

                              </li>
                <li class="mega-menu">
                              <?php
    if($_SESSION["in"] != "yes") {
        echo '<a href="Login/index.html"><div>Login</div></a>';
    }
    ?>

                              </li>
                <li class="mega-menu">
                               <?php
    if($_SESSION["in"] != "yes") {
        echo '<a href="FullscreenForm/FullscreenForm/index.html"><div>Register</div></a>';
    }
    ?>

                              </li>

                              <li class="mega-menu">
                                  <a href=""><div>Buy</div></a>

                              </li>

                              <li class="mega-menu">
                                  <a href=""><div>Sell</div></a>

                              </li>

                              <li class="mega-menu">
                                  <a href=""><div>Rent</div></a>

                              </li>


                <li class="current">
                                  <a href="services.php"><div>Profile</div></a>

                              </li>


                        <li class="current">

                        <?php
    if($_SESSION["in"] == "yes") {
        echo '<a href="logout.php"><div>Logout</div></a>';
    }
    ?>

                              </li>


                          </ul>

                          <!-- Top Cart
                      ============================================= -->
                          <!-- #top-cart end -->
                          <!-- Top Search
                      ============================================= -->


                      </nav><!-- #primary-menu end -->


          </div>

        </div>

      </header><!-- #header end -->

  <!--  <nav class="top-bar" data-topbar role="navigation">
      <ul class="title-area">
        <li class="name">
          <h1><a href="index.php">UniCart</a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
      </ul> -->

      <section class="top-bar-section">
      <!-- Right Nav Section -->
        <!-- <ul class="right">
          <li><a href="about.php">About</a></li>
          <li><a href="products.php">Products</a></li>
          <li class="active"><a href="cart.php">View Cart</a></li>
          <li><a href="orders.php">My Orders</a></li>
          <li><a href="contact.php">Contact</a></li> -->
          <?php

          // if(isset($_SESSION['username'])){
          //   echo '<li><a href="account.php">My Account</a></li>';
          //   echo '<li><a href="logout.php">Log Out</a></li>';
          // }
          // else{
          //   echo '<li><a href="login.php">Log In</a></li>';
          //   echo '<li><a href="register.php">Register</a></li>';
          // }
          ?>
        </ul>
      </section>
    </nav>




    <div class="row" style="margin-top:10px;">
      <div class="large-12">
        <?php

          echo '<p><h3>Your Shopping Cart</h3></p>';

          if(isset($_SESSION['cart'])) {

            $total = 0;
            echo '<table>';
            echo '<tr>';
            echo '<th>Code</th>';
            echo '<th>Name</th>';
            echo '<th>Quantity</th>';
            echo '<th>Cost</th>';
            echo '</tr>';
            foreach($_SESSION['cart'] as $product_id => $quantity) {

            $result = $mysqli->query("SELECT itemid, itemname, description, qty, price FROM items WHERE itemid = ".$product_id);


            if($result){

              while($obj = $result->fetch_object()) {
                $cost = $obj->price * $quantity; //work out the line cost
                $total = $total + $cost; //add to the total cost

                echo '<tr>';
                echo '<td>'.$obj->itemid.'</td>';
                echo '<td>'.$obj->itemname.'</td>';
                echo '<td>'.$quantity.'&nbsp;<a class="button [secondary success alert]" style="padding:5px;" href="update-cart.php?action=add&id='.$product_id.'">+</a>&nbsp;<a class="button alert" style="padding:5px;" href="update-cart.php?action=remove&id='.$product_id.'">-</a></td>';
                echo '<td>'.$cost.'</td>';
                echo '</tr>';
              }
            }

          }



          echo '<tr>';
          echo '<td colspan="3" align="right">Total</td>';
          echo '<td>'.$total.'</td>';
          echo '</tr>';

          echo '<tr>';
          echo '<td colspan="4" align="right"><a href="update-cart.php?action=empty" class="button alert">Empty Cart</a>&nbsp;<a href="products.php" class="button [secondary success alert]">Continue Shopping</a>';
          if(isset($_SESSION['userid'])) {
            echo '<a href="payment.php"><button style="float:right;">PAY</button></a>';
          }

          else {
            echo '<a href="login.php"><button style="float:right;">Login</button></a>';
          }

          echo '</td>';

          echo '</tr>';
          echo '</table>';
        }

        else {
          echo "You have no items in your shopping cart.";
        }





          echo '</div>';
          echo '</div>';
          ?>



    <div class="row" style="margin-top:10px;">
      <div class="small-12">




        <footer id="footer" class="dark">



          <!-- Copyrights
          ============================================= -->
          <div id="copyrights">

            <div class="container clearfix">

              <div class="col_half">
                Copyrights &copy; 2018 All Rights Reserved by UniCart<br>

              </div>

              <div class="col_half col_last tright">
                <div class="fright clearfix">
                  <a href="#" class="social-icon si-small si-borderless si-facebook">
                    <i class="icon-facebook"></i>
                    <i class="icon-facebook"></i>
                  </a>

                  <a href="#" class="social-icon si-small si-borderless si-twitter">
                    <i class="icon-twitter"></i>
                    <i class="icon-twitter"></i>
                  </a>

                  <a href="#" class="social-icon si-small si-borderless si-gplus">
                    <i class="icon-gplus"></i>
                    <i class="icon-gplus"></i>
                  </a>

                  <a href="#" class="social-icon si-small si-borderless si-pinterest">
                    <i class="icon-pinterest"></i>
                    <i class="icon-pinterest"></i>
                  </a>

                  <a href="#" class="social-icon si-small si-borderless si-vimeo">
                    <i class="icon-vimeo"></i>
                    <i class="icon-vimeo"></i>
                  </a>

                  <a href="#" class="social-icon si-small si-borderless si-github">
                    <i class="icon-github"></i>
                    <i class="icon-github"></i>
                  </a>

                  <a href="#" class="social-icon si-small si-borderless si-yahoo">
                    <i class="icon-yahoo"></i>
                    <i class="icon-yahoo"></i>
                  </a>

                  <a href="#" class="social-icon si-small si-borderless si-linkedin">
                    <i class="icon-linkedin"></i>
                    <i class="icon-linkedin"></i>
                  </a>
                </div>

                <div class="clear"></div>

                <i class="icon-envelope2"></i> info@unicart.com <span class="middot">&middot;</span> <i class="icon-headphones"></i> +1315-315-315 <span class="middot">&middot;</span> <i class="icon-skype2"></i> UniCartOnSkype
              </div>

            </div>

          </div><!-- #copyrights end -->

        </footer><!-- #footer end -->

      </div>
    </div>





    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
