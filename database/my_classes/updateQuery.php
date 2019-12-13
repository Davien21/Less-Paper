<?php
	// echo "update linked!";
	class updateQuery extends DB_Connect
	{
		public function check_if_email_exists ($email) {
			$sql = "SELECT 1 FROM odp_3_interns WHERE email = :email";
			$check_query = PDO::prepare($sql);
			$check_query->execute([':email'=>$email]);
			return $check_query->fetchColumn(); 
		}
		public function updateDetailsNoPass ($id,$firstname,$lastname,$birthday,$age,$gender,$phone_no,$email,$parent_no,$occupation,$address) {
				$sql = "
					UPDATE odp_3_interns 
					SET firstname =:firstname, lastname=:lastname, birthday=:birthday, age=:age, gender=:gender,
						phone_no=:phone_no, email=:email, parent_no=:parent_no, occupation=:occupation,
						home_address=:address
					WHERE id = :id
				";
				$update_query = PDO::prepare($sql);
				$update_query -> 
					execute([	'id' => $id,
								'firstname'=>$firstname,'lastname'=>$lastname,'birthday'=>$birthday,'age'=>$age,
								'gender'=>$gender,'phone_no'=>$phone_no,'email'=>$email,'parent_no'=>$parent_no,
								'occupation'=>$occupation,'address'=>$address
					]);
				if ($update_query ->errorCode() == 0) {
					echo "Updated from DB Successfully";
					return ['status'=>"true", 'message'=>"Record updated Successfully"];
				}
				else {
					$error = $update_query->errorInfo();
					echo "Data did not update Successfully!";
					return ['status'=>"false", 'message'=>"There was an error - " . $error[2] ];
				}
		}
		public function updateDetailsWithPass ($id,$firstname,$lastname,$birthday,$age,$gender,$phone_no,$email,$parent_no,$occupation,$address,$password) {
				$sql = "
					UPDATE odp_3_interns 
					SET firstname =:firstname, lastname=:lastname, birthday=:birthday, age=:age, gender=:gender,
						phone_no=:phone_no, email=:email, parent_no=:parent_no, occupation=:occupation,
						home_address=:address,password=:password
					WHERE id = :id
				";
				$update_query = PDO::prepare($sql);
				$update_query -> 
					execute([	'id' => $id,
								'firstname'=>$firstname,'lastname'=>$lastname,'birthday'=>$birthday,'age'=>$age,
								'gender'=>$gender,'phone_no'=>$phone_no,'email'=>$email,'parent_no'=>$parent_no,
								'occupation'=>$occupation,'address'=>$address,'password'=>$password
					]);
				if ($update_query ->errorCode() == 0) {
					echo "Updated from DB Successfully";
					return ['status'=>"true", 'message'=>"Record Updated Successfully"];
				}
				else {
					$error = $update_query->errorInfo();
					echo "Data did not update Successfully!";
					return ['status'=>"false", 'message'=>"There was an error - " . $error[2] ];
				}
		}
		public function updateMasterAdminPass($password) {
			$sql = "
					UPDATE master_admin
					SET password = :password
				";
				$update_query = PDO::prepare($sql);
				$update_query -> 
					execute([	
								'password'=>$password
					]);
				if ($update_query ->errorCode() == 0) {
					echo "Updated Database Successfully";
					return ['status'=>"true", 'message'=>"Record updated Successfully"];
				}
				else {
					$error = $update_query->errorInfo();
					echo "Data did not update Successfully!";
					return ['status'=>"false", 'message'=>"There was an error - " . $error[2] ];
				}
		}
	}

?>