<?php
 $con = mysqli_connect("localhost", "root", "", "thesis");

if(isset($_POST['submit']))
{
	$name = $_POST['userName'];
	$msg = $_POST['userMsg'];
	$query = "INSERT INTO chat SET username= '$name', msg='$msg'";
	
	$run = mysqli_query($con, $query);
	// if($run)
	// {
	// 	echo "<embed loop='false' src='chat.wav' hidden='true' autoplay='true'/>";
	// }
}



?>