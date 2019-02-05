<?php
	include_once 'connection.php';
	/*$item_id = 10;
	$user_id = $_SESSION['userid'];
	session_start();
	$_SESSION['username'] = $user_id;
	$_SESSION['itemid'] = $item_id;*/
	//$item_id = 12;
	//$user_id = 3;
	session_start();
	//$_SESSION['username'] = $user_id;
	//$_SESSION['itemid'] = $item_id;
	$item_id = $_SESSION['itemid1'] ;
	$user_id = $_SESSION['userid'];
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

		<!-- Page Title
		============================================= -->
		<section id="page-title" style="background-color: #1ABC9C">

			<div class="container clearfix">
				<h1>Bidding Page</h1>
			</div>

		</section><!-- #page-title end -->

		<!-- Content
		============================================= -->
		<section id="content" style="background-color: #eefdfb">

			<div class="content-wrap">

				<div class="container clearfix">

					<!-- Post Content
					============================================= -->
					<div class="postcontent nobottommargin clearfix">
					
						<form method = "post">
							<table style="float: left" class="table">
								<tbody>
									<tr>
										<?php
											$sql = "SELECT * FROM `items` WHERE `itemid` = $item_id";
											$result = mysqli_query($conn, $sql);
											$resultCheck = mysqli_num_rows($result);
											if ($resultCheck > 0) {
												$row = mysqli_fetch_assoc($result);
												echo "<td id=\"item_pic\" rowspan=\"3\"><img src=".$row['itempic']." style=\"width:200px; height:200px\"></td>";
											}
										?>
									</tr>
								</tbody>
							</table>
							<table style="display: inline-block" class="table">
								<tbody>
									<thead>
										<tr>
											<?php
												$sql = "SELECT * FROM `items` WHERE `itemid` = $item_id";
												$result = mysqli_query($conn, $sql);
												$resultCheck = mysqli_num_rows($result);
												if ($resultCheck > 0) {
													$row = mysqli_fetch_assoc($result);
													echo "<td id=\"item_name\" colspan=\"2\"><b>".$row['itemname']."</b></td>";
												}
											?>
										</tr>
									</thead>
									<tr>
										<td><b>Current Price: </b></td>
										<?php
											$sql = "SELECT * FROM `items` WHERE `itemid` = $item_id";
											$result = mysqli_query($conn, $sql);
											$resultCheck = mysqli_num_rows($result);
											if ($resultCheck > 0) {
												$row = mysqli_fetch_assoc($result);
												echo "<td id=\"curr_item_price\"><b> $ ".$row['cbidprice']."</b></td>";
											}
										?>
									</tr>
									<tr>
										<td>
											<input type="text"  id="enter_bid" name = "enterbid"/>
										</td>
										<td>
											<input type="submit" id="place_bid" style="width:100px; height:25px" name = "placebid"  value = "Place bid"
												<?php
													$bidstarttime = "SELECT * FROM `items` WHERE `itemid` = $item_id";
													$result2 = mysqli_query($conn, $bidstarttime);
													$resultCheck2 = mysqli_num_rows($result2);
													$currenttime = date("Y.m.d H:i:s");
													while ($row2 = mysqli_fetch_assoc($result2)) {
														date_default_timezone_set("America/New_York");
														
														$interval = date_diff(new DateTime($row2['bidtime']),new DateTime());
														$int_years = ($interval->y) * 365 * 24;
														$int_months =( $interval->m) * 30 *24;
														$int_days = ($interval->d) * 24;
														$int_hours = $interval->h;
														$int_minutes = ($interval->i) / 60;
														$int_sec = ($interval->s) /3600;
														
														$elapsedtime = $int_years + $int_months + $int_days + $int_hours + $int_minutes + $int_sec;

														if($elapsedtime > $row['bidduration']) {
															echo ' disabled=disabled ';
														}
													}												
												?>
											/>
											<input type="submit" id="pay" style="width:100px; height:25px" name = "pay"  value = "Pay"
												<?php 
													$maxprice = "SELECT buyerid FROM `items` WHERE `itemid` = $item_id";
													$result1 = mysqli_query($conn, $maxprice);
													$resultCheck1 = mysqli_num_rows($result1);

													while ($row1 = mysqli_fetch_assoc($result1)) {
														
														if ($_SESSION['username'] == $row1['buyerid']) {
															$bidstarttime = "SELECT bidtime FROM `items` WHERE `itemid` = $item_id";
															$result2 = mysqli_query($conn, $bidstarttime);
															$resultCheck2 = mysqli_num_rows($result2);
															$currenttime = date("Y.m.d H:i:s");
															while ($row2 = mysqli_fetch_assoc($result2)) {
																date_default_timezone_set("America/New_York");
																
																$interval = date_diff(new DateTime($row2['bidtime']),new DateTime());
																$int_years = ($interval->y) * 365 * 24;
																$int_months =( $interval->m) * 30 *24;
																$int_days = ($interval->d) * 24;
																$int_hours = $interval->h;
																$int_minutes = ($interval->i) / 60;
																$int_sec = ($interval->s) /3600;
																
																$elapsedtime = $int_years + $int_months + $int_days + $int_hours + $int_minutes + $int_sec;

																if($elapsedtime < $row['bidduration'] ) {
																	echo ' disabled=disabled ';
																}
															}
														}
														else if ($row1['buyerid']==0) {
															echo ' disabled=disabled ';
														}
														else {
															echo ' disabled=disabled ';
														}
													}
												?>
											/>
										</td>
									</tr>
								</tbody>
							</table>
							<div style = "clear:both;"></div>
							<br>
							<table class="table">
								<tbody>
									<tr>
										<td>Number of bids: </td>
										<?php
											$sql = "SELECT * FROM `biddingtable` WHERE `item_id` = $item_id";
											$result = mysqli_query($conn, $sql);
											$resultCheck = mysqli_num_rows($result);
											$count = 0;
											if ($resultCheck == 0) {
												echo "<td id=\"num_of_bids\">".$count."</td>";
											}
											else if ($resultCheck > 0) {
												while ($row = mysqli_fetch_assoc($result)) {
													$count += 1;
												}
												echo "<td id=\"num_of_bids\">".$count."</td>";
											}
										?>
										<td>Bid Duration: </td>
										<?php
											$sql = "SELECT * FROM `items` WHERE `itemid` = $item_id";
											$result = mysqli_query($conn, $sql);
											$resultCheck = mysqli_num_rows($result);
											if ($resultCheck == 0) {
												echo "<td id=\"bid_duration\">-</td>";
											}
											else if ($resultCheck > 0) {
												$row = mysqli_fetch_assoc($result);
												echo "<td id=\"bid_duration\">".$row['bidduration']." hours</td>";
											}
										?>
									</tr>
								</tbody>
							</table>
							<div style = "clear:both;"></div>
							<br>
							<table id="all_bids" class="table table-striped">
								<thead>
									<tr>
										<th>Bidder</th>
										<th>Bid Amount</th>
										<th>Bid Time</th>
									</tr>
								</thead>
								<?php
									$sql = "SELECT * FROM `biddingtable` WHERE `item_id` = $item_id ORDER BY `bid_price` DESC";
									$result = mysqli_query($conn, $sql);
									$resultCheck = mysqli_num_rows($result);
									if ($resultCheck == 0) {
										echo "<tbody>";
										echo "<tr><td colspan=\"3\"><b>No bids yet</b></td></tr>";
										echo "</tbody>";
									}
									else if ($resultCheck > 0) {
										date_default_timezone_set('America/New_York');
										echo "<tbody>";
										while ($row = mysqli_fetch_assoc($result)) {
											$biduid = $row['bid_uid'];
											$username = "SELECT firstname FROM `users` WHERE `userid` = $biduid";
											$usernameRes = mysqli_query($conn, $username);
											$usernameRow = mysqli_fetch_assoc($usernameRes);
											echo "<tr>";
											echo "	<td>".$usernameRow['firstname']."</td>";
											echo "	<td>".$row['bid_price']."</td>";
											echo "	<td>".$row['bid_time']."</td>";
											echo "</tr>";
										}
										echo "</tbody>";
									}
								?>
							</table>
						</form>
						<?php
							if(isset($_POST["placebid"])) {
								$currentEnteredBid = $_REQUEST["enterbid"];

								$max = "SELECT cbidprice FROM `items` WHERE `itemid` = $item_id";
								$result = mysqli_query($conn, $max);
								$resultCheck = mysqli_num_rows($result);
								while ($row = mysqli_fetch_assoc($result)) {
									if($currentEnteredBid > $row['cbidprice'])
									{
										$t = date("Y-m-d H:i:s");
										$updateBidTable = "INSERT INTO biddingtable (bid_price,item_id,bid_time,bid_uid) VALUES ('".$_POST["enterbid"]."',$item_id,'$t',$user_id)";
										$updateProdPrice = "UPDATE items SET cbidprice = '$currentEnteredBid' WHERE itemid = $item_id";
										$updateBuyerIdPrice = "UPDATE items SET buyerid = '$user_id' WHERE itemid = $item_id";
										$result1 = mysqli_query($conn, $updateBidTable);
										$result2 = mysqli_query($conn, $updateProdPrice);
										$result2 = mysqli_query($conn, $updateBuyerIdPrice);
										echo "<script type= 'text/javascript'>alert('Bid placed successfully');</script>";        	
										echo "<script> parent.self.location = \"bidding_page.php\";</script>";		   
									} 
									else {
										echo "<script type= 'text/javascript'>alert('Please enter a bid amount greater than the current highest');</script>"; 
										echo "<script> parent.self.location = \"bidding_page.php\";</script>";		   
									}
								}
							}
							if(isset($_POST["pay"])) {

								//header('Location: payment.php');
								echo "<script> parent.self.location = \"payment.php\";</script>";

							}
						?>
			

					</div><!-- .postcontent end -->

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