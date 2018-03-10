<?php  
require 'functions.php';

if( isset($_POST["lapor"]) ) {
  if( lapor($_POST) > 0 ) {
    echo "<script>
      alert('Pelaporan Berhasil!');
      document.location.href = 'userform.php';
      </script>";
  } else {
    echo mysqli_error($conn);
  }
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Mari Berpatisipasi!</title> 
      <link rel="stylesheet" href="css/style_daftar.css">  
</head>
<body>
<form action="" method="post">
  <h2>Laporan</h2>
  	<p>
			<label for="permasalahan" class="floatLabel">Permasalahan</label>
			<input id="permasalahan" name="permasalahan" type="text">
	</p>
	<p>
			<label for="deskripsi" class="floatLabel">Deskripsi</label>
			<input id="deskripsi" name="deskripsi" type="text">
			<span>Enter a password longer than 8 characters</span>
	</p>
	<p>
    <label for="lokasi" class="floatLabel">Lokasi</label>
      <input id="lokasi" name="lokasi" type="text">
  </p>
    		
		<p>
			<button type="submit" name="lapor"> Lapor </button>
		</p>


	</form>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script  src="js/index_daftar.js"></script>

</body>

</html>
