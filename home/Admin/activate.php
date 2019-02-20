<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "thesis";

// Create connection
if(isset($_GET['update'])){
$conn = mysqli_connect($servername, $username, $password, $dbname);
$id=$_GET['update'];
// $sql = "UPDATE users SET isActive = 1 WHERE id=$id ";,
//  $sql = "UPDATE users.isActive, mfillup.approvedDate
// FROM users
//  INNER JOIN mfillup SET isActive = 0 WHERE id=$id, approvedDate=NOW()";
//$sql = "UPDATE users,mfillup SET users.isActive = 1, mfillup.approvedDate=NOW()
//WHERE users.id=$id AND users.username=mfillup.username";
// $sql = "UPDATE users,mfillup,transhistory FROM users INNER JOIN transhistory 
// SET users.isActive = 1, mfillup.approvedDate='$timestamp', mfillup.expirationDate='$expdate',
//  transhistory.appDate='$timestamp', transhistory.expDate='$expdate', transhistory.uid=users.id
//  WHERE users.id=$id AND users.username=mfillup.username";




$timestamp = date("Y-m-d H:i:s", time()); 
$expdate = date('Y-m-d H:i:s', strtotime('+1 month'));


$sql = "UPDATE users,mfillup SET users.isActive = 1, mfillup.approvedDate='$timestamp', 
mfillup.expirationDate='$expdate' WHERE users.id=$id AND users.username=mfillup.username";

$sql2 = "INSERT INTO transhistory (appDate,expDate,usersid)
VALUES ('$timestamp','$expdate','$id');";

$data=mysqli_query($conn,$sql);
$data2=mysqli_query($conn,$sql2);

header('Location:../userlist.php');
}












?>