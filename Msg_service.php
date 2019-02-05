<?php
	include_once 'connection_bidding.php';
	// Get the session details
	session_start();
	if(!isset($_SESSION['userid'])) { // If session is not set then redirect to Login Page
           header("Location:Login/index.html");
    }
	$user_id = $_SESSION['userid'];
	$receiver_id = 1;
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
	<title>Bidding Page</title>
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

		<!-- Page Title
		============================================= -->
		<section id="page-title" style="background-color: #1ABC9C">

			<div class="container clearfix">
				<h1>Messages</h1>
			</div>

		</section><!-- #page-title end -->

		<!-- Content
		============================================= -->
		<section id="content">
			<div class="container11">
				<img src="images/2.jpg" alt="Buyer" style="width:100%;">
					<p>Hello. What is the cost of the product?</p>

			</div>

			<div class="container11 darker">
				<img src="images/1.jpg" alt="Seller" class="right" style="width:100%;">
					<p>Hi, The product cost is 100$ not negotiable </p>

			</div>

			<div class="container11">
				<img src="images/2.jpg" alt="Buyer" style="width:100%;">
					<p>Crazy! other sellers are giving a better deal </p>
			</div>
                                <?php
									$sql = "SELECT * FROM `chat_message`";
									$result = mysqli_query($conn, $sql);
									$resultCheck = mysqli_num_rows($result);
									if ($resultCheck == 0) {
										echo "<p>No Messages Yet</p>";
									}
									else if ($resultCheck > 0) {

										while ($row = mysqli_fetch_assoc($result))
										{
											$user_image = "SELECT picture FROM `users` WHERE `userid` = $user_id";
											$usernameRes = mysqli_query($conn, $user_image);
											$user_image_link = mysqli_fetch_assoc($usernameRes);
											echo "<div class=\"container11 darker\">";
                                           // echo "<img src=".$user_image_link['picture']." alt=\"Seller\" class=\"right\" style=\"width:100%;\">";
											echo "<img src=\"images/1.jpg\" alt=\"Seller\" class=\"right\" style=\"width:100%;\">";
											echo "<p>".$row['message']."</p>";
											echo "</div>";
										}

									}
								?>
			<form class="container11" method = "post">
				Text MSG: 	<input class="container darker" type="text" id="enter_bid" name="FirstName"><br>
							<input type="submit" id="place_bid" style="width:100px; height:25px" name = "sendmsg"  value = "send msg"/>
			</form>
								<?php

							if(isset($_POST["sendmsg"]))
							{
								        $currentEnteredBid = $_REQUEST["FirstName"];
										$updateBidTable = "INSERT INTO chat_message (message,user_id,receiver_id) VALUES ('".$_POST["FirstName"]."',$user_id,$receiver_id)";
										$result1 = mysqli_query($conn, $updateBidTable);
										echo "<script> parent.self.location = \"Msg_service.php\";</script>";

							}
								?>


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
