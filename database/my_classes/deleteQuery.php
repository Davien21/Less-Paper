<?php
	// echo "delete linked!";

	class deleteQuery extends DB_Connect
	{

		public function check_if_email_exists ($email) {
			$sql = "SELECT 1 FROM odp_3_interns WHERE email = :email";
			$check_query = PDO::prepare($sql);
			$check_query->execute([':email'=>$email]);
			return $check_query->fetchColumn(); 
		}
		public function deleteODPIntern ($email) {
				echo '<br>delete was called!<br>';
				$sql = "DELETE FROM odp_3_interns WHERE email = :email";
				$delete_query = PDO::prepare($sql);
				$delete_query -> execute(['email'=>$email]);
				if ($delete_query ->errorCode() == 0) {
					if ($delete_query->rowCount() === 0) {
						echo "<br>There is no such record in our database!<br>";
						return ['status'=>"false", 'message'=>"<br>This record does not exist!<br>"];
					}else {
						echo "Deleted from DB Successfully";
						return ['status'=>"true", 'message'=>"Record Deleted Successfully<br>"];
					}
					
				}
				else {
					echo "Data did not delete Successfully!<br>";
					$error = $delete_query->errorInfo();
					echo $error[2];
					return ['status'=>"false", 'message'=>"There was an error - " . $error[2]];

				}
		}

	}
	
?>