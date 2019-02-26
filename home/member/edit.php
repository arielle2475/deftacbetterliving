<?php
session_start();
include_once 'config.php';




$name = $_POST['username'];
$fname = $_POST['u_fname'];
$lname = $_POST['u_lname'];
$age = $_POST['u_age'];
$address = $_POST['u_address'];
$contact = $_POST['u_contact'];
$comment = $_POST['u_joindesc'];
$sessionuser = $_SESSION['username'];



$sql = "UPDATE mfillup SET u_fname='$fname',u_lname='$lname', u_age='$age',u_address='$address',u_contact='$contact', u_joindesc='$comment', username='$name' WHERE username = '" . $_SESSION['username'] . "'";
$sql2 = "UPDATE users SET username='$name' WHERE username = '" . $_SESSION['username'] . "'";

mysqli_query($conn, $sql);
mysqli_query($conn, $sql2);
$_SESSION['username'] = $name;
header("Location: welcome.php");

?>

