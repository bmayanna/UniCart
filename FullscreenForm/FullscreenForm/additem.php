<?php   session_start();  ?>

<?php
      if(!isset($_SESSION['userid'])) // If session is not set then redirect to Login Page
       {
           header("Location:Login/index.html"); 
       }
		$userid = $_SESSION['userid'];
?>
<?php

 $con= mysqli_connect("localhost","root","");
mysqli_select_db($con, "unicart") or die ("could not open db".mysqli_error($con));

 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

	    $itemname = $_POST["itemname"];
		$description = $_POST['description'];
		$type = $_POST["type"];
		$price = $_POST["price"];
		
		$duration = 0;
		
if ($type == "sell")
{
	$duration = 0;
}
else {
	$duration = $_POST["duration"];

}

	   $file = $_FILES['file'];
$file_name = $file['name'];
$file_type = $file ['type'];
$file_size = $file ['size'];
$file_path = $file ['tmp_name'];
$proimg = "images/".$file_name;
	$curtime = new DateTime();
    $finaltime = $curtime->format('Y-m-d H:i:s'); 
	
		
			move_uploaded_file($_FILES['file']['tmp_name'], '../../images/' . $file_name);
			
			
	echo $type;
	echo $duration;
			


		//	$query =  "INSERT INTO `items` (`itemname`, `description`, `price`, `type`,`userid`, `itempic`, `bidtime`, `cbidprice`, `buyerid`, `sold`, `paypalid`, `bidduration`, `rentduration`, `Next_Available`)VALUES ('$itemname', '$description', $price, '$type', $userid, '$proimg', '$finaltime', $price, 0, 'no' , 'nil', 5, 0, '$finaltime')";
			
			
			$query =  "INSERT INTO `items` (`itemname`, `description`, `price`, `type`,`userid`, `itempic`, `bidtime`, `cbidprice`, `buyerid`, `sold`, `paypalid`, `bidduration`, `rentduration`, `Next_Available`)VALUES ('$itemname', '$description', $price, '$type', $userid, '$proimg', '$finaltime', $price, 0, 'no' , 'nil', $duration, $duration, '$finaltime')";
			
			
	$res = mysqli_query($con, $query);
			if($res)
			{
				
				 header("location: ../../services.php");
			}
			
			else{
				echo("error");
	       }
		}
	
?>
 

