

<?php 
$mysqli = new mysqli("localhost", "root", "", "thesis");

if(isset($_POST['submit'])){
$name= $_FILES['file']['name'];

$tmp_name= $_FILES['file']['tmp_name'];

$submitbutton= $_POST['submit'];

$position= strpos($name, "."); 

$fileextension= substr($name, $position + 1);

$fileextension= strtolower($fileextension);

$description= $_POST['description_entered'];

$success= -1;

$descript= 0;

if (empty($description))
{
$descript= 1;
}

if (isset($name)) {

$path= 'videos/';

if (!empty($name)){
if (($fileextension !== "mp4") && ($fileextension !== "ogg") && ($fileextension !== "webm"))
{
$success=0;
echo "The file extension must be .mp4, .ogg, or .webm in order to be uploaded";
}


else if (($fileextension == "mp4") || ($fileextension == "ogg") || ($fileextension == "webm"))
{
$success=1;
if (move_uploaded_file($tmp_name, $path.$name)) {
echo 'Uploaded!';
}
}
}
}
}
?>



<form action="" method='POST' enctype="multipart/form-data">
Description of Video: <input type="text" name="description_entered"/><br><br>
<input type="file" name="file"/><br><br>
	
<input type="submit" name="submit" value="Upload"/>

</form>


<?php
//Block 1
$user = "root"; 
$password = ""; 
$host = "localhost"; 
$dbase = "thesis"; 
$table = "tbl_video"; 



//Block 3
$connection= mysqli_connect ($host, $user, $password,$dbase);
if (!$connection)
{
die ('Could not connect:' . mysqli_connect_error());
}
mysqli_select_db($connection, $dbase);



//Block 4
if((!empty($description)) && ($success == 1)){
    $sql = "INSERT INTO $table (description, filename, fileextension)
VALUES ('$description', '$name', '$fileextension')";
mysqli_query($connection, $sql);
}


//Block 5
mysqli_close($connection);

?>
<p id="para6">Videos





<?php

$user = "root"; 
$password = ""; 
$host = "localhost"; 
$dbase = "thesis"; 
$table = "tbl_video"; 

// $host = "localhost";
// $user = "root";
// $password = "";
// $database = "thesis";
$conn;


//    $conn = mysqli_connect($host,$user,$password,$database);
//    $sql = "INSERT INTO mfillup (u_fname, u_lname, u_gender, u_age, u_address, u_contact, u_joindesc, username)
//    VALUES ('$fname', '$lname', '$gender', '$age', '$address', '$contact', '$comment', '$username');";
//    mysqli_query($conn, $sql);
// Connection to DBase 
$conn = mysqli_connect($host,$user,$password,$dbase); 
// @mysqli_select_db($host,$user,$password,$dbase) or die("Unable to select database");


$sql3 = "SELECT id, description, filename, fileextension FROM $table ORDER BY ID DESC";
$result= mysqli_query($conn, $sql3) 
or die("SELECT Error: ".mysqli_error()); 

print "<form action='vid' method='post'>";
print "<table border=1>\n"; 
while ($row = mysqli_fetch_array($result)){ 
$id_field= $row['id'];
$videos_field= $row['filename'];
$video_show= "videos/$videos_field";
$descriptionvalue= $row['description'];
$fileextensionvalue= $row['fileextension'];
print "<tr>\n"; 
print "\t<td>\n"; 
echo "<input type='checkbox' name='vid' value='$id_field'>";
print "</td>\n";
print "\t<td>\n"; 
echo "<font face=arial size=4/>$descriptionvalue</font>";
print "</td>\n";
print "\t<td>\n"; 
echo "<div align=center><video width='320' controls><source src='$video_show' type='video/$fileextensionvalue'>Your browser does
not support the video tag.</video></div>";
print "</td>\n";
print "</tr>\n"; 
} 
print "</table>\n"; 
print "<input type='submit' name='button' value='Delete'/>";
print "</form>";

$videodelete= $_POST['vid'];
if(isset($videodelete)) {
foreach ($videodelete as $key => $value)
{
    $sql2 = "DELETE FROM $table WHERE id='$value'";
$deleterow= mysqli_query($conn, $sql2);
}
if($deleterow !== FALSE)
{
   echo("The video(s) has been successfully deleted.");
}else{
   echo("There was an error. The video(s) was not successfully deleted");
}
}
?> 
