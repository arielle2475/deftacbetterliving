<?php //include('serverAdmin.php') ?>
<!DOCTYPE html>
<html>
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
 <style>
        
        #box1{
            height: 100vh;
            width: 100%;
            background-image: url(i1.jpg);
            background-size: cover;
            display: table;
            background-attachment: fixed;
        }
    </style>

<head>
  <title>Deftac Better Living Admin | Login</title>

  <link rel="stylesheet" type="text/css" href="loginStyle.css">
</head>
<body>
  <br>
  <br>
  <div class="header">
<br>
  	<h2>Login as Administrator</h2>
  </div>
	 
  <form method="post" action="serverAdmin.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="adminname" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group"></br>
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>

  </form>
</body>
</html>