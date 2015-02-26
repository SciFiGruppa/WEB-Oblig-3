<?php
	if (isset($_POST['cc'])) {
		require_once 'StudentsByClass.php';
		require_once("constants.php");
		require_once 'connect.php';

		$input = filter_var($_POST['cc'], FILTER_SANITIZE_STRING);//$_POST['cc'];
		$db = new DatabaseConnector();
		$students = new StudentsByClass($input, $db->getDBLink());

		header('Content-Type: application/json');
		echo json_encode($students->result);
	} else {
		header('Content-Type: application/json');
		echo json_encode(array('ingen studenter'));
	}