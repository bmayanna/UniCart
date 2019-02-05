<?php
include 'connection_payment.php';
//Set useful variables for paypal form
$paypal_link = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //Test PayPal API URL
//if(!isset($_SESSION['userid'])) { // If session is not set then redirect to Login Page
  //         header("Location:Login/index.html");
   //}

session_start();


//$_SESSION['itemid1']= 7 ;
//$_SESSION['userid'] = 1;

$itemid = $_SESSION['itemid1'] ;
$currentuser = $_SESSION['userid'];


// This query is done to populate the buyer id in the items id according to the current user.

$sql = "UPDATE items SET buyerid= $currentuser WHERE itemid=$itemid";
if ($conn->query($sql) === TRUE) {
    echo "";
} else {
    echo "Error updating record: " . $conn->error;
}

// This query is done to get the paypal id of the seller which is displayed on top of the payment gateway

$paypalquery = $conn->query("SELECT * FROM items WHERE itemid = $itemid");
						$paypalrow = $paypalquery->fetch_assoc();
$paypalid = $paypalrow['userid'];       
$paymentquery = $conn->query("SELECT * FROM users WHERE userid = $paypalid");   // from the users table paypa id is fetched.
  
									$paypaluser = $paymentquery->fetch_assoc();
									
									$paypal_username = $paypaluser['paypalid'];

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

		<!-- Page Title
		============================================= -->
		<section id="page-title">

			<div class="container clearfix">
				<h1>Checkout Page</h1>
			</div>

		</section><!-- #page-title end -->

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<div class="table-responsive">
						<table class="table cart">
							<thead>
								<tr>
									<th class="cart-product-remove">&nbsp;</th>
									<th class="cart-product-name">Product</th>
									<th class="cart-product-subtotal">Price</th>
									<th class="cart-product-name">Description</th>
								</tr>
							</thead>
							<tbody>

							<?php
							
		//fetch product details from the database
		// These details are published on a html table.

		$results = $conn->query("SELECT * FROM items WHERE itemid = $itemid");
							while($row = $results->fetch_assoc())
							{
							?>
								<tr class="cart_item">
									<td class="cart-product-remove">
										<a href="#" class="remove" title="Remove this item"><i class="icon-trash2"></i></a>
									</td>

									<td class="cart-product-name">
										<a href="#"><?php echo $row['itemname']; ?></a>
									</td>

									<td class="cart-product-subtotal">
										<span class="amount"><?php echo $row['price']; ?></span>
									</td>

									<td class="cart-product-name">
										<a href="#"><?php echo $row['description']; ?></a>
									</td>
								</tr>
								<tr class="cart_item">
									<td colspan="6">
										<div class="row clearfix">
											<div class="col-lg-4 col-4 nopadding">
												<div class="row">
												</div>
											</div>
											
										</div>
									</td>
								</tr>
							</tbody>
							
						</table>
					</div>



        	<div class="col-lg-6 clearfix">
							<h4>Ship to</h4>
							
							<div class="table-responsive">
								
								<table class="table cart">
								
								
								<?php
							
								// This part of php is done to query the the buyer from the users id and populate the buyer's details form 
								// The buyer's details has name, address, city and phone number.
								
								$buyerquery = $conn->query("SELECT * FROM items WHERE itemid = $itemid");
						$buyrow = $buyerquery->fetch_assoc();
									$buyer = $buyrow['buyerid'];
									$results1 = $conn->query("SELECT * FROM users WHERE userid = $buyer");
                            
									$row1 = $results1->fetch_assoc();
									echo "<tbody>";

									echo "<tr class=\"cart_item\">";
                                      echo "<td class=\"cart-product-name\">";
                                      echo  "<strong>Name</strong>";
                                     echo " </td>";

                                   echo"<td class=\"cart-product-name\">";
								  // echo"<div contenteditable>";
								    echo "<input type = \"text\" name = \"firstname\"value =".$row1['firstname'].">";
									echo"</div>";
                                    echo"</td>";
                                     echo"</tr>";
										echo"<tr class=\"cart_item\">";
											echo"<td class=\"cart-product-name\">";
												echo"<strong>Address</strong>";
											echo"</td>";

											echo"<td class=\"cart-product-name\">";
											echo"<div contenteditable>";
												 echo "<input type = \"text\" value =".$row1['streetaddress'].">";
												echo"</div>";
											echo"</td>";
										echo"</tr>";

										echo"<tr class=\"cart_item\">";
                                        											echo"<td class=\"cart-product-name\">";
                                        												echo"<strong>Apartment Unit</strong>";
                                        											echo"</td>";
                                        											echo"<td class=\"cart-product-name\">";
																					echo"<div contenteditable>";
                                        												 echo "<input type = \"text\" value =".$row1['apartment'].">";
																						echo"</div>";
                                        											echo"</td>";
                                        											echo"</tr>";
										echo"<tr class=\"cart_item\">";
											echo"<td class=\"cart-product-name\">";
												echo"<strong>City</strong>";
											echo"</td>";

											echo"<td class=\"cart-product-name\">";
											echo"<div contenteditable>";
												 echo "<input type = \"text\" value =".$row1['city'].">";
												echo"</div>";
											echo"</td>";
										echo"</tr>";
										echo"<tr class=\"cart_item\">";
											echo"<td class=\"cart-product-name\">";
												echo"<strong>Phone</strong>";
											echo"</td>";

											echo"<td class=\"cart-product-name\">";
											echo"<div contenteditable>";
												 echo "<input type = \"text\" value =".$row1['phone'].">";
												echo"</div>";
											echo"</td>";
										echo"</tr>";
									echo"</tbody>";
									?>	
									</table>
									<button id="save" name = "savedetails">Save Details</button>
                                     <div id="msg"></div>
								
									<div class="col-lg-8 col-8 nopadding">
											<form action="<?php echo $paypal_link; ?>" method="post">

                                            								<!-- Identify your business so that you can collect the payments. -->
																			
                                            								<input type="hidden" name="business" value="<?php echo $paypal_username; ?>">

                                            								<!-- Specify a Buy Now button. -->
                                                                           <input type="hidden" name="cmd" value="_xclick">

                                            								<!-- Specify details about the item that buyers will purchase. -->
                                            								<input type="hidden" name="item_name" value="<?php echo $row['itemname']; ?>">
                                            								<input type="hidden" name="item_number" value="<?php echo $row['itemid']; ?>">
                                            								<input type="hidden" name="amount" value="<?php echo $row['price']; ?>">
                                            								<input type="hidden" name="currency_code" value="USD">

                                            								<!-- Specify URLs -->
                                            								<input type='hidden' name='cancel_return' value='http://localhost/HTML_integrated/paypal_cancel.php'>
                                            								<input type='hidden' name='return' value='http://localhost/HTML_integrated/paypal_success.php'>


                                            								<!-- Display the payment button. -->

                                         <input type="image" name="submit" border="0" class = "fright"
									  <input type="image" name="submit" border="0" class = "fright"
									   src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online">
								<img alt="" border="0" width="1" height="1" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
</form>
							
											</div>
											<?php } ?>

												  
								
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

	<!-- Footer Scripts
	============================================= -->
	<script src="js/functions.js"></script>

</body>
</html>