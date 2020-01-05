<?php
	// echo 'create Query connected';
	class CreateQuery extends DbConnect
	{	
	

		public function createDatabase ($db_name) {
			$sql = "CREATE DATABASE ".$db_name;
			$create_query = PDO::prepare($sql);
			$create_query->execute([]);
			if ($create_query ->errorCode() == 0) {
				echo "Sent a db create query";
				if ($create_query->rowCount() !==0 ) {
					echo "Database creation was Successful";
					return ['status'=>"true", 'message'=>"Database Created Successfully"];
				}else {
					echo "Database creation failed";
					return ['status'=>"true", 'message'=>"Database creation failed Successfully"];
				}
			
			}
			else {
				echo "Database creation query was unsuccessful";
				$error = $create_query->errorInfo();
				return ['status'=>"false", 'message'=>"There was an error - " . $error[2] ];
			}
			// return $check_query->fetchColumn(); 
		}
		public function createVariableStorage () {
			$sql = 
				"CREATE TABLE variableStorage 
				(
					id int AUTO_INCREMENT PRIMARY KEY,
					variable varchar(50),
					value varchar(100)
				);";
			$create_query = PDO::prepare($sql);
			$create_query->execute([]);
			if ($create_query ->errorCode() == 0) {
				echo "Variable Storage Created Successfully";
				return ['status'=>"true", 'message'=>"Variable Storage Created Successfully"];
			}
			else {
				echo "Variable Storage Creation failed";
				$error = $create_query->errorInfo();
				return ['status'=>"false", 'message'=>"There was an error - " . $error[2] ];
			}
			
		}
		public function createSchemaWithDept () {
			$sql = 
				"CREATE TABLE organisation_schema 
				(
					id int AUTO_INCREMENT PRIMARY KEY,
					department varchar(100),
					job_category varchar(100),
					file_types varchar(100),
				);";
			$create_query = PDO::prepare($sql);
			$create_query->execute([]);
			if ($create_query ->errorCode() == 0) {
				echo "Sent a query to create organisation schema";
					if ($create_query->rowCount() !==0 ) {
						echo "Organisation schema Table was created Successfully";
						return ['status'=>"true", 'message'=>"Record updated Successfully"];
					}else {
						echo "Creating Organisation schema failed ";
						return ['status'=>"true", 'message'=>"Record updated Successfully"];
					}
				
				return ['status'=>"true", 'message'=>"Creation Query for organisation schema sent Successfully"];
			}
			else {
				echo "Creation Query for organisation schema failed";
				$error = $create_query->errorInfo();
				return ['status'=>"false", 'message'=>"There was an error - " . $error[2] ];
			}
			
		}
		// public function createSchemaWithDept () {
		// 	$sql = 
		// 		"CREATE TABLE organisation_schema 
		// 		(
		// 			id int AUTO_INCREMENT PRIMARY KEY,
		// 			department varchar(100),
		// 			job_category varchar(100),
		// 			file_types varchar(100),
		// 		);";
		// 	$create_query = PDO::prepare($sql);
		// 	$create_query->execute([]);
		// 	if ($create_query ->errorCode() == 0) {
		// 		echo "Sent a query to create organisation schema";
		// 			if ($create_query->rowCount() !==0 ) {
		// 				echo "Organisation schema Table was created Successfully";
		// 				return ['status'=>"true", 'message'=>"Record updated Successfully"];
		// 			}else {
		// 				echo "Creating Organisation schema failed ";
		// 				return ['status'=>"true", 'message'=>"Record updated Successfully"];
		// 			}
				
		// 		return ['status'=>"true", 'message'=>"Creation Query for organisation schema sent Successfully"];
		// 	}
		// 	else {
		// 		echo "Creation Query for organisation schema failed";
		// 		$error = $create_query->errorInfo();
		// 		return ['status'=>"false", 'message'=>"There was an error - " . $error[2] ];
		// 	}
			
		// }
		
		public function createDepartmentsTable () {
			$sql = 
				"CREATE TABLE all_departments 
				(
					id int AUTO_INCREMENT PRIMARY KEY,
					departments varchar(150),
					head varchar(100)
				);";
			$create_query = PDO::prepare($sql);
			$create_query->execute([]);
			if ($create_query ->errorCode() == 0) {
				echo "Department Table was created Successfully";
				return ['status'=>"true", 'message'=>"Department Table was created Successfully"];
			}
			else {
				echo "Department Table was not created Successfully";
				$error = $create_query->errorInfo();
				return ['status'=>"false", 'message'=>"There was an error - " . $error[2] ];
			}
		}
		public function createJobsTable () {
			$sql = 
				"CREATE TABLE all_jobs 
				(
					id int AUTO_INCREMENT PRIMARY KEY,
					job_name varchar(100),
					job_type varchar(20)
				);";
			$create_query = PDO::prepare($sql);
			$create_query->execute([]);
			if ($create_query ->errorCode() == 0) {
				echo "Jobs Table was created Successfully";
				return ['status'=>"true", 'message'=>"Jobs Table was created Successfully"];
			}
			else {
				echo "Jobs Table was not created Successfully";
				$error = $create_query->errorInfo();
				return ['status'=>"false", 'message'=>"There was an error - " . $error[2] ];
			}
		}
		
			// return $check_query->fetchColumn(); 
		
	}

?>
