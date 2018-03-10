<?php  

class Database
{

	private $conn;

	public function connect(){
		require 'content.php';
		$this->conn = new mysqli(HOST,USER,PASS,DB);
		if($this->conn){
			return $this->conn;
		}
		return "DATABASE_CONNECTION_FAILED";
	}
}

// $db = new Database();
// $db -> connect(); 

?>