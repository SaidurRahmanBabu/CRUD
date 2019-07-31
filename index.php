<?php require_once('config.php'); ?>

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
					<h2>Insert Your Information</h2>
				</div>
				<div class="show-confirmation">


						<?php
							if(isset($_SESSION['deleted'])){ ?>
								<h3 class="text-center border alert-warning"><?php
								echo $_SESSION['deleted']; ?></h3>
								<?php 
							}
							unset($_SESSION['deleted']);
						?>


						<?php
							if(isset($_SESSION['empty_alert'])){ ?>
								<h3 class="text-center border alert-warning"><?php
								echo $_SESSION['empty_alert']; ?></h3>
								<?php 
							}
							unset($_SESSION['empty_alert']);
						?>


						<?php
							if(isset($_SESSION['success'])){ ?>
								<h3 class="text-center border alert-success"><?php
								echo $_SESSION['success']; ?></h3>
								<?php 
							}
							unset($_SESSION['success']);
						?>


						<?php
							if(isset($_SESSION['failed'])){ ?>
								<h3 class="text-center border alert-danger"><?php
								echo $_SESSION['failed']; ?></h3>
								<?php 
							}
							unset($_SESSION['failed']);
						?>
				</div>
				<div class="insertform">

					<!-- form=starts -->
					<form action="create.php" method="post">

					  <div class="form-group">
					    <label for="name">Name</label>
					    <input type="text" name="name" class="form-control" id="name">
					  </div>

					  <div class="form-group">
					    <label for="email">Email</label>
					    <input type="email" name="email" class="form-control" id="email">
					  </div>

					  <div class="form-group">
					    <label for="pwd">Password</label>
					    <input type="password" name="password" class="form-control" id="pwd">
					  </div>

					  <button type="submit" name="submit" class="btn btn-success">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<section class="get-data" style="margin-top:90px">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<h2>Employee Data</h2>
					<div class="data-table">
						<table class="table table-striped table-dark text-left">
						  <thead>
						    <tr>
						      <th scope="col">Serial</th>
						      <th scope="col">Name</th>
						      <th scope="col">Email</th>
						      <th scope="col">Password</th>
						      <th scope="col">Action</th>
						    </tr>
						  </thead>
						  <tbody>

						  	<?php
						  		$sql = "SELECT * FROM employee";
						  		$result = $conn->query($sql);
						  		if($result->num_rows > 0){
						  			while($row = $result->fetch_assoc()){
						  	?>

						    <tr>
						      <th scope="row"><?php echo $row['id']; ?></th>
						      <td><?php echo $row['name']; ?></td>
						      <td><?php echo $row['email']; ?></td>
						      <td><?php echo $row['password']; ?></td>
						      <td>
						      	<a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-light">Edit</a>
						      	<a onclick="var del=confirm('Are you sure?');if(!del){return false;}" href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-light">Delete</a>
						      </td>
						    </tr>

						  <?php 
									}
								}

						  ?>
						    
						  </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>


<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>