
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "thesis";

// Create connection
if(isset($_GET['update'])){
$conn = mysqli_connect($servername, $username, $password, $dbname);
$id=$_GET['update'];
$sql = "UPDATE users SET isActive = 1 WHERE id=$id ";
// $sql = "UPDATE users.isActive, mfillup.approvedDate
// FROM users
// INNER JOIN mfillup SET isActive = 1 WHERE id=$id, approvedDate=NOW()";
$data = mysqli_query($conn,$sql);
header('Location:../userlist.php');
}
?>