<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "thesis";

// Create connection
if(isset($_GET['update'])){
$conn = mysqli_connect($servername, $username, $password, $dbname);
$id=$_GET['update'];
$sql = "UPDATE admins SET isactive = 0 WHERE id=$id ";
$data = mysqli_query($conn,$sql);
header('Location:../adminsubmit.php');
}