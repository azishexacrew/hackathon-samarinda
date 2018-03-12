<?php 
function signup($data){
	global $conn;

	$Username = strtolower(stripcslashes($data["Username"]));
	$password = mysqli_real_escape_string($data["password"]);
	$confirm_password = mysqli_real_escape_string($data["confirm_password"]);

	if ($password !== $confirm_password){
		echo "<script>
			alert('konfirmasi password tidak sesuai');
		</script>";
	return false;
	}



}
 ?>
