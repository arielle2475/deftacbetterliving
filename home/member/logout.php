<<<<<<< HEAD
<?php
include 'config.php';

session_start();

mysqli_query($conn, "UPDATE users SET isOnline = '0' WHERE username = '$_SESSION[username]' ");

unset($_SESSION['username']);
session_destroy();
header( "refresh:0;url=../Signin/login.php?logout=You Are Successfully Logged out!" ); 


=======
<?php
include 'config.php';

session_start();

mysqli_query($conn, "UPDATE users SET isOnline = '0' WHERE username = '$_SESSION[username]' ");

unset($_SESSION['username']);
unset($_SESSION['avatar']);


session_destroy();
header( "refresh:0;url=../Signin/login.php?logout=You Are Successfully Logged out!" ); 


>>>>>>> 4cf532f7eeee1f8114757c7ee62311f83a0443c7
?>