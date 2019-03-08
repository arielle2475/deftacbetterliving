<head>
<?php include "includes/header.php"; ?>

<style type="text/css">
	#text{
		width:300px;
		background-color: #B7CCFA;
	    border-radius: 10px;
	    padding-top: 3px;
	    padding-bottom: 3px;
	}
</style>

</head>
			<?php 
			$con = mysqli_connect("localhost", "root", "", "thesis");
function formatDate($date){
	return date('g:i a', strtotime($date));
}


$query = " SELECT * FROM chat ORDER BY date ASC";
$run = mysqli_query($con, $query);

	while ($row =mysqli_fetch_array($run, MYSQLI_BOTH)) {
		

		?>
		
				<!-- <span style="color:green;"><?php echo $row['name']; ?></span> <br> -->
				<div id="text"> <span style="color:green; margin-left: 8px; font-weight: bold;">
				<?php echo ($row['name'])." :</span><br><span style='color:#3B3803'>". str_repeat('&nbsp', 12); echo $row['msg']; ?></span>
				<span style="float:right;"><?php echo formatDate($row['date']); echo "&nbsp&nbsp&nbsp&nbsp&nbsp"; ?></span></div><br>
				
			

		
		<?php
	}


?>
