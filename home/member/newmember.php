<html>
<title>Deftac Betterliving | New Member </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

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
   
input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=email], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=password], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

#form{
	    border-radius: 10px;
    background-color: #f2f2f2;
    padding: 20px;
	    width: 50%;
	margin:40px;
			  margin-left: auto;
    margin-right: auto;;
	

}

body{
	background: #FFF;
    margin: 0;
	padding: 0;
	text-align:justify;
}

</style>

<body id="top">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.mySlides {display:none;}
</style>
<body>

<div style="background-image:url('images/demo/bgall.jpg');"> 
<div class="bgded overlay" style="max-width:6000px">
 <div class="wrapper row1">
    <header id="header" class="hoc clear"> 
       <div id="logos">
	  <img src="deftac.png">
      </div>
      <nav id="mainav" class="fl_right">
        <ul class="clear">
          <li ><a href="indexnew.html">Home</a></li>
				<li class="active"><a href="newmember.php">Membership</a></li>
				<li><a class="drop" href="#">Account</a>
            <ul>
              <li><a href="yepdf.php">Print PDF</a></li>
              <li><a href="../signin/login.php">Logout</a></li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- ################################################################################################ --> 
    </header>
  </div>
 
</div>


</div>
<div id="box1" class="wrapper row3" style="background-image:url('images/demo/bgall.jpg');">

<div id=form >


  <center> <h1>  <?php if (count($_POST)>0) echo "Form Submitted!"; ?></h1></center>
  <br>

<h2>Membership Registration</h2>

<center><i><p>The membership costs one thousand five hundred pesos (P1,500.00) and it is good for only one month. If expired, member may renew their membership by paying again.</p></i></center>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

<form method="POST" action="filldb.php">  
   Firstname: <input type="text" name="fname">
  <br><br>
   Lastname: <input type="text" name="lname">
  <br><br>
<!--   Username: <input type="text" name="username"> -->
   Subscription: 1 Month Membership <i>(P1,500.00)</i>
  <br><br>
   Gender:
  <input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="male">Male
  <br><br>
 <!-- E-mail Address: <input type="text" name="email"> -->
  
   Age: <input type="text" name="age">
  <br><br>
   Address: <input type="text" name="address">
  <br><br>
   Contact Number: <input type="text" name="contact">
  <br><br>
   Why do you want to join?: <textarea name="comment" rows="5" cols="40"></textarea>
  <br><br>

  <button type="submit" name="submit">Submit</button>  
  
</form>


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
<script src="layout/scripts/jquery.backtotop.js"></script> 
<script src="layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>