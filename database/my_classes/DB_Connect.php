<?php
	// echo "Db connect linked!";

	class DB_Connect extends PDO {
		private $host = "localhost";
		private $db_name = "odp_3";
		private $user_name = "root";
		private $password = "";
		private $dsn;
		public function getDbname () {
			return $this->db_name;
		}
		
		
		public function __construct () {
			try {
				$dsn = "mysql:host=".$this->host.";dbname=".$this->db_name;

				parent::__construct($dsn,$this->user_name,$this->password);
				public function () {

				}
				// echo "Connected to database successfully"."<br>";
			}catch (Exception $e) {
				echo "Error - ".$e->getMessage();
			}
			
		}
		// public function __destruct() {
		// 	parent::__destruct(null);
		// }
		
	}
	
?>