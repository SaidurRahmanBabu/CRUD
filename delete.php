<?php
	require_once('config.php');

	$id = $_GET['id'];
	$sql = "DELETE FROM employee WHERE id = $id";

	if($conn->query($sql)){
		$_SESSION['deleted'] = "Data deleted successfully";
		header("Location: index.php");
	}