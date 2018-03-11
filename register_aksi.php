<?php
include "core/helper.php";
include "core/koneksi.php";

$user=$_POST['user'];
$pass=$_POST['pass'];
$level=2;

$nama=$_POST['nama'];
$hp=$_POST['hp'];
$alamat=$_POST['alamat'];
$kec=$_POST['kecamatan'];
$kel=$_POST['kelurahan'];




//membuat angka acak tiket
//fungsi nomor kode otomatis
function buatkode($nomor_terakhir, $kunci, $jumlah_karakter = 0)
{
//menambahkan nomor baru
$nomor_baru = intval(substr($nomor_terakhir, strlen($kunci))) + 1;
//menambahkan nol didepan nomor baru sesuai panjang jumlah karakter
$nomor_baru_plus_nol = str_pad($nomor_baru, $jumlah_karakter, "0", STR_PAD_LEFT);
//menyusun kunci dan nomor baru
$kode = $kunci.'.'.$nomor_baru_plus_nol;
return $kode;
}

$tgl="tong";
//pengambilan record terakhir
$s_tiket = "SELECT max(uniq) AS tiket_baru FROM biodata";
$q_tiket  = mysqli_query($conn,$s_tiket);
$v_tiket= mysqli_fetch_array($q_tiket);
$newtiket=substr($v_tiket['tiket_baru'],3);
$nomor_terakhir = $newtiket;
$uniq=buatkode($nomor_terakhir, $tgl ,3);
//out put : 16.0001



$query = mysqli_query($conn, "SELECT username FROM user WHERE username='$user'");
$cek_username = mysqli_num_rows($query);

if($cek_username>0){
  $pesan = "Username sudah ada, Silahkan Ulangi lagi";
  header("Location: ".BASE_URL. "/register.php?pesan=$pesan");
}else{
  $masuk="INSERT INTO user(uniq,username, password,level) VALUES ('$uniq','$user', '$pass', $level)";
  mysqli_query($conn, $masuk);

  $in="INSERT INTO biodata(uniq,nama, hp,alamat,kec,kel) VALUES ('$uniq','$nama', '$hp', '$alamat', '$kec', '$kel')";
  mysqli_query($conn, $in);

  header("Location: ".BASE_URL. "/login.php");

}

?>
