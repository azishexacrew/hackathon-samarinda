<?php 
session_start();
include 'konek.php';
?>
<?php
$date1=date('Y-m-d H:i:s');
$_SESSION['admin_date']=$date1;
$id=$_SESSION['admin_id'];
$sql="UPDATE admin SET last_login='$date1' WHERE username='$id'";
mysql_query($sql) or die(mysql_error());
session_destroy();
header('location:index.php');
?>