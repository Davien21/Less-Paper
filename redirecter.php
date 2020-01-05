<?php
	session_start();
	require './database/my_classes/DbConnect.php';
	require './database/my_classes/SelectQuery.php';
	echo "Redirection page<br>";
	print_r($_SESSION);
	$email = $_SESSION['user'];
	$select_from_db = new SelectQuery('less_paper_orgs');
	$creation_stage = $select_from_db->check_creation_stage ($email)['creation_stage'];
	// echo "<br>".$creation_stage;
	if ($creation_stage === 'subscribed') {
		header('Location:extra_pages/database-creation.php');
	}else if ($creation_stage === 'dept-check') {
		header('Location:extra_pages/dept-check.php');
	}else if ($creation_stage === 'add-depts') {
		header('Location:extra_pages/add-dept.php');
	}else if ($creation_stage === 'add-jobs') {
		header('Location:extra_pages/add-job.php');
	}else if ($creation_stage === 'creation-complete') {
		header('Location:extra_pages/company-dashboard.php');
	}
?>