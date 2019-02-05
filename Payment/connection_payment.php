<?php
//Database credentials
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'unicart';
//Connect with the database
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_errno) {
    printf("Connect failed: %s\n", $db->connect_error);
    exit();
}
?>
