<?php include "includes/database.php"; ?>
<?php 
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
    session_destroy();
    header('location: ../Signin/login.php?error=Login to access.');
    }
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>User Profile | Deftac Betterliving</title>
    <?php include "includes/header.php"; ?>

  
    </head>
</head>

<body style="background-image: url(&quot;assets/img/bg2.jpg&quot;);background-size: cover;background-position: center;">
    <section style="padding-bottom: 45px;background-position: center;background-size: cover;background-image: url(assets/img/bg2.png);">
        <div class="container border rounded shadow-lg profile profile-view" id="profile" style="padding-right: 50px;padding-left: 50px;font-family: Montserrat, sans-serif;padding-bottom: 30px;padding-top: 30px;width: 617px;margin-top: 28px;background-color: #ffffff;">
            <h1>My Profile</h1>
            <div class="avatar-bg center"></div>
            <div class="form-group"><label>Username</label></div>
            <div class="form-group"><label>Firstname</label></div>
            <div class="form-group"><label>Lastname</label></div>
            <div class="form-group"><label>Gender</label></div>
            <div class="form-group"><label>Age</label></div>
            <div class="form-group"><label>Address</label></div>
            <div class="form-group"><label>Contact</label></div><button class="btn btn-primary form-btn" type="submit">EDIT</button></div>
    </section>
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark" id="mainNav" style="padding-top: 10px;padding-bottom: 10px;">
                <div class="container"><a class="navbar-brand" href="welcome.php" style="background-size: contain;"><img class="img-fluid" src="../assets/img/deftacmain.png" width="140px" data-bs-hover-animate="wobble"></a><button class="navbar-toggler navbar-toggler-right" data-toggle="collapse"
                            data-target="#navbarResponsive" type="button" data-toogle="collapse" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                        <div class="collapse navbar-collapse" id="navbarResponsive">
                            <ul class="nav navbar-nav ml-auto text-uppercase" style="margin-top:10px;">
							<li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="welcome.php">Home</a></li>
                              <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="bloghome.php">Blog</a></li>
                              <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="gallery.php">Gallery</a></li>
                              <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="coaches.php">Coaches</a></li>
							  <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="index.php">CHAt</a></li>                             
							 <li class="nav-item dropdown" style="opacity: 0.93;" ><a class="dropdown-toggle nav-link active" data-toggle="dropdown" aria-expanded="false" href="#" style="margin-top: -10px;">MY Account&nbsp;<span class="user"><img width="45px" class="rounded-circle mx-auto" height="45px" src='../Signin/<?= $_SESSION['avatar']?>' </span></a>
                              <div class="dropdown-menu border-dark" role="menu" data-aos="fade-up" data-aos-once="true" style="background-color: rgb(52,58,64);">
                              <div class="nav-item" role="presentation"><a class="nav-link active" href="userprofile.php">My Profile</a></>        
                              <div class="nav-item" role="presentation"><a class="nav-link" href="editprofile.php">Edit Profile</a></>        
                              <div class="nav-item" role="presentation"><a class="nav-link" href="../index.php">Logout</a></>        
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>   
    <?php include "includes/footer.php"; ?>
