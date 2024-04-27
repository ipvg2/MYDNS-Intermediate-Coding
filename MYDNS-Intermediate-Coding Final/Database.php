<?php 

$servername = "localhost";
$username = "root";
$password = "rH^.52%ZO+0:,zw2U5#.QGo8/";

$conn = mysqli_connect($servername, $username, $password);

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

$sql = "CREATE DATABASE IF NOT EXISTS mydb";
if(mysqli_query($conn, $sql)){
	echo "";
}

mysqli_close($conn)
?>