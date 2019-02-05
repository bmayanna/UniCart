<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';
//$product_id = $_GET['itemid'];
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

<!-- Primary Navigation
                ============================================= -->
                    <nav id="primary-menu">

                        <ul>
                            <li class="current">
                                <a href="index.html"><div>Home</div></a>

                            </li>

                            </li>
							<li class="mega-menu">
                                <a href="Login/index.html"><div>Login</div></a>

                            </li>
							<li class="mega-menu">
                                <a href="FullscreenForm/FullscreenForm/index.html"><div>Register</div></a>

                            </li>
							<li class="mega-menu">
                                <a href="services.php"><div>Profile</div></a>

                            </li>
                        </ul>

                        <!-- Top Cart
                    ============================================= -->
                        <!-- #top-cart end -->
                        <!-- Top Search
                    ============================================= -->
                    </nav>
<!-- #primary-menu end -->

				</div>

			</div>

		</header><!-- #header end -->
    </nav>

    <div class="row" style="margin-top:10px;">
      <div class="small-12">
        <?php
          $i=0;
          $product_id = array();
          $product_quantity = array();
          $qty = 1;

          $result = $mysqli->query('SELECT * FROM items WHERE type = \'sell\'');
          if($result === FALSE){
            die(mysql_error());
          }

          if($result){

            while($obj = $result->fetch_object()) {

              echo '<div class="large-4 columns">';
              echo '<p><h3>'.$obj->itemname.'</h3></p>';
              //echo '<img src="imagess/'.$obj->itempic.'"/>';
              echo '<img src="imagess/place_holder.jpg"/>';
              echo '<p><strong>Product Code</strong>: '.$obj->itemid.'</p>';
              echo '<p><strong>Description</strong>: '.$obj->description.'</p>';
          //    echo '<p><strong>Units Available</strong>: '.$obj->qty.'</p>';
              echo '<p><strong>Price (Per Unit)</strong>: '.$currency.$obj->price.'</p>';



             if($qty >= 0){
                echo '<p><a href="view_product"><input type="button" value="View Product" style="clear:both; background: #0078A0; border: none; color: #fff; font-size: 1em; padding: 10px;" /></a></p>';
                echo '<p><a href="update-cart.php?action=add&id='.$obj->itemid.'"><input type="submit" value="Add To Cart" style="clear:both; background: #0078A0; border: none; color: #fff; font-size: 1em; padding: 10px;" /></a></p>';
              }
              else {
                echo 'Out Of Stock!';
              }
              echo '</div>';

              $i++;
            }

          }

          $_SESSION['itemid'] = $product_id;


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
    <div id="wrapper" class="clearfix">
      <!-- Go To Top
    	============================================= -->
    	<div id="gotoTop" class="icon-angle-up"></div>

    	<!-- External JavaScripts
    	============================================= -->
    	<script src="js/jquery.js"></script>
    	<script src="js/plugins.js"></script>

    	<!-- Footer Scripts
    	============================================= -->
    	<script src="js/functions.js"></script>

   <!-- <script src="js/vendor/jquery.js"></script>-->
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
