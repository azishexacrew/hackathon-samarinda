<?php  
require("database/database.php");
require("manage_user.php");
require("manage.php");
// register
if(isset($_POST["nama_r"]) && isset($_POST['email_r'])) {
	$user = new User();
	$result = $user->createUserAccount($_POST["nama_r"],$_POST["email_r"],$_POST["password_r"]);
	echo $result;
	exit();
}

// login
if(isset($_POST["email"]) && isset($_POST['password'])) {
	$user = new User();
	$result = $user->userLogin($_POST["email"],$_POST["password"], $_POST["level"]);
	echo $result;
	exit();
}

// Tombol tambah tabungan
if(isset($_POST["tombolTambahTabungan"])){
	$obj = new Manage();
	$result = $obj->tombolTambahTabungan($_POST["id"]);
	$rows = $result["rows"];
	$response ="";
	if(count($rows) > 0){
		foreach ($rows as $row) { 
			$response .='
			
			';
		}
		exit($response);
	}else{
		$response='
		<button type="button" class="btn btn-danger btn-icon" id="tambah_tabungan"><i class="zmdi zmdi-plus"></i></button>
		';
	}exit($response);
}

// Tambah tabungan
if(isset($_POST["tambah_tabungan"])){
	$obj = new Manage();
	$result = $obj->addUserTabungan("tabungan",$_POST["id"]);
	echo $result;
	exit();
}

// Table Tabungan
if(isset($_POST["tabungan"])){
	$obj = new Manage();
	$result = $obj->getData($_POST["id"]);
	$rows = $result["rows"];
	$response ="";
	$no = 1;
	if(count($rows) > 0){
		foreach ($rows as $row) {
			$response .='
			<tr>
			<td>'.$no++.'</td>

			<td>'.$row["tanggal_tabungan"].'</td>
			<td>'.$row["sampah_tabungan"].'</td>
			<td>'.$row["setoran_tabungan"].'</td>
			<td>'.$row["saldo_tabungan"].'</td>
			<td>
			</td>
			</tr>
			';
		}exit($response);
	}else{
		$response .='
		<tr>
		<td colspan="5">
		<center><h5>BELUM ADA DATA</h4></center>
		</td>
		</tr>
		';
	}exit($response);
}


// Count Notif
if(isset($_POST["count_notif"])){
	$obj = new Manage();
	$result = $obj->dataFromTable("count_notif");
	echo json_encode($result);
	exit();
}

if(isset($_POST["tanggal_pesan"]) && isset($_POST["isi_pesan"])){
	$obj = new Manage();
	$result = $obj->addPesan($_POST["tanggal_pesan"], $_POST["isi_pesan"], $_POST["id_user"]);
	echo json_encode($result);
	exit();
}

if(isset($_POST["list_pesan"])){
	$obj = new Manage();
	$result = $obj->dataFromTable('list_pesan');
	$rows = $result["rows"];
	$response ="";
	$no = 1;
	if(count($rows) > 0){
		foreach ($rows as $row) {
			$response .='
			
			<a href="#" mid="'.$row["id_pesan"].'" class="list-group-item media baca-pesan">
			<div class="pull-left">
			<img class="avatar-img" src="../img/profile-pics/1.jpg" alt="">
			</div>

			<div class="media-body">
			<div class="lgi-heading">'.$row["username"].'</div>
			<small class="lgi-text">'.$row["tanggal_pesan"].'</small>
			</div>
			</a>
			';
		}exit($response);
	}else{
		$response .='
		<a href="#" class="list-group-item media">
		<div class="lgi-heading">Kotak Masuk Kosong</div>
		</a>
		';
	}exit($response);

}

if(isset($_POST["baca_pesan"])){
	$obj = new Manage();
	$result = $obj->getSingleRecord("baca_pesan", $_POST["id"]);
	echo json_encode($result);
	exit();
}

if(isset($_POST["flag_pesan"])){
	$obj = new Manage();
	$result = $obj->updatePesan($_POST["id"]);
	echo json_encode($result);
	exit();
}

if(isset($_POST["kotak_pesan"])){
	$obj = new Manage();
	$result = $obj->dataFromTable('kotak_pesan');
	$rows = $result["rows"];
	$response ="";
	$no = 1;
	if(count($rows) > 0){
		foreach ($rows as $row) {
			$response .='
			<div class="list-group-item media">
                <div class="checkbox pull-left lgi-checkbox">
                    <label>
                        <input type="checkbox" value="">
                        <i class="input-helper"></i>
                    </label>
                </div>

                <div class="pull-left">
                    <div class="avatar-char palette-Light-Blue bg">P</div>
                </div>

                <div class="pull-right">
                    <ul class="actions">
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" aria-expanded="false">
                                <i class="zmdi zmdi-more-vert"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a href="#">Lihat Pesan</a>
                                </li>
                                <li>
                                    <a href="#">Lihat Lokasi</a>
                                </li>
                                <li>
                                    <a href="#">Hapus</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <div class="media-body">
                    <div class="lgi-heading">'.$row["username"].'<small>'.$row['tanggal_pesan'].'</small></div>
                    <small class="lgi-text">'.$row["is_pesan"].'</small>
                </div>
            </div>
			';
		}exit($response);
	}else{
		$response .='
		<a href="#" class="list-group-item media">
		<div class="lgi-heading">Kotak Masuk Kosong</div>
		</a>
		';
	}exit($response);

}

?>