<?php
	require_once('config.php');

	$id = $_GET['id'];

	$sql = "SELECT * FROM employee WHERE id = $id";

	$result = $conn->query($sql);

	if($result ->num_rows > 0){
		$rows = $result->fetch_assoc();
	}

	if(isset($_POST['submit'])){

	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];

		$sql = "UPDATE employee
		set name = '$name',
		email = '$email',
		password = '$password'
		 WHERE id = $id"; 

		if($conn->query($sql)){
			$_SESSION['success'] = "Update Successful";
			header("Location: index.php");
		}
	}

	?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Learn PHP</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="text-center text-uppercase">Learn php</h1>
			</div>
		</div>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-2">
				<div class="form-title text-center text-uppercase">
					<h2>Edit Your Information</h2>
				</div>
				<div class="insertform">

					<!-- form=starts -->
					<form action="" method="post">

					  <div class="form-group">
					    <label for="name">Name</label>
					    <input type="text" name="name" class="form-control" id="name" value="<?php echo $rows['name'] ?>">
					  </div>

					  <div class="form-group">
					    <label for="email">Email</label>
					    <input type="email" name="email" class="form-control" id="email" value="<?php echo $rows['email'] ?>">
					  </div>

					  <div class="form-group">
					    <label for="pwd">Password</label>
					    <input type="password" name="password" class="form-control" id="pwd" value="<?php echo $rows['password'] ?>">
					  </div>

					  <button type="submit" name="submit" class="btn btn-success">Update</button>
					</form>
				</div>
			</div>
		</div>
	</div>


<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>