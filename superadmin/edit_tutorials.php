<?php
	include('conn.php');
	
	$id=$_GET['id'];
	
	$title=$_POST['title'];
	$description=$_POST['description'];
	
    mysqli_query($conn,"update tutorials set title='$title', description='$description' where id='$id'");

	header('location:tutorial.php');

?>