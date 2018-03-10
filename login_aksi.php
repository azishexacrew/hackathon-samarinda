<?php
/* index.php ------------------------------------------------------
   	version: 1.0

	By : M. Fajri Basuki
	Email : fajri21@gmail.com
	License: GPL v2
			http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
			
-Program ini tidak diperkenankan untuk diperjual belikan tanpa izin pembuat
-apabila aplikasi ini diperjual belikan maka sangsi sesuai hukum yang berlaku
-siapapun boleh mengedit file ini dengan izin pemilik dan digunakan untuk pendidikan
----------------------------------------------------------------*/

?>
<?php
session_start();
include "core/koneksi.php" ;
$user = $_POST['user'];
$pass = $_POST['pass'];

$sql= "SELECT * FROM user where username='$user' and password='$pass'";

$hasil = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($hasil);

$st = $row['level'];


if($st == 1){
    die('admin');
    $_SESSION["id"]=$id_user;
    $_SESSION["username"]=$row['username'];
}
elseif($st==2){
    header('Location: user/');
    $_SESSION["id"]=$id_user;
    $_SESSION["username"]=$row['username'];
}
elseif($st==3){
    die('user');
    $_SESSION["id"]=$id_user;
    $_SESSION["username"]=$row['username'];
}
else{
    die('gagal');
}

?>