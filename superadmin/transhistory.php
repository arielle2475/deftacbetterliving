<?php include "includes/admin_header.php"; ?>
<?php 
include('../SignIn/serverAdmin.php');
if (!isAdmin()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../signIn/loginAdmin.php');
}   


if(!isset($_SESSION['adminname']) && !isset($_SESSION['password'])){
	session_destroy();
	header('location: ../Signin/loginadmin.php?error=Login to access.');
    }
 ?>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">

    <title>Deftac Betterliving</title>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="assets/css/style5.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });
    </script>
 
</head>

<body style="font-family: Montserrat, sans-serif;background-color: rgb(235,235,235);">

    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <a class="text-center" href="#" style="padding-left: 40px;"><img src="assets/img/deftac.png" width="100px" style="width: 125px;height: 125px;"></a>
            </div>

            <ul class="list-unstyled components">
            <li>
                    <a href="index.php">Dashboard</a>
                </li>                
                <li class="active">
                    <a href="#memberSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle ">Members</a>
                    <ul class="collapse list-unstyled " id="memberSubmenu">
                        <li>
                            <a href="memberlist.php">Membership List</a>
                        </li>
                        <li>
                            <a href="userlist.php">Membership Status</a>
                        </li>
                        <li class="active">
                            <a href="transhistory.php">Membership Transactions</a>
                        </li>
                    </ul>
                </li>
                <li>
                <a href="#adminSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Admins</a>
                    <ul class="collapse list-unstyled" id="adminSubmenu">
                        <li>
                            <a href="adminlist.php">Admin List</a>
                        </li>

                        <li>
                            <a href="createadmin.php">Add Admin</a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Blog</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="posts.php">View Posts</a>
                        </li>
                        <li>
                            <a href="categories.php">View Categories</a>
                        </li>
                        <li>
                            <a href="comment.php">View Comments</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#gallerySubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Gallery</a>
                    <ul class="collapse list-unstyled" id="gallerySubmenu">
                        <li>
                            <a href="gallery.php">View Images</a>
                        </li>
                        <li>
                            <a href="video.php">View Videos</a>
                        </li>
                    </ul>
                </li>
                <li >
                    <a href="tutorial.php">Tutorials</a>
                </li>
                <li >
                    <a href="calendar.php">Calendar</a>
                </li>
            <li >
                    <a href="chatbox.php">Chatbox</a>
                </li>
                <li >
                    <a  class="h ha" href="usermanual.pdf">User Manual</a>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a href="profile.php" class="btn p-2 mr-2 mb-2  download" style="color:black; font-weight:bold;">Profile</a>
                </li>
                <li>
                    <a class="btn p-2 mr-2 mb-2 btn-danger article" href="logout.php" style="color:white; font-weight:bold;">Logout</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content Holder -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                            <h1>Welcome, <span class="user"><?= $_SESSION['adminname'] ?></span></p>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav> <div class="col-md-12 search-table-col" data-aos="fade-up" data-aos-once="true" style="margin-top: 30px;padding-top: 0px;font-family: Montserrat, sans-serif;">
                    <div class="border rounded shadow-lg" style="font-family: Montserrat, sans-serif;padding-top: 0px;background-color: #ffffff;margin-top: 77px;margin-right: 15px;margin-left: 15px;">
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link active" role="tab" data-toggle="tab" href="#tab-1" style="font-weight: bold;">History</a></li>
                <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-2" style="font-weight: bold;">Monthly</a></li>
                <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-3" style="font-weight: bold;">Annual</a></li>
            </ul>
            <div class="tab-content" style="background-color: #ffffff;">
                <div class="tab-pane active" role="tabpanel" id="tab-1">
                    <div class="col-md-12 search-table-col" data-aos="fade-up" data-aos-once="true" style="margin-top: 30px;padding-top: 0px;font-family: Montserrat, sans-serif;">
                    <h1 style="font-size: 35px;">Transaction History</h1> 
                    <button class="btn btn-warning p-2 mr-2 mb-2" style="margin-left:10px;font-weight:bold; color:white;"><a href="overallpdf.php" target="_blank">Print PDF</a></button>
                    <div class="form-group pull-right col-lg-4"><input type="text" id="myInput" onkeyup="myFunction()" ptitle="Type in a name"  placeholder="Search Date" class="search form-control"></div>
                        <div class="table-responsive shadow-lg" style="background-color: #ffffff;height: 500px;margin: 5px;">
                        <table id="myTable" class="table">
                                <thead>
                                    <tr class="text-center" style="color: rgb(255,255,255);background-color: #333332;">
                                        <th class="border rounded-0">Username</th>
                                        <th class="border rounded-0">Name</th>
                                        <th class="border rounded-0">Membership Approved Date</th>
                                        <th class="border rounded-0">Membership Expiration Date</th>
                                        <th>Payment</th>
                                    </tr>
                                </thead>
                                <tbody>
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
                                      echo " <a href='../Signin/login.php'></a> ";
                                      if (mysqli_num_rows($result) > 0) { 
                                          // output data of each row

                                          while($row = mysqli_fetch_assoc($result)) {
                                              echo "<tr><td class='border rounded-0'>" . $row["username"]. "</td> <td class='border rounded-0'>" . $row["u_fname"]." ".$row["u_lname"].  "</td><td class='border rounded-0'>" . $row["appDate"]. "</td>
                                          <td class='border rounded-0'>" . $row["expDate"]. "</td><td class='border rounded-0'>" . $row["payment"]. "</td>"	;

                                      }}

                                      echo "
                                      </table>";
                                      echo "<p style='color:black;font-weight:bold;float:right;padding:20px;'>Total Sales: " . $payment."</p>";

                                      mysqli_close($conn);
                                      ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" role="tabpanel" id="tab-2">
                    <div class="col-md-12 search-table-col" data-aos="fade-up" data-aos-once="true" style="margin-top: 30px;padding-top: 0px;font-family: Montserrat, sans-serif;">
                    <div class="form-group pull-right col-lg-4"><input type="text" id="myInput1" onkeyup="myFunction1()" ptitle="Type in a name"  placeholder="Search Date" class="search form-control"></div>
                        <h1 style="font-size: 35px;">Current Monthly Transactions</h1>
                        <button class="btn btn-warning p-2 mr-2 mb-2" style="margin-left:10px;font-weight:bold; color:white;"><a href="monthlypdf.php" target="_blank">Print PDF</a></button>

                        <div class="table-responsive shadow-lg" style="background-color: #ffffff;height: 500px;margin: 5px;">
                        <table id="myTable1" class="table">
                                <thead>
                                    <tr class="text-center" style="color: rgb(255,255,255);background-color: #333332;">
                                        <th class="border rounded-0">Username</th>
                                        <th class="border rounded-0">Name</th>
                                        <th class="border rounded-0">Membership Approved Date</th>
                                        <th class="border rounded-0">Membership Expiration Date</th>
                                        <th>Payment</th>
                                    </tr>
                                </thead>
                                <tbody>
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
                                            echo " <a href='../Signin/login.php'></a> ";
                                            if (mysqli_num_rows($result) > 0) {
                                                // output data of each row

                                                while($row = mysqli_fetch_assoc($result)) {
                                                    echo "<tr><td class='border rounded-0'>" . $row["username"]. "</td> <td class='border rounded-0'>" . $row["u_fname"]." ".$row["u_lname"].  "</td><td class='border rounded-0'>" . $row["appDate"]. "</td>
                                                <td class='border rounded-0'>" . $row["expDate"]. "</td><td class='border rounded-0'>" . $row["payment"]. "</td>"	;

                                              

                                            }}

                                            echo "
                                            </table>";
                                            echo "<p style='color:black;font-weight:bold;float:right;padding:20px;'>Total Monthly Sales: " . $payment."</p>";
                                            mysqli_close($conn);
                                            ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" role="tabpanel" id="tab-3">
                    <div class="col-md-12 search-table-col" data-aos="fade-up" data-aos-once="true" style="margin-top: 30px;padding-top: 0px;font-family: Montserrat, sans-serif;">
                    <div class="form-group pull-right col-lg-4"><input type="text" id="myInput2" onkeyup="myFunction2()" ptitle="Type in a name"  placeholder="Search Date" class="search form-control"></div>
                        <h1 style="font-size: 35px;">Current Annual Transactions</h1>
                        <button class="btn btn-warning p-2 mr-2 mb-2" style="margin-left:10px;font-weight:bold; color:white;"><a href="yearlypdf.php" target="_blank">Print PDF</a></button>

                        <div class="table-responsive shadow-lg" style="background-color: #ffffff;height: 500px;margin: px;">
                        <table id="myTable2" class="table">
                                <thead>
                                    <tr class="text-center" style="color: rgb(255,255,255);background-color: #333332;">
                                        <th class="border rounded-0">Username</th>
                                        <th class="border rounded-0">Name</th>
                                        <th class="border rounded-0">Membership Approved Date</th>
                                        <th class="border rounded-0">Membership Expiration Date</th>
                                        <th>Payment</th>
                                    </tr>
                                </thead>
                                <tbody>
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
                                      echo " <a href='../Signin/login.php'></a> ";
                                      if (mysqli_num_rows($result) > 0) {
                                          // output data of each row

                                          while($row = mysqli_fetch_assoc($result)) {
                                              echo "<tr><td class='border rounded-0'>" . $row["username"]. "</td> <td class='border rounded-0'>" . $row["u_fname"]." ".$row["u_lname"].  "</td><td class='border rounded-0'>" . $row["appDate"]. "</td>
                                          <td class='border rounded-0'>" . $row["expDate"]. "</td><td class='border rounded-0'>" . $row["payment"]. "</td>"	;

                                        

                                      }}

                                      echo "
                                      </table>";

                                      echo "<p style='color:black;font-weight:bold;float:right;padding:20px;'>Total Annual Sales: " . $payment."</p>";
                                      mysqli_close($conn);
                                      ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                </div>
            </div>
        </div>
    </div>

     <script>
            function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[3];
                if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
                }       
            }
            }
     </script>
          <script>
            function myFunction1() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput1");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable1");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[3];
                if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
                }       
            }
            }
     </script>
               <script>
            function myFunction2() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput2");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable2");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[3];
                if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
                }       
            }
            }
     </script>
        <?php include "includes/footer.php"; ?>

</body>
</html>

     