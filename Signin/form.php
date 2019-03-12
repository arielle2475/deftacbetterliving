<?php
ob_start();
session_start();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Register | Deftac Betterliving</title>
    <?php include "includes/header.php"; ?>

</head>

<body>
<nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark" id="mainNav" style="padding-top: 10px;padding-bottom: 10px;">
        <div class="container"><a class="navbar-brand" href="#page-top"><img src="../assets/img/deftacmain.png" style="width: 137px;"></a><button class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#navbarResponsive" type="button" data-toogle="collapse" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto text-uppercase">
                    <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="../index.php">back to homepage</a></li>
                </ul>
            </div>
        </div>
    </nav>
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
  $_SESSION['email'] = $avatar_path;

  
  $sql = "INSERT INTO users (username, email, password, avatar)"
  . "VALUES ('$username', '$email', '$password', '$avatar_path')";
  
  //if the query is successful, redirect to welcome.php page, done!
  if ($mysqli->query($sql) === true) {
    $_SESSION['message'] = "Registration succesful! Added $username to the database!";header("location: ../nonmember/newmember.php");
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
<div data-aos="fade" data-aos-duration="700" data-aos-delay="200" data-aos-once="true" class="login-dark" style="background-image: url(&quot;../assets/img/bg.gif&quot;);">
        <form class="form" action="form.php"method="post"  enctype="multipart/form-data" style="opacity: 0.85;" autocomplete="off">

            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><img src="../assets/img/deftac.png" width="180px" data-bs-hover-animate="pulse"></div>
			<div class="text-center bg-danger border rounded border-danger shake animated "style="padding:10px;color:white;"><?= $_SESSION['message'] ?></div>    

            <div class="form-group"><input class="form-control" type="text" name="username" required="" placeholder="Username" style="height: 45px;">
                <input
                    class="form-control" type="email" name="email" required="" placeholder="Email"  style="height: 46px;padding-bottom: 4px;"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" required="" placeholder="Password" autocomplete="new-password" style="padding-top: -17px;">
                <input class="form-control" type="password" name="confirmpassword" required="" placeholder="Confirm Password" autocomplete="new-password" style="height: 45px;"></div>
                 <div class="avatar"><label>Select your avatar: </label><input type="file" name="avatar" accept="image/*" required /></div>

                <div
                class="form-group"><button class="btn btn-primary btn-block" type="submit" value="Register" name="register" style="background-color: rgb(254,209,54);">Register</button></div><a href="login.php" class="forgot">Already a member? Login!</a></form>
  
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/-Filterable-Gallery-with-Lightbox-BS4-.js"></script>
    <script src="../assets/js/agency.js"></script>
    <script src="../assets/js/bs-animation.js"></script>
    <script src="../assets/js/Dynamically-Queue-Videos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
    <script src="https://www.youtube.com/iframe_api"></script>
    <script src="../assets/js/Profile-Edit-Form.js"></script>
</body>

    </html>