<?php  

/**
* class user untuk akun register dan login
*/
class Manage
{
	private $conn;

	function __construct()
	{
		require_once ("../database/database.php");
		$db = new Database;
		$this->conn = $db->connect();
	}
	

	// Data
	public function manageRecordWithPagination($table, $pno){
		$a = $this->pagination($this->conn,$table,$pno,10);
		$sql = "SELECT * FROM user WHERE level = '3' ".$a["limit"];
		$result = $this->conn->query($sql) or die($this->conn->error);
		$rows = array();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$rows[] = $row;
			}
		}
		return["rows"=>$rows, "pagination"=>$a["pagination"]];
	}

	function pagination($conn, $table, $pno, $n){
		$table = "user";
		$query = $conn->query("SELECT COUNT(*) as rows FROM ".$table." WHERE level=3");
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

	// Tambah Anggota
	public function addAnggota($nama, $password, $alamat, $phone, $jk){
		$level = 3;
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

	// Update Anggota
	public function updateAnggota($nama, $alamat, $phone, $jk, $id){
		$pre_stmt = $this->conn->prepare("UPDATE `user` SET `username`=?,`alamat`=?,`no_hp`=?,`jenis_kelamin`=? WHERE `id_user` = ?");
		$pre_stmt->bind_param("sssss", $nama, $alamat, $phone, $jk, $id);
		$result = $pre_stmt->execute() or die($this->conn->error);
		if($result){
			return 1;
		}else{
			return 0;
		}
	}

	// Hapus Anggota
	public function deleteAnggota($table, $id){
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
		if($table == "editAnggota"){
			$ambil = "user";
			$pre_stmt =  $this->conn->prepare("SELECT * FROM ".$ambil." WHERE id_user = ? LIMIT 1");
			$pre_stmt->bind_param("i", $id);
			$pre_stmt->execute();
			$result = $pre_stmt->get_result() or die($this->conn->error);
			if($result->num_rows == 1){
				$row = $result->fetch_assoc();
			}
			return $row;
		}else{
			if($table == "berita"){
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
		}
		
	}
}
// $obj = new Manage();
// $result = $obj->manageRecordWithPagination("pegawai", 1);
// print_r($result);
?>