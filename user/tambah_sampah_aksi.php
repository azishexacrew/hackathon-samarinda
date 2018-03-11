<?php include '../core/koneksi.php' ?>
<?php include '../core/helper.php' ?>

<?php 

$id_kat = $_POST['id_kat'];
$etiket = $_POST['etiket'];
$ket = $_POST['ket'];
$id_user = $_SESSION['id'];

// get id driver
// $s_sampah = "SELECT * FROM user WHERE level=3";
// $q_sampah = mysqli_query($conn,$s_sampah);
// $driver = mysqli_fetch_array($q_sampah);

// $driver=$driver['id_user'];


// get data driver
$s_sampah = "SELECT * FROM user WHERE level=3";
$q_sampah = mysqli_query($conn,$s_sampah);

while ($driver = mysqli_fetch_array($q_sampah)){
	$id_driver[] = $driver['id_user'];
}

$total = count($id_driver);
$random = rand($id_driver[0], $total-1);
$id_driver = $id_driver[$random];




$query = "INSERT INTO data_sampah (id_kat, id_user,id_driver, ket, etiket,berat,status) VALUES ('$id_kat', '$id_user', '$id_driver', '$ket', '$etiket','0','0') ";
$result = mysqli_query($conn, $query);



if($result){
  header("Location: ". BASE_URL. "/user/tambah_sampah.php");
}

