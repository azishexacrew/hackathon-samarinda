<?php 
session_start();
        
if(!isset($_SESSION['admin_login'])) 
    header('location:index.php');   
?>
<?php
include 'konek.php';
$delete_id=$_POST['hapus'];
$idjumlah=count($delete_id);
if (isset($_POST['admin']))
{
    for ($i=0; $i<$idjumlah ; $i++) { 
     $sql="Delete FROM petugas WHERE nip='$delete_id[$i]'";
    $result=mysql_query($sql) or die(mysql_error());
    $rws=mysql_fetch_array($result);    
     echo '<script>alert("Data petugas dihapus ");';
     echo 'window.location="home.php?con=5";</script>';
    } 
}
?>