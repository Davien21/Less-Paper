<?php
	// echo 'insert Query connected';
	class InsertQuery extends DbConnect
	{
		public function check_if_email_exists ($email) {
			$sql = "SELECT 1 FROM odp_3_interns WHERE email = :email";
			$check_query = PDO::prepare($sql);
			$check_query->execute([':email'=>$email]);
			return $check_query->fetchColumn();
		}
		
		public function insertReportStage($stage) {
			$sql = "INSERT INTO variablestorage(variable,value) VALUES(:variable,:value)";
			$insert_query = PDO::prepare($sql);
			$insert_query -> execute(['variable'=>'DB Creation Stage', 'value'=>$stage]);
			if ($insert_query ->errorCode() == 0) {
				echo "First progress report inserted Successfully";
				return ['status'=>"true", 'message'=>"Data Inserted Successfully"];
			}
			else {
				echo "First progress report did not insert Successfully!";
				$error = $insert_query->errorInfo();
				return ['status'=>"false", 'message'=>"There was an error - " . $error[2] ];
			}
		}
		public function insertJobCategoryStage($stage) {
			$sql = "INSERT INTO variablestorage(variable,value) VALUES(:variable,:value)";
			$insert_query = PDO::prepare($sql);
			$insert_query -> execute(['variable'=>'Job cat stage', 'value'=>$stage]);
			if ($insert_query ->errorCode() == 0) {
				echo "Job Cat stage Insert Query Sent";
				if ($insert_query->rowCount() !==0 ) {
					echo "Job Cat stage inserted Successfully";
					return ['status'=>"true", 'message'=>"Job Cat stage inserted Successfully"];
				}else {
					echo "Job Cat stage did not insert Successfully";
					return ['status'=>"true", 'message'=>"Job Cat stage insertion failed"];
				}
			}
			else {
				echo "Job Cat stage Insert Query did not send";
				$error = $insert_query->errorInfo();
				return ['status'=>"false", 'message'=>"There was an error - " . $error[2] ];
			}
		}
		public function insertTopOfficer($top_officer_title) {
			$sql = "INSERT INTO variablestorage(variable,value) VALUES(:variable,:value)";
			$insert_query = PDO::prepare($sql);
			$insert_query -> execute(['variable'=>'LP Top Officer', 'value'=>$top_officer_title]);
			if ($insert_query ->errorCode() == 0) {
				echo "Top Officer Insert Query Sent";
				if ($insert_query->rowCount() !==0 ) {
					echo "Top Officer inserted Successfully";
					return ['status'=>"true", 'message'=>"Top Officer inserted Successfully"];
				}else {
					echo "Top Officer did not insert Successfully";
					return ['status'=>"true", 'message'=>"Top Officer insertion failed"];
				}
			}
			else {
				echo "Top Officer Insert Query did not send";
				$error = $insert_query->errorInfo();
				return ['status'=>"false", 'message'=>"There was an error - " . $error[2] ];
			}

		}
		public function insertDBAdminDetails($email,$password,$creation_stage,$status) {
			$sql = "INSERT INTO all_db_admins(email,password,creation_stage,status) VALUES(:email,:password,:creation_stage,:status)";
			$insert_query = PDO::prepare($sql);
			$insert_query -> execute(['email'=>$email,'password'=>$password,'creation_stage'=>$creation_stage,'status'=>$status]);
			if ($insert_query ->errorCode() == 0) {
				echo "Admin Details Insert Query Sent";
				if ($insert_query->rowCount() !==0 ) {
					echo "Admin Details inserted Successfully";
					return ['status'=>"true", 'message'=>"Admin Details inserted Successfully"];
				}else {
					echo "Admin Details did not insert Successfully";
					return ['status'=>"false", 'message'=>"Admin Details insertion failed"];
				}
			}
			else {
				echo "Admin Details Insert Query did not send";
				$error = $insert_query->errorInfo();
				return ['status'=>"false", 'message'=>"There was an error - " . $error[2] ];
			}

		}
		public function insertOrgName($org) {
			$sql = "INSERT INTO organisation_data(organisation) VALUES(:org)";
			$insert_query = PDO::prepare($sql);
			$insert_query -> execute(['org'=>$org]);
			if ($insert_query ->errorCode() == 0) {
				echo "Org Name Insert Query Sent";
				if ($insert_query->rowCount() !==0 ) {
					echo "Org name inserted Successfully";
					return ['status'=>"true", 'message'=>"Org name inserted Successfully"];
				}else {
					echo "Org name did not insert Successfully";
					return ['status'=>"false", 'message'=>"Org name insertion failed"];
				}
			}
			else {
				echo "Org name Insert Query did not send";
				$error = $insert_query->errorInfo();
				return ['status'=>"false", 'message'=>"There was an error - " . $error[2] ];
			}

		}
		public function getAllDepts () {
			$sql = "SELECT  departments FROM all_departments";
			$check_query = PDO::prepare($sql);
			$check_query->execute([]);
			echo print_r($check_query->errorInfo());
			
			return $record_array = $check_query->fetchAll(PDO::FETCH_ASSOC);
		}
		public function insertDepartment($dept,$head) {
			$sql = "INSERT INTO all_departments(departments,head) VALUES(:dept,:head)";
			$insert_query = PDO::prepare($sql);
			$insert_query -> execute(['dept'=>$dept,'head'=>$head]);
			if ($insert_query ->errorCode() == 0) {
				// echo "Department Insert Query Sent";
				if ($insert_query->rowCount() !==0 ) {
					// echo "Department inserted Successfully";
					return ['status'=>"true", 'message'=>"Department inserted Successfully"];
				}else {
					echo "Department did not insert Successfully";
					return ['status'=>"false", 'message'=>"Department insertion failed"];
				}
			}
			else {
				echo "Department Insert Query did not send";
				$error = $insert_query->errorInfo();
				return ['status'=>"false", 'message'=>"There was an error - " . $error[2] ];
			}

		}
			public function insertJob($job_name,$job_type) {
			$sql = "INSERT INTO all_jobs(job_name,job_type) VALUES(:job_name,:job_type)";
			$insert_query = PDO::prepare($sql);
			$insert_query -> execute(['job_name'=>$job_name,'job_type'=>$job_type]);
			if ($insert_query ->errorCode() == 0) {
				// echo "Job Insert Query Sent";
				if ($insert_query->rowCount() !==0 ) {
					// echo "Job inserted Successfully";
					return ['status'=>"true", 'message'=>"Job inserted Successfully"];
				}else {
					echo "Job did not insert Successfully";
					return ['status'=>"false", 'message'=>"Job insertion failed"];
				}
			}
			else {
				echo "Job Insert Query did not send";
				$error = $insert_query->errorInfo();
				return ['status'=>"false", 'message'=>"There was an error - " . $error[2] ];
			}

		}
	}

?>
