<?php
class Database{ //DB connection details//
private $db_name ="c9";
private $table ="product";
private $username ="otherjack";
private $password ="";
private $host ="127.0.0.1";
	
	public function getConnection() {
		
		$this->conn=null;
		try{
			$this->conn =  new PDO("mysql:host=". $this->host.";dbname=". $this->db_name, $this->username, $this->password);
			$this->conn->exec("set names UTF8");
		}catch (PDOExecption $exception){
		echo "Connection Error" .$exception ->getMessage();
		}
		return $this->conn;
	}
}
?>