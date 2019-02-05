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
	<title>Item Description | UniCart</title>

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

		<!-- Page Title
		============================================= -->
        
        <!-- sscript to select item details from database-->
        
		<?php
$db_host = 'localhost'; 
$db_user = 'root'; 
$db_pass = ''; 
$db_name = 'unicart'; 
	
$itemid = $_POST['id'];
$itemtarget = $_POST['target'];


	
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
	
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}

$sql = "SELECT * 
		FROM `items` WHERE `itemid` = $itemid";
		
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);
		
		$userid= $row['userid'];

		$sql1 = "SELECT * 
		FROM `users` WHERE userid='$userid'";
		
$query1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_array($query1);
		

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}
?>
		<section id="page-title">

			<div class="container clearfix">
				<h1><?php echo $row['itemname'].'</h1>';?>
			</div>

		</section><!-- #page-title end -->

		<!-- Content
		============================================= -->
		
		
		<section id="content">

			<div class="content-wrap" style="padding: 0px;">

				<div class="container clearfix">

					<div class="single-product">

						<div class="product">

							<div class="col_two_fifth">

								<!-- Product Single - Gallery
								============================================= -->
								<div class="product-image">
									<div class="fslider" data-pagi="false" data-arrows="false" data-thumbs="true">
										<div class="flexslider">
											<div class="slikder-wrap" data-lightbox="gallery">
												<div class="slide" data-thumb="images/shop/tshirts/1.jpg"><a href=""  data-lightbox="gallery-item">
													<img src="<?php echo $row['itempic']?>">
													</a></div>
												
											
											</div>
										</div>
									</div>
									<!--<div class="sale-flash">Sale!</div>-->
								</div><!-- Product Single - Gallery End -->

							</div>

							<div class="col_two_fifth product-desc">

								<!-- Product Single - Price
								============================================= -->
								<div class="product-price"><ins>$<?php echo $row['price'].'</ins>';?>
</div><!-- Product Single - Price End -->

								<!-- Product Single - Rating
								============================================= -->
								

								<div class="clear"></div>
								<div class="line"></div>

								<!-- Product Single - Quantity & Cart Button
								============================================= -->
                                
                                <!-- sending item id as hidden feild to next page-->
                                 
								<form class="cart nobottommargin clearfix" method="post" enctype='multipart/form-data' action= <?php echo $itemtarget;?>>
									<div class="quantity clearfix">
										<input name = "id" value =<?php echo $itemid;?> type = "hidden"></input>
                                       <?php $_SESSION['itemid1']=$itemid;?>
                                        
									</div>
									<button type="submit" class="add-to-cart button nomargin"  ><?php echo $row['type'];
										
										?></button>
								</form><!-- Product Single - Quantity & Cart Button End -->

								<div class="clear"></div>
								<div class="line"></div>

								<!-- Product Single - Short Description
								============================================= -->
								<p style="font-size: 17px;text-transform: capitalize;"><?php echo $row['description'].'</p>';?>
							

								<!-- Product Single - Share
								============================================= -->
								<div class="si-share noborder clearfix">
									<span>Share:</span>
									<div>
										<a href="#" class="social-icon si-borderless si-facebook">
											<i class="icon-facebook"></i>
											<i class="icon-facebook"></i>
										</a>
										<a href="#" class="social-icon si-borderless si-twitter">
											<i class="icon-twitter"></i>
											<i class="icon-twitter"></i>
										</a>
										<a href="#" class="social-icon si-borderless si-pinterest">
											<i class="icon-pinterest"></i>
											<i class="icon-pinterest"></i>
										</a>
										<a href="#" class="social-icon si-borderless si-gplus">
											<i class="icon-gplus"></i>
											<i class="icon-gplus"></i>
										</a>
										<a href="#" class="social-icon si-borderless si-rss">
											<i class="icon-rss"></i>
											<i class="icon-rss"></i>
										</a>
										<a href="#" class="social-icon si-borderless si-email3">
											<i class="icon-email3"></i>
											<i class="icon-email3"></i>
										</a>
									</div>
								</div><!-- Product Single - Share End -->

							</div>

							<div class="col_one_fifth col_last">

								<a href="#" title="Brand Logo" class="d-none d-md-block">
									<img class="image_fade" src="<?php echo $row1['picture'];?>" width="300">
								</a>

								<div class="divider divider-center"><i class="icon-circle-blank"></i></div>

								<div class="feature-box fbox-plain fbox-dark fbox-small">
									<div class="fbox-icon">
										<i class="icon-user4"></i>
									</div>
									<h3>Posted By</h3>
									<p class="notopmargin" style="font-size: 17px;text-transform: capitalize;"><?php echo $row1['firstname'].$row1['lastname'].'</p>';?>
								</div>

								<div class="feature-box fbox-plain fbox-dark fbox-small">
									<div class="fbox-icon">
										<i class="icon-phone3"></i>
									</div>
									<h3>Contact Details</h3>
									<p class="notopmargin" style="font-size: 17px;text-transform: capitalize;"><?php echo $row1['phone'].'</p>';?>
								</div>

								
							</div>

							<div class="col_full nobottommargin">

								

							</div>

						</div>

					</div>

					<div class="clear"></div><div class="line"></div>

					

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

	<!-- Footer Scripts
	============================================= -->
	<script src="js/functions.js"></script>


</body>
</html>