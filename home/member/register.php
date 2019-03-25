<?php
include "config.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Chat System in PHP</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<style type="text/css">
		hr{
			height: 2px;
		}
	</style>
</head>
<body style="background-color: #F0EEEE">
	<div class="container">
		<div class="row">
			<h3  align="center"><font color="#E32F75">Chat System in PHP</font></h3>
				<hr color="#E32F75">
				<div class="col-sm-4"></div>
				<div class="col-sm-4">
					<div class="panel panel-success">
						<div class="panel-heading" align="center">
							Registration Form
						</div>
						<div class="panel-body">
							<form method="POST" action="register.php">
								<label>User name</label>
								<input type="text" name="username" placeholder="User Name" class="form-control">
								<label>Email</label>
								<input type="text" name="email" placeholder="User Email" class="form-control">
							
								<label>Password</label>
								<input type="password" name="password" placeholder="Password" class="form-control">
						</div>
						<div class="panel-footer">
							<button type="submit" class="btn btn-success" name="Submit"><span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;Register </button>
							<button type="reset" class="btn btn-danger" style="float: right;"> <span class="glyphicon glyphicon-refresh"></span>&nbsp;&nbsp;Reset</button>
						</div>
						<div class="panel-footer">
							<div align="center">
								Already Registered ? <a href="login.php"><font color="green"><b>Login Here</b></font></a>
							</div>
						</div>
					  </form>
					</div>
				</div>
				<div class="col-sm-4"></div>
		</div>
	</div>

</body>
</html>

<?php

if (isset($_POST['Submit'])) {
	$name = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	$query = "INSERT INTO users SET username='$name', email='$email', password='$password', isActive='0' ";
	$run = mysqli_query($conn, $query);
	if ($run) {
		header('location: login.php');
	}
	else{
		echo "Error Occured";
	}
}