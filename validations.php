<?php
	session_start();
	require './database/my_classes/DbConnect.php';
	require './database/my_classes/InsertQuery.php';
	require './database/my_classes/SelectQuery.php';
	$emailerr = '';
	$pass_err = '';
	function sanitizeInputs($value) {
		$value = trim($value);
		$value = filter_var($value, FILTER_SANITIZE_STRING);
		return $value;
	}
	function sanitizePasswords($value) {
		$value = htmlspecialchars($value);
		return $value;
	}
	function check_if_empty ($variable,$label) {
		if(empty($variable)) {
			$error_status = true;
			return ['status'=>$error_status,'error'=>$label. " is required"];
		}
	}
	function check_string_length ($variable,$label) {
		if (strlen($variable) < 4) {
			$error_status = true;
			return ['status'=>$error_status,'error'=>$label. " is too short"];
		}
	}
	function check_if_string_contains_number ($variable,$label) {
		$var_as_array = str_split($variable);
		for ($i = 0;$i<count($var_as_array);++$i) {
			if (is_numeric($var_as_array[$i])) {
				$error_status = true;
				return ['status'=>$error_status,'error'=>"Numbers are not allowed"];
				break;
			}
		}
	}
	function check_email ($variable,$label) {
		if (check_if_empty($variable,$label)['status']) {
			return check_if_empty($variable,$label)['error'];
		}else if(!filter_var($variable, FILTER_VALIDATE_EMAIL)) {
			return $result = ('Invalid '.$label.' address');
		}
	}
	function check_all_errors ($array_of_errors) {
		$any_errors;
		foreach ($array_of_errors as $key => $value) {
			if (!empty($value)) {
				$any_errors = true;
				break;
			}else if(empty($value)) {
				$any_errors = false;
			}
		}
		return $any_errors;
	}
	function check_passwords ($pass_1,$pass_2,$label) {
		if(empty($pass_1) or empty($pass_2)) {
			$result = ['status'=>true, 'error'=>('Please Fill in both passwords')];
			return $result['error'];
		}else if ($pass_1 !== $pass_2) {
			return 'Passwords do not match!';
		}else if (check_string_length($pass_2, $label)['status']) {
			return 'Password is too short'; 
		}
		else if (!check_if_string_contains_number($pass_2,$label)['status']) {
			return $result =  $label. " must have at least one number!";
		}
	}
	if(isset($_POST['login-btn'])) {
		$email = sanitizeInputs($_POST['email']);
		$pass = sanitizePasswords($_POST['pass']);
		$emailerr = check_email($email, 'Email');
		if (empty($emailerr)) {
			$select_from_db = new SelectQuery('less_paper_orgs');
			$email_exists = $select_from_db->check_if_email_exists ($email,$table = 'all_db_admins');
			if ($email_exists) {
				$password_matches = $select_from_db->check_if_passwords_match($email,$pass,$table='all_db_admins');
				if ($password_matches) {
					$creation_stage = ($select_from_db->check_creation_stage($email))['creation_stage'];
					// $creation_stage = 'add-depts';
					// $creation_stage = 'add-jobs';
					$_SESSION['user'] = $email;
					$_SESSION['stage'] = $creation_stage;
					header('Location:redirecter.php');
				}else {
					$pass_err = "Wrong Password";
				}		
			}else {
				$emailerr = 'This email is not registered with Less Paper';
				// $hashed_pass = password_hash($confirm_pass, PASSWORD_DEFAULT);
			}
		}
	}else {
		$email = '';
	}
?>