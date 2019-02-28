<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "thesis";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

session_start();
mysqli_query($conn, "UPDATE admins SET isOnline = '0' WHERE adminname = '$_SESSION[adminname]' ");
unset($_SESSION['adminname']);
unset($_SESSION['adminavatar']);
session_destroy();
header( "refresh:0;url=../Signin/loginAdmin.php?logout=You Are Successfully Logged out!" ); 
?>