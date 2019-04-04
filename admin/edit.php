<?php
	include('conn.php');
	
	$id=$_GET['id'];
	
	$announcement=$_POST['announcement'];
	$details=$_POST['details'];
	
	
	mysqli_query($conn,"update user set announcement='$announcement', details='$details' where id='$id'");
	header('location:index.php');

?>