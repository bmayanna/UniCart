<?php
header('Content-Type: application/json');
$con= mysqli_connect("localhost","root","");
mysqli_select_db($con, "unicart") or die ("could not open db".mysqli_error($con));
$filesload = array();
$flag = $_POST['flag'];

  
  $sql="SELECT `itemid`, `itemname`, `itempic`, `description`, `type` from `items` ORDER BY `itemid` DESC LIMIT 15";
 $result= mysqli_query($con, $sql);
echo("done with sql");
  $row= mysqli_fetch_row($result);
    $itemid=$row[0];
    $itemname=$row[1];
	$itempic = $row[2];
	 $itemdesc = $row[3];
	 $itemtype = $row[4];
	$filesload[] = array(
	'itemid'=> $itemid,
	'itemname' => $itemname,
	'itempic'=> $itempic,
	'itemdesc' => $itemdesc,
	'itemtype' => $itemtype	
	);

echo json_encode($filesload);
 

?>