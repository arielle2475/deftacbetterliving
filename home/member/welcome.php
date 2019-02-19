<?php 
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
  session_destroy();
  header('location: ../Signin/login.php?error=Login to access chat.');
  }
?>
<html>
<head>
<title>Deftac Betterliving | Account</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link href="../layout/styles/fullcalendar.css" rel="stylesheet" type="text/css" media="all">

 <style>
        * {
    box-sizing: border-box;
}

.column {
    float: left;
    width: 33.33%;
    padding: 5px;

}

.img

/* Clearfix (clear floats) */
.row::after {
    content: "";
    clear: both;
    display: table;
}
		
		
        #box1{
            height: 100vh;
            width: 100%;
            background-image: url(i1.jpg);
            background-size: cover;
            display: table;
            background-attachment: fixed;
        }

		#images_hz {
width: 960px;
height: auto;
overflow: hidden;
}
#images_hz img {
display: inline;
margin: 0 10px;}
   

#form{
	    border-radius: 10px;
    background-color: #f2f2f2;
    padding: 20px;
	    width: 100%;
		    margin: auto;
display: block;float: left;margin-right: 5px;

}


#margin {
    padding: 100px;
}

       
    </style>
	

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>

 
</head>
<body id="top"><div id="box1">
<div id="box1" class="bgded overlay" style="background-image:url('images/demo/img/header1.jpg');"> 
  <div class="wrapper row1">
    <header id="header" class="hoc clear"> 
      <div id="logos">
	  <img src="deftac.png">
      </div>
      <nav id="mainav" class="fl_right">
        <ul class="clear">


          <li><a href="index.html">Home</a></li>
		  <li><a href="gallery.html">Gallery</a></li> 
		  <li><a class="drop" href="#">Coaches</a>
            <ul>
              <li><a href="shiba.html">Coach Martin</a></li>
              <li><a href="shoob.html">Coach Richard</a></li>
              <li><a href="husky.html">Coach Rommel</a></li>
            </ul>
			              <li><a href="calendar.php">Calendar</a></li>

				  <li><a class="drop" href="welcome.php">Account</a>
            <ul>

              <li><a href="logout.php">Logout</a></li>
              
            </ul>
          </li>
        </ul>
      </nav>
    </header>
  </div>

<link rel="stylesheet">
<?php
$mysqli = new mysqli('localhost', 'root', "" , 'thesis');
$sql = 'SELECT username, avatar FROM users';
$result = $mysqli->query($sql); //$result = mysqli_result object
 
?>
<div id="box1" class="wrapper row3" style="background-image:url('../images/demo/bgall.jpg');">

<div id=margin>
<div class="welcome">
<div class ="alert alert-success"><?= $_SESSION['message'] ?></div>



<div id=margin><h3>
<span class="user"><img src='../Signin/<?= $_SESSION['avatar']?>'</span><br />
Welcome, <span class="user"><?= $_SESSION['username'] ?></span></h3>
<br>
<br>

  

    <div class="row">

<div id = "registered" >
<h1> All registered users</h1>
<?php
while($row = $result->fetch_assoc()){
      echo "<div class='column'><div class='userlist'><span>".$row['username']."</span><br />";
        echo "<img src='../signin/".$row['avatar']."'></div></div>";
}
	
	?></div>
</div>
</div>
</div>
</div>
<!--- FOOTER -->

<link rel="stylesheet" href="layout/footer.css">
<footer class="footer-distributed">
      <br>
      <div class="footer-left">
        <div class="footerlogo">
        <img src="images/demo/img/deftacmain.png">
      </div>

        <p class="footer-company-name">Deftac Betterliving &copy; 2018</p>
      </div>

      <div class="footer-center">
    <br>

        <div>
          <i class="fa fa-map-marker"></i>
          <p><span>Deftac Betterliving</span> Parañaque</p>
        

        </div>

        <div>
          <i class="fa fa-phone"></i>
          <p>+639054041458</p>
        </div>

        <div>
          <i class="fa fa-envelope"></i>
          <p><a href="mailto:deftacbetterliving@gmail.com">deftacbettingliving@gmail.com</a></p>
        </div>

      </div>

      <div class="footer-right">
        <br>
        <div class="footerlogo">
        <img src="images/demo/img/ribiero.png">
      </div>

        </div>

      </div>

    </footer>
    
<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a> 
<!-- JAVASCRIPTS --> 
<script src="layout/scripts/jquery.min.js"></script> 
<script>
    THREEWEEKS = 1000 * 3600 * 24 * 7 * 3; // milliseconds in 3 weeks

    $message = $username
if (expirationDate.getTime() - Date.now() < THREEWEEKS) {
    alert("'Expires in less than 3 weeks.");
}
</script>
</body>
</html>