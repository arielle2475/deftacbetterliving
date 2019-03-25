<?php
include 'config.php';
session_start();
// mysqli_query($conn, "UPDATE users SET isOnline = '0' WHERE username = '$_SESSION[username]' ");
unset($_SESSION['username']);
unset($_SESSION['avatar']);
session_destroy();
header( "refresh:0;url=../index.php?logout=You Are Successfully Logged out!" ); 
?>