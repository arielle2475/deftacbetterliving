<?php
$host="localhost";
$username="root";
$password="";
$databasename="thesis";

$connect=mysqli_connect($host,$username,$password);
$db=mysqli_select_db($databasename);

if(isset($_POST['comment']) && isset($_POST['names']))
{
  $username = $mysqli->real_escape_string($_POST['names']);
  $comment = $mysqli->real_escape_string($_POST['comment']);
  $insert="INSERT INTO comments (names,comment,post_time) VALUES('$username','$comment',CURRENT_TIMESTAMP)";
}

?>