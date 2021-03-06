<?php
	class SelectQuery extends DbConnect
	{
		public function check_if_email_exists ($email,$table = 'all_db_admins') {
			$sql = "SELECT 1 FROM ".$table." WHERE email = :email";
			$check_query = PDO::prepare($sql);
			$check_query->execute([':email'=>$email]);
			// echo print_r($check_query->errorInfo());
			return $check_query->fetchColumn(); 
		}
		public function check_existing_orgs ($org,$table = 'organisation_data') {
			$sql = "SELECT 1 FROM ".$table." WHERE organisation = :org";
			$check_query = PDO::prepare($sql);
			$check_query->execute([':org'=>$org]);
			// print_r($check_query->errorInfo());
			return $check_query->fetchColumn(); 
		}

		public function check_if_passwords_match ($email,$password,$table='all_db_admins') {
			$sql = "SELECT * FROM ".$table." WHERE email = :email";
			$check_query = PDO::prepare($sql);
			$check_query->execute([':email'=>$email]);
			$record_array = $check_query->fetch(PDO::FETCH_ASSOC);
			return (password_verify($password, $record_array['password']));
			
		}

		public function check_creation_stage ($email) {
			$sql = "SELECT creation_stage FROM all_db_admins WHERE email = :email";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['email'=>$email]);

			return $record_array = $check_query->fetch(PDO::FETCH_ASSOC);
		}

		public function getOrgName ($email) {
			$sql = "SELECT office FROM all_db_admins WHERE email = :email";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['email'=>$email]);
			// echo print_r($check_query->errorInfo());
			
			return $record_array = $check_query->fetch(PDO::FETCH_ASSOC);
		}
		public function check_if_dept_exists ($dept) {
			$sql = "SELECT 1 departments FROM all_departments WHERE departments =:department" ;
			$check_query = PDO::prepare($sql);
			$check_query->execute(['department'=>$dept]);
			// echo print_r($check_query->errorInfo());
			
			return $check_query->fetchColumn(); ;
		}
		public function check_if_job_exists($job_name) {
			$sql = "SELECT 1 job FROM all_jobs WHERE job_name =:job_name";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['job_name'=>$job_name]);
			// echo print_r($check_query->errorInfo());
			
			return $check_query->fetchColumn(); ;
		}
		public function getAllDepts () {
			$sql = "SELECT departments FROM all_departments";
			$check_query = PDO::prepare($sql);
			$check_query->execute([]);
			// echo print_r($check_query->errorInfo());
			
			return $record_array = $check_query->fetchAll(PDO::FETCH_NUM);
		}
		public function getAllDeptTable () {
			$sql = "SELECT * FROM all_departments";
			$check_query = PDO::prepare($sql);
			$check_query->execute([]);
			// echo print_r($check_query->errorInfo());
			
			return $record_array = $check_query->fetchAll(PDO::FETCH_NUM);
		}
		public function getAllJobsTable () {
			$sql = "SELECT * FROM all_jobs";
			$check_query = PDO::prepare($sql);
			$check_query->execute([]);
			// echo print_r($check_query->errorInfo());
			
			return $record_array = $check_query->fetchAll(PDO::FETCH_NUM);
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