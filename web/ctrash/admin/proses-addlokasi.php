<?php
error_reporting(0);
include"konek.php";
$nama=$_POST['nama'];
$latitude=$_POST['latitude'];
$longitude=$_POST['longitude'];
$status=$_POST['status'];
if ($sql=mysql_query("insert into peta values('','$nama','$latitude','$longitude','$status')")
) {
echo '<script>alert("data berhasil diinputkan ");';
     echo 'window.location= "home.php?con=25";</script>';
}else{
echo '<script>alert("Tidak berhasil input data ");';
     echo 'window.location= "home.php?con=25";</script>';

}
 
?>
