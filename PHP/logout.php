<?php
	include_once '../config/config.php';
	include_once './config.php';
	session_start();
	$rows = $db->update('register',['is_loggedin' => 0],['id' => $_SESSION['user_id']])->affectedRows();
	unset($_SESSION['is_loggedin']);
	unset($_SESSION['user_name']);
	header("location:".SERVER_NAME."/".FOLDER_NAME."/PHP/login.php");

	exit();
?>