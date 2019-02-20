<title>Deftac Betterliving Admin | Userlist</title>
<?php 
session_start();
?>
<head>
<link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link href="../layout/styles/fullcalendar.css" rel="stylesheet" type="text/css" media="all">

<style>


#form{
	    border-radius: 10px;
    background-color: #f2f2f2;
    padding: 20px;
	    width: 100%;
		    margin: auto;

}


#margin {
    padding: 100px;
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
        <h1><a href="../index.html">Deftac Betterliving | Admin</a></h1>
      </div>
        <nav id="mainav" class="fl_right">
        <ul class="clear">
          <li><a href="index.php">Home</a></li>
		  	  <li class="active"><a class="drop" href="#">Membership</a>
						<ul>
						   <li ><a href="memberlist.php">Membership Information</a></li>
						  <li class="active"><a href="userlist.php">Membership Status</a></li>
              <li><a href="transhistory.php">Membership Transaction History</a></li>
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
      <!-- ########
      <!-- ################################################################################################ --> 
    </header>
  </div>
 
</div>


</div></div>
<div id="box1" class="wrapper row3" style="background-image:url('../images/demo/bgall.jpg');">


<div id=margin>



<div id=form>


<h1> Members List </h1>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "thesis";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "SELECT * FROM users, mfillup WHERE users.username = mfillup.username";

$result = mysqli_query($conn, $sql);
echo " <a href='../Signin/login.php'></a> 
<table><tr>
    <th>Username</th>
    <th>Email Address</th>
    <th>Registered Date</th>
  <th>Approved Date</th>
  <th>End Date</th>
  <th>Status</th>


  </tr>";
echo "<tr>";
if (mysqli_num_rows($result) > 0) {
    // output data of each row

    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row["username"]. "</td> <td>" . $row["email"]. "</td><td>" . $row["reg_date"]. "</td><td>" . $row["approvedDate"]. "</td><td>" . $row["expirationDate"]. "</td>"	;
$active=$row['isActive'];
	 	if($active==1){
		echo "<td><a href='deactivate.php/?update=$row[id]'><button class='success'>Active</button></a></td></tr>";    
	    }
	    if($active==0){
		echo "<td><a href='activate.php/?update=$row[id]'><button class='danger'>Blocked</button></a></td></tr>";    
	    }
  

}}

echo "
</table>";
mysqli_close($conn);
?>

</div></div>

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
    
<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a> 
<!-- JAVASCRIPTS --> 
<script src="layout/scripts/jquery.min.js"></script> 
<script src="layout/scripts/jquery.backtotop.js"></script> 
<script src="layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>