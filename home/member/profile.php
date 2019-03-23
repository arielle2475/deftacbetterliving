<?php
include "config.php";
$id = $_GET['id'];

$query = "SELECT * from users WHERE  id = '$id' ";
$run = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($run, MYSQLI_BOTH)) {
	$name = $row['username'];
	$email = $row['email'];
}
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
							<?php echo "Profile of ". $name ?>
						</div>
						<div class="panel-body">
								<label>User name</label>
								<input type="text" name="username" value="<?php echo $name ?>" class="form-control" readonly>
								<label>Email</label>
								<input type="text" name="email" value="<?php echo $email ?>" class="form-control" readonly>
								<div class="panel-footer" align="center">
									<a href="index.php"><button class="btn btn-success btn-sm">Go Back</button></a>
								</div>
								
						</div>
						
					</div>
				</div>
				<div class="col-sm-4"></div>
		</div>
	</div>

</body>
</html>
