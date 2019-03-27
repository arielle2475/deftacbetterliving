<head>
<?php include "includes/header.php"; ?>

<style type="text/css">
	#text{
		width:300px;
		height:auto;
		background-color: #B7CCFA;
	    border-radius: 10px;

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
		<div >
				<!-- <span style="color:green;"><?php echo $row['name']; ?></span> <br> -->
				<span style=" padding-left:10px; color:gray; font-weight: bold;">
				<br>
				<?php echo formatDate($row['date']);?></span>
				<br>
	
				<div id="text" style="padding:10px;"> 
				<span style='float:left; color:black;'>
				<b><?php echo ucfirst($row['name'])?>: &nbsp&nbsp&nbsp</b><?php echo $row['msg']; ?></span><br>
				</div>

				


		</div>
		<?php
	}


?>
