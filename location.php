<?php
	include_once 'connection_bidding.php';
	$item_id = 12;
	//$user_id = 1;
	session_start();
	if(!isset($_SESSION['userid'])) { // If session is not set then redirect to Login Page
           header("Location:Login/index.html");
    }
	//$_SESSION['username'] = $user_id;
	//$_SESSION['itemid'] = $item_id;
	$item_id=$_SESSION['itemid'] ;
	//$user_id = $_SESSION['userid'];
?>


<?php
include_once 'connection_bidding.php';
$sql = "SELECT streetaddress, city, state, country FROM users join items on users.userid = items.userid WHERE items.itemid = $item_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
				$add =  "" . $row["streetaddress"]. ", " . $row["city"].", " . $row["state"].", " . $row["country"];
    }
} else {
    echo "0 results";
}



function getLatLong($address){
  if(!empty($address)){
      //Formatted address
      $formattedAddr = str_replace(' ','+',$address);
      //Send request and receive json data by address
      $geocodeFromAddr = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddr.'&sensor=false');
      $output = json_decode($geocodeFromAddr);
      //Get latitude and longitute from json data
      $data['latitude']  = $output->results[0]->geometry->location->lat;
      $data['longitude'] = $output->results[0]->geometry->location->lng;
      //Return latitude and longitude of the given address
      if(!empty($data)){
          return $data;
      }else{
          return false;
      }
  }else{
      return false;
  }
}

$address = '429, Columbus Avenue, Syracuse, NY, USA';
$latLong = getLatLong($add);
$latitude = $latLong['latitude']?$latLong['latitude']:'Not found';
$longitude = $latLong['longitude']?$latLong['longitude']:'Not found';
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
	<title>Location Service</title>
<style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
      //  height: 100%;
        height: 400px;
        width: 400px;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
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

			<div class="container clearfix">
				<h1>Location Service</h1>
			</div>

		</section><!-- #page-title end -->

		<!-- Content
		============================================= -->
		<section id="content">
    <div id="map" style="width:auto;height:400px;"></div>
     <script>
	 var lat1 = <?php echo $latitude?>;
	 var lang1 = <?php echo $longitude?>;
	 //alert(lat1);
	 //alert(lang1);
      function initMap() {
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var directionsService = new google.maps.DirectionsService;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 14,
          center: {lat: 43.0392, lng: -76.1351}
        });

        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
				pos1 = {lat: position.coords.latitude,
              lng: position.coords.longitude};
            // pos1 = {lat: position.coords.latitude, lng: position.coords.longitude};
             map.setCenter(pos);
             directionsDisplay.setMap(map);
             calculateAndDisplayRoute(directionsService, directionsDisplay, pos1);
           }, function() {
             handleLocationError(true, infoWindow, map.getCenter());
           });
           } else {
             // Browser doesn't support Geolocation
             handleLocationError(false, infoWindow, map.getCenter());
           }

      }

      function calculateAndDisplayRoute(directionsService, directionsDisplay, pos) {

        var selectedMode = "DRIVING";
        directionsService.route({
          origin: pos,
          destination: {lat: lat1, lng: lang1},
          travelMode: google.maps.TravelMode[selectedMode]
        }, function(response, status) {
          if (status == 'OK') {
            directionsDisplay.setDirections(response);

          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }
            function handleLocationError(browserHasGeolocation, infoWindow, pos) {
              infoWindow.setPosition(pos);
              infoWindow.setContent(browserHasGeolocation ?
                                    'Error: The Geolocation service failed.' :
                                    'Error: Your browser doesn\'t support geolocation.');
              infoWindow.open(map);
            }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyACP1Z6IDheV7n1Tt3CKyZ0yrE-fCQuYVY&callback=initMap">
    </script>
	<a href="http://maps.google.com" align="right"> Go To Google Maps</a>

		</section><!-- #content end -->

		<!-- Footer
		============================================= -->
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
