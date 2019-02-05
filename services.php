<?php   session_start();  ?>

<?php
      if(!isset($_SESSION['userid'])) // If session is not set then redirect to Login Page
       {
           header("Location:Login/index.html"); 
       }
		$userid = $_SESSION['userid'];
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
	
	<!--circular-->
			<link rel="stylesheet" type="text/css" href="CircleFlipSlideshow/css/component.css" />
	<script src="CircleFlipSlideshow/js/modernizr.custom.js"></script>
	
	<!--tabs-->
		<link rel="stylesheet" type="text/css" href="FullWidthTabs/FullWidthTabs/css/component.css" />
	
	    <!---lists-->
    <link rel="stylesheet" type="text/css" href="Baraja/css/baraja.css" />
    <link rel="stylesheet" type="text/css" href="Baraja/css/demo.css" />
    <link rel="stylesheet" type="text/css" href="Baraja/css/custom.css" />
    <script type="text/javascript" src="Baraja/js/modernizr.custom.79639.js"></script>
    
    <script  type="text/javascript" src="Scriptss/Userdbsellfetch.js"></script> 

	<!-- Document Title
	============================================= -->
	<title>User Dashboard | UniCart</title>

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
                                
                            </li>   
							<li class="mega-menu">
                             <?php
  if($_SESSION["in"] != "yes") { 
      echo '<a href="FullscreenForm/FullscreenForm/index.html"><div>Register</div></a>';
  }
  ?>
                                
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

		<!-- Page Title
		============================================= -->
		<section id="page-title">

			<a href="#" class="button button-full center tright footer-stick">
					<div class="container clearfix">
						 <strong>USER DASHBOARD</strong> <i class="icon-caret-right" style="top:4px;"></i>
					</div>
				</a>	

		</section><!-- #page-title end -->
	
    <!--getting user details from database-->	
		<?php
$db_host = 'localhost'; 
$db_user = 'root'; 
$db_pass = ''; 
$db_name = 'unicart'; 

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}

$sql = "SELECT * 
		FROM users WHERE userid=$userid";
		
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);


?>

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">



				<div class="container clearfix">

					<div class="col_two_fifth topmargin nobottommargin" style="min-height: 350px;">
					<!--//needs help-->
										
						<div id="fc-slideshow" class="fc-slideshow">
							
					<ul class="fc-slides">
						<img src="<?php echo $row['picture'];?>" style="border-radius: 50%;">
					</ul>
				</div>
					
				
						
					
					</div>

					<div class="col_three_fifth nobottommargin col_last">

						<div class="heading-block">
							<?php echo'<h3>'.$row['firstname'].'</h3>';?>
							<span>This Dashboard contains all the primary information.</span>
							<a href="FullscreenForm/FullscreenForm/Additem.html" target="_blank" class="button button-border button-white button-light button-large button-rounded tright nomargin" style="    border-color: #EEE;
    color: #fff;
    background-color: black;"><span>ADD ITEM</span> <i class="icon-angle-right"></i></a>
						</div>

						<p><h3>
							<img src="images/sign-post.png" style="width: 40px; height: 40px;">ADDRESS</h3>
							<div class="list-type4">
<ol>
<li><a href="#">STREET: <?php echo $row['streetaddress'].'APARTMENT:&nbsp'.$row['apartment'].'</a></li>';?>
<li><a href="#">CITY<?php echo $row['city'].'STATE'.$row['state'].'</a></li>';?>
<li><a href="#">COUNTRY<?php echo $row['country'].'ZIP'.$row['zip'].'</a></li>';?>
</ol>
</div>
						</p>

						<p><h3>
							<img src="images/smartphone.png" style="width: 40px; height: 40px;">PHONE</h3>
							<div class="list-type4">
<ol>
<li><a href="#">PHONE:<?php echo $row['phone'].'</a></li>';?>
</ol>
</div>
						</p>

					</div>

					<div class="clear"></div><div class="line"></div>
			
			
			<script src="FullWidthTabs/FullWidthTabs/js/cbpFWTabs.js"></script>
		<script>
			new CBPFWTabs( document.getElementById( 'tabs' ) );
		</script>


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
						Copyrights &copy; 2014 All Rights Reserved by Canvas Inc.<br>
						<div class="copyright-links"><a href="#">Terms of Use</a> / <a href="#">Privacy Policy</a></div>
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

						<i class="icon-envelope2"></i> info@canvas.com <span class="middot">&middot;</span> <i class="icon-headphones"></i> +91-11-6541-6369 <span class="middot">&middot;</span> <i class="icon-skype2"></i> CanvasOnSkype
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

	<!-- Charts JS
	============================================= -->
	<script src="js/chart.js"></script>
	<script src="js/chart-utils.js"></script>

	

</body>
</html>