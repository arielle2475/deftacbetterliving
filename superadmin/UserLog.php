<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript">
		
	</script>
		<?php include "includes/header.php"; ?>

</head>
<body>

</body>
</html>
<?php
session_start();
$name = $_SESSION['adminname'];

	$con = mysqli_connect("localhost", "root", "", "thesis");
	echo "<h1>Admins</h1>";

	$query = "SELECT * FROM admins WHERE isActive = '1' ";
	$run = mysqli_query($con, $query);
	while ($row = mysqli_fetch_array($run, MYSQLI_BOTH)) {

		if ($name == $row['adminname']) {
			echo "<form style='padding-bottom: 10px;'>
						<div class='border rounded border-light shadow d-flex flex-grow-1 flex-shrink-1 flex-fill justify-content-center align-items-xl-center' style='padding-top: 12px;padding-bottom: 16px;padding-left: 19px;padding-right: 12px;'>
							<div class='form-row' style='margin-left: 0px;margin-right: 0px;'>
								<div class=' text-center' style='width: 100px;'>
								<img class='rounded-circle ' src='".$row['adminavatar']."' width='50px' height='50px' style='margin-right: 5px;margin-bottom: 0px;margin-left: -8px;padding-right: 0px;'></div>
								<div class= style='padding-right: 200px;padding-left: 0px;width: 220px;'>
								<h1 style='font-size: 16px;width: 150px;margin-top: 8px;margin-left: 11px;'>".strtoupper($row['adminname'])."&#10024;</h1>

								</div>
						</div>
				</div>
				</form>";
		}

		else{
			echo "<form style='padding-bottom: 10px;'>
						<div class='border rounded border-light shadow d-flex flex-grow-1 flex-shrink-1 flex-fill justify-content-center align-items-xl-center' style='padding-top: 12px;padding-bottom: 16px;padding-left: 19px;padding-right: 12px;'>
							<div class='form-row' style='margin-left: 0px;margin-right: 0px;'>
								<div class='text-center' style='width: 100px;'><img class='rounded-circle' src='".$row['adminavatar']."' width='50px' height='50px' style='margin-right: 5px;margin-bottom: 0px;margin-left: -8px;padding-right: 0px;'></div>
								<div class= style='padding-right: 200px;padding-left: 0px;width: 220px;'>
								<h1 style='font-size: 16px;width: 150px;margin-top: 8px;margin-left: 11px;'>".strtoupper($row['adminname'])."</h1>
							</div>
						</div>
				</div>
				</form>";
		}
		echo"</div>";

		
	}
	echo "<h1>Users</h1>";
	echo"<div style='overflow:scroll; height:400px;'>";

	$query = "SELECT * FROM users WHERE isActive = '1' ";
	$run = mysqli_query($con, $query);
	while ($row = mysqli_fetch_array($run, MYSQLI_BOTH)) {

		if ($name == $row['username']) {
			echo "<form style='padding-bottom: 10px;'>
						<div class='border rounded border-light shadow d-flex flex-grow-1 flex-shrink-1 flex-fill justify-content-center align-items-xl-center' style='padding-top: 12px;padding-bottom: 16px;padding-left: 19px;padding-right: 12px;'>
							<div class='form-row' style='margin-left: 0px;margin-right: 0px;'>
								<div class='text-center' style='width: 100px;'><img class='rounded-circle' src='../signin/".$row['avatar']."' width='50px' height='50px' style='margin-right: 5px;margin-bottom: 0px;margin-left: -8px;padding-right: 0px;'></div>
								<div class= style='padding-right: 200px;padding-left: 0px;width: 220px;'>
									<h1 style='font-size: 16px;width: 150px;margin-top: 8px;margin-left: 11px;'>".strtoupper($row['username'])."</h1>

									</div>
						</div>
				</div>
				</form>";
		}

		else{
			echo "<form style='padding-bottom: 10px;'>
						<div class='border rounded border-light shadow d-flex flex-grow-1 flex-shrink-1 flex-fill justify-content-center align-items-xl-center' style='padding-top: 12px;padding-bottom: 16px;padding-left: 19px;padding-right: 12px;'>
							<div class='form-row' style='margin-left: 0px;margin-right: 0px;'>
								<div class='text-center' style='width: 100px;'><img class='rounded-circle' src='../signin/".$row['avatar']."' width='50px' height='50px' style='margin-right: 5px;margin-bottom: 0px;margin-left: -8px;padding-right: 0px;'></div>
								<div class= style='padding-right: 200px;padding-left: 0px;width: 220px;'>
									<h1 style='font-size: 16px;width: 150px;margin-top: 8px;'>".strtoupper($row['username'])."</h1>

									</div>
						</div>
				</div>
				</form>";}
		
		
	}


	echo"</div>";


?>