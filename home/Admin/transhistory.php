<?php 
session_start();
?>
<html>
<title>Deftac Betterliving Admin | Edit Admins </title>

<head>
  <link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
  <link href="../layout/styles/fullcalendar.css" rel="stylesheet" type="text/css" media="all">

  <style>
    #form {
      border-radius: 10px;
      background-color: #f2f2f2;
      padding: 20px;
      width: 100%;
      margin: auto;

    }


    #margin {
      padding: 100px;
    }
  </style>

</head>

<body id="top">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <style>
    .mySlides {
      display: none;
    }
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
                    <li class="active"><a href="memberlist.php">Membership Information</a></li>
                    <li><a href="userlist.php">Membership Status</a></li>
                    <li><a href="transhistory.php">Membership Transaction History</a></li>

                  </ul>
                <li><a href="report.php">Reports
                  </a></li>
                <li><a class="drop" href="#">Admin</a>
                  <ul>
                    <li class="active"><a href="adminsubmit.php">Admins</a></li>
                    <li class="active"><a href="editadmin.php">Add New Admin</a></li>

                  </ul>
                <li><a href="../signin/loginadmin.php">Logout</a></li>


                </li>
              </ul>
            </nav>
            <!-- ################################################################################################ -->
          </header>
        </div>

      </div>



    </div>
    </div>
    <div id="box1" class="wrapper row3" style="background-image:url('../images/demo/bgall.jpg');">
      <div id=margin>


        <div id=form>
          <h1> Transaction History </h1>
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
// select all transactions
$sql = "SELECT * FROM users, transhistory, mfillup WHERE users.id = transhistory.usersid AND mfillup.username=users.username";
$sql2 = "SELECT SUM(payment) as sum_payments FROM transhistory";

$result = mysqli_query($conn, $sql);
$result2 = mysqli_query($conn, $sql2);
$sum = mysqli_fetch_assoc($result2);
$payment = $sum['sum_payments'];
// var_dump($result2);
echo " <a href='../Signin/login.php'></a> 
<table><tr>
    <th>Username</th>
    <th>Name</th>
	<th>Membership Approved Date</th>
    <th>Membership Expiration Date</th>
    <th>Payment</th>
  
  </tr>";
echo "<tr>";
if (mysqli_num_rows($result) > 0) { 
    // output data of each row

    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row["username"]. "</td> <td>" . $row["u_fname"]." ".$row["u_lname"].  "</td><td>" . $row["appDate"]. "</td>
		<td>" . $row["expDate"]. "</td><td>" . $row["payment"]. "</td>"	;

}}

echo "
</table>";

echo "total sales: " . $payment;

mysqli_close($conn);
?>

        </div>
      </div>

      <!-- SECOND TABLE -->
      <div id="box1" class="wrapper row3" style="background-image:url('../images/demo/bgall.jpg');">
        <div id=margin>
          <div id=form>
            <h1> Current Annual Transactions </h1>
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

$sql = "SELECT * FROM users, transhistory, mfillup WHERE users.id = transhistory.usersid AND mfillup.username=users.username AND YEAR(transhistory.appDate)=YEAR(curdate()) AND MONTH(transhistory.appDate)=MONTH(curdate())";
$sql2 = "SELECT SUM(payment) as sum_payments FROM transhistory WHERE YEAR(transhistory.appDate)=YEAR(curdate())";

$result2 = mysqli_query($conn, $sql2);
$sum = mysqli_fetch_assoc($result2);
$payment = $sum['sum_payments'];

$result = mysqli_query($conn, $sql);
echo " <a href='../Signin/login.php'></a> 
<table><tr>
    <th>Username</th>
    <th>Name</th>
	<th>Membership Approved Date</th>
    <th>Membership Expiration Date</th>
    <th>Payment</th>
  
  </tr>";
echo "<tr>";
if (mysqli_num_rows($result) > 0) {
    // output data of each row

    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row["username"]. "</td> <td>" . $row["u_fname"]." ".$row["u_lname"].  "</td><td>" . $row["appDate"]. "</td>
		<td>" . $row["expDate"]. "</td><td>" . $row["payment"]. "</td>"	;

  

}}

echo "
</table>";

echo "total annual sales: " . $payment;
mysqli_close($conn);
?>
          </div>
        </div>


        <!-- THIRD TABLE -->
        <div id="box1" class="wrapper row3" style="background-image:url('../images/demo/bgall.jpg');">
          <div id=margin>
            <div id=form>
              <h1> Current Monthly Transactions </h1>
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

$sql = "SELECT * FROM users, transhistory, mfillup WHERE users.id = transhistory.usersid AND mfillup.username=users.username AND YEAR(transhistory.appDate)=YEAR(curdate()) AND MONTH(transhistory.appDate)=MONTH(curdate())";
$sql2 = "SELECT SUM(payment) as sum_payments FROM transhistory WHERE YEAR(transhistory.appDate)=YEAR(curdate()) AND MONTH(transhistory.appDate)=MONTH(curdate())";

$result2 = mysqli_query($conn, $sql2);
$sum = mysqli_fetch_assoc($result2);
$payment = $sum['sum_payments'];


$result = mysqli_query($conn, $sql);
echo " <a href='../Signin/login.php'></a> 
<table><tr>
    <th>Username</th>
    <th>Name</th>
	<th>Membership Approved Date</th>
    <th>Membership Expiration Date</th>
    <th>Payment</th>
  
  </tr>";
echo "<tr>";
if (mysqli_num_rows($result) > 0) {
    // output data of each row

    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row["username"]. "</td> <td>" . $row["u_fname"]." ".$row["u_lname"].  "</td><td>" . $row["appDate"]. "</td>
		<td>" . $row["expDate"]. "</td><td>" . $row["payment"]. "</td>"	;

  

}}

echo "
</table>";

echo "total monthly sales: " . $payment;
mysqli_close($conn);
?>
            </div>
          </div>

          <div class="wrapper row5">
            <div id="copyright" class="hoc clear">
              <p class="fl_left">Copyright Deftac Betterliving 2018 - All Rights Reserved</a></p>

              <p class="fl_right">
                <ul class="faico clear">
                  <li><a class="faicon-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a class="faicon-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                  <li><a class="faicon-dribble" href="#"><i class="fa fa-dribbble"></i></a></li>
                  <li><a class="faicon-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                  <li><a class="faicon-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                  <li><a class="faicon-vk" href="#"><i class="fa fa-vk"></i></a></li>
                </ul>
              </p>
            </div>
          </div>
          <a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
          <!-- JAVASCRIPTS -->
          <script src="layout/scripts/jquery.min.js"></script>
          <script src="layout/scripts/jquery.backtotop.js"></script>
          <script src="layout/scripts/jquery.mobilemenu.js"></script>
  </body>

</html>