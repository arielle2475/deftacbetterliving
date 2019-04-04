<?php include "../includes/database.php"; ?>
<?php 
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
    session_destroy();
    header('location: ../Signin/login.php?error=Login to access.');
    }
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>New Member | Deftac Betterliving</title>
    <?php include "includes/header.php"; ?>

  
    </head>
</head>

<body style="background-image: url(&quot;../assets/img/full1.png&quot;);background-size: cover;background-repeat: no-repeat;background-position: center;">
<nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark" id="mainNav" style="padding-top: 10px;padding-bottom: 10px;">
                <div class="container"><a class="navbar-brand" href="welcome.php" style="background-size: contain;"><img class="img-fluid" src="../assets/img/deftacmain.png" width="140px" data-bs-hover-animate="wobble"></a><button class="navbar-toggler navbar-toggler-right" data-toggle="collapse"
                            data-target="#navbarResponsive" type="button" data-toogle="collapse" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                        <div class="collapse navbar-collapse" id="navbarResponsive">
                            <ul class="nav navbar-nav ml-auto text-uppercase" style="margin-top:10px;">
                              <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger active" href="newmember.php">Membership</a></li>
                              <li class="nav-item dropdown" style="opacity: 0.93;" ><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#" style="margin-top: -10px;">MY Account&nbsp;<span class="user"><img width="45px" class="rounded-circle mx-auto" height="45px" src='../Signin/<?= $_SESSION['avatar']?>' </span></a>
                              <div class="dropdown-menu border-dark" role="menu" data-aos="fade-up" data-aos-once="true" style="background-color: rgb(52,58,64);">
                              <div class="nav-item" role="presentation"><a class="nav-link" href="userprofile.php">My Profile</a></>        
                              <div class="nav-item" role="presentation"><a class="nav-link" href="../index.php">Logout</a></>        
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>   

    <section style="padding-top: 200px;padding-left: 200px;padding-right: 200px;padding-bottom: 50px;">
        <form method="POST" action="includes/filldb.php" class="border rounded-0 shadow-lg bootstrap-form-with-validation" data-aos="fade-up" data-aos-duration="500" data-aos-delay="200" data-aos-once="true" style="padding: 53px;background-color: #ffffff;padding-right: 50px;padding-top: 50px;padding-bottom: 50px;padding-left: 50px;">
            <h2 class="text-center">MEMBERSHIP REGISTRATION<br></h2><label class="border-primary" for="text-input"><br><em>The membership costs two thousand five hundred pesos (P2,500.00) and it is good for only one month. If expired, member may renew their membership by paying again.</em><br><br><br></label>
            <div
            class="form-group"><label for="text-input">Firstname</label><input  required="" class="form-control" type="text" name="fname" ></div>
                <div class="form-group"><label for="text-input">Lastname</label><input  required="" class="form-control" type="text" name="lname" ></div>
                <div class="form-group"><label>Gender:</label>
                    <div class="form-check"><input  required="" class="form-check-input" type="radio" name="gender" value="Male" checked=""><label class="form-check-label" for="formCheck-11">Male</label></div>
                    <div class="form-check"><input  required="" class="form-check-input" type="radio" name="gender" value="Female"><label class="form-check-label" for="formCheck-12">Female</label></div>
                </div>
                <div class="form-group"><label for="text-input">Birthday</label><input  placeholder="mm/dd/yy" required="" class="form-control" type="text" name="age" ></div>
                <div class="form-group"><label for="text-input">Home Address</label><input  required="" class="form-control" type="text" name="address" ></div>
                <div class="form-group"><label for="text-input">Contact Number</label><input  required="" class="form-control" type="text" name="contact"></div>
                <div class="form-group"><label for="textarea-input">Why do you want to join?</label><textarea  required="" class="form-control" name="comment"></textarea></div>
                <div class="form-group"><button class="btn btn-primary" type="submit" name="submit">Submit</button></div>
        </form>
    </section>
    <?php include "includes/footer.php"; ?>
