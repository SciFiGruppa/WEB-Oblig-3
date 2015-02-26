<?php
	if (isset($_POST['cc'])) {
		require_once '../class/studentsByClass.php';
		require_once '../php/connect.php';
		require_once '../php/constants.php';

		$input = filter_var($_POST['cc'], FILTER_SANITIZE_STRING);//$_POST['cc'];
		$db = new DatabaseConnector();
		$students = new studentsByClass($input, $db->getDBLink());

		echo json_encode($students->result);
	}