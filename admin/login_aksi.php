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
include "../core/koneksi.php" ;
include "../core/helper.php";

$user = $_POST['user'];
$pass = $_POST['pass'];

$sql= "SELECT * FROM user where username='$user' and password='$pass'";

$hasil = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($hasil);

$id_user = $row['id_user'];
$st = $row['level'];


if($st == 1){
    // die('admin');
    $_SESSION["id"]=$id_user;
    $_SESSION["username"]=$row['username'];

    header('Location: '. BASE_URL. "/admin");
}
elseif($st==2){    
    $_SESSION["id"]=$id_user;
    $_SESSION["username"]=$row['username'];

    header('Location: '. BASE_URL. "/user");
}
elseif($st==3){
    die('driver');
    $_SESSION["id"]=$id_user;
    $_SESSION["username"]=$row['username'];
}
else{
    die('gagal');
}

?>