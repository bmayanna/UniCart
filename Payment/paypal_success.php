<?php
include 'connection_payment.php';
session_start();
$itemid = $_SESSION['itemid'];

$sql = "UPDATE items SET sold='Yes' WHERE itemid=$itemid";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

echo "<script> parent.self.location = \"payment.php\";</script>";

?>
	<h1>Your payment has been successful.</h1>

