<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "thesis";

// Create connection
if(isset($_GET['update'])){
$conn = mysqli_connect($servername, $username, $password, $dbname);
$id=$_GET['update'];
//$sql = "UPDATE users SET isActive = 0 WHERE id=$id ";
// $sql = "UPDATE users.isActive, mfillup.approvedDate
// FROM users
// INNER JOIN mfillup SET isActive = 0 WHERE id=$id, approvedDate=NOW()";
$sql = "UPDATE users,mfillup SET users.isActive = 0, mfillup.expirationDate=NOW()
WHERE users.id=$id AND users.username=mfillup.username";

$data = mysqli_query($conn,$sql);
header('Location:../../userlist.php');
}
?>