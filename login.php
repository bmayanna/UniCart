<?php  session_start(); ?>
<?php

//connection string
 $con= mysqli_connect("localhost","root","");
mysqli_select_db($con, "unicart") or die ("could not open db".mysqli_error($con));

$useremail = $password = "";
$useremail_err = $password_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
  
    if(empty(trim($_POST["email"]))){
        $useremail_err = 'Please enter useremail.';
    } else{
        $useremail = trim($_POST["email"]);
    }
    
    if(empty(trim($_POST['password']))){
        $password_err = 'Please enter your password.';
    } else{
        $password = trim($_POST['password']);
    }
    
        // Prepare a select statement
	 $sql = "SELECT * FROM users WHERE `email` = '$useremail'";
        
       $query = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($query);

	
			if($sql)
			{
			   
				$userid = $row['userid'];
				$hasval = $row['password'];
				if(password_verify($password, $hasval))
				{
						
					echo($userid);
					$msg = "Thank You! you are a valid user.";
					echo($msg);
					$_SESSION['userid']=$userid;
					$_SESSION['in']= "yes";
					header("location: ../services.php");
				}
				else
				{
					
					$msg = "Thank You! you are not a valid user.";
					header("location: ../index.php");

				}

			}

   
}
?>

