<?php
$_SESSION['message'] = '';
session_start();
include_once '../../member/config.php';
if(isset($_POST['submit'])) {


$name = $_POST['adminname'];
$email = $_POST['adminemail'];

$error = 0;
if (isset($_POST['adminname']) && !empty($_POST['adminname'])) {
    $name=mysqli_real_escape_string($conn,trim($_POST['adminname']));
}else{
    $error = 1;
    $empty_username="Username Cannot be empty.";
    echo $empty_username.'<br>';
}
if (isset($_POST['adminemail']) && !empty($_POST['adminemail'])) {
    $email=mysqli_real_escape_string($conn,trim($_POST['adminemail']));
}else{
    $error =1;
    $empty_email="Email cannot be empty.";
    echo $empty_email.'<br>';
}

if(!$error) {
    $sql="SELECT * FROM admins where (adminname='$name' or adminemail='$email');";
    $res=mysqli_query($conn,$sql);
    if (mysqli_num_rows($res) > 0) {
    // output data of each row
    $row = mysqli_fetch_assoc($res);
    if ($_SESSION['adminname']==$name)
    {
    echo '<script type="text/javascript">'; 
    echo 'alert("Username already exist!");'; 
    echo 'window.location.href = "../editadmin.php";';
    echo '</script>';        
         
    }
    elseif($email==$row['adminemail'])
    {  
    echo '<script type="text/javascript">'; 
    echo 'alert("Email already exist!");'; 
    echo 'window.location.href = "../editadmin.php";';
    echo '</script>';
        }

else { //here you need to add else condition
    
 $sql = "UPDATE admins SET adminname='$name',adminemail='$email' WHERE adminname = '" . $_SESSION['adminname'] . "'";
         
         mysqli_query($conn, $sql);  
         $_SESSION['adminname'] = $name;
         echo '<script type="text/javascript">'; 
         echo 'alert("Successfully edited your informations!");'; 
         echo 'window.location.href = "../index.php";';
         echo '</script>';
            }
        }
    }
}


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