<?php
	require_once('config.php');

	if(isset($_POST['submit'])){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		if(!empty($name) && !empty($email) && !empty($password)){
			$query = "INSERT INTO employee(name, email, password) VALUES('$name', '$email', '$password')";
		}
		else {
			$_SESSION['empty_alert'] = "All field must not be empty!";
			header("Location: index.php");
		}

		if($conn->query($query)){
			$_SESSION['success'] = "Data inserted successfully!";
			header("Location: index.php");
		}
		else{
			$_SESSION['failed'] = "Data insert failed!" . $conn->error;
			header("Location: index.php");
		}
	}
