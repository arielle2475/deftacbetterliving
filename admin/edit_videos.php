<?php
	include('conn.php');
	
	$id=$_GET['id'];
	
	$description=$_POST['description'];
	
    mysqli_query($conn,"update tbl_video set description='$description' where id='$id'");

	header('location:video.php');

?>