<?php
// Change this to your connection info.
$host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'myhouserent';
// Try and connect using the info above.

$conn= new mysqli($host, $db_user, $db_pass, $db_name) or 
	die("Could not connect to mysql".mysqli_error($con));

	