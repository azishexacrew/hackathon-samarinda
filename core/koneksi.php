<?php 

$host = "localhost";
$user = "root";
$pass = "root";
$db =  "tongsampah";


// Create connection
$conn = mysqli_connect($host, $user, $pass, $db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>