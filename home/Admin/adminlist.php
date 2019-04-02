<!DOCTYPE html>
<html>
<head>

     
	<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 150%;
}

td, th {
    border: 10px solid #354051;
    text-align: center;
    padding: 9px;
}

tr:nth-child(even) {
    background-color: #67cea9;
}
	 h2
{
	color: black;
	text-align: center;
	font-family: 'Rock Salt', cursive;
	font-size: 50px;
}

.dropbtn {
    background-color: #354051;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #354051;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: white;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {background-color: #67cea9}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: #354051;

}
</style>


    </nav>
	<title>User</title>
</head>

	<br />  
           <div class="container" style="width:700px;">  
                <h2 align="center">Control User</h2><br />  
			
				



<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "thesis";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM admins";
$result = mysqli_query($conn, $sql);
echo " <a href='../Signin/form.php'></a>
<table><tr>
    <th>Name</th>
    <th>Email</th>
    <th>Access Control</th>
  </tr>";
echo "<tr>";
if (mysqli_num_rows($result) > 0) {
    // output data of each row

    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row["username"]. "</td> <td>" . $row["email"]. "</td>"	;
$active=$row['isactive'];
	 	if($active==1){
		echo "<td><a href='deactivateadmin.php/?update=$row[id]'>Deactivate</a></td></tr>";    
	    }
	    if($active==0){
		echo "<td><a href='activateadmin.php/?update=$row[id]'>Activate</a></td></tr>";    
	    }

	  
}}

echo "
</table>";
mysqli_close($conn);
?>

</body>
</html>