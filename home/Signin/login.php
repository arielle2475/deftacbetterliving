<?php include('server.php');?>
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
<body id="top"><div id="box1">
<div id="box1" class="bgded overlay" style="background-image:url('images/demo/img/bg.gif');"> 
  <div class="wrapper row1">

    <header id="header" class="hoc clear"> 
      <div id="logos">
    <img src="deftac.png">
      </div>
      <nav id="mainav" class="fl_right">
        <ul class="clear">
   
        <li><a href="../nonmember/index.html">Home</a></li>
     <li><a href="../nonmember/gallery.html">Gallery</a></li> 

    <li class="active"><a href="../signin/login.php">Sign In</a></li>
       <li><a href="form.php">Register</a></li>
          </li>
         
     
        </ul>
      </nav>
    </header>


  </div>
<head>
  <title>Deftac Betterliving | Login</title>
  <link rel="stylesheet" type="text/css" href="loginStyle.css">
</head>
<body>
    
  <div class="header">
  	<h2>Login</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
      <br>
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
      <br>
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		Not yet a member? <a href="form.php">Sign up</a>
	</p>

  </form>
</body>
</html>