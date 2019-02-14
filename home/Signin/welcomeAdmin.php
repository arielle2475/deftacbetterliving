<link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<style>
        
        #box1{
            height: 100vh;
            width: 100%;
            background-image: url(i1.jpg);
            background-size: cover;
            display: table;
            background-attachment: fixed;
        }
   
       
    </style>
</head>
<body id="top">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.mySlides {display:none;}
</style>
<body>

<div style="background-image:url('../images/demo/backgrounds/bg2.jpg');"> 
<div class="bgded overlay" style="max-width:6000px">
 <div class="wrapper row1">
    <header id="header" class="hoc clear"> 
      <div id="logo" class="fl_left">
        <h1><a href="../index.html">Deftac Betterliving</a></h1>
      </div>
      <nav id="mainav" class="fl_right">
        <ul class="clear">
          <li><a href="index.html">Home</a></li>
				<li class="active"><a href="shop.html">Edit Shop</a></li>
				<li><a href="about.html">Membership Status</a></li>
								<li><a href="about.html">Reports
								</a></li>

				  <li><a class="drop" href="#">Account</a>
            <ul>
              <li><a href="shiba.html">Edit Admins</a></li>
              <li><a href="../sign/login.php">Logout</a></li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- ################################################################################################ --> 
    </header>
  </div>
 
</div>


</div></div>

<link rel="stylesheet" href="form.css">
<?php 
/* welcome.php */

//$_SESSION variables become available on this page
session_start(); 
?>
<div >
<div class="welcome">
<div class="alert alert-success"><?= $_SESSION['message'] ?></div>
    <img src="<?= $_SESSION['avatar'] ?>"><br />
    Welcome <span class="user"><?= $_SESSION['username'] ?></span>
    <?php
    $mysqli = new mysqli("localhost", "root", "", "thesis");
    $sql = "SELECT username, avatar FROM users";
    //$result = mysqli_result object
    $result = $mysqli->query( $sql ); 
    ?>
    <div id='registered'>
    <span>All registered users:</span>
    <?php
    //returns associative array of fetched row
    while( $row = $result->fetch_assoc() ){ 
        echo "<div class='userlist'><span>".$row['username']."</span><br />";
        echo "<img src='".$row['avatar']."'></div>";
    }
?>  
</div>
</div>
</div>






<div style="background-image:url('../images/demo/backgrounds/bg3.jpg');">
<div class="wrapper coloured overlay bgded">
  <article class="hoc cta clear"> 
    <h6 class="three_quarter first">Contact us</h6>
    <footer class="one_quarter"></footer>
  </article>
</div>
<div class="wrapper overlay bgded">
  <div id="ctdetails" class="hoc clear"> 
    <ul class="nospace group">
      <li class="one_third first"><i class="fa fa-map-marker"></i>
        <p>Our Location</p>
        <p><a href="#">Google Maps</a></p>
      </li>
      <li class="one_third"><i class="fa fa-phone"></i>
        <p>Call us</p>
        <p>+00 (123) 456 7890</p>
      </li>
      <li class="one_third"><i class="fa fa-envelope-o"></i>
        <p>Email us</p>
        <p>pupsandcats@gmail.com</p>
      </li>
    </ul>
  </div>
</div></div>
<div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
    <p class="fl_left">Copyright &copy; 2016 - All Rights Reserved</a></p>
	 
    <p class="fl_right"><ul class="faico clear">
        <li><a class="faicon-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
        <li><a class="faicon-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
        <li><a class="faicon-dribble" href="#"><i class="fa fa-dribbble"></i></a></li>
        <li><a class="faicon-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
        <li><a class="faicon-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
        <li><a class="faicon-vk" href="#"><i class="fa fa-vk"></i></a></li>
      </ul></p>
  </div>
</div>
<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a> 
<!-- JAVASCRIPTS --> 
<script src="layout/scripts/jquery.min.js"></script> 
<script src="layout/scripts/jquery.backtotop.js"></script> 
<script src="layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>