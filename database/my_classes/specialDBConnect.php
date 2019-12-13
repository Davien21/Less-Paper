<?php
	// echo "Db connect linked!";

	class DB_Connect extends PDO {
		private $host = "localhost";
		private $db_name;
		private $user_name = "root";
		private $password = "";
		private $dsn;
		// public $conn;
		public function getDbname () {
			return $this->db_name;
		}
	
		public function __construct () {
			// echo "It works!<br>";
			// $this->conn = null;
			try {
				$dsn = "mysql:host=".$this->host;

				parent::__construct($dsn,$this->user_name,$this->password);


				// echo "Connected to database successfully"."<br>";
			}catch (Exception $e) {
				echo "Error - ".$e->getMessage();
			}
			
		}
		
	}
	$test_db = new DB_Connect;

	
?>