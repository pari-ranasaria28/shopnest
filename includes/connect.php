<?php
// $con=mysqli_connect('localhost','root','','shopnest');
$servername = "sql306.infinityfree.com"; // Your database hostname
$username = "if0_38266918";  // Your database username
$password = "VrvhwGOx1e8";  // Your database password
$dbname = "if0_38266918_shopnest";  // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(!$con){
    die(mysqli_error($con));
}
?>