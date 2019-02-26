<?php
$_SESSION['message'] = '';
session_start();
include_once 'config.php';
if(isset($_POST['submit'])) {


$name = $_POST['username'];
$fname = $_POST['u_fname'];
$lname = $_POST['u_lname'];
$age = $_POST['u_age'];
$address = $_POST['u_address'];
$contact = $_POST['u_contact'];
$comment = $_POST['u_joindesc'];
$email = $_POST['email'];

$error = 0;
if (isset($_POST['username']) && !empty($_POST['username'])) {
    $username=mysqli_real_escape_string($conn,trim($_POST['username']));
}else{
    $error = 1;
    $empty_username="Username Cannot be empty.";
    echo $empty_username.'<br>';
}
if (isset($_POST['email']) && !empty($_POST['email'])) {
    $email=mysqli_real_escape_string($conn,trim($_POST['email']));
}else{
    $error =1;
    $empty_email="Email cannot be empty.";
    echo $empty_email.'<br>';
}

if(!$error) {
    $sql="SELECT * FROM users where (username='$username' or email='$email');";
    $res=mysqli_query($conn,$sql);
    if (mysqli_num_rows($res) > 0) {
    // output data of each row
    $row = mysqli_fetch_assoc($res);
    if ($username!=$row['username'])
    {
     echo '<script type="text/javascript">'; 
        echo 'alert("Username already exist!");'; 
        echo 'window.location.href = "editprofile.php";';
        echo '</script>';
        
         
    }
    elseif($email!=$row['email'])
    {  
       echo '<script type="text/javascript">'; 
    echo 'alert("Email already exist!");'; 
    echo 'window.location.href = "editprofile.php";';
    echo '</script>';

    }
else { //here you need to add else condition
    
 $sql = "UPDATE mfillup SET u_fname='$fname',u_lname='$lname', u_age='$age',u_address='$address',u_contact='$contact', u_joindesc='$comment', username='$name' WHERE username = '" . $_SESSION['username'] . "'";
         $sql2 = "UPDATE users SET username='$name', email='$email' WHERE username = '" . $_SESSION['username'] . "'";
         
         mysqli_query($conn, $sql);  
         mysqli_query($conn, $sql2);
         $_SESSION['username'] = $name;
         header("Location: welcome.php");

}
}

}}


// $check=mysqli_query($conn,"SELECT `username`, `email`, `` FROM `users` WHERE (`username`='$username' OR `email`='$username')");
// $data = mysqli_fetch_array($check, MYSQLI_NUM);
// if($data[0] > 1) {
//     $_SESSION['message'] = "Username already exists!";
//  } else { 
// $sql = "UPDATE mfillup SET u_fname='$fname',u_lname='$lname', u_age='$age',u_address='$address',u_contact='$contact', u_joindesc='$comment', username='$name' WHERE username = '" . $_SESSION['username'] . "'";
// $sql2 = "UPDATE users SET username='$name', email='$email' WHERE username = '" . $_SESSION['username'] . "'";

// mysqli_query($conn, $sql);  
// mysqli_query($conn, $sql2);
// $_SESSION['username'] = $name;
// header("Location: welcome.php");
//  }
// }
?> 