<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';
$product_id = $_GET['itemid'];
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Products || UniCart</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
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


    <nav class="top-bar" data-topbar role="navigation">
      <ul class="title-area">
        <li class="name">
          <h1><a href="index.php">UniCart</a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
      </ul>
	   <section class="top-bar-section">
      <!-- Right Nav Section -->
	  <li><a href="cart.php">View Cart</a></li>
        <!-- <ul class="right">
          <li><a href="about.php">About</a></li>
          <li class='active'><a href="products.php">Products</a></li>

          <li><a href="orders.php">My Orders</a></li>
          <li><a href="contact.php">Contact</a></li> -->


          <!-- // if(isset($_SESSION['username'])){
          //   echo '<li><a href="account.php">My Account</a></li>';
          //   echo '<li><a href="logout.php">Log Out</a></li>';
          // }
          // else{
          //   echo '<li><a href="login.php">Log In</a></li>';
          //   echo '<li><a href="register.php">Register</a></li>';
          // } -->

        </ul>
       </section>
    </nav>
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




        <footer style="margin-top:10px;">
           <p style="text-align:center; font-size:0.8em;clear:both;">&copy; UniCart. All Rights Reserved.</p>
        </footer>

      </div>
    </div>





   <!-- <script src="js/vendor/jquery.js"></script>-->
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
