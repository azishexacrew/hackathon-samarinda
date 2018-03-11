<?php include '../core/koneksi.php' ?>
<?php include '../core/helper.php' ?>

<?php 

$ido=$_POST['idorder'];
$berat = $_POST['berat'];

$query = "UPDATE data_sampah SET berat=$berat, status=1  WHERE id_sampah=$ido;";
$result = mysqli_query($conn, $query);



if($result){
  header("Location: ". BASE_URL. "/driver/index.php");
}

