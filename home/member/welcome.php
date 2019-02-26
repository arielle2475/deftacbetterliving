<?php 
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
  session_destroy();
  header('location: ../Signin/login.php?error=Login to access chat.');
  }
?>

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
    header( "Location: renewal.php" );die;
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

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Untitled</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/fonts/material-icons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="assets/css/-Filterable-Gallery-with-Lightbox-BS4-.css">
    <link rel="stylesheet" href="assets/css/Article-Dual-Column.css">
    <link rel="stylesheet" href="assets/css/Bold-BS4-CSS-Image-Slider.css">
    <link rel="stylesheet" href="assets/css/Calendar-BS4.css">
    <link rel="stylesheet" href="assets/css/Features-Clean.css">
    <link rel="stylesheet" href="assets/css/Header-Blue.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <link rel="stylesheet" href="assets/css/Lightbox-Gallery.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="assets/css/Dynamically-Queue-Videos.css">
    <link rel="stylesheet" href="assets/css/Pretty-User-List.css">
    <link rel="stylesheet" href="assets/css/Pretty-Footer.css">
    <link rel="stylesheet" href="assets/css/Pretty-Registration-Form.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/Profile-Edit-Form.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/Swipe-Slider-7.css">
    <link rel="stylesheet" href="assets/css/Swipe-Slider-9.css">
    <link rel="stylesheet" href="assets/css/Swiper-Slider-Card-For-Blog-Or-Product.css">
    <link rel="stylesheet" href="assets/css/Team-with-rotating-cards.css">
    <link rel="stylesheet" href="assets/css/Video-Responsive.css">
</head>

<body style="background-image: url(&quot;assets/img/bg2.jpg&quot;);background-size: cover;background-position: center;">
    <section style="padding-bottom: 45px;background-position: center;background-size: cover;background-image: url(assets/img/bg2.png);">
        <div class="container border rounded shadow-lg profile profile-view" id="profile" style="padding-right: 50px;padding-left: 50px;font-family: Montserrat, sans-serif;padding-bottom: 30px;padding-top: 30px;width: 617px;margin-top: 28px;background-color: #ffffff;">
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

}


?>
<?php
$mysqli = new mysqli('localhost', 'root', "" , 'thesis');
if(isset($_SESSION['username'])){
    $sql = "SELECT username, avatar FROM users WHERE username='".$_SESSION["username"]."'";
}else{
    $sql = "SELECT username, avatar FROM usrrs";
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
    }else
    {
    
    }
    
    mysqli_query($conn, $c_update);
    $_SESSION['avatar'] = $img;
    header("Location: welcome.php");

}
?>


        <h1>My Profile</h1>
        <!-- UPDATE AVATAR -->
        <form action="" method="post" enctype="multipart/form-data"/>
        <br>
        <input type="file" name="avatar" value="<?php echo $_SESSION['avatar']; ?>"  /> <span class="user"><img src='../Signin/images/<?= $_SESSION['avatar']?>' width="250" height="250"</span><br/>
        <td colspan="2"><input type="submit" name="update" value="Update Avatar"/></td>
        <div class="form-group"><label>Username</label></div>
        <input type="text" name="username" value="<?echo $_SESSION['Firstname'] = $name ?>" class="form-control" readonly>
            <div class="form-group"><label>Firstname</label></div>
            <input type="text" name="u_fname" value="<?php echo $fname ?>" class="form-control" readonly>
            <div class="form-group"><label>Lastname</label></div>
            <input type="text" name="u_lname" value="<?php echo $lname ?>" class="form-control" readonly>
            <div class="form-group"><label>Email</label></div>
            <input type="email" name="u_email" value="<?php echo $email ?>" class="form-control" readonly>
            <div class="form-group"><label>Gender</label></div>
            <input type="text" name="u_gender" value="<?php echo $gender ?>" class="form-control" readonly>
            <div class="form-group"><label>Age</label></div>
            <input type="text" name="u_age" value="<?php echo $age ?>" class="form-control" readonly>
            <div class="form-group"><label>Address</label></div>
            <input type="text" name="u_address" value="<?php echo $address ?>" class="form-control" readonly>
            <div class="form-group"><label>Contact</label></div>
            <input type="text" name="u_contact" value="<?php echo $contact ?>" class="form-control" readonly>
            <div class="form-group"><label>Why did you join?</label></div>
            <input type="text" name="u_joindesc" value="<?php echo $desc ?>" class="form-control" readonly>

</div><button class="btn btn-primary form-btn" type="submit">EDIT</button></div>
    </section>
 
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark" id="mainNav" style="opacity: 1;">
        <div class="container"><a class="navbar-brand" href="#page-top" style="background-size: contain;"><img class="img-fluid" src="assets/img/deftacmain.png" width="140px" data-bs-hover-animate="wobble"></a><button class="navbar-toggler navbar-toggler-right" data-toggle="collapse"
                data-target="#navbarResponsive" type="button" data-toogle="collapse" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto text-uppercase">
                    <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="#team">Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="newmember.html">Membership</a></li>
                    <li class="nav-item dropdown" style="opacity: 0.93;"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">MY Account</a>
                        <div class="dropdown-menu" role="menu" style="background-color: rgb(33,37,41);"><a class="dropdown-item" role="presentation" href="editprofile.php" style="font-family: Montserrat, sans-serif;color: rgb(255,255,255);">EDIT PROFILE</a><a class="dropdown-item" role="presentation" href="logout.php" style="font-family: Montserrat, sans-serif;color: rgb(255,255,255);">Logout</a></div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="assets/js/-Filterable-Gallery-with-Lightbox-BS4-.js"></script>
    <script src="assets/js/agency.js"></script>
    <script src="assets/js/bs-animation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="assets/js/Dynamically-Queue-Videos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
    <script src="https://www.youtube.com/iframe_api"></script>
    <script src="assets/js/Profile-Edit-Form.js"></script>
    <script src="assets/js/SlideShow.js"></script>
    <script src="assets/js/Swipe-Slider-9.js"></script>
    <script src="assets/js/Swiper-Slider-Card-For-Blog-Or-Product.js"></script>
</body>

</html>