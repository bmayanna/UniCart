<?php
	include_once 'connection_bidding.php';
	// Get the session details
	session_start();
	if(!isset($_SESSION['userid'])) { // If session is not set then redirect to Login Page
		header("Location:Login/index.html"); 
 	}
	$item_id = $_SESSION['itemid1'] ;
	$user_id = $_SESSION['userid'];
	ini_set("SMTP","ssl://smtp.gmail.com");
    ini_set("smtp_port","465");
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
	<title>Renting Page</title>

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
				<h1>Renting Page</h1>
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
										<?php // PHP code to get the item details from the database
											  // We display the item picture here
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
											<?php // PHP code to get the item details from the database
											      // Displays item name
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
										<td><b>Renting Price: </b></td>
										<?php
											// PHP code to display rent price
											$sql = "SELECT * FROM `items` WHERE `itemid` = $item_id";
											$result = mysqli_query($conn, $sql);
											$resultCheck = mysqli_num_rows($result);
											if ($resultCheck > 0) {
												$row = mysqli_fetch_assoc($result);
												echo "<td id=\"curr_item_price\"><b> $ ".$row['price']."</b></td>";
											}
										?>
									</tr>
									<tr>
										<td>
											<input type="submit" id="rent" style="width:100px; height:25px" name = "rent"  value = "Rent"
												<?php
													// PHP code to enable/disable the button
													$bidstarttime = "SELECT * FROM `items` WHERE `itemid` = $item_id";
													$result2 = mysqli_query($conn, $bidstarttime);
													$resultCheck2 = mysqli_num_rows($result2);
													date_default_timezone_set('America/New_York');
													$currenttime = date("Y.m.d H:i:s");
													while ($row2 = mysqli_fetch_assoc($result2)) {
														if($row['Next_Available'] != "0000-00-00"){
															echo ' disabled=disabled ';
														}
													}												
												?>
											/>
										</td>
										<?php
										// PHP code to show a button only to the seller
										// so that he can acknowledge he has received the item
										$sql = "SELECT * FROM `rent_table` WHERE `item_id` = $item_id and rent_status = '1' ";
										$result4 = mysqli_query($conn, $sql);
										$resultCheck4 = mysqli_num_rows($result4);
										$row2 = mysqli_fetch_assoc($result4);
											if ($row2['seller_id'] == $user_id)
											{
												date_default_timezone_set('America/New_York');
												$currenttime = date("Y.m.d H:i:s");
							
												
												$today_dt = new DateTime();
												$expire_dt = new DateTime($row2['next_avail_time']);
			
												
												if ($expire_dt->format('Y-m-d H:i:s') < $today_dt->format('Y-m-d H:i:s')) 
												{
													
												 echo "<td>";
												 echo "<input type='submit' value = 'Seller Ack' style='width:100px; height:25px' name = 'ack'/>";
												 echo "</td>";
												
												}
												
											
										}
												
										?>
										
										

										
									</tr>
								</tbody>
							</table>
							<div style = "clear:both;"></div>
							<br>
							<table class="table">
								<tbody>
									<tr>
										<td>Rent Duration: </td>
										<?php
											// PHP code to display rent duration
											$sql = "SELECT * FROM `items` WHERE `itemid` = $item_id";
											$result = mysqli_query($conn, $sql);
											$resultCheck = mysqli_num_rows($result);
											if ($resultCheck == 0) {
												echo "<td id=\"rentduration\">-</td>";
											}
											else if ($resultCheck > 0) {
												$row = mysqli_fetch_assoc($result);
												echo "<td id=\"rentduration\">".$row['rentduration']." days</td>";
											}
										?>
										
										<td>Available from: </td>
										<?php
										    // PHP code to show the product's next availability
											$sql = "SELECT * FROM `items` WHERE `itemid` = $item_id";
											$result = mysqli_query($conn, $sql);
											$resultCheck = mysqli_num_rows($result);
											$row = mysqli_fetch_assoc($result);
											if ($row['Next_Available'] == "0000-00-00") {
												echo "<td id =\"rentduration\"> Available Now </td>";
											}
												
											else {
												echo "<td id=\"rentduration\">".$row['Next_Available']."</td>";
											}
										?>
									</tr>
								</tbody>
							</table>
							<div style = "clear:both;"></div>
							<br>
						</form>
						<?php
							// Processing for the form action
							// For rent button
							if(isset($_POST["rent"])) {
								date_default_timezone_set("America/New_York");
								$Today=date('y:m:d H:i:s');
								$time = "SELECT * FROM `items` WHERE `itemid` = $item_id";
								$result2 = mysqli_query($conn, $time);
								$resultCheck2 = mysqli_num_rows($result2);
								$item_avail;
								$rentdays;
								$rentprice;
								$seller;
							    while ($row2 = mysqli_fetch_assoc($result2)) {
									// Update the DB with the new rent date
									$NewDate=Date('y:m:d H:i:s', strtotime("+".$row2['rentduration']." days"));
									$item_avail = $NewDate;
									$rent_days = $row2['rentduration'];
									$rentprice = $row2['price'];
									$seller = $row2['userid'];
									$update_Next_Avail_Date = "UPDATE items SET Next_Available = '$NewDate'  WHERE itemid = $item_id";
									$result1 = mysqli_query($conn, $update_Next_Avail_Date);
								}
								// Add this new rent entry to DB
								$addRentInfo = "INSERT INTO rent_table (seller_id, buyer_id, curr_time, next_avail_time, rent_days, price,item_id,rent_status) VALUES ('$seller', '$user_id', '$Today', '$item_avail', '$rent_days', '$rentprice',$item_id,'1')";
								
								$insertRentEntry = mysqli_query($conn, $addRentInfo);
								$update_buyer_id = "UPDATE items SET buyerid = '$user_id'  WHERE itemid = $item_id";
								$result2 = mysqli_query($conn, $update_buyer_id);
								echo "<script> parent.self.location = \"payment.php\";</script>";	
							}
							
							// For acknowledgement button
							if(isset($_POST["ack"])) {
								// To get the buyer ID from rent table
									$toemail = "SELECT * FROM `rent_table` WHERE `item_id` = $item_id and rent_status = '1'";
								    $toemailresult = mysqli_query($conn, $toemail);
								    $resultCheck2 = mysqli_num_rows($toemailresult);
									$row2 = mysqli_fetch_assoc($toemailresult);
									$buyer_id = $row2['buyer_id'];
									$seller_id = $row2['seller_id'];
									
									// Update the item DB with this new date
									$update_Next_Avail_Date = "UPDATE items SET Next_Available = '000-00-00' WHERE itemid = $item_id";
									$result1 = mysqli_query($conn, $update_Next_Avail_Date);
									
									// Update the buyer ID for this new transaction
									$update_buyer_id = "UPDATE items SET buyerid = '0'  WHERE itemid = $item_id";
								    $result2 = mysqli_query($conn, $update_buyer_id);
									
									// Update the rent status in the DB
									$update_rent_status = "UPDATE rent_table SET rent_status = '0' WHERE item_id = $item_id";
									$result1 = mysqli_query($conn, $update_rent_status);
									
									// Update sold status in the items DB
									$update_sold_status = "UPDATE items SET sold = 'no'  WHERE itemid = $item_id";
								    $result2 = mysqli_query($conn, $update_sold_status);
								
									// To get the user email address
									$msg1 = "Product has been returned by the buyer as confirmed and acknowledged by you. Thanks for using unicart";
									$toemailseller = "SELECT * FROM `users` WHERE `userid` = $seller_id";
								    $toemailsellerresult = mysqli_query($conn, $toemailseller);
								    $resultCheck3 = mysqli_num_rows($toemailsellerresult);
									$row3 = mysqli_fetch_assoc($toemailsellerresult);
									$seller_email = $row3['email'];
									echo $seller_email;
									// Sends mail to the buyer
									if(mail($seller_email, "Rental item due date has arrived", $msg1,"From: me@you.com")){
										echo "Mail Sent Successfully";
											}else{
													echo "Mail Not Sent";
									}
									
									$msg2 = "Product has to be returned and acknowledged by seller. Thanks for using unicart";
									$toemailbuyer = "SELECT * FROM `users` WHERE `userid` = $buyer_id";
								    $toemailbuyerresult = mysqli_query($conn, $toemailbuyer);
								    $resultCheck2 = mysqli_num_rows($toemailbuyerresult);
									$row2 = mysqli_fetch_assoc($toemailbuyerresult);
									$buyer_email = $row2['email'];
									echo $buyer_email;
									// Sends mail to the seller
								   if(mail($buyer_email, "Rental item due date has arrived", $msg2,"From: me@you.com")){
										echo "Mail Sent Successfully";
											}else{
													echo "Mail Not Sent";
																		}
								   echo "<script> parent.self.location = \"renting_page.php\";</script>";	
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