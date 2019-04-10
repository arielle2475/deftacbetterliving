<?php 
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
  session_destroy();
  header('location: ../Signin/login.php?error=Login to access chat.');
  }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Untitled</title>
   <?php include "includes/header.php" ?>
</head>

<body style="background-image: url(&quot;assets/img/bg2.jpg&quot;);background-size: cover;background-position: center;">
<nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark" id="mainNav" style="padding-top: 10px;padding-bottom: 10px;">
                <div class="container"><a class="navbar-brand" href="welcome.php" style="background-size: contain;"><img class="img-fluid" src="../assets/img/deftacmain.png" width="140px" data-bs-hover-animate="wobble"></a><button class="navbar-toggler navbar-toggler-right" data-toggle="collapse"
                            data-target="#navbarResponsive" type="button" data-toogle="collapse" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                        <div class="collapse navbar-collapse" id="navbarResponsive">
                            <ul class="nav navbar-nav ml-auto text-uppercase" style="margin-top:10px;">
                            <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="home.php">Home</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="welcome.php">Events</a></li>
                              <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="bloghome.php">Blog</a></li>
                              <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="gallery.php">Gallery</a></li>
                              <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="coaches.php">Coaches</a></li>
							  <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="index.php">CHAt</a></li>                             
							 <li class="nav-item dropdown" style="opacity: 0.93;" ><a class="dropdown-toggle nav-link active" data-toggle="dropdown" aria-expanded="false" href="#" style="margin-top: -10px;">MY Account&nbsp;<span class="user"><img width="45px" class="rounded-circle mx-auto" height="45px" src='../Signin/<?= $_SESSION['avatar']?>' </span></a>
                              <div class="dropdown-menu border-dark" role="menu" data-aos="fade-up" data-aos-once="true" style="background-color: rgb(52,58,64);">
                              <div class="nav-item" role="presentation"><a class="nav-link " href="userprofile.php">My Profile</a></>        
                              <div class="nav-item" role="presentation"><a class="nav-link active" href="editprofile.php">Edit Profile</a></>        
                              <div class="nav-item" role="presentation"><a class="nav-link" href="../index.php">Logout</a></>        
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>   
    <section style="padding-bottom: 45px;background-position: center;background-size: cover;background-image: url(assets/img/bg2.png);">
        <div class="container border rounded shadow-lg profile profile-view" id="profile" style="padding-right: 50px;padding-left: 50px;font-family: Montserrat, sans-serif;padding-bottom: 30px;padding-top: 30px;width: 617px;margin-top: 28px;background-color: #ffffff;">
        <?php
        include "config.php";

        $query="SELECT*
        FROM users
        INNER JOIN mfillup ON users.username= mfillup.username WHERE users.username = '" . $_SESSION['username'] . "'";

        $run = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($run, MYSQLI_BOTH)) {
            $name = $row['username'];
        $gender = $row['u_gender'];
        $lname = $row['u_lname'];
        $fname = $row['u_fname'];
        $age = $row['u_age'];
        $address = $row['u_address'];
        $contact = $row['u_contact'];
        $desc = $row['u_joindesc'];
        $email = $row['email'];

        }
        ?>
        <?php
        $mysqli = new mysqli('localhost', 'root', "" , 'thesis');
        $sql = 'SELECT username, avatar FROM users';
        $result = $mysqli->query($sql); 
        
        ?>

        <h1>Edit Profile</h1>
     
        <form method="POST" action="edit.php">
        
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
            <input type="text" name="u_joindesc" value="<?php echo $desc ?>" required="required" pattern="^[a-zA-Z\.!_ ]+$" placeholder="" class="form-control">
            <button style="margin-top:30px;" class="btn btn-primary form-btn" name="submit" type="submit">Change</button></div>
</div>
</form>
    </section>
 
   
    <?php include "includes/footer.php" ?>


</html>