<?php 
session_start();
?>
        <div id="wrapper">

<!-- Navigation -->
<?php include"includes/admin_navigation.php"; ?>
 
<!-- Content of the admin page --->

<div id="page-wrapper">

    <div class="container-fluid">


<html>
<title>Deftac Betterliving Admin | Edit Admins </title>
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
	    width: 80%;
		margin:10px;
			  margin-left: auto;
    margin-right: auto;;


}

body{
	background: #FFF;
    margin: 0;
	padding: 0;
	text-align:justify;
}



.success {background-color: #4CAF50;
	    border-radius: 10px;
	    width: 120px;
		    margin: auto;

    border: none;
    color: white;
    padding: 14px 28px;
    font-size: 16px;
    cursor: pointer;} /* Green */
.success:hover {background-color: #46a049;}

.warning {background-color: #ff9800;
	    border-radius: 10px;
  width: 120px;
		    margin: auto;
    border: none;
    color: white;
    padding: 14px 28px;
    font-size: 16px;
    cursor: pointer;} /* Orange */
.warning:hover {background: #e68a00;}

.danger {background-color: #f44336;
	    border-radius: 10px;
  width: 120px;
		    margin: auto;
    border: none;
    color: white;
    padding: 14px 28px;
    font-size: 16px;
    cursor: pointer;} /* Red */ 
.danger:hover {background: #da190b;}


</style>

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
        <h1><a href="../index.html">Deftac Betterliving | Admin</a></h1>
      </div>
    <nav id="mainav" class="fl_right">
        <ul class="clear">
          <li><a href="index.php">Home</a></li>
		  	  <li ><a class="drop" href="#">Membership</a>
						<ul>
						   <li ><a href="memberlist.php">Membership Information</a></li>
						  <li><a href="userlist.php">Membership Status</a></li>

						</ul>
				<li><a href="report.php">Reports
				</a></li>
        <li ><a class="drop" href="#">Admin</a>
                <ul>
										  <li class="active" ><a href="adminsubmit.php">Admins</a></li>
                                          <li class="active" ><a href="editadmin.php">Add New Admin</a></li>
     
</ul>
						  <li><a href="../signin/loginadmin.php">Logout</a></li>

				
          </li>
        </ul>
      </nav>
      <!-- ################################################################################################ --> 
    </header>
  </div>
 
</div>


</div></div>
<div id="box1" class="wrapper row3" style="background-image:url('../images/demo/bgall.jpg');">

<div id=form >
<?php  

$_SESSION['message'] = '';
$mysqli = new mysqli("localhost", "root", "", "thesis");
if ($_SERVER["REQUEST_METHOD"] == "POST") {

if ($_POST['password'] == $_POST['confirmpassword']) {

  
    //define other variables with submitted values from $_POST
    $username = $mysqli->real_escape_string($_POST['adminname']);
    $email = $mysqli->real_escape_string($_POST['adminemail']);

    //md5 hash password for security
    $password = md5($_POST['password']);

    //path were our avatar image will be stored
    $avatar_path = $mysqli->real_escape_string('../Signin/images/'.$_FILES['adminavatar']['name']);
    
    // if (preg_match("!images!",$_FILES['avatar']['type']))   {         
     //copy image to images/ folder 
     if (copy($_FILES['adminavatar']['tmp_name'], $avatar_path)) {
          //set session variables to display on welcome page
$_SESSION['adminname'] = $username;
$_SESSION['adminavatar'] = $avatar_path;

//create SQL query string for inserting data into the database
$sql = "INSERT INTO admins (adminname, adminemail, password, adminavatar) "
. "VALUES ('$username', '$email', '$password', '$avatar_path')";
         
         
            if ($mysqli->query($sql) === true){
                $_SESSION['message'] = "Registration successful!"
                . "Added $username to the database!";
                header("location: ../admin/adminsubmit.php");
            }
            else {
                $_SESSION['message'] = 'User could not be added to the database!';
            }
            $mysqli->close();          
        }
        //else {
          //  $_SESSION['message'] = 'File upload failed!';
        //}
    }
    else {
        $_SESSION['message'] = 'Please only upload GIF, JPG or PNG images!';
    }
}
//  else {
//       $_SESSION['message'] = 'Two passwords do not match!';
//    }
//} //if ($_SERVER["REQUEST_METHOD"] == "POST")

?>





<link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="formstyle.css" type="text/css">
<div class="body-content">
<div id="form">

<div class="module">
<h1>Create an Admin account</h1>
<form class="form" action="editadmin.php" method="post" enctype="multipart/form-data" autocomplete="off">
<div class="alert alert-error"><?= $_SESSION['message'] ?></div>    
  <input type="text" placeholder="User Name" name="adminname" required />
  <input type="email" placeholder="Email" name="adminemail" required />
  <input type="password" placeholder="Password" name="password" autocomplete="new-password" required />
  <input type="password" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password" required />
  <div class="avatar"><label>Select your avatar: </label><input type="file" name="adminavatar" accept="image/*" required /></div>
  <input type="submit" value="Register Admin" name="register" class="btn btn-block btn-primary" />
 
</form>
</div></div>
</div>

</div>

















</div>



<!--- FOOTER -->

<link rel="stylesheet" href="layout/footer.css">
<footer class="footer-distributed">
      <br>
      <div class="footer-left">
        <div class="footerlogo">
        <img src="images/deftacmain.png">
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
        <img src="images/ribiero.png">
      </div>

        </div>

      </div>

    </footer>
    </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a> 
<!-- JAVASCRIPTS --> 
<script src="layout/scripts/jquery.min.js"></script> 
<script src="layout/scripts/jquery.backtotop.js"></script> 
<script src="layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>