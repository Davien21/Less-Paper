<?php
	// echo 'create Query connected';
	class insertQuery extends DB_Connect
	{
		public function createDatabase ($db_name) {
			$sql = "CREATE DATABASE ".$db_name;
			$create_query = PDO::prepare($sql);
			$create_query->execute([]);
			if ($create_query ->errorCode() == 0) {
					echo "Database was created Successfully";
					return ['status'=>"true", 'message'=>"Database Created Successfully"];
			}
			else {
				echo "Database creation was unsuccessful";
				$error = $create_query->errorInfo();
				return ['status'=>"false", 'message'=>"There was an error - " . $error[2] ];
			}
			// return $check_query->fetchColumn(); 
		}
	}

?>
