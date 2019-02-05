<?php  session_start(); ?>
<?php

 $con= mysqli_connect("localhost","root","");
mysqli_select_db($con, "unicart") or die ("could not open db".mysqli_error($con));
$itemid = $_POST['id'];
$tarhtm = $_POST['targethtm'];

//redirect itemid
	 
	


		echo("item id received:"+ $itemid);
		echo("tarhtmreceived:"+$tarhtm);
		
		$_SESSION['itemid']= $itemid;
		header('location:services.html');
	

?>

