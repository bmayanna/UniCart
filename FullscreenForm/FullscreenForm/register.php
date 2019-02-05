<?php

//establishing database connection
 $con= mysqli_connect("localhost","root","");
mysqli_select_db($con, "unicart") or die ("could not open db".mysqli_error($con));

$username = $password = $confirm_password = "";
$useremail = $streetname = $apartname = "";
$city = $state = $country = "";
$zip = $phone = $paypal = "";


 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

	    $userfirstname = $_POST["q1"];
		$userlastname = $_POST['lastname'];
		$useremail = $_POST["q2"];
		$userpassword = $_POST["q11"];
	    $streetname = $_POST["q3"];
		$apartname = $_POST["q4"];
	 	$confirm_password = $_POST["q12"];
		$city = $_POST["q5"];
	 	$state = $_POST["q6"];
		$country = $_POST["q7"];
	 	$zip = $_POST["q8"];
		$phone = $_POST["q9"];
		//$picture = $_POST['picture'];
		$paypal = $_POST["q10"];
	    $password = password_hash($userpassword, PASSWORD_DEFAULT);
		echo("inside register");

//getting the files submitted in form
		$file = $_FILES['file'];
$file_name = $file['name'];
$file_type = $file ['type'];
$file_size = $file ['size'];
$file_path = $file ['tmp_name'];
$file_path_name = "images/".$file_name;
		

// uploading files to image folder			
	move_uploaded_file($_FILES['file']['tmp_name'], '../../images/' . $file_name);
	
	//inserting the data to database
		$query = "INSERT INTO `users` (`email`, `password`,`firstname`, `lastname`, `streetaddress`, `apartment`, `city`, `state`, `country`, `zip`, `phone`, `picture`, `paypalid`) VALUES ('$useremail', '$password', '$userfirstname', '$userlastname','$streetname', '$apartname', '$city', '$state', '$country', $zip, $phone , '$file_path_name', '$paypal')";
			mysqli_query($con, $query);
			
			if($query)
			{
			
			//on success redirect to login
				$msg = "Thank You! you are now registered.";
				 header("location: ../../Login/index.html");
			}
	       else{
				echo("error");
	       }

}


?>