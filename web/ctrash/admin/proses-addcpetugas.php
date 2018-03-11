<?php
error_reporting(0);
include"konek.php";
$nip=$_POST['nip'];
$nama=$_POST['nama'];
$jk=$_POST['jk'];
$tempat=$_POST['tempat'];
$tanggal=$_POST['tanggal'];
$email=$_POST['email'];
$password=$_POST['password'];
$lokasi=$_POST['lokasi'];
if ($sql=mysql_query("insert into petugas values('$nip','$nama','$tempat','$tanggal','$jk','$email','$password','$lokasi')")
) {
echo '<script>alert("data berhasil diinput");';
     echo 'window.location= "home.php?con=5";</script>';
}else{
echo '<script>alert("Tidak berhasil input data ");';
     echo 'window.location= "home.php?con=18";</script>';

}
 

?>
