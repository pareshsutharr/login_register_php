<?php
$servername = "localhost"; // or your server address
$username = "root"; // your database username
$password = ""; // your database password
$dbname = "project"; // your database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<link rel="icon" type="image/x-icon" href="assets/fav_icon.png">

