<?php
include 'config.php';

session_start();

mysqli_query($con, "UPDATE users SET isActive = '0' WHERE email = '$_SESSION[email]' ");

unset($_SESSION['email']);
session_destroy();
header( "refresh:0;url=login.php?logout=You Are Successfully Logged out!" ); 


?>