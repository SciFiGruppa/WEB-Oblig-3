<?php
	if (isset($_POST['cc'])) {
		require_once '../class/studentsByClass.php';
		require_once '../connect.php';

		$input = filter_var($_POST['cc'], FILTER_SANITIZE_STRING);//$_POST['cc'];

		$students = new studentsByClass($input, $db);

		echo json_encode(array ('result' => $students->result, 'input' => $input) );
	} else {
		echo json_encode(array ('result' => 'not enough params', 'input' => $_POST) );
	}