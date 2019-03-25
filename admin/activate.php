<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "thesis";
// Create connection
if(isset($_GET['update'])){
$conn = mysqli_connect($servername, $username, $password, $dbname);
$id=$_GET['update'];


$sql = "UPDATE users SET users.isOnline = 1 WHERE users.id=$id";

$data=mysqli_query($conn,$sql);
header('Location:../userlist.php');
}
?>