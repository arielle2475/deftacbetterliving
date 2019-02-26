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
    <title>Edit Profile | Deftac Betterliving</title>
    <?php include "includes/header.php"; ?>

  
    </head>
</head>

<body style="background-color: #dfdfdf">
<nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark" id="mainNav" style="padding-top: 10px;padding-bottom: 10px;">
                <div class="container"><a class="navbar-brand" href="welcome.php" style="background-size: contain;"><img class="img-fluid" src="../assets/img/deftacmain.png" width="140px" data-bs-hover-animate="wobble"></a><button class="navbar-toggler navbar-toggler-right" data-toggle="collapse"
                            data-target="#navbarResponsive" type="button" data-toogle="collapse" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                        <div class="collapse navbar-collapse" id="navbarResponsive">
                            <ul class="nav navbar-nav ml-auto text-uppercase" style="margin-top:10px;">
                              <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="newmember.php">Membership</a></li>
                              <li class="nav-item dropdown" style="opacity: 0.93;" ><a class="dropdown-toggle nav-link active" data-toggle="dropdown" aria-expanded="false" href="#" style="margin-top: -10px;">MY Account&nbsp;<span class="user"><img width="45px" class="rounded-circle mx-auto" height="45px" src='../Signin/<?= $_SESSION['avatar']?>' </span></a>
                              <div class="dropdown-menu border-dark" role="menu" data-aos="fade-up" data-aos-once="true" style="background-color: rgb(52,58,64);">
                              <div class="nav-item" role="presentation"><a class="nav-link" href="userprofile.php">My Profile</a></>        
                              <div class="nav-item" role="presentation"><a class="nav-link active" href="editprofile.php">Edit Profile</a></>        
                              <div class="nav-item" role="presentation"><a class="nav-link" href="../index.php">Logout</a></>        
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>   
    <section style="padding-bottom: 45px;">
        <div class="container border rounded shadow-lg profile profile-view" data-aos="fade-up" data-aos-delay="100" data-aos-once="true" id="profile" style="padding-right: 30px;padding-left: 30px;font-family: Montserrat, sans-serif;padding-bottom: 30px;padding-top: 30px;background-color: #ffffff;">
            <div class="row">
                <div class="col-md-12 alert-col relative">
                    <div class="alert alert-info absolue center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><span>Profile save with success</span></div>
                </div>
            </div>
            <form>
                <div class="form-row profile-row">
                    <div class="col-md-4 relative">
                        <div class="avatar">
                            <div class="avatar-bg center"></div>
                        </div><input type="file" class="form-control" name="avatar-file" style="margin-bottom: 0;padding-top: 4px;padding-bottom: 15px;"></div>
                    <div class="col-md-8">
                        <h1>Edit Profile</h1>
                        <hr>
                        <div class="form-row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group"><label>Name</label><input class="form-control" type="password" placeholder="Full Name" name="password" autocomplete="off" required=""></div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group"><label>Email</label><input class="form-control" type="password" placeholder="Email" name="password" autocomplete="off" required=""></div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group"><label>Password </label><input class="form-control" type="password" placeholder="Password" name="password" autocomplete="off" required=""></div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group"><label>Confirm Password</label><input class="form-control" type="password" placeholder="Confirm Password" name="confirmpass" autocomplete="off" required=""></div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="col-md-12 content-right"><button class="btn btn-primary form-btn" type="submit">SAVE </button><button class="btn btn-danger form-btn" type="reset">CANCEL </button></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <?php include "includes/footer.php"; ?>
