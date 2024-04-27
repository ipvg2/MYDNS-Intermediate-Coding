<?php 

$servername = "localhost";
$username = "root";
$password = "rH^.52%ZO+0:,zw2U5#.QGo8/";
$db = "mydb";

$conn = mysqli_connect($servername, $username, $password, $db);

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

?>