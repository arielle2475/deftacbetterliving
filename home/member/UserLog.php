<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript">
		
	</script>
</head>
<body>

</body>
</html>
<?php
session_start();
$name = $_SESSION['username'];

	$con = mysqli_connect("localhost", "root", "", "thesis");

	
	$query="SELECT*
	FROM users
	INNER JOIN admins ON users.id = admins.id WHERE users.isActive = '1' and admins.isActive = '1' ";
	$run = mysqli_query($con, $query);
	if (!$run) {
		printf("Error: %s\n", mysqli_error($con));
		exit();
	}
	
	while ($row = mysqli_fetch_array($run, MYSQLI_BOTH)) {

		if ($name == $row['username']) {
			echo "<a href='profile.php?id=$row[id]' title='View Profile of $row[username]' style='text-decoration:none'><p style='background-color:#B7CCFA; padding-left:5px; font-weight:bold; border-radius:10px; height:24px; line-height:24px; color:#fff'>".strtoupper($row['username'])."&nbsp;&nbsp; &#10024;</a>&nbsp&nbsp&nbsp <a href='logout.php' class='btn btn-danger btn-sm ' style='float:right' id='link'>Logout</a></p>";
		}

		else{
			echo "<a href='profile.php?id=$row[id]' title='View Profile of $row[username]' style='text-decoration:none'><p style='background-color:#F74F4F; padding-left:5px; font-weight:bold; border-radius:10px; height:24px; line-height:24px; color:#fff'>".strtoupper($row['username'])."&nbsp&nbsp&nbsp </p></a>";
		}
		
		
	}




?>