<?php
	require '../database/my_classes/DbConnect.php';
	require '../database/my_classes/CreateQuery.php';
	require '../database/my_classes/InsertQuery.php';
	require '../database/my_classes/UpdateQuery.php';
	require '../database/my_classes/SelectQuery.php';
	$dbSelectOps = new selectQuery;
	$dbSelectOps->connectToDatabase('oluaka_institute');
	$progress =  $dbSelectOps->getDbCreationProgress()['stage'];
	echo ($progress);
	// if (!headers_sent()) {
	// 	echo "No header";
	// }
	// if (isset($_POST['progress'])) {
		// echo "<br>";
		// print_r(get_headers('http://localhost/lessPaper/extra_pages/test4AJAX.php'));
		// $stage = $_POST['progress'];
		// $dbUpdateOps = new UpdateQuery;
		// $dbUpdateOps-> logDBCreationStage($_POST['progress']);

	// }


?>