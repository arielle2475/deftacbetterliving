<?php 
include 'config.php';
include 'action.php';
session_start();
	if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
		session_destroy();
		header('location: ../Signin/login.php?error=Login to access chat.');
		}

 ?>
<!DOCTYPE html> 
<html>
	<head>
		<title>CHATBOX</title>
	<!-- <script type="text/javascript" src="jquery-3.1.1.min.js"></script> -->
	    <link rel="stylesheet" type="text/css" href="css/ScrollBar.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/main2.js"></script>
	
	<style type="text/css">
		hr{
			height: 2px;
		}
		.btn{
			height: 24px;
			line-height: 12px;
		}

		
	</style>
	</head>
	
<body style="background-color: #F0EEEE">

<div class="container">

	<div class="row">
		<h3  align="center"><font color="#E32F75">Chatbox for Deftac Betterliving</font></h3>
				<hr color="#E32F75">
		<div class="col-sm-3">
			<div class="panel panel-success">
				<div class="panel-heading" align="center">Online Members</div>
				<div class="panel-body">
					<div id="Userlog"> 
						<a href="logout.php" style="float: right;" class="btn btn-danger btn-sm">Logout</a></div>
				</div>
			</div>
		</div>
		<div class="col-sm-9">
			<div class="panel panel-success">
				<div class="panel-heading" align="center">Chat Room</div>
				<div class="panel-body" style="max-height: 450px; overflow-y: scroll;" class="scrollbar" id="style-2">
					<div id="show"></div>

				</div>
				<div class="panel-footer" id="footer">
					<div class="row">
						<form >
						<input type="hidden" name="name" id="name" value="<?php echo $_SESSION['username'] ?>"  class="form-control" >
						<div class="col-sm-10"><input type="text" name="msg" id="msg"  class="form-control" ></div>
						<div class="col-sm-2" style="padding-left: 35px">
							<input type="reset" name="send" id="send" value="Send" class="btn btn-primary " >
						</form>
						</div>
					</div>
					
					
					
				</div>
			</div>
		</div>
		<div class="col-sm-3"></div>
	</div>
</div>

</body>
</html>

<script type="text/javascript">
		$(document).ready(function() {
			setInterval(function () {
				$('#Userlog').load('UserLog.php')
			}, 1000);
		});




	</script>