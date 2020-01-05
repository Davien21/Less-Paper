<?php
	
	require '../../database/my_classes/DbConnect.php';
	// // require '../../database/my_classes/CreateQuery.php';
	// // require '../../database/my_classes/InsertQuery.php';
	require '../../database/my_classes/UpdateQuery.php';
	require '../../database/my_classes/DeleteQuery.php';
	require '../../database/my_classes/SelectQuery.php';
	function sanitizeInputs($value) {
		$value = trim($value);
		$value = filter_var($value, FILTER_SANITIZE_STRING);
		return $value;
	}
	function sanitizePasswords($value) {
		$value = htmlspecialchars($value);
		return $value;
	}
	function convertStringToDBname ($string) {
		$var_as_array = str_split($string);
		$string = '';
		for ($i = 0;$i<count($var_as_array);++$i) {
			if ($var_as_array[$i] === ' ') {
				$var_as_array[$i] = '_';
			}
			$string .= $var_as_array[$i];
		}
		return strtolower($string);
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
	function check_string_errors ($variable,$label) {
		if(check_if_empty($variable,$label)['status']) {
			return check_if_empty($variable,$label)['error'];
		}
		else if(check_string_length ($variable,$label)['status']) {
			return check_string_length ($variable,$label)['error'];
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
	function getTableSchema($array,$item) {
		if (empty($array)) {
			echo "You haven't added any ".$item." yet";
		}else {
			$newArray = [];
			foreach ($array as $key => $value) {
				// print_r($array[$key]);
				array_push($newArray,$array[$key]);

			}
			echo json_encode($newArray);
		}
	}
	// session_start();

	// $email = $_SESSION['user'];

	// $select_from_db = new SelectQuery('less_paper_orgs');

	// $org_name = $select_from_db->getOrgName($email)['office'];

	// $database_name = convertStringToDBname($org_name);

	// $select_from_db->connectToDatabase($database_name);

	// $existing_jobs = $select_from_db->getAllJobsTable();
	// getTableSchema($existing_jobs,'Jobs');
	if ($_SERVER["REQUEST_METHOD"] === 'POST') {
		session_start();
		$email = $_SESSION['user'];
		if (isset($_POST['request'])) {
			$request = sanitizeInputs($_POST['request']);
			$select_from_db = new SelectQuery('less_paper_orgs');
			$org_name = $select_from_db->getOrgName($email)['office'];
			$database_name = convertStringToDBname($org_name);
			$select_from_db->connectToDatabase($database_name);
			if ($request === 'dept_data') {
				$existing_depts = $select_from_db->getAllDeptTable();
				getTableSchema($existing_depts,'Department','departments');
			}
			if ($request === 'edit_dept') {
				// print_r($_POST);
				$newDeptName = sanitizeInputs($_POST['dept']);
				$id = sanitizeInputs($_POST['id']);
				$db_updateOps = new UpdateQuery($database_name);
				$db_updateOps->updateDeptName($newDeptName,$id);
			}
			if ($request === 'edit_HOD') {
				// print_r($_POST);
				$newHeadName = sanitizeInputs($_POST['head']);
				$id = sanitizeInputs($_POST['id']);
				$db_updateOps = new UpdateQuery($database_name);
				$db_updateOps->updateDeptHead($newHeadName,$id);
			}
			if ($request === 'delete_dept') {
				// print_r($_POST);
				$id = sanitizeInputs($_POST['id']);
				$db_deleteOps = new DeleteQuery($database_name);
				$db_deleteOps->deleteDept($id);
			}
			if ($request === 'job_types_data') {
				$existing_jobs = $select_from_db->getAllJobsTable();
				getTableSchema($existing_jobs,'Jobs');
			}
			if ($request === 'edit_job_name') {
				// print_r($_POST);
				$newJobName = sanitizeInputs($_POST['job_name']);
				$id = sanitizeInputs($_POST['id']);
				$db_updateOps = new UpdateQuery($database_name);
				$db_updateOps->updateJobName($newJobName,$id);
			}
			if ($request === 'edit_job_type') {
				// print_r($_POST);
				$newJobType = sanitizeInputs($_POST['job_type']);
				$id = sanitizeInputs($_POST['id']);
				$db_updateOps = new UpdateQuery($database_name);
				print_r($db_updateOps->updateJobType($newJobType,$id));
			}
			if ($request === 'delete_jobs') {
				// print_r($_POST);
				$id = sanitizeInputs($_POST['id']);
				$db_deleteOps = new DeleteQuery($database_name);
				$db_deleteOps->deleteJob($id);
			}
		}
	}
	

?>