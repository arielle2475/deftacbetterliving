<?php 
include 'config.php';
include 'action.php';
session_start();
	if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
		session_destroy();
		header('location: ../Signin/login.php?error=Login to access.');
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
<html>
<head>
<title>Deftac Betterliving | Account</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<?php include "includes/header.php"; ?>

<link href="../assets/css/fullcalendar.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" href="../assets/css/Swipe-Slider-9.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
  <script>
   
  $(document).ready(function() {
   var calendar = $('#calendar').fullCalendar({
    editable:true,
    header:{
     left:'prev,next today',
     center:'title',
     right:'month,agendaWeek,agendaDay'
    },
    events: '../admin/includes/load.php',
    selectable:true,
    selectHelper:true,
    select: function(start, end, allDay)
    {
  //   var title = prompt("Enter Event Title");
     if(title)
     {
      var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
      var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
      $.ajax({
   //    url:"insert.php",
       type:"POST",
       data:{title:title, start:start, end:end},
       success:function()
       {
        calendar.fullCalendar('refetchEvents');
        alert("Added Successfully");
       }
      })
     }
    },
    editable:true,
    eventResize:function(event)
    {
     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
     var title = event.title;
     var id = event.id;
     $.ajax({
      url:"update.php",
      type:"POST",
      data:{title:title, start:start, end:end, id:id},
      success:function(){
       calendar.fullCalendar('refetchEvents');
       alert('Event Update');
      }
     })
    },

    eventDrop:function(event)
    {
     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
     var title = event.title;
     var id = event.id;
     $.ajax({
  //    url:"update.php",
      type:"POST",
      data:{title:title, start:start, end:end, id:id},
      success:function()
      {
       calendar.fullCalendar('refetchEvents');
  //     alert("Event Updated");
      }
     });
    },

    eventClick:function(event)
    {
  //   if(confirm("Are you sure you want to remove it?"))
     {
      var id = event.id;
      $.ajax({
   //    url:"delete.php",
       type:"POST",
       data:{id:id},
       success:function()
       {
        calendar.fullCalendar('refetchEvents');
    //    alert("Event Removed");
       }
      })
     }
    },

   });
  });
   
  </script>
 
 
</head><body style="font-family: Montserrat, sans-serif;">
<nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark" id="mainNav" style="padding-top: 10px;padding-bottom: 10px;">
                <div class="container"><a class="navbar-brand" href="welcome.php" style="background-size: contain;"><img class="img-fluid" src="../assets/img/deftacmain.png" width="140px" data-bs-hover-animate="wobble"></a><button class="navbar-toggler navbar-toggler-right" data-toggle="collapse"
                            data-target="#navbarResponsive" type="button" data-toogle="collapse" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                        <div class="collapse navbar-collapse" id="navbarResponsive">
                            <ul class="nav navbar-nav ml-auto text-uppercase" style="margin-top:10px;">
							<li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger active" href="welcome.php">Home</a></li>
                              <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="bloghome.php">Blog</a></li>
                              <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="gallery.php">Gallery</a></li>
                              <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="coaches.php">Coaches</a></li>
							  <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger " href="index.php">CHAt</a></li>                             
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

    <section style="padding-bottom: -10px;padding-top: 60px;height: 622px;font-family: Montserrat;"><!-- Paradise Slider -->
	<div id="fw_al_007" class="carousel ps_rotate_scale_c ps_indicators_l ps_control_rotate_f swipe_x ps_easeOutQuint" data-ride="carousel" data-pause="hover" data-interval="5000" data-duration="2000">

		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#fw_al_007" data-slide-to="0" class="active"></li>
			<li data-target="#fw_al_007" data-slide-to="1"></li>
			<li data-target="#fw_al_007" data-slide-to="2"></li>
			<li data-target="#fw_al_007" data-slide-to="3"></li>
			<li data-target="#fw_al_007" data-slide-to="4"></li>
			
		</ol>

		<!-- Wrapper For Slides -->
		<div class="carousel-inner" role="listbox">

			<!-- First Slide -->
			<div class="carousel-item active">

				<!-- Slide Background -->
				<img src="../assets/img/fw_al_007_01.jpg" alt="fw_al_007_01">

				<!-- Slide Text Layer -->
				<div class="fw_al_007_slide">
					<h3 data-animation="animated flipInX">Deftac Betterliving</h3>
					<h2 style="color:white; font-size:50px;" data-animation="animated flipInX">Welcome, <span class="user"><?= $_SESSION['username'] ?></span>!</h2>
					<h5 style="color:white;" data-animation="animated flipInX">Check out our calendar for upcoming events!</h5>
					<a class="js-scroll-trigger" href="#cal" data-animation="animated flipInX">read more</a>
				</div>
			</div>
			<!-- End of Slide -->

			<!-- Second Slide -->
			<div class="carousel-item">

				<!-- Slide Background -->
				<img src="../assets/img/fw_al_007_02.jpg" alt="fw_al_007_02">

				<!-- Slide Text Layer -->
				<div class="fw_al_007_slide">
					<h3 data-animation="animated flipInX">BLOG</h3>
					<h2 style="color:white; font-size:50px;" data-animation="animated flipInX">Check out our blogs!</h2>
					<h5 style="color:white;" data-animation="animated flipInX">Read the latest blog posts that are originally created by us!</h5>
					<a class="js-scroll-trigger" href="bloghome.php" data-animation="animated flipInX">read more</a>
				</div>
			</div>
			<!-- End of Slide -->

			<!-- Third Slide -->
			<div class="carousel-item">

				<!-- Slide Background -->
				<img src="../assets/img/fw_al_007_03.jpg" alt="fw_al_007_03">

				<!-- Slide Text Layer -->
				<div class="fw_al_007_slide">
					<h3 data-animation="animated flipInX">Gallery</h3>
					<h2 style="color:white; font-size:50px;" data-animation="animated flipInX">See exclusives photos and videos!</h2>
					<h5 style="color:white;" data-animation="animated flipInX">Browse the gallery to reminisce about our history!</h5>
					<a href="gallery.php" data-animation="animated flipInX">read more</a>
				</div>
			</div>
			<!-- End of Slide -->

			<!-- Fourth Slide -->
			<div class="carousel-item">

				<!-- Slide Background -->
				<img src="../assets/img/fw_al_007_03.jpg" alt="fw_al_007_03">

				<!-- Slide Text Layer -->
				<div class="fw_al_007_slide">
					<h3 data-animation="animated flipInX">Coaches</h3>
					<h2 style="color:white; font-size:50px;" data-animation="animated flipInX">Get to know our coaches!</h2>
					<h5 style="color:white;" data-animation="animated flipInX">Watch exclusive tutorials from our very own coaches and learn the ways of jiu-jitsu!</h5>
					<a href="coaches.php" data-animation="animated flipInX">read more</a>
				</div>
			</div>
			<!-- End of Slide -->

			<!-- Fifth Slide -->
			<div class="carousel-item">

				<!-- Slide Background -->
				<img src="../assets/img/fw_al_007_03.jpg" alt="fw_al_007_03">

				<!-- Slide Text Layer -->
				<div class="fw_al_007_slide">
					<h3 data-animation="animated flipInX">Chat</h3>
					<h2 style="color:white; font-size:50px;" data-animation="animated flipInX">Socialize with your fellow members!</h2>
					<h5 style="color:white;" data-animation="animated flipInX">Exchange ideas or opinions in our very own chat box!</h5>
					<a href="coaches.php" data-animation="animated flipInX">read more</a>
				</div>
			</div>
			<!-- End of Slide -->

		</div><!-- End of Wrapper For Slides -->
		
		<!-- Left Control -->
		<a class="carousel-control-prev" href="#fw_al_007" data-slide="prev">
			<span style="padding-right:13px; padding-top:5px;" class="fa fa-angle-left" aria-hidden="true"></span>
		</a>
		<!-- Right Control -->
		<a class="carousel-control-next" href="#fw_al_007" data-slide="next">
			<span style="padding-right:7px; padding-top:5px;" class="fa fa-angle-right" aria-hidden="true"></span>
		</a>

	



 <!-- End --></section>
 <div >

		<section class="container-fluid text-center" id="dqv" style="padding-top: 300px;background-color: #dfdfdf;padding-bottom: 70px;">
        <div  id="cal"  class="container border rounded shadow-lg profile profile-view" data-aos="fade-up" data-aos-delay="100" data-aos-once="true" id="profile" style="padding-right: 30px;padding-left: 30px;font-family: Montserrat, sans-serif;padding-bottom: 30px;padding-top: 30px;background-color: #ffffff;">

		<h1 align="center"class="text-uppercase" ><strong>Calendar of Activities</strong></h1>
 			 <br />
				<div id="calendar"></div>
</div>
		</section>

		
        <section data-aos="fade-up" data-aos-delay="50" data-aos-once="true" style="padding:50px;">
        <script src="https://assets.juicer.io/embed.js" type="text/javascript"></script>
<link href="https://assets.juicer.io/embed.css" media="all" rel="stylesheet" type="text/css" />
<ul class="juicer-feed" data-feed-id="mtoledodo" data-per="9"><h3 style="text-align:center;">Social Media</h3></ul></section>


<?php
$mysqli = new mysqli('localhost', 'root', "" , 'thesis');
$sql = 'SELECT username, avatar FROM users';
$result = $mysqli->query($sql); //$result = mysqli_result object
 
?>





<!--- FOOTER -->

<?php include "includes/footer.php"; ?>

<script>
$('.row').on("click",".nav-item",function(e){ 
  e.preventDefault(); // cancel click
  var page = $(this).attr('href');   
  $('.row').load(page);
});
</script>