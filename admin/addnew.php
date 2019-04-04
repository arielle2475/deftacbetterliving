<?php
	include('conn.php');
	
	$announcement=$_POST['announcement'];
	$details=$_POST['details'];
	
	mysqli_query($conn,"insert into announcement (announcement, details) values ('$announcement', '$details')");
	header('location:index.php');

?>