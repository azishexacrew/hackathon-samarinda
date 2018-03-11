<?php
error_reporting(0);
session_start();
if (!isset($_SESSION['admin_login'])) {
	header('location:index.php');
}
?>
<?php
include'konek.php';
$idlokasi=mysql_real_escape_string('idlokasi');
$nama=mysql_real_escape_string($_REQUEST['nama']);
$lat=mysql_real_escape_string($_REQUEST['latitude']);
$lon=mysql_real_escape_string($_REQUEST['longitude']);
$status=mysql_real_escape_string($_REQUEST['status']);
$sql="UPDATE peta SET id_lokasi='$idlokasi',nama_lokasi='$nama',lat='$lat',lon='$lon',status='$status' WHERE id_lokasi='$idlokasi'";
mysql_query($sql) or die(mysql_error());
echo "<script> alert('berhasil update data')</script>";
echo "<script> window.location='home.php?con=20'</script>";

?>