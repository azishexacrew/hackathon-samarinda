<?php
session_start();
if (!isset($_SESSION['admin_login'])) {
	header('location:index.php');
}
?>
<?php
include'konek.php';
$nip=  mysql_real_escape_string($_REQUEST['nip']);
$nama=mysql_real_escape_string($_REQUEST['nama']);
$tempat=mysql_real_escape_string($_REQUEST['tempat']);
$tanggal=mysql_real_escape_string($_REQUEST['tanggal']);
$jk=mysql_real_escape_string($_REQUEST['jk']);
$email=mysql_real_escape_string($_REQUEST['email']);
$password=mysql_real_escape_string($_REQUEST['password']);
$lokasi=mysql_real_escape_string($_REQUEST['lokasi']);
$sql="UPDATE petugas SET  nip='$nip', nama_petugas='$nama', tempat_lahir='$tempat', tgllahir='$tanggal', jk='$jk',email='$email',password='$password',lokasi='$lokasi' WHERE nip='$nip'";
mysql_query($sql) or die(mysql_error());
echo "<script> alert('berhasil update data')</script>";
echo "<script> window.location='home.php?con=5'</script>";

?>