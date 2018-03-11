<?php include '../core/koneksi.php' ?>
<?php include '../core/helper.php' ?>

<?php 

$id_kat = $_POST['id_kat'];
$etiket = $_POST['etiket'];
$ket = $_POST['ket'];
$id_user = $_SESSION['id'];

$query = "INSERT INTO data_sampah (id_kat, id_user, ket, etiket,berat,status) VALUES ('$id_kat', '$id_user', '$ket', '$etiket','0','0') ";
$result = mysqli_query($conn, $query);



if($result){
  header("Location: ". BASE_URL. "/user/dompet.php");
}

