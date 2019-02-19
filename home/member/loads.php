<?php
include("config.php");

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 


$comm = mysqli_query($conn,"SELECT * FROM comments");
while($row=mysqli_fetch_array($comm)){
	$name=$row['names'];
	$comment=$row['comment'];
    $time=$row['post_time'];
?>
<div class="chats"><strong><?=$name?>:</strong> <?=$comment?> <p style="float:right"><?=date("j/m/Y g:i:sa", strtotime($time))?></p></div>
<?php
}
?>