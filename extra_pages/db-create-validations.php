<?php
	// require '../database/my_classes/ServerConnect.php';
	session_start();
	// print_r($_SESSION);
	if (!isset($_SESSION['user'])) {
		exit(header('Location:../index.php'));
	}else {
		require '../database/my_classes/DbConnect.php';
		require '../database/my_classes/CreateQuery.php';
		require '../database/my_classes/InsertQuery.php';
		require '../database/my_classes/UpdateQuery.php';
		require '../database/my_classes/SelectQuery.php';
		$org_name_err = '';
		$top_officer_err = '';
		$dept_name_err = '';
		$dept_head_err = '';
		$job_name_err = '';
		$job_type_err = '';
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
		if (isset($_POST['add-db-name'])) {
			$database_name = convertStringToDBname(sanitizeInputs($_POST['org-name']));
			$org_name = ucwords(sanitizeInputs($_POST['org-name']));
			$org_name_err = check_string_errors($org_name,'This field');
			$top_officer = sanitizeInputs($_POST['top-officer']);
			$top_officer_err = check_string_errors($top_officer,'This field');
			$all_errors = [$org_name_err,$top_officer_err];
			$any_error = check_all_errors($all_errors);
			if (!$any_error) {
				$select_from_db = new SelectQuery('less_paper_orgs');
				$org_exists = $select_from_db->check_existing_orgs($org_name);
				if ($org_exists) {
					$duplicate_entry_error = true;
					$org_name_err = 'This Organisation is already registered';
				}
				else if (!$org_exists) {
					$email = $_SESSION['user'];
					$duplicate_entry_error = false;
					//Creating Database...
					$db_create_ops = new CreateQuery;
					$db_create_ops->createDatabase($database_name);
					//Needed to connect to the just created Database...
					$db_create_ops->connectToDatabase($database_name);
					//Created a Table to store values in the database...
					$db_create_ops->createVariableStorage();
					//Inserting Organisation name into Less Paper Database...
					$db_insert_ops = new InsertQuery('less_paper_orgs');
					$db_insert_ops->insertOrgName($org_name);
					//Connecting to organisation database...
					$db_insert_ops->connectToDatabase($database_name);
					//Inserting Title of Top Officer into the Database Variable storage...
					$db_insert_ops->insertTopOfficer($top_officer);
					//Updating organisation value for database admin and Less Paper Organisation data...
					$db_update_ops = new UpdateQuery('less_paper_orgs');
					$db_update_ops->updateDbAdminOrg($org_name,$email);
					$db_update_ops->updateDbCreationStage('dept-check',$email);
					header('Location:../redirecter.php');
				}
				
			}
		
		}else {
			$org_name = '';
			$database_name = '';
			$top_officer = '';
		}
		//This means the organisation is divided into Departments
 		if (isset($_POST['yes-dept'])) {
			$email = $_SESSION['user'];
			$select_from_db = new SelectQuery('less_paper_orgs');
			$org_name = $select_from_db->getOrgName($email)['office'];
			$database_name = convertStringToDBname($org_name);
			//Creating the Organisation schema without departments...
			$db_create_ops = new CreateQuery($database_name);
			$db_create_ops->createDepartmentsTable();
			$db_create_ops->createJobsTable();

			$db_update_ops = new UpdateQuery('less_paper_orgs');
			$db_update_ops->updateDbCreationStage('add-depts',$email);
			header('Location:../redirecter.php');
		}
		//This means the organisation is not divided into Departments
		if (isset($_POST['no-dept'])) {
			$email = $_SESSION['user'];
			//Get the Organisation name and Database...
			$select_from_db = new SelectQuery('less_paper_orgs');
			$org_name = $select_from_db->getOrgName($email)['office'];
			$database_name = convertStringToDBname($org_name);
			//Creating the Organisation schema without departments...
			$db_create_ops = new CreateQuery($database_name);
			$db_create_ops->createJobsTable();
			// Updating the Creation stage or user's progress in the app...
			$db_update_ops = new UpdateQuery('less_paper_orgs');
			$db_update_ops->updateDbCreationStage('add-jobs',$email);
			header('Location:../redirecter.php');
		}
		if (isset($_POST['add-new-dept'])) {
			$email = $_SESSION['user'];
			$select_from_db = new SelectQuery('less_paper_orgs');

			$dept_name = ucwords(sanitizeInputs($_POST['dept-name']));
			$dept_head = ucwords(sanitizeInputs($_POST['dept-head']));
			$dept_name_err = check_string_errors($dept_name,'This Field');
			$dept_head_err = check_string_errors($dept_head,'This Field');
			$all_errors = [$dept_name_err,$dept_head_err];
			$any_error = check_all_errors($all_errors);
			if (!$any_error) {
				
				$org_name = $select_from_db->getOrgName($email)['office'];
				$database_name = convertStringToDBname($org_name);
				$select_from_db->connectToDatabase($database_name);
				$dept_exists = $select_from_db->check_if_dept_exists($dept_name);
				if ($dept_exists) {
					$dept_name_err = "This department is already in your database";
				}else {
					$db_insert_ops = new InsertQuery($database_name);
					$db_insert_ops->insertDepartment($dept_name,$dept_head);
					// header('Location:add-dept.php');
				}
					
				// echo "No errors";
			}
		}else {
			$dept_name = '';
			$dept_head = '';
		}
		if (isset($_POST['confirm-depts'])) {
			$email = $_SESSION['user'];
			$db_update_ops = new UpdateQuery('less_paper_orgs');
			$db_update_ops->updateDbCreationStage('add-jobs',$email);
			header('Location:../redirecter.php');
		}
		if (isset($_POST['add-job'])) {
			$email = $_SESSION['user'];
			$select_from_db = new SelectQuery('less_paper_orgs');
			$job_name = ucwords(sanitizeInputs($_POST['job-name']));
			if (isset($_POST['job-type'])) {
				$job_type = ucwords(sanitizeInputs($_POST['job-type']));
			}else {
				$job_type = '';
			}
			$job_name_err = check_string_errors($job_name,'This Field');
			$job_type_err = check_string_errors($job_type,'This Field');
			$all_errors = [$job_name_err,$job_type_err];
			$any_error = check_all_errors($all_errors);
			if (!$any_error) {
				$org_name = $select_from_db->getOrgName($email)['office'];
				$database_name = convertStringToDBname($org_name);
				
				$select_from_db->connectToDatabase($database_name);
				$job_exists = $select_from_db->check_if_job_exists($job_name);
				if ($job_exists) {
					$job_name_err = "This Job has already been registered";
				}else {
					$db_insert_ops = new InsertQuery($database_name);
					$db_insert_ops->insertJob($job_name,$job_type);
				}
			}
		}else {
			$job_name = '';
		}
		if (isset($_POST['confirm-jobs'])) {
			echo "Jobs confirmed";
			$email = $_SESSION['user'];
			$db_update_ops = new UpdateQuery('less_paper_orgs');
			$db_update_ops->updateDbCreationStage('creation-complete',$email);
			header('Location:../redirecter.php');
		}
	}
	
?>