<?php
// $con=mysqli_connect('localhost','root','','shopnest');
$servername = "sql306.infinityfree.com"; // database hostname
$username = "if0_38266918";  // database username
$password = "VrvhwGOx1e8";  // database password
$dbname = "if0_38266918_shopnest";  // database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(!$con){
    die(mysqli_error($con));
}
?>