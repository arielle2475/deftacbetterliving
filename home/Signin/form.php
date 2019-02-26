<?php
ob_start();
session_start();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet">
<title>Deftac Betterliving | Registration</title>
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
   
    <li><a href="../signin/login.php">Sign In</a></li>
        <li class="active"><a href="../signin/form.php">Register</a></li>
          </li>
         
     
        </ul>
      </nav>
    </header>


  </div>

    </head>

<body>
<?php $_SESSION['message'] = '';
$mysqli = new mysqli("localhost", "root", "", "thesis");

 if($_SERVER['REQUEST_METHOD'] == 'POST') {
//two passwords are equal to each other
if ($_POST['password'] == $_POST['confirmpassword']){

      $username = $mysqli->real_escape_string($_POST['username']);
      $email = $mysqli->real_escape_string($_POST['email']);
      $password = md5($_POST['password']); //md5 hash password security
      $avatar_path = $mysqli->real_escape_string('images/'.$_FILES['avatar']['name']);

    //make sure file type is image
  if (preg_match("!image!", $_FILES['avatar']['type'])){
    //copy image to images/ folder
  if (copy($_FILES['avatar']['tmp_name'], $avatar_path)){
    
  $_SESSION['username'] = $username;
  $_SESSION['avatar'] = $avatar_path;
  
  $sql = "INSERT INTO users (username, email, password, avatar)"
  . "VALUES ('$username', '$email', '$password', '$avatar_path')";
  
  //if the query is successful, redirect to welcome.php page, done!
  if ($mysqli->query($sql) === true) {
    $_SESSION['message'] = "Registration succesful! Added $username to the database!";header("location: ../member/newmember.php");
  }
  
  else {
  $_SESSION['message'] = "Username already exists!";
  }
  } 
  else {
  $_SESSION['message'] = "file upload failed!";
  }
  }
  else {
    $_SESSION['message'] = "Please only upload GIF, JPG, or PNG images!";
  }
}
  else  {
    $_SESSION['message'] = "Two password do not match!!";
}
 }

?>

<link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="formstyle2.css" type="text/css">
<div class="body-content">
  <div class="module">
    <h1>Create an account</h1>
    <form class="form" action="form.php" method="post" enctype="multipart/form-data" autocomplete="off">
    <div class="alert alert-error"><?= $_SESSION['message'] ?></div>    
      <input type="text" placeholder="User Name" name="username" required />
      <input type="email" placeholder="Email" name="email" required />
      <input type="password" placeholder="Password" name="password" autocomplete="new-password" required />
      <input type="password" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password" required />
      <div class="avatar"><label>Select your avatar: </label><input type="file" name="avatar" accept="image/*" required /></div>
      <input type="submit" value="Register" name="register" class="btn btn-block btn-primary" />
	  	<p>
  	 Already a member? <a href="login.php">Sign in</a>
	 </p>
	
    </form>
  </div>
</div>
    </body>
    </html>