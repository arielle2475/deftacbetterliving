<?php
session_start();
$_SESSION['message'] = '';
include_once 'config.php';
if(isset($_POST['submit'])) {


$fname = $_POST['u_fname'];
$lname = $_POST['u_lname'];
$age = $_POST['u_age'];
$address = $_POST['u_address'];
$contact = $_POST['u_contact'];
$comment = $_POST['u_joindesc'];
$email = $_POST['email'];

$error = 0;

if (isset($_POST['email']) && !empty($_POST['email'])) {
    $email=mysqli_real_escape_string($conn,trim($_POST['email']));
}else{
    $error =1;
    $empty_email="Email cannot be empty.";
    echo $empty_email.'<br>';
}

if(!$error) {
    $sql="SELECT * FROM users";
    $res=mysqli_query($conn,$sql);
    if (mysqli_num_rows($res) > 0) {
    
 $sql = "UPDATE mfillup SET u_fname='$fname',u_lname='$lname', u_age='$age',u_address='$address',u_contact='$contact', u_joindesc='$comment', username='$name' WHERE username = '" . $_SESSION['username'] . "'";
         $sql2 = "UPDATE users SET username='$name', email='$email' WHERE username = '" . $_SESSION['username'] . "'";
         
         mysqli_query($conn, $sql); 
         mysqli_query($conn, $sql2);  
 
         header("Location: userprofile.php");
            
        }
    
    } 
}
?> 