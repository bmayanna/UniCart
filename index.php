<?php   session_start();  ?>

<?php
      if(!isset($_SESSION['in'])) // If session is not set then redirect to Login Page
       {
           $_SESSION['in']= "no";
       }

?>

<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />
    <!--slider---->

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/slider/custom.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.css"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Stylesheets
    ============================================= -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="style.css" type="text/css" />
    <link rel="stylesheet" href="css/dark.css" type="text/css" />
    <link rel="stylesheet" href="css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="css/animate.css" type="text/css" />
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />

    <!---lists-->
    <link rel="stylesheet" type="text/css" href="Baraja/css/baraja.css" />
    <link rel="stylesheet" type="text/css" href="Baraja/css/demo.css" />
    <link rel="stylesheet" type="text/css" href="Baraja/css/custom.css" />
    <script type="text/javascript" src="Baraja/js/modernizr.custom.79639.js"></script>

<!--Typography-->

	<link rel="stylesheet" type="text/css" href="TS/TextStylesHoverEffects/css/demo.css" />
	<link rel="stylesheet" type="text/css" href="TS/TextStylesHoverEffects/css/linkstyles.css" />

  <!--Button-->

		<link rel="stylesheet" type="text/css" href="BS/ButtonStylesInspiration/css/vicons-font.css" />
		<link rel="stylesheet" type="text/css" href="BS/ButtonStylesInspiration/css/buttons.css" />

		<!--circel-->


		<link rel="stylesheet" type="text/css" href="CH/css/common.css" />
        <link rel="stylesheet" type="text/css" href="CH/css/style3.css" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,700' rel='stylesheet' type='text/css' />
		<script type="text/javascript" src="CH/js/modernizr.custom.79639.js"></script>
		 <script  type="text/javascript" src="js/components/hscreen.js"></script>

   <!--seperator-->
 	<link rel="stylesheet" type="text/css" href="ModalWindowEffects/ModalWindowEffects/css/component.css" />

    <link rel="stylesheet" href="css/responsive.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lt IE 9]>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
    <!-- SLIDER REVOLUTION 5.x CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="include/rs-plugin/css/settings.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="include/rs-plugin/css/layers.css">
    <link rel="stylesheet" type="text/css" href="include/rs-plugin/css/navigation.css">


    <!-- Document Title
    ============================================= -->
    <title>Home - UniCart</title>

    <style>

        .revo-slider-emphasis-text {
            font-size: 64px;
            font-weight: 700;
            letter-spacing: -1px;
            font-family: 'Raleway', sans-serif;
            padding: 15px 20px;
            border-top: 2px solid #FFF;
            border-bottom: 2px solid #FFF;
        }

        .revo-slider-desc-text {
            font-size: 20px;
            font-family: 'Lato', sans-serif;
            width: 650px;
            text-align: center;
            line-height: 1.5;
        }

        .revo-slider-caps-text {
            font-size: 16px;
            font-weight: 400;
            letter-spacing: 3px;
            font-family: 'Raleway', sans-serif;
        }

        .tp-video-play-button {
            display: none !important;
        }

        .tp-caption {
            white-space: nowrap;
        }
    </style>

</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
    <div id="wrapper" class="clearfix">

        <!-- Header
    ============================================= -->
        <header id="header" class="transparent-header full-header" data-sticky-class="not-dark">

            <div id="header-wrap">

                <div class="container clearfix">

                    <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                    <!-- Logo
                ============================================= -->
                    <div id="logo">
                        <a href="index.php" class="standard-logo" data-dark-logo="images/logo-dark.png"><img src="images/logo.png" alt="Canvas Logo"></a>
                        <a href="index.php" class="retina-logo" data-dark-logo="images/logo-dark@2x.png"><img src="images/logo@2x.png" alt="Canvas Logo"></a>
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
                               <!-- <a href="Login/index.html"><div>Login</div></a>-->

                            </li>
							<li class="mega-menu">
                             <?php
  if($_SESSION["in"] != "yes") {
      echo '<a href="FullscreenForm/FullscreenForm/index.html"><div>Register</div></a>';
  }
  ?>
                               <!-- <a href="FullscreenForm/FullscreenForm/index.html"><div>Register</div></a>-->

                            </li>

                            <li class="mega-menu">
                                <a href="products.php"><div>Buy</div></a>

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
                               <!-- <a href="logout.php"><div>Logout</div></a>-->

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
        <!-- Slider
    ============================================= -->
        <section id="slider" class="slider-element revslider-wrap slider-parallax clearfix">
            <div class="slider-parallax-inner">
                <div id="rev_slider_579_1_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="default-slider" style="padding:0px;">
                    <!-- START REVOLUTION SLIDER 5.1.4 fullscreen mode -->
                    <div id="rev_slider_579_1" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.1.4">
                        <ul>
                            <!-- SLIDE  -->

                            <li class="dark" data-transition="slideup" data-slotamount="1" data-masterspeed="1000" data-thumb="images/bgs.jpg" data-fstransition="fade" data-fsmasterspeed="1000" data-fsslotamount="7" data-saveperformance="off" data-title="Unlimited Homepages" style="opacity: 0.8">
                                <!-- MAIN IMAGE -->
                                <img src="images/bgs.jpg" alt="video_woman_cover3" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" style="opacity: 0.8!important">

                                <div class="tp-caption ltl tp-resizeme revo-slider-caps-text"
                                     data-x="40"
                                     data-y="120"
                                     data-transform_in="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;s:800;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                                     data-speed="800"
                                     data-start="1200"
                                     data-easing="easeOutQuad"
                                     data-splitin="none"
                                     data-splitout="none"
                                     data-elementdelay="0.01"
                                     data-endelementdelay="0.1"
                                     data-endspeed="1000"
                                     data-endeasing="Power4.easeIn" style="z-index: 11; white-space: nowrap;">The Best Marketplace </div>

                                <div class="tp-caption ltl tp-resizeme revo-slider-emphasis-text nopadding noborder uppercase"
                                     data-x="37"
                                     data-y="140"
                                     data-transform_in="x:5;y:0;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:5;skewY:0;opacity:0;s:800;transformPerspective:200;transformOrigin:50% 0%;"
                                     data-speed="800"
                                     data-start="1400"
                                     data-easing="easeOutQuad"
                                     data-splitin="chars"
                                     data-splitout="none"
                                     data-elementdelay="0.1"
                                     data-endelementdelay="0.1"
                                     data-endspeed="1000"
                                     data-endeasing="Power4.easeIn" style="z-index: 11; font-size: 56px;white-space: nowrap;">Welcome to UniCart</div>

                                <div class="tp-caption ltl tp-resizeme revo-slider-desc-text tleft"
                                     data-x="40"
                                     data-y="240"
                                     data-transform_in="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;s:800;transformPerspective:200;transformOrigin:50% 0%;"
                                     data-speed="800"
                                     data-start="1600"
                                     data-easing="easeOutQuad"
                                     data-splitin="none"
                                     data-splitout="none"
                                     data-elementdelay="0.01"
                                     data-endelementdelay="0.1"
                                     data-endspeed="1000"
                                     data-endeasing="Power4.easeIn" style="z-index: 11; max-width: 550px; white-space: normal;">Now Sell, Buy, and Rent Extra Stuffs within Seconds</div>

                                <div class="tp-caption ltl tp-resizeme"
                                     data-x="40"
                                     data-y="345"
                                     data-transform_in="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;s:800;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                                     data-speed="800"
                                     data-start="1800"
                                     data-easing="easeOutQuad"
                                     data-splitin="none"
                                     data-splitout="none"
                                     data-elementdelay="0.01"
                                     data-endelementdelay="0.1"
                                     data-endspeed="1300"
                                     data-endeasing="Power4.easeIn" style="z-index: 11;">
                                     
                                     <?php
  if($_SESSION["in"] == "yes") {
      echo '<a href="FullscreenForm/FullscreenForm/Additem.html" target="_blank" class="button button-border button-white button-light button-large button-rounded tright nomargin"><span>Add Item</span> <i class="icon-angle-right"></i></a><br>';
  }
  else {
	   echo '<a href="FullscreenForm/FullscreenForm/index.html" target="_blank" class="button button-border button-white button-light button-large button-rounded tright nomargin"><span>Register</span> <i class="icon-angle-right"></i></a><br>';
  }
  ?>
                                     
                                     
                                      <?php
  if($_SESSION["in"] == "yes") {
      echo '<a href="logout.php" class="button button-border button-white button-light button-large button-rounded tright nomargin"><span>Logout</span> <i class="icon-angle-right"></i></a><br>';
  }
  else {
	   echo '<a href="#" class="button button-border button-white button-light button-large button-rounded tright nomargin md-trigger" data-modal="modal-16"><span>Login</span> <i class="icon-angle-right"></i></a>';
  }
  ?>
                                     
                                     </div>


                            </li>

                        </ul>
                    </div>
                </div><!-- END REVOLUTION SLIDER -->
            </div>

        </section>



            <!-- Content
        ============================================= -->
            <section id="content">

                <div class="content-wrap">

                    <div class="container clearfix">

                        <div class="divcenter center clearfix" style="max-width: 900px;">

                            <h1>Welcome! This is <span>UniCart</span></h1>
                            <h2>A unique and one stop platform to buy, sell, rent all the garage items </h2>
                        </div>
			<div class="md-modal md-effect-16" id="modal-16">
			<div class="md-content">
				<h3>Login</h3>
				<div>
					<p>PLease fill the credentials to enter the dashboard</p>
					<ul>
						<form method="post" action="login.php">

						<li>EMAIL<br>	<input type="email" name="email" id="email"/></li>

						<li>PASSWORD<br> <input type="password" name="password" id="password"/> </li>
							<li>
							<button class="buttonf" name="submit" type="submit"> Submit</button>


								</li>
						</form>
					</ul>

				</div>
			</div>
		</div>


						<div class="md-overlay"></div>
                        <div class="line"></div>

                    </div>

                    <div class="clear"></div>

                    <div class="row bottommargin-lg common-height">

                       <ul class="ch-grid">
					<li>
						<div class="ch-item">
							<div class="ch-info">
								<h3>UNIQUE</h3>

								<p>
                                
                                 <?php
  if($_SESSION["in"] == "yes") {
      echo '<a href="FullscreenForm/FullscreenForm/Additem.html">Add Item</a>';
  }
  else {
	   echo '<a href="Login/index.html" target="_blank">Sign In</a>';
  }
  ?>
                                </p>
                               
							</div>
							<div class="ch-thumb ch-img-1"></div>
						</div>
					</li>
					<li>
						<div class="ch-item">
							<div class="ch-info">
								<h3>ONE STOP</h3>
								<p> 
                                
                                <?php
  if($_SESSION["in"] == "yes") {
      echo '<a href="services.php">Profile</a>';
  }
  else {
	   echo '   <a href="FullscreenForm/FullscreenForm/index.html" target="_blank">Sign Up</a>';
  }
  ?>
                                
 </p>
							</div>
							<div class="ch-thumb ch-img-2"></div>
						</div>
					</li>
					<li>
						<div class="ch-item">
							<div class="ch-info">
								<h3>TRADING</h3>
                                
								<p>
                              <?php
  if($_SESSION["in"] == "yes") {
      echo '<a href="logout.php">Logout</a>';
  }
  else {
	   echo '   <a href="#" target="_blank">Home</a>';
  }
  ?>
                                
                                </p>
							</div>
							<div class="ch-thumb ch-img-3"></div>
						</div>
					</li>
				</ul>

                    </div>

     <div class="line"></div>

<!--slider new-->


    </div>

                   <!------------------------------>

				<a class="link link--kumya" href="#" style="textalign:center;"><span data-letters="Recently Added">Recently Added</span></a>


                    <div class="container">
					<div id = "recentrow" class="row">
						<div class="col-md-6 col-sm-6 col-xs-12">
							<h3></h3>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6 hidden-xs">
							<div class="controls pull-right">
								<a class="left fa fa-chevron-left btn btn-info " href="#carousel-example" data-slide="prev"></a><a class="right fa fa-chevron-right btn btn-info" href="#carousel-example" data-slide="next"></a>
							</div>
						</div>
					</div>
					<div id="carousel-example" class="carousel slide hidden-xs" data-ride="carousel" data-type="multi">
						<div class="carousel-inner">
							<div class="item active">
								<div id="activerecent" class="row">

								</div>
							</div>
							<div class="item">
								<div id = "passiverecent" class="row">
									<script> createrecent(); </script>
							</div>
						</div>
					</div>
				</div>
			</div>

    <div class="section notopborder topmargin-sm bottommargin-sm noborder" style="background-image: url(images/line.jpg);    opacity: 0.6;height: 10px;background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">



					</div>

					<a class="link link--kumya" href="#" style="textalign:center;"><span data-letters="Top Bidding">Top Bidding</span></a>

                    <div class="container">
					<div id = "topbidrow" class="row">
						<div class="col-md-6 col-sm-6 col-xs-12">
							<h3></h3>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6 hidden-xs">
							<div class="controls pull-right">
								<a class="left fa fa-chevron-left btn btn-info " href="#carousel-example1" data-slide="prev"></a><a class="right fa fa-chevron-right btn btn-info" href="#carousel-example" data-slide="next"></a>
							</div>
						</div>
					</div>
					<div id="carousel-example1" class="carousel slide hidden-xs" data-ride="carousel" data-type="multi">
						<div class="carousel-inner">
							<div class="item active">
								<div id="activetopbid" class="row">

								</div>
							</div>
							<div class="item">
								<div id = "passivetopbid" class="row">
									<script> createtopbid(); </script>
							</div>
						</div>
					</div>
				</div>
			</div>

    <div class="section notopborder topmargin-sm bottommargin-sm noborder" style="background-image: url(images/line.jpg);    opacity: 0.6;
    height: 10px;background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">

					</div>

     <div class="section notopborder topmargin-sm bottommargin-sm noborder nobg" style="padding: 0">

                        <div class="container clearfix" style="padding: 0">

                            <div class="col_one_fourth nobottommargin center" data-animate="bounceIn">
                                <i class="i-plain i-xlarge divcenter nobottommargin icon-code"></i>
                                <div class="counter counter-lined"><span data-from="1" data-to="16" data-refresh-interval="50" data-speed="2000"></span>K+</div>
                                <h5>Users Registered</h5>
                            </div>

                            <div class="col_one_fourth nobottommargin center" data-animate="bounceIn" data-delay="200">
                                <i class="i-plain i-xlarge divcenter nobottommargin icon-magic"></i>
                                <div class="counter counter-lined"><span data-from="120" data-to="340" data-refresh-interval="100" data-speed="2500"></span>+</div>
                                <h5>Star Ratings Received</h5>
                            </div>

                            <div class="col_one_fourth nobottommargin center" data-animate="bounceIn" data-delay="400">
                                <i class="i-plain i-xlarge divcenter nobottommargin icon-file-text"></i>
                                <div class="counter counter-lined"><span data-from="100" data-to="896" data-refresh-interval="25" data-speed="3500"></span>*</div>
                                <h5>No of Transactions</h5>
                            </div>

                            <div class="col_one_fourth nobottommargin center col_last" data-animate="bounceIn" data-delay="600">
                                <i class="i-plain i-xlarge divcenter nobottommargin icon-time"></i>
                                <div class="counter counter-lined"><span data-from="60" data-to="1200" data-refresh-interval="30" data-speed="2700"></span>+</div>
                                <h5>Bidding Times</h5>
                            </div>

                        </div>

                    </div>
			</div>

		</section><!-- #content end -->

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

	<!-- Modal JavaScripts
	============================================= -->

	<div class="md-overlay"></div><!-- the overlay element -->

		<!-- classie.js by @desandro: https://github.com/desandro/classie -->
		<script src="ModalWindowEffects/ModalWindowEffects/js/classie.js"></script>
		<script src="ModalWindowEffects/ModalWindowEffects/js/modalEffects.js"></script>

		<!-- for the blur effect -->
		<!-- by @derSchepp https://github.com/Schepp/CSS-Filters-Polyfill -->
		<script>
			// this is important for IEs
			var polyfilter_scriptpath = '/js/';
		</script>
		<script src="ModalWindowEffects/ModalWindowEffects/js/cssParser.js"></script>
		<script src="ModalWindowEffects/ModalWindowEffects/js/css-filters-polyfill.js"></script>

	<!-- Footer Scripts
	============================================= -->
	<script src="js/functions.js"></script>

	<!-- SLIDER REVOLUTION 5.x SCRIPTS  -->
	<script src="include/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script src="include/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

	<script src="include/rs-plugin/js/extensions/revolution.extension.video.min.js"></script>
	<script src="include/rs-plugin/js/extensions/revolution.extension.slideanims.min.js"></script>
	<script src="include/rs-plugin/js/extensions/revolution.extension.actions.min.js"></script>
	<script src="include/rs-plugin/js/extensions/revolution.extension.layeranimation.min.js"></script>
	<script src="include/rs-plugin/js/extensions/revolution.extension.kenburn.min.js"></script>
	<script src="include/rs-plugin/js/extensions/revolution.extension.navigation.min.js"></script>
	<script src="include/rs-plugin/js/extensions/revolution.extension.migration.min.js"></script>
	<script src="include/rs-plugin/js/extensions/revolution.extension.parallax.min.js"></script>

	<script>

		var tpj = jQuery;

		var revapi202;
		tpj(document).ready(function() {
			if (tpj("#rev_slider_579_1").revolution == undefined) {
				revslider_showDoubleJqueryError("#rev_slider_579_1");
			} else {
				revapi202 = tpj("#rev_slider_579_1").show().revolution({
					sliderType: "standard",
					jsFileLocation: "include/rs-plugin/js/",
					sliderLayout: "fullscreen",
					dottedOverlay: "none",
					delay: 9000,
					responsiveLevels: [1140, 1024, 778, 480],
					visibilityLevels: [1140, 1024, 778, 480],
					gridwidth: [1140, 1024, 778, 480],
					gridheight: [728, 768, 960, 720],
					lazyType: "none",
					shadow: 0,
					spinner: "off",
					stopLoop: "on",
					stopAfterLoops: 0,
					stopAtSlide: 1,
					shuffle: "off",
					autoHeight: "off",
					fullScreenAutoWidth: "off",
					fullScreenAlignForce: "off",
					fullScreenOffsetContainer: "",
					fullScreenOffset: "",
					disableProgressBar: "on",
					hideThumbsOnMobile: "off",
					hideSliderAtLimit: 0,
					hideCaptionAtLimit: 0,
					hideAllCaptionAtLilmit: 0,
					debugMode: false,
					fallbacks: {
						simplifyAll:"off",
						disableFocusListener:false,
					},
					parallax: {
						type:"mouse",
						origo:"slidercenter",
						speed:300,
						levels:[2,4,6,8,10,12,14,16,18,20,22,24,49,50,51,55],
					},
					navigation: {
						keyboardNavigation:"off",
						keyboard_direction: "horizontal",
						mouseScrollNavigation:"off",
						onHoverStop:"off",
						touch:{
							touchenabled:"on",
							swipe_threshold: 75,
							swipe_min_touches: 1,
							swipe_direction: "horizontal",
							drag_block_vertical: false
						},
						arrows: {
							style: "hermes",
							enable: true,
							hide_onmobile: false,
							hide_onleave: false,
							tmp: '<div class="tp-arr-allwrapper">	<div class="tp-arr-imgholder"></div>	<div class="tp-arr-titleholder">{{title}}</div>	</div>',
							left: {
								h_align: "left",
								v_align: "center",
								h_offset: 10,
								v_offset: 0
							},
							right: {
								h_align: "right",
								v_align: "center",
								h_offset: 10,
								v_offset: 0
							}
						}
					}
				});
				revapi202.bind("revolution.slide.onloaded",function (e) {
					setTimeout( function(){ SEMICOLON.slider.sliderParallaxDimensions(); }, 200 );
				});

				revapi202.bind("revolution.slide.onchange",function (e,data) {
					SEMICOLON.slider.revolutionSliderMenu();
				});
			}
		}); /*ready*/

	</script>





</body>
</html>
