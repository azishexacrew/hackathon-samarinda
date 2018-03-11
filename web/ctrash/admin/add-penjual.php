<?php
error_reporting(0);
include"konek.php";
$nama=$_POST['nama'];
$jenis=$_POST['jenis'];
$longitude=$_POST['longitude'];
$latitude=$_POST['latitude'];
$notlp=$_POST['notlp'];
$kec=$_POST['kec'];
if ($sql=mysql_query("insert into penjual values('','$nama','$jenis','$longitude','$latitude','$notlp','$kec')")
) {
echo '<script>alert("data berhasil diinput");';
     echo 'window.location= "home.php?con=13";</script>';
}else{
echo '<script>alert("Tidak berhasil input data ");';
     echo 'window.location= "home.php?con=11";</script>';

}
 

?>
