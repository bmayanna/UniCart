<?php
include 'connection_payment.php';
session_start();

$_SESSION['itemid1']= 7 ;

$itemid = $_SESSION['itemid1'];

?>


<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

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

	<!-- Document Title
	============================================= -->
	<title>Cart | Canvas</title>

</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Header
		============================================= -->
		<header id="header" class="full-header">

			<div id="header-wrap">

				<div class="container clearfix">

					<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

					<!-- Logo
					============================================= -->
					<div id="logo">
						<a href="index.html" class="standard-logo" data-dark-logo="images/logo-dark.png"><img src="images/unicartlogo.png" alt="Canvas Logo"></a>
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


				</div>

			</div>

		</header><!-- #header end -->
		

		<h4>Payment is Failed</h4>
		
		
<!-- Footer
        		============================================= -->
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


	</div><!-- #wrapper end -->

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

</body>
</html>