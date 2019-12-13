<?php
	// echo 'select connected';
	
	class selectQuery extends DB_Connect
	{
		public function check_if_email_exists ($email,$table = 'odp_3_interns') {
			$sql = "SELECT 1 FROM ".$table." WHERE email = :email";
			$check_query = PDO::prepare($sql);
			$check_query->execute([':email'=>$email]);
			// echo print_r($check_query->errorInfo());
			return $check_query->fetchColumn(); 
		}

		public function check_if_passwords_match ($email,$password,$table='odp_3_interns') {
			$sql = "SELECT * FROM ".$table." WHERE email = :email";
			$check_query = PDO::prepare($sql);
			$check_query->execute([':email'=>$email]);
			$record_array = $check_query->fetch(PDO::FETCH_ASSOC);
			return (password_verify($password, $record_array['password']));
			
		}

		public function getFirstName ($email,$table = 'odp_3_interns') {
			$sql = "SELECT * FROM ".$table." WHERE email = :email";
			$check_query = PDO::prepare($sql);
			$check_query->execute([':email'=>$email]);
			echo print_r($check_query->errorInfo());

			$record_array = $check_query->fetch(PDO::FETCH_ASSOC);
			return  $record_array['firstname'];
		}


		public function getAllDetails ($email,$table = 'odp_3_interns') {
			$sql = "SELECT * FROM ".$table." WHERE email = :email";
			$check_query = PDO::prepare($sql);
			$check_query->execute([':email'=>$email]);
			$record_array = $check_query->fetch(PDO::FETCH_NUM);
			return  $record_array;
		}
		public function getAllRecords ($table = 'odp_3_interns') {
			$sql = "SELECT * FROM ".$table;
			$check_query = PDO::prepare($sql);
			$check_query->execute([]);
			$record_array = $check_query->fetchAll(PDO::FETCH_NUM);
			return  $record_array;
		}
		
	}
?>