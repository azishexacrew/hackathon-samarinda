<?php 
	$conn = mysqli_connect("localhost","root","","saber");

function signup($data){
	global $conn;

	$Username = strtolower(stripcslashes($data["Username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$confirm_password = mysqli_real_escape_string($conn, $data["confirm_password"]);

	//cek keberadaan username
	$result = mysqli_query($conn, "SELECT Username FROM user WHERE Username = '$Username'");

	if (mysqli_fetch_assoc($result)){
		echo "<script> 
			alert('username sudah terdaftar!')
		</script>";
		return false;
	}

	//cek konfirmasi password
	if ($password !== $confirm_password){
		echo "<script>
			alert('konfirmasi password tidak sesuai');
		</script>";
	return false;
	}

	//enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);
	//tambah userbaru ke database
	mysqli_query($conn, "INSERT INTO user VALUES('$Username','$password','$confirm_password')");

	return mysqli_affected_rows($conn);



}
 ?>
