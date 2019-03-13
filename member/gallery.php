
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
        <h1 data-aos="fade-up"  data-aos-delay="50" data-aos-once="true">DEFTAC VIDEOS</h1>
        <hr data-aos="fade-up"  data-aos-delay="50" data-aos-once="true" class="d-xl-flex" style="height: 2px;color: rgb(124,165,205);background-color: #000000;width: auto;margin-left: 250px;margin-right: 250px;">
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
            <hr class="d-xl-flex" style="height: 2px;color: rgb(124,165,205);background-color: #000000;width: auto;margin-left: 250px;margin-right: 250px;">
        </div>
    </div>

    <section class="py-5" style="margin-top: 89px;background-color: #ffffff;">
        <div class="container">
        <h1 data-aos="fade-up" data-aos-duration="500" data-aos-delay="50" data-aos-once="true" class="text-center">DEFTAC GALLERY</h1>
        <hr data-aos="fade-up" data-aos-duration="500" data-aos-delay="50" data-aos-once="true" class="d-xl-flex" style="height: 2px;color: rgb(124,165,205);background-color: #000000;width: auto;margin-left: 250px;margin-right: 250px;">
<br>                    
<center> 
<div data-aos="fade-up" data-aos-duration="500" data-aos-delay="100" data-aos-once="true" class="gallery">



<?php
include_once('includes/database.php');//Include the database connection

//////FIRST WE SET UP THE TOTAL images PER PAGE & CALCULATIONS:
$per_page = 6;// Number of images per page, change for a different number of images per page

// Get the page and offset value:
if (isset($_GET['page'])) {
$page = $_GET['page'] - 1;
$offset = $page * $per_page;
}
else {
$page = 0;
$offset = 0;
} 

// Count the total number of images in the table ordering by their id's ascending:
$images = "SELECT count(image_id) FROM tbl_image ORDER by image_id ASC";
$result = mysqli_query($connection, $images);

$row = mysqli_fetch_array($result);
$total_images = $row[0];

// Calculate the number of pages:
if ($total_images > $per_page) {//If there is more than one page
$pages_total = ceil($total_images / $per_page);
$page_up = $page + 2;
$page_down = $page;
$display ='';//leave the display variable empty so it doesn't hide anything
} 
else {//Else if there is only one page
$pages = 1;
$pages_total = 1;
$display = ' class="display-none"';//class to hide page count and buttons if only one page
} 

////// THEN WE DISPLAY THE PAGE COUNT AND BUTTONS:
echo '<h5'.$display.'>Page '; echo $page + 1 .' of '.$pages_total.'</h5>';//Page out of total pages

// DISPLAY THE images:
//Select the images from the table limited as per our $offet and $per_page total:
$result = mysqli_query($connection, "SELECT * FROM tbl_image ORDER by image_id ASC LIMIT $offset, $per_page");

while($row = mysqli_fetch_array($result)) {//Open the while array loop

//Define the image variable:
$image=$row['image_name'];


echo '<a href="../admin/files/'.$image.'" data-fancybox="gallery" data-caption='.$image.'>';
echo '<img style="width:300px; height:210px; margin:10px;"  src="../admin/files/'.$image.'">';
echo '</a>';


}//Close the while array loop

echo '</div>';// Gallery end

echo '<div class="clearfix"></div>';// Gallery end


echo'<hr data-aos="fade-up" data-aos-duration="500" data-aos-delay="50" data-aos-once="true" class="d-xl-flex" style="height: 2px;color: rgb(124,165,205);background-color: #000000;width: auto;margin-left: 250px;margin-right: 250px;">';

$i = 1;//Set the $i counting variable to 1

echo '<br><div data-aos="fade-up" data-aos-duration="500" data-aos-delay="50" data-aos-once="true" id="pageNav"'.$display.'>';//our $display variable will do nothing if more than one page

// Show the page buttons:
if ($page) {
echo '  <div class="btn-group mr-2" role="group" aria-label="First group">
<a href="gallery.php"><button  class="btn btn-outline-dark" style="color="black; padding:5px;"><<</button></a>';//Button for first page [<<]
echo '<a href="gallery.php?page='.$page_down.'"><button  class="btn btn-outline-dark"><</button></a>';//Button for previous page [<]
} 

for ($i=1;$i<=$pages_total;$i++) {
if(($i==$page+1)) {
echo '<a href="gallery.php?page='.$i.'"><button  class="btn btn-outline-dark active">'.$i.'</button></a>';//Button for active page, underlined using 'active' class
}

//In this next if statement, calculate how many buttons you'd like to show. You can remove to show only the active button and first, prev, next and last buttons:
if(($i!=$page+1)&&($i<=$page+3)&&($i>=$page-1)) {//This is set for two below and two above the current page
echo '<a href="gallery.php?page='.$i.'"><button  class="btn btn-outline-dark">'.$i.'</button></a>'; }
} 

if (($page + 1) != $pages_total) {
echo '<a href="gallery.php?page='.$page_up.'"><button  class="btn btn-outline-dark">></button></a>';//Button for next page [>]
echo '<a href="gallery.php?page='.$pages_total.'"><button  class="btn btn-outline-dark">>></button></a>';//Button for last page [>>]
}
echo "</div></div";// #pageNav end
?>
<div id="pagination"><!-- #pagination start -->


</div>






</center>
        </div>
    </section>
    <?php include "includes/footer.php"; ?>

