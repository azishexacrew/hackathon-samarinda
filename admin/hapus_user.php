<?php 
include "../core/koneksi.php" ;
include "../core/helper.php";

$id = $_GET['id'];

$sql= "DELETE FROM user WHERE id_user='$id'";
$hasil = mysqli_query($conn, $sql);

if($hasil){
	header("Location: list_user.php");
}


?>