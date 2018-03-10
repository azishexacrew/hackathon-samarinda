<?php  

/**
* class user untuk akun register dan login
*/
class Manage
{
	private $conn;

	function __construct()
	{
		require_once ("database/database.php");
		$db = new Database;
		$this->conn = $db->connect();
	}
	// No Tabungan
	private function noTabungan($table){
		$month = date('m');
		$year = date('Y');
		$pre_stmt = $this->conn->query("SELECT MAX(nomor_tabungan) AS nomor_unik FROM ".$table);
		$result = $pre_stmt->fetch_assoc();
		$nomor_unik = $result['nomor_unik'];

        // baca nomor urut transaksi dari id transaksi terakhir
		$last_nomo_unik = substr($nomor_unik, 2, 3); 
        // nomor urut ditambah 1
		$next_no_unik = $last_nomo_unik+1;

        // membuat format nomor transaksi berikutnya
		$nomor_uniknya = sprintf('%04s', $next_no_unik).'/'.$month.'/'.'BS'.'/'.$year;

		return $nomor_uniknya;
	}

	// Buat Tabungan
	public function addUserTabungan($table, $id){
		$nomor_tabungan = $this->noTabungan($table);
		$pre_stmt = $this->conn->prepare("INSERT INTO ".$table."(`id_user`, `nomor_tabungan`) VALUES (?,?)");
		$pre_stmt->bind_param("ss", $id, $nomor_tabungan);
		$result = $pre_stmt->execute() or die($this->conn->error);
		if($result){
			return 1;
		}else{
			return 0;
		}
	}

	// Tombol tambah tabungan
	public function tombolTambahTabungan($id){
		$pre_stmt = $this->conn->prepare("SELECT id_user FROM tabungan WHERE id_user = ?");
		$pre_stmt->bind_param("i", $id);
		$pre_stmt->execute();
		$result = $pre_stmt->get_result() or die($this->conn->error);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$rows[] = $row;
			}
			return["rows"=>$rows];
		}
		
	}

	// Get Data
	public function getData($id){
		$pre_stmt = $this->conn->prepare("SELECT * FROM tabungan WHERE id_user = ?");
		$pre_stmt->bind_param("i", $id);
		$pre_stmt->execute();
		$result = $pre_stmt->get_result() or die($this->conn->error);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$rows[] = $row;
			}
			return["rows"=>$rows];
		}
	}

	// Data
	public function manageRecordWithPagination($table, $pno){
		$a = $this->pagination($this->conn,$table,$pno,10);

		if($table == "pegawai"){
			$sql = "SELECT * FROM user WHERE level = '2' ".$a["limit"];
			$result = $this->conn->query($sql) or die($this->conn->error);
			$rows = array();
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					$rows[] = $row;
				}
			}
			return["rows"=>$rows, "pagination"=>$a["pagination"]];
		}
	}

	function pagination($conn, $table, $pno, $n){
		$table = "user";
		$query = $conn->query("SELECT COUNT(*) as rows FROM ".$table." WHERE level=2");
		$row = mysqli_fetch_assoc($query);
	    //$totalRecord 	= 100;
		$pageno 		= $pno;
		$perPage 		= $n;
		$pagination     = "";
		$totalPage = ceil($row["rows"]/$perPage);

		$pagination = "<ul class='pagination'>";

		if($totalPage != 1){
			if($pageno > 1){
				$previous = "";
				$previous = $pageno - 1;
				$pagination .="<li class=''><a class='page-link' pn='".$previous."' href='#'><i class='zmdi zmdi-chevron-left'></i></a></li>";
			}
			for ($i=$pageno - 5; $i < $pageno ; $i++) { 
				if($i > 0){
					$pagination .="<li class=''><a class='page-link' pn='".$i."' href='#'>" .$i. "</a></li>";
				}
			}
			$pagination .= "<li class='active'><a class='page-link' pn='".$pageno."' href='#'>$pageno</a>"; 
			for ($i=$pageno + 1; $i <= $totalPage; $i++) { 
				$pagination .="<li class=''><a class='page-link' pn='".$i."' href='#'>".$i."</a></li>"; 
				if($i > $pageno + 5){
					break;
				}
			}
			if($totalPage > $pageno){
				$next = $pageno + 1;
				$pagination .="<li class=''><a class='page-link' pn='".$next."' href='#'><i class='zmdi zmdi-chevron-right'></i></a></li></ul>"; 
			}
		}

	// limit 
		$limit = "LIMIT ".($pageno - 1) * $perPage.",".$perPage;

		return ["pagination"=>$pagination,"limit"=>$limit];
	}

	// Tambah Pegawai
	public function addPegawai($nama, $password, $alamat, $phone, $jk){
		$level = 2;
		$pass_hash = password_hash($password, PASSWORD_BCRYPT,["cost"=>8]);
		$pre_stmt = $this->conn->prepare("INSERT INTO `user`(`username`, `password`, `level`, `alamat`, `no_hp`, `jenis_kelamin`) VALUES (?,?,?,?,?,?)");
		$pre_stmt->bind_param("ssssss", $nama, $pass_hash, $level, $alamat, $phone, $jk);
		$result = $pre_stmt->execute() or die($this->conn->error);
		if($result){
			return 1;
		}else{
			return 0;
		}
	}

	// Update Pegawai
	public function updatePegawai($nama, $alamat, $phone, $jk, $id){
		$pre_stmt = $this->conn->prepare("UPDATE `user` SET `username`=?,`alamat`=?,`no_hp`=?,`jenis_kelamin`=? WHERE `id_user` = ?");
		$pre_stmt->bind_param("sssss", $nama, $alamat, $phone, $jk, $id);
		$result = $pre_stmt->execute() or die($this->conn->error);
		if($result){
			return 1;
		}else{
			return 0;
		}
	}

	// Hapus Pegawai
	public function deletePegawai($table, $id){
		$table = "user";
		$pre_stmt = $this->conn->prepare("DELETE FROM ".$table." WHERE id_user = ?");
		$pre_stmt->bind_param("s", $id);
		$result = $pre_stmt->execute() or die($this->conn->error);
		if($result){
			return 1;
		}else{
			return 0;
		}
	}

	public function getSingleRecord($table, $id){
		if($table == "editPegawai"){
			$ambil = "user";
			$pre_stmt =  $this->conn->prepare("SELECT * FROM ".$ambil." WHERE id_user = ? LIMIT 1");
			$pre_stmt->bind_param("i", $id);
			$pre_stmt->execute();
			$result = $pre_stmt->get_result() or die($this->conn->error);
			if($result->num_rows == 1){
				$row = $result->fetch_assoc();
			}
			return $row;
		}
		else if($table == "berita"){
			$data = "beritaweb";
			$pre_stmt =  $this->conn->prepare("SELECT * FROM ".$data." WHERE bid = ? LIMIT 1");
			$pre_stmt->bind_param("i", $id);
			$pre_stmt->execute();
			$result = $pre_stmt->get_result() or die($this->conn->error);
			if($result->num_rows == 1){
				$row = $result->fetch_assoc();
			}
			return $row;
		}
		else if($table == "baca_pesan"){
			$data = "pesan";
			$pre_stmt =  $this->conn->prepare("SELECT * FROM ".$data." JOIN user ON user.id_user=pesan.id_user WHERE id_pesan = ? LIMIT 1");
			$pre_stmt->bind_param("i", $id);
			$pre_stmt->execute();
			$result = $pre_stmt->get_result() or die($this->conn->error);
			if($result->num_rows == 1){
				$row = $result->fetch_assoc();
			}
			return $row;
		}
		
	}

	public function dataFromTable($table){
		if($table == "count_notif"){
			$ambil = "pesan";
			$sql = "SELECT * FROM ".$ambil." WHERE flag = 0";
			$result = $this->conn->query($sql) or die($this->conn->error);
			$num_rows = $result->num_rows;
			return $num_rows;
		}
		else if($table == "list_pesan"){
			$ambil = "pesan";
			$sql = "SELECT * FROM ".$ambil." JOIN user ON user.id_user=pesan.id_user WHERE flag = 0 ORDER BY id_pesan DESC";
			$result = $this->conn->query($sql) or die($this->conn->error);
			$rows = array();
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					$rows[] = $row;
				}
			}
			return["rows"=>$rows];
		}
		else if($table == "kotak_pesan"){
			$ambil = "pesan";
			$sql = "SELECT * FROM ".$ambil."  JOIN user ON user.id_user=pesan.id_user ORDER BY id_pesan DESC";
			$result = $this->conn->query($sql) or die($this->conn->error);
			$rows = array();
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					$rows[] = $row;
				}
			}
			return["rows"=>$rows];
		}
	}

	public function addPesan($tanggal, $isi, $id){
		$flag = 0;
		$tanggal = date("Y-m-d");
		$pre_stmt = $this->conn->prepare("INSERT INTO `pesan`(`tanggal_pesan`, `is_pesan`, `flag`, `id_user`) VALUES (?,?,?,?)");
		$pre_stmt->bind_param("ssss", $tanggal, $isi, $flag, $id);
		$result = $pre_stmt->execute() or die($this->conn->error);
		if($result){
			return 1;
		}else{
			return 0;
		}
	}

	public function updatePesan($id){
		$pre_stmt = $this->conn->prepare("UPDATE pesan SET flag = 1 WHERE id_pesan = ?");
		$pre_stmt->bind_param("i",$id);
		$result = $pre_stmt->execute() or die($this->conn->error);
		if($result){
			return 1;
		}else{
			return 0;
		}
	}
}
// $obj = new Manage();
// $result = $obj->manageRecordWithPagination("pegawai", 1);
// print_r($result);
?>