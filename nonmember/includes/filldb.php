<?php
include_once 'dbc.php';

session_start();


$fname = $_POST['fname'];
$lname = $_POST['lname'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$address = $_POST['address'];
$contact = $_POST['contact'];
$comment = $_POST['comment'];
//$username = $_POST['username'];
$username = $_SESSION['username'];


/*
$sql  = "SELECT * FROM mfillup WHERE username = '$username'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	//return to register page with error
$message = "wrong answer";
echo "<script type='text/javascript'>alert('$message');</script>";
//alert("CONGRATULATIONS! You got the last chest!");
}else{
	**/
	
$sql = "INSERT INTO mfillup (u_fname, u_lname, u_gender, u_age, u_address, u_contact, u_joindesc, username)
VALUES ('$fname', '$lname', '$gender', '$age', '$address', '$contact', '$comment', '$username');";
mysqli_query($conn, $sql);

/**
$message2 = "Successfully Sent Registration. Please pay at the gym to start enjoying your service";
echo "<script type='text/javascript'>alert('$message2');</script>"; 
*/
header("Location: ../submit.php");


