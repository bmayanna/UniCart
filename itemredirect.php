<?php  session_start(); ?>
<?php
//check item id and store in session
header('Content-Type: application/json');

$itemid = $_POST['id'];
	
if($itemid != 'nil')
{
		
		$_SESSION['itemid']= $itemid;
		$response= header("location: services.php");
		
}	
   echo json_encode($response);

?>

