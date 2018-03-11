<?php 
include "../core/koneksi.php" ;
include "../core/helper.php";

$pass = $_POST['pass'];
$id_driver = $_POST['id_driver'];

$sql= "UPDATE user SET password='$pass' WHERE id_user='$id_driver'";


$hasil = mysqli_query($conn, $sql);

if($hasil){
	header("Location: list_driver.php");
}


?>