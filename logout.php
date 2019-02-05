<?php
//session destroy to logout
session_start();
session_destroy();
header('Location: index.php');
exit;
?>