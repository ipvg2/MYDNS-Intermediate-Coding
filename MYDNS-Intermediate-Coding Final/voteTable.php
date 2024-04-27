<?php
$servername = "localhost";
$username = "root";
$password = "rH^.52%ZO+0:,zw2U5#.QGo8/";
$db = "mydb";

$conn = mysqli_connect($servername, $username, $password, $db);

$sql = "INSERT INTO restaurants(name)
       VALUES ('JAPS')";


if (mysqli_query($conn, $sql)) {
       echo "2323";
}

mysqli_close($conn);

?>

