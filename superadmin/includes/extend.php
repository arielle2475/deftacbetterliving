<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "thesis";

// Create connection
if(isset($_GET['update'])){
$conn = mysqli_connect($servername, $username, $password, $dbname);
$id=$_GET['update'];




$sql = "SELECT * FROM mfillup";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $extended = date($row["expDate"], strtotime('+1 month'));
    }

 
$sql2 = "UPDATE users,mfillup SET users.isActive = 1, 
mfillup.expirationDate='$extended' WHERE users.id=$id AND users.username=mfillup.username";

$sql3 = "INSERT INTO transhistory (expDate,usersid)
VALUES ('$extended','$id');";

$data=mysqli_query($conn,$sql);
$data2=mysqli_query($conn,$sql2);
$data3=mysqli_query($conn,$sql3);

header('Location:../userlist.php');
}

}
?>