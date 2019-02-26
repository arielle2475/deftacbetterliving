
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

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>My Profile | Deftac Betterliving</title>
<?php include "includes/header.php"?>
</head>

<body style="background-image: url();background-size: cover;background-position: center;">
    <section style="padding-bottom: 45px;background-position: center;background-size: cover;background-image: url();">
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
        <input type="file" name="avatar" value="<?php echo $_SESSION['avatar']; ?>"  /> <span class="user"><img src='../Signin/<?= $_SESSION['avatar']?>' width="250" height="250"</span><br/>
        <td colspan="2"><input type="submit" name="update" value="Update Avatar"/></td>
        <div class="form-group"><label>Username</label></div>
        <input type="text" name="username" value="<?echo $_SESSION['Firstname'] = $name ?>" class="form-control" readonly>
            <label>Firstname</label>
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
            <button style="margin-top:30px;"class="btn btn-primary form-btn" type="submit">EDIT</button>
</div>
    </section>
 
    <div class="form-group"><label>Username</label></div>   
        <input type="text" name="username" value="<?php echo $_SESSION['username'] ?>" required="required" pattern="^[a-zA-Z0-9]+$" placeholder="Enter First Name" class="form-control">
          
            <div class="form-group"><label>Firstname</label></div>
            <input type="text" name="u_fname" value="<?php echo $fname; ?>" required="required" pattern="^[a-zA-Z_ ]+$" placeholder="Enter First Name" class="form-control">
            <div class="form-group"><label>Lastname</label></div>
            <input type="text" name="u_lname" value="<?php echo $lname ?>" required="required" pattern="^[a-zA-Z]+$" placeholder="Enter Last Name" class="form-control">
            <div class="form-group"><label>Email</label></div>
            <input type="email" name="email" value="<?php echo $email ?>" required="required" placeholder="Enter Email" class="form-control">



            <div class="form-group"><label>Gender</label></div>
            <input type="text" name="u_gender" value="<?php echo $gender ?>" required="required" pattern="^[a-zA-Z]+$" placeholder="Enter Gender" class="form-control">

            <div class="form-group"><label>Age</label></div>
            <input type="text" name="u_age" value="<?php echo $age ?>" required="required" pattern="^[0-9]+$" placeholder="Enter Age" class="form-control">

            <div class="form-group"><label>Address</label></div>
            <input type="text" name="u_address" value="<?php echo $address ?>"  required="required" placeholder="Enter Address" class="form-control">

            <div class="form-group"><label>Contact</label></div>
            <input type="text" name="u_contact" value="<?php echo $contact ?>"  required="required" pattern="^[\d\(\)\-+]+$" placeholder="Enter Contact" class="form-control">
            <div class="form-group"><label>Why did you join?</label></div>
            <input type="text" name="u_joindesc" value="<?php echo $desc ?>" required="required" pattern="^[a-zA-Z\._ ]+$" placeholder="" class="form-control">
            <button style="margin-top:30px;" class="btn btn-primary form-btn" name="submit" type="submit">Change</button></div>
    
<nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark" id="mainNav" style="padding-top: 10px;padding-bottom: 10px;">
                <div class="container"><a class="navbar-brand" href="welcome.php" style="background-size: contain;"><img class="img-fluid" src="../assets/img/deftacmain.png" width="140px" data-bs-hover-animate="wobble"></a><button class="navbar-toggler navbar-toggler-right" data-toggle="collapse"
                            data-target="#navbarResponsive" type="button" data-toogle="collapse" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                        <div class="collapse navbar-collapse" id="navbarResponsive">
                            <ul class="nav navbar-nav ml-auto text-uppercase" style="margin-top:10px;">
                              <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger active" href="welcome.php">Home</a></li>
                              <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="bloghome.php">Blog</a></li>
                              <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="gallery.php">Gallery</a></li>
                              <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="coaches.php">Coaches</a></li>
                              <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="index.php">CHAt</a></li>
                              <li class="nav-item dropdown" style="opacity: 0.93;" ><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#" style="margin-top: -10px;">MY Account&nbsp;<span class="user"><img width="45px" class="rounded-circle mx-auto" height="45px" src='../Signin/<?= $_SESSION['avatar']?>' </span></a>
                              <div class="dropdown-menu border-dark" role="menu" data-aos="fade-up" data-aos-once="true" style="background-color: rgb(52,58,64);margin-right: 60px;opacity: 1;padding-top: -5px;margin-top: -15px;">
                                        <a class="dropdown-item" role="presentation" href="userprofile.php" style="font-family: Montserrat, sans-serif;color: rgb(255,255,255);">My profile</a>
                                           <a class="dropdown-item" role="presentation" href="editprofile.php" style="font-family: Montserrat, sans-serif;color: rgb(255,255,255);">EDIT PROFILE</a>
                                        <a class="dropdown-item" role="presentation" href="../index.php" style="font-family: Montserrat, sans-serif;color: rgb(255,255,255);">Logout</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

    <?php include "includes/footer.php"?>

</body>

</html>