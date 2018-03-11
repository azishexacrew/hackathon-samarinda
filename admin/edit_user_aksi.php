<?php 
include "../core/koneksi.php" ;
include "../core/helper.php";

$pass = $_POST['pass'];
$id = $_POST['id'];

$sql= "UPDATE user SET password='$pass' WHERE id_user='$id'";

$hasil = mysqli_query($conn, $sql);

if($hasil){
	header("Location: list_user.php");
}


?>