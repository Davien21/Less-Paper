<?php
	// echo 'insert Query connected';
	class insertQuery extends DB_Connect
	{
		public function check_if_email_exists ($email) {
			$sql = "SELECT 1 FROM odp_3_interns WHERE email = :email";
			$check_query = PDO::prepare($sql);
			$check_query->execute([':email'=>$email]);
			return $check_query->fetchColumn(); 
		}
		public function insertODPIntern ($firstname,$lastname,$birthday,$age,$gender,$phone_no,$email,$parent_no,$occupation,$address,$password) {
				$sql = "INSERT INTO odp_3_interns(firstname,lastname,birthday,age,gender,phone_no,email,parent_no,occupation,home_address,password) 
						VALUES(:firstname,:lastname,:birthday,:age,:gender,:phone_no,:email,:parent_no,:occupation,:address,:password)";
				$insert_query = PDO::prepare($sql);
				$insert_query -> execute([
											'firstname'=>$firstname,'lastname'=>$lastname,'birthday'=>$birthday,
											'age'=>$age,'gender'=>$gender,'phone_no'=>$phone_no,
											'email'=>$email,'parent_no'=>$parent_no,'occupation'=>$occupation,
											'address'=>$address,'password'=>$password
										]);
				if ($insert_query ->errorCode() == 0) {
					echo "Data inserted Successfully";
					return ['status'=>"true", 'message'=>"Data Inserted Successfully"];
				}
				else {
					echo "Data did not insert Successfully!";
					$error = $insert_query->errorInfo();
					return ['status'=>"false", 'message'=>"There was an error - " . $error[2] ];
				}
		}

		// public function 
	}

?>
<!-- 08034149516 -->