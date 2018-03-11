<?php 
include "../core/koneksi.php" ;
include "../core/helper.php";

$id_driver = $_GET['id'];

$sql= "DELETE FROM user WHERE id_user='$id_driver'";
$hasil = mysqli_query($conn, $sql);

if($hasil){
	header("Location: list_driver.php");
}


?>