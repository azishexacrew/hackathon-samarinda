<?php 
require 'functions.php';

$id= $_GET["id"];
	if( hapus($id) > 0){
		echo "<script>
		      alert('data berhasil dihapus!');
		      
		      </script>";
	} else {
		echo "<script>
	      alert('data gagal dihapus!');
	      document.location.href = 'userform.php';
	      	      </script>";

	}


 ?>