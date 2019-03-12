
<?php 
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
  session_destroy();
  header('location: ../Signin/login.php?error=Login to access chat.');
  }
?>
<?php
$mysqli = new mysqli('localhost', 'root', "" , 'thesis');
if(isset($_SESSION['username'])){
    $sql = "SELECT username, avatar FROM users WHERE username='".$_SESSION["username"]."'";
}else{
    $sql = "SELECT username, avatar FROM users";
}	

$result = $mysqli->query($sql); //$result = mysqli_result object
while ($row =  $result->fetch_assoc()){
    $_SESSION['avatar'] = $row['avatar'];
    
}?>
<?php
// USER NOTIFIER FUNCTION

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "thesis";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

$query = "SELECT approvedDate,expirationDate from mfillup WHERE username = '" . $_SESSION['username'] . "'";
$run = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($run, MYSQLI_BOTH)) {
    $appDate = $row['approvedDate'];
    $expDate = $row['expirationDate'];
}

$datediff = strtotime($expDate) - strtotime($appDate);
$sum = round($datediff / (60 * 60 * 24));
// echo $sum;

switch(true)
{
    case ($sum == 7):
    echo '<script language="javascript">';
    echo 'alert("Your membership will expire in 7 days!")';
    echo '</script>';
    break;

    case ($sum == 6):
    echo '<script language="javascript">';
    echo 'alert("Your membership will expire in 6 days!")';
    echo '</script>';
    break;

    case ($sum == 5):
    echo '<script language="javascript">';
    echo 'alert("Your membership will expire in 5 days!")';
    echo '</script>';
    break;

    case ($sum == 4):
    echo '<script language="javascript">';
    echo 'alert("Your membership will expire in 4 days!")';
    echo '</script>';
    break;

    case ($sum == 3):
    echo '<script language="javascript">';
    echo 'alert("Your membership will expire in 3 days!")';
    echo '</script>';
    break;
    
    case ($sum == 2):
    echo '<script language="javascript">';
    echo 'alert("Your membership will expire in 2 days!")';
    echo '</script>';
    break;

    case ($sum == 1):
    echo '<script language="javascript">';
    echo 'alert("Your membership will expire in 1 day!")';
    echo '</script>';
    break;

    case ($sum == 0):
    echo '<script language="javascript">';
    echo 'alert("Your membership has been expire!")';
    echo '</script>';
//    header( "Location: renewal.php" );die;
    break;
    default;


}
// if($sum <= 3){
//     echo '<script language="javascript">';
//     echo 'alert("Your membership will expire in 3 days!")';
//     echo '</script>';
//    } 
// else if($sum <= 2){
//     echo '<script language="javascript">';
//     echo 'alert("Your membership will expire in 2 days!")';
//     echo '</script>';
//   } 
// else if($sum <= 1){
//     echo '<script language="javascript">';
//     echo 'alert("Your membership will expire in 1 day!")';
//     echo '</script>';
//    } 
// else if ($sum == 0){
//     header( "Location: ../Signin/login.php" );
// }
 
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>User Profile | Deftac Betterliving</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script">
    <?php include "includes/delete_modal.php"; ?>
    <link rel="stylesheet" href="../assets/css/Pretty-Footer.css">

    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="../assets/fonts/material-icons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>.dropdown:hover .dropdown-menu {
  display: block;
}</style>
</head>

<nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark" id="mainNav" style="padding-top: 10px;padding-bottom: 10px;">
                <div class="container"><a class="navbar-brand" href="welcome.php" style="background-size: contain;"><img class="img-fluid" src="../assets/img/deftacmain.png" width="140px" data-bs-hover-animate="wobble"></a><button class="navbar-toggler navbar-toggler-right" data-toggle="collapse"
                            data-target="#navbarResponsive" type="button" data-toogle="collapse" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                        <div class="collapse navbar-collapse" id="navbarResponsive">
                            <ul class="nav navbar-nav ml-auto text-uppercase" style="margin-top:10px;">
							<li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger " href="welcome.php">Home</a></li>
                              <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="bloghome.php">Blog</a></li>
                              <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="gallery.php">Gallery</a></li>
                              <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="coaches.php">Coaches</a></li>
							  <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger " href="index.php">CHAt</a></li>                             
							 <li class="nav-item dropdown" style="opacity: 0.93;" ><a class="dropdown-toggle nav-link active" data-toggle="dropdown" aria-expanded="false" href="#" style="margin-top: -10px;">MY Account&nbsp;<span class="user"><img width="45px" class="rounded-circle mx-auto" height="45px" src='../Signin/images/<?= $_SESSION['avatar']?>' </span></a>
                              <div class="dropdown-menu border-dark" role="menu" data-aos="fade-up" data-aos-once="true" style="background-color: rgb(52,58,64);">
                              <div class="nav-item" role="presentation"><a class="nav-link active" href="userprofile.php">My Profile</a></>        
                              <div class="nav-item" role="presentation"><a class="nav-link" href="logout.php">Logout</a></>        
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>   
<body style="background-image: url(&quot;assets/img/bg2.jpg&quot;);background-size: cover;background-position: center;">
<?php
include "config.php";
$query="SELECT*
FROM users
INNER JOIN mfillup ON users.username= mfillup.username WHERE users.username = '" . $_SESSION['username'] . "'";



$run = mysqli_query($conn, $query) or die("MySQL error: " . mysqli_error($conn) . "<hr>\nQuery: $query");

while ($row = mysqli_fetch_array($run, MYSQLI_BOTH)) {
  $name = $row['username'];
  $gender = $row['u_gender'];
  $fname = $row['u_fname'];
  $lname = $row['u_lname'];
  $age = $row['u_age'];
  $address = $row['u_address'];
  $contact = $row['u_contact'];
  $desc = $row['u_joindesc'];
  $email = $row['email'];
  $img=$row['avatar']; 
  $regdate = $row['reg_date']; 
  $appdate = $row['approvedDate']; 
  $expdate = $row['expirationDate']; 


}


?>
<?php
$mysqli = new mysqli('localhost', 'root', "" , 'thesis');
if(isset($_SESSION['username'])){
    $sql = "SELECT username, avatar FROM users WHERE username='".$_SESSION["username"]."'";
}else{
    $sql = "SELECT username, avatar FROM users";
}	

$result = $mysqli->query($sql); //$result = mysqli_result object
while ($row =  $result->fetch_assoc()){
    $_SESSION['avatar'] = $row['avatar'];
    
}?>

<?php
if(isset($_POST['update'])){

      
    $c_image= $_FILES['avatar']['name'];
    $c_image_temp=$_FILES['avatar']['tmp_name'];
    
    
    if($c_image_temp != "")
    {
        move_uploaded_file($_FILES['avatar']['tmp_name'], __DIR__.'/../Signin/images/'. $_FILES["avatar"]['name']);
        $c_update="UPDATE users SET avatar= '$c_image'
        WHERE username = '" . $_SESSION['username'] . "'"; 
        echo "<meta http-equiv='refresh' content='0'>";

    }else
    {
        header("Location: welcome.php");

    }
    mysqli_query($conn, $c_update);
    $_SESSION['avatar'] = $img;
    header("Location: welcome.php");

}
?>
<section style="background-position: center;background-size: cover;background-color: #e1e1e1;">
        <div class="row register-form" style="margin-top: -17px;margin-right: -15px;margin-left: -15px;">
            <div class="col-md-8 offset-md-2">
                <form class="border rounded-0 custom-form" style="padding-right: 0px;padding-left: 0px;margin-right: 0px;margin-left: 0px;margin-top: 0px;padding-top: 0px;background-color: #ffffff;font-family: Montserrat, sans-serif;padding-bottom: 16px;">
                    <div class="shadow-lg" data-bs-parallax-bg="true" style="background-position: center;background-size: cover;padding-top: 28px;background-color: #343a40;background-image: url(&quot;../assets/img/header.gif&quot;);background-repeat: no-repeat;filter: brightness(101%);opacity: 1;padding-bottom: 18px;">
                        <div class="form-row form-group">
                            <div class="col text-right d-flex d-xl-flex justify-content-end align-items-center justify-content-xl-end align-items-xl-center" style="height: -2px;"><a class="fa fa-pencil" data-toggle='modal' data-target='#myModal' href="" style="font-size: 35px;padding-right: 27px;color: rgb(255,255,255);"></a></div>
                        </div>
                        <div class="form-row form-group">
                            <div class="col d-flex d-xl-flex justify-content-center align-items-center justify-content-xl-center align-items-xl-center" style="height: 200px;"><img class="rounded-circle mx-auto" src='../Signin/images/<?= $_SESSION['avatar']?>' width="200" height="200" style="margin-left: 0px;margin-bottom: 30px;"></div>
                        </div>
                        <h1 class="text-center" style="color: rgb(255,255,255);font-size: 49px;padding-bottom: 0px;"><?php echo $fname ?> <?php echo $lname ?></h1>
                        <h1 class="text-center" style="color: rgb(255,255,255);font-size: 15px;padding-bottom: 0px;">Member since: <?php echo $regdate ?>&nbsp;</h1>
                    </div>
                    <div class="border rounded shadow-lg" style="height: auto;margin: 30px;padding: 40px;padding-top: 0px;padding-right: 0px;padding-left: 0px;">
                        <h1 class="text-center" style="padding-top: 10px;padding-bottom: 10px;margin-bottom: 25px;color: rgb(255,255,255);font-size: 30px;background-color: rgb(52,58,64);">Membership Status</h1>
                        <h1 style="font-size: 20px;color: rgb(36,146,47);padding-left: 40px;">Started: <?php echo $appdate ?></h1>
                        <h1 style="font-size: 20px;color: rgb(214,52,42);padding-left: 40px;">Expiration: <?php echo $expdate ?></h1>
                    </div>
                    <div class="border rounded shadow-lg" style="height: auto;margin: 30px;padding: 40px;padding-top: 0px;padding-right: 0px;padding-left: 0px;">
                        <h1 class="text-truncate text-center flex-grow-1 flex-shrink-1 flex-wrap" style="padding-top: 10px;padding-bottom: 10px;margin-bottom: 25px;color: rgb(255,255,255);font-size: 32px;background-color: #343a40;">User Information</h1>
                        <div class="form-row">
                            <div class="col">
                                <h1 class="text-truncate" style="font-size: 17px;color: rgb(0,0,0);padding-left: 40px;"><i class="fa fa-envelope" style="color: rgb(255,193,7);font-size: 30px;"></i>&nbsp;<?php echo $email ?></h1>
                                <h1 style="font-size: 20px;color: rgb(0,0,0);padding-left: 40px;"><i class="fa fa-user" style="color: rgb(255,193,7);font-size: 30px;"></i>&nbsp;<?php echo $gender ?></h1>
                                <h1 style="font-size: 20px;color: rgb(0,0,0);padding-left: 40px;"><i class="fa fa-calendar" style="color: rgb(255,193,7);font-size: 30px;"></i>&nbsp;<?php echo $age ?></h1>
                            </div>
                            <div class="col">
                                <h1 style="font-size: 20px;color: rgb(0,0,0);padding-left: 40px;"><i class="fa fa-phone-square" style="color: rgb(255,193,7);font-size: 30px;"></i>&nbsp;<?php echo $contact ?></h1>
                                <h1 style="font-size: 20px;color: rgb(0,0,0);padding-left: 40px;"><i class="fa fa-map" style="color: rgb(255,193,7);font-size: 30px;padding-bottom: 9px;"></i>&nbsp;<?php echo $address ?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="border rounded shadow-lg" style="height: auto;margin: 30px;padding: 40px;padding-top: 0px;padding-right: 0px;padding-left: 0px;">
                        <h1 class="text-center" style="padding-top: 10px;padding-bottom: 10px;margin-bottom: 25px;color: rgb(255,255,255);font-size: 30px;background-color: #343a40;">Why did you join Jiu-Jitsu?</h1>
                        <h1 class="text-center" style="padding: 20px;padding-top: 0px;font-size: 24px;padding-bottom: 0px;"><?php echo $desc ?>&nbsp;</h1>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <footer style="margin-top:-100px;">
        <div class="container">
            <div class="row">
                <div class="col-md-4 text-center"><span class="copyright" style="font-size: 11px;">Copyright&nbsp;© Deftac Betterliving 2016</span></div>
                <div class="col-md-4">
                    <ul class="text-center list-inline social-buttons">
                        <li class="list-inline-item"><a href="https://bjjasia.com/gym/deftac-better-living/"><i class="fa fa-hand-grab-o" style="margin: 12px;"></i></a></li>
                        <li class="list-inline-item"><a href="https://www.facebook.com/deftacbetterliving/"><i class="fa fa-facebook" style="margin: 12px;"></i></a></li>
                        <li class="list-inline-item"><a href="https://www.instagram.com/deftacbetterliving/"><i class="fa fa-instagram" style="margin: 12px;"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks" style="width: 258px;">
                        <li class="list-inline-item" style="width: 213px;"><a href="#" style="font-size: 12px;"><i class="fa fa-envelope-open"></i>&nbsp; deftacbetterliving@gmail.com</a></li>
                        <li class="list-inline-item"><a href="#" style="font-size: 12px;"><i class="fa fa-vcard"></i>&nbsp; 09054041458</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="../assets/js/agency.js"></script>
    <script src="../assets/js/bs-animation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>

</body>
<script>

$('#myModal').on('show.bs.modal', function (e) {
  
      $(this).find('.modal_delete_link').attr('href', $(e.relatedTarget).data('href'));

  });

</script>


</html>