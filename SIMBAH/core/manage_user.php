<?php  

/**
* class user untuk akun register dan login
*/
class User
{
	private $conn;

	function __construct()
	{
		require_once ("database/database.php");
		$db = new Database;
		$this->conn = $db->connect();
	}

	// mengecek email user mendaftar atau belom
	private function emailExists($email){

		$pre_stmt = $this->conn->prepare("SELECT id_user FROM user WHERE email = ?");
		$pre_stmt->bind_param("s", $email);
		$pre_stmt->execute() or die($this->conn->error);
		$result = $pre_stmt->get_result();
		if($result->num_rows > 0){
			return 1;
		}else{
			return 0;
		}
	}


	//Register
	public function createUserAccount($username, $email, $password){

		if ($this->emailExists($email)) {
			return "EMAIL_SUDAH_ADA";
		}else{
			$pass_hash = password_hash($password, PASSWORD_BCRYPT,["cost"=>8]);
			$date = date('Y-m-d H:i:s');
			$level = "3";
			$pre_stmt = $this->conn->prepare("INSERT INTO `user`(`username`, `email`, `password`, `level`) VALUES (?,?,?,?)");
			$pre_stmt->bind_param("ssss", $username, $email, $pass_hash, $level);
			$result = $pre_stmt->execute() or die($this->conn->error);
			if($result){
				return $this->conn->insert_id;
			}else{
				return 0;
			}
		}
	}

	// login
	public function userLogin($email, $password, $level){
		if($level == "anggota"){
			$level = 3;
			$pre_stmt = $this->conn->prepare("SELECT * FROM user WHERE email = ? AND level = ?");
			$pre_stmt->bind_param("ss",$email, $level);
			$pre_stmt->execute() or die($this->conn->error);
			$result = $pre_stmt->get_result();
			if($result->num_rows < 1){
				return 0;
			}else{
				$row = $result->fetch_assoc();
				if(password_verify($password, $row['password'])){
					$_SESSION['userid'] = $row['id_user'];
					$_SESSION['username'] = $row['username'];
					$_SESSION['email'] = $row['email'];
					$_SESSION['level'] = $row['level'];
					return 'anggota';
				}else{
					return 'bukan_anggota';
				}
			}
		}
		else if($level == "petugas"){
			$level = 2;
			$pre_stmt = $this->conn->prepare("SELECT * FROM user WHERE email = ? AND level = ?");
			$pre_stmt->bind_param("ss",$email, $level);
			$pre_stmt->execute() or die($this->conn->error);
			$result = $pre_stmt->get_result();
			if($result->num_rows < 1){
				return 0;
			}else{
				$row = $result->fetch_assoc();
				if(password_verify($password, $row['password'])){
					$_SESSION['userid'] = $row['id_user'];
					$_SESSION['username'] = $row['username'];
					$_SESSION['email'] = $row['email'];
					$_SESSION['level'] = $row['level'];
					return 'petugas';
				}else{
					return 'bukan_petugas';
				}
			}
		}
		else if($level == "admin"){
			$level = 1;
			$pre_stmt = $this->conn->prepare("SELECT * FROM user WHERE email = ? AND level = ?");
			$pre_stmt->bind_param("ss",$email, $level);
			$pre_stmt->execute() or die($this->conn->error);
			$result = $pre_stmt->get_result();
			if($result->num_rows < 1){
				return 0;
			}else{
				$row = $result->fetch_assoc();
				if(password_verify($password, $row['password'])){
					$_SESSION['userid'] = $row['id_user'];
					$_SESSION['username'] = $row['username'];
					$_SESSION['email'] = $row['email'];
					$_SESSION['level'] = $row['level'];
					return 'admin';
				}else{
					return 'bukan-admin';
				}
			}
		}
	}

	// Buat Tabungan
	public function userTabungan(){

	}
}

?>