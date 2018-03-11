<?php include '../core/koneksi.php' ?>
<?php include '../core/helper.php' ?>

<?php 

$user = $_POST['user'];
$pass = $_POST['pass'];
$level = 3;

$query = "INSERT INTO user (username, password, level) VALUES ('$user', '$pass', '$level') ";
$result = mysqli_query($conn, $query);



if($result){
  header("Location: ". BASE_URL. "/admin/list_driver.php");
}

