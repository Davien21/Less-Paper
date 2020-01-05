<?php
	echo "Log out page";
	session_start();
	unset($_SESSION['user']);
	header('Location:../index.php');
?>