<?php  
require 'functions.php';

if( isset($_POST["signup"]) ) {

	if( signup($_POST) > 0 ) {
		echo "<script>
			alert('Daftar Berhasil!');
			</script>";
			header ("location: login.php");
	} else {
		echo mysqli_error($conn);
	}
}

?>


<!DOCTYPE html>
<html>
<head>
  <title>Sign Up Form with live validation</title>
  
  
  
      <link rel="stylesheet" href="css/style_daftar.css">

  
</head>

<body>

  	

<form action="" method="post">
  <h2>Sign Up</h2>
  	<p>
			<label for="Username" class="floatLabel">Username</label>
			<input id="Username" name="Username" type="text">
		</p>
		<p>
			<label for="password" class="floatLabel">Password</label>
			<input id="password" name="password" type="password">
			<span>Enter a password longer than 8 characters</span>
		</p>
		<p>
			<label for="confirm_password" class="floatLabel">Confirm Password</label>
			<input id="confirm_password" name="confirm_password" type="password">
			<span>Your passwords do not match</span>
		</p>
		<p>
			<button type="submit" name="signup"> Sign Up </button>
		</p>
	</form>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

    <script  src="js/index_daftar.js"></script>




</body>

</html>
