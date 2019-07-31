<?php
	session_start();
	$host = "localhost";
	$user = "root";
	$pass = "";
	$dbname = "learnphp";

	$conn = new mysqli($host, $user, $pass, $dbname);

	if(!$conn){
		die("Database Connection failed" . $conn->connect_error);
	}
