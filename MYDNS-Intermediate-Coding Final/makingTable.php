<?php
$servername = "localhost";
$username = "root";
$password = "rH^.52%ZO+0:,zw2U5#.QGo8/";
$db = "mydb";

$conn = mysqli_connect($servername, $username, $password, $db);

$sql = "CREATE TABLE IF NOT EXISTS users (
       id INT NOT NULL AUTO_INCREMENT,
       firstname VARCHAR(30),
       lastname VARCHAR(30),
       email VARCHAR(50) UNIQUE,
       password VARCHAR(79),
       vote INT(1),
       PRIMARY KEY (id)
        )"; 
if (mysqli_query($conn, $sql)) {
       echo "";
}


$sql = "CREATE TABLE IF NOT EXISTS restaurants (
       id INT NOT NULL AUTO_INCREMENT,
       name VARCHAR(70),
       votes INT(2),
       PRIMARY KEY (id)
        )"; 

if (mysqli_query($conn, $sql)) {
       echo "";
}


mysqli_close($conn);

?>

