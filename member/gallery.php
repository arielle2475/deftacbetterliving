
<?php include "includes/database.php"; ?>
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
    <title>Gallery | Deftac Betterliving</title>
    <?php include "includes/header.php"; ?>
    <script src="//code.jquery.com/jquery-3.3.1.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.css" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.js"></script>

  <style>
.gallery img {
    width: 20%;
    height: auto;
    border-radius: 5px;
    cursor: pointer;
    transition: .3s;
}
      </style>
    
</head>

<body>
<nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark" id="mainNav" style="padding-top: 10px;padding-bottom: 10px;">
                <div class="container"><a class="navbar-brand" href="welcome.php" style="background-size: contain;"><img class="img-fluid" src="../assets/img/deftacmain.png" width="140px" data-bs-hover-animate="wobble"></a><button class="navbar-toggler navbar-toggler-right" data-toggle="collapse"
                            data-target="#navbarResponsive" type="button" data-toogle="collapse" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                        <div class="collapse navbar-collapse" id="navbarResponsive">
                            <ul class="nav navbar-nav ml-auto text-uppercase" style="margin-top:10px;">
							<li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="welcome.php">Home</a></li>
                              <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="bloghome.php">Blog</a></li>
                              <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger active" href="gallery.php">Gallery</a></li>
                              <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="coaches.php">Coaches</a></li>
							  <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="index.php">CHAt</a></li>                             
							 <li class="nav-item dropdown" style="opacity: 0.93;" ><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#" style="margin-top: -10px;">MY Account&nbsp;<span class="user"><img width="45px" class="rounded-circle mx-auto" height="45px" src='../Signin/<?= $_SESSION['avatar']?>' </span></a>
                              <div class="dropdown-menu border-dark" role="menu" data-aos="fade-up" data-aos-once="true" style="background-color: rgb(52,58,64);">
                              <div class="nav-item" role="presentation"><a class="nav-link" href="userprofile.php">My Profile</a></>        
                              <div class="nav-item" role="presentation"><a class="nav-link" href="editprofile.php">Edit Profile</a></>        
                              <div class="nav-item" role="presentation"><a class="nav-link" href="logout.php">Logout</a></>        
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>   
                <div class="header-blue" style="background-image: url(&quot;../assets/img/bg.gif&quot;);background-position: center;background-size: cover;background-repeat: no-repeat;">
           <div class="container hero">
                <div class="row" style="margin-top: 80px;">
                    <div class="col-12 col-lg-6 col-xl-5 offset-xl-1" style="margin-top: 29px;">
                        <h1  data-aos="fade-up" data-aos-delay="50" data-aos-once="true" style="font-family: Montserrat, sans-serif;font-weight: bold;font-size: 54px;color: rgb(254,209,54);"><strong>FAMILY AS ONE</strong><br></h1>
                        <p  data-aos="fade-up" data-aos-delay="100" data-aos-once="true" style="font-size: 18px;font-weight: 500;font-family: Montserrat, sans-serif;">Take a trip down memory lane and know your history with our gallery!<br></p></div>
                    <div class="col-md-5 col-lg-5 offset-lg-1 offset-xl-0 d-none d-lg-block phone-holder">
                        <div class="iphone-mockup"></div>
                    </div>
                </div>
            </div>
        </div>
    <div class="container-fluid text-center" id="dqv" style="padding-top: 85px;background-color: #dfdfdf;padding-bottom: 70px;">
        <h1 data-aos="fade-up"  data-aos-delay="50" data-aos-once="true" style="padding-bottom: 40px;">DEFTAC VIDEOS</h1>
        <div class="row d-xl-flex justify-content-xl-center" style="margin-right: -50px;margin-left: -50px;padding-top: 0px;padding-right: 0px;">
            <div class="col-sm-8 col-md-7 col-lg-6">
                <div id="video-placeholder"><img class="img-fluid" src="../assets/img/video_place_holder.jpg"></div>
                <div class="row">
                    <div class="col-sm-7 col-md-6 col-lg-6 controls"><i class="material-icons" id="prev">skip_previous</i><i class="material-icons" id="pause">pause</i><i class="material-icons" id="play">play_arrow</i><i class="material-icons" id="next">skip_next</i><i class="material-icons" id="mute-toggle">volume_up</i>
                        <input
                            type="range" min="0" max="100" step="1" id="volume-input" class="dqv-range vol">
                            <div>
                                <div class="dqv-range dur"><span id="current-time">0:00</span><span> / </span><span id="duration">0:00</span></div>
                            </div>
                    </div>
                    <div class="col-sm-5 col-md-6 col-lg-6 controls"><input type="range" value="0" id="progress-bar" class="dqv-range prog"></div>
                    <div class="col-md-12"><select class="form-control-sm d-none" id="speed"><optgroup label="This is a group"><option value="12" selected="">This is item 1</option><option value="13">This is item 2</option><option value="14">This is item 3</option></optgroup></select></div>
                </div>
            </div>
            <div class="col-sm-4 col-md-3 col-lg-2">
                <div class="row">
                    <div class="col-sm-10 col-md-10 col-lg-12 vids"><img class="img-fluid thumbnail" src="../assets/img/video_place_holder.jpg" data-video-id="Xa0Q0J5tOP0"><img class="img-fluid thumbnail" src="../assets/img/cat_video_1.jpg" data-video-id="h14wr4pXZFk"><img class="img-fluid thumbnail" src="../assets/img/cat_video_2.jpg" data-video-id="KkFnm-7jzOA">
                        <img
                            class="img-fluid thumbnail" src="../assets/img/cat_video_3.jpg" data-video-id="Ph77yOQFihc"></div>
                </div>
            </div>
        </div>
    </div>
    <section class="py-5" style="margin-top: 89px;background-color: #ffffff;">
        <div class="container">
        <h1  data-aos="fade-up" data-aos-duration="500" data-aos-delay="50" data-aos-once="true" class="text-center">DEFTAC GALLERY</h1>
<br>        <center> 
<div data-aos="fade-up" data-aos-duration="500" data-aos-delay="100" data-aos-once="true" class="gallery">
    <?php
    // Include database configuration file
    require 'database_connection.php';
    
    // Retrieve images from the database
    $query = $db->query("SELECT * FROM tbl_image");
    
    if($query->num_rows > 0){
        while($row = $query->fetch_assoc()){
            $imageURL = '../admin/files/'.$row["image_name"];
    ?>
        <a href="<?php echo $imageURL; ?>" data-fancybox="gallery" data-caption="<?php echo $row["image_name"]; ?>" >
           <img style="width:300px; height:210px; margin:10px;" src="<?php echo $imageURL; ?>" alt="" />
        </a>
    <?php }
    } ?>
</div>
</center>
        </div>
    </section>
    <?php include "includes/footer.php"; ?>
