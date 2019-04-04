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
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700"> -->
    <link rel="stylesheet" type="text/css" href="css/ScrollBar.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="../assets/js/main2.js"></script>
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="../assets/js/main2.js"></script>
    <style>
  .name {
  float: right;
  
}

.h{
color:white;

}

.toggle{
color:white;
text-decoration: none;

}

.ha:focus {
  background-color: white;
  color:black;
  text-decoration: none;
}


.ha:hover {
  background-color: white;
  color:black;
  text-decoration: none;
}
input[type=text] {padding:5px; border:2px solid #ccc; 
-webkit-border-radius: 5px;
    border-radius: 5px;
}
input[type=text]:focus {border-color:#333; }

input[type=file] {padding:5px 15px; background:#333332; border:0 none;
    cursor:pointer;
    -webkit-border-radius: 5px;
    border-radius: 5px; }

  </style>
</head>

<body style="font-family: Montserrat, sans-serif;background-color: rgb(235,235,235);">
<div class="wrapper">
    <!-- Sidebar Holder -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <a class="text-center" href="#" style="padding-left: 40px;"><img src="assets/img/deftac.png" width="100px" style="width: 125px;height: 125px;"></a>
        </div>

        <ul class="list-unstyled components">
        <li><font size="3px">
            
                <a class="h ha"  href="index.php">Dashboard</a>
            </li>                <li>
                <a class="h ha"   href="#memberSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Members</a>
                <ul class="collapse list-unstyled" id="memberSubmenu">
                    <li>
                        <a class="h ha"  href="memberlist.php">Membership List</a>
                    </li>
                    <li>
                        <a class="h ha"  href="userlist.php">Membership Status</a>
                    </li>
                    <li>
                        <a  class="h ha" href="transhistory.php">Membership Transactions</a>
                    </li>
                </ul>
            </li>
            <li>
            <a class="h ha"  href="#adminSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Admins</a>
                <ul class="collapse list-unstyled" id="adminSubmenu">
                    <li>
                        <a class="h ha"  href="adminlist.php">Admin Status</a>
                    </li>
                    <li>
                        <a class="h ha" href="editadmin.php">Add Admin</a>
                    </li>

                </ul>
            </li>
            <li>
                <a class="h ha"  href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Blog</a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a class="h ha"  href="posts.php">View Posts</a>
                    </li>
                    <li>
                        <a class="h ha"  href="categories.php">View Categories</a>
                    </li>
                    <li>
                        <a class="h ha"  href="comment.php">View Comments</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="h ha"  href="#gallerySubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Gallery</a>
                <ul class="collapse list-unstyled" id="gallerySubmenu">
                    <li>
                        <a class="h ha"  href="gallery.php">View Images</a>
                    </li>
                    <li>
                        <a class="h ha"  href="video.php">View Videos</a>
                    </li>

                </ul>
            </li>
            <li >
                    <a class="h ha" href="tutorial.php">Tutorials</a>
                </li>
            <li>
                <a class="h ha"  href="calendar.php">Calendar</a>
            </li>
            <li class="active">
                    <a  class="h ha" href="chatbox.php">Chatbox</a>
                </li>
        </ul>

        <ul class="list-unstyled CTAs">
            <li>
                <a href="profile.php" class="btn p-2 mr-2 mb-2  download" style="height:40px; padding-top:10px; color:black; font-weight:bold;">Profile</a>
            </li>
            <li>
                <a class="btn p-2 mr-2 mb-2 btn-danger article" href="../signin/login.php" style="height:40px; padding-top:10px; color:white; font-weight:bold;">Logout</a>
            </li>
        </ul>
    </nav>
</font>

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
                    <ul style="height:30px; margin-bottom:30px;"class="name nav navbar-nav ml-auto">
                        <li class="nav-item active">
                        <label  style="font-size:40px;">Welcome, <span class="user"><?= $_SESSION['adminname'] ?></span></label>
                        </li>

                    </ul>
                </div>
            </div>
        </nav> 
        <div class="container-fluid text-center border rounded shadow-lg" style="padding-top: 24px;padding-right: 20px;padding-left: 20px;margin: 0px;margin-right: 0px;margin-left: 0px;padding-bottom: 44px;background-color: #ffffff;">
            <div class="row" data-aos="fade-up" data-aos-delay="200" data-aos-once="true" style="margin-right: 0px;background-color: #ffffff;padding: 0px;margin-left: 0px;padding-top: 0px;">
                <div class="col-auto col-md-4 text-left flex-grow-1" style="padding-right: 10px;padding-left: 0px;padding-top: 0px;padding-bottom: 0px;">
                    <div id="Userlog"></div>

            </div>
            <div class="col-auto col-md-4 text-left flex-grow-1" style="padding-right: 0px;padding-left: 20px;padding-top: 0px;padding-bottom: 20px;">
                <h1 class="text-center" style="width: 0px;max-width: 383px;min-width: 0px;">Chat Guidelines</h1>
                <p style="font-family: Montserrat, sans-serif;">1. No Bullying! We are all family here!<br>2. Refrain from spamming the group chat.<br>3. Help each other out when someone asks a question.<br></p>
            </div>
            <div class="col-auto col-md-4 text-left flex-grow-1" style="padding-right: 10px;padding-left: 0px;padding-top: 0px;padding-bottom: 0px;">
                <h1 class="text-left align-items-center" style="width: 0px;max-width: 730px;min-width: 455px;">Messages</h1>
                <div id="Userlog"></div>
			<div class="col-md-12" style="padding-right: 0px;padding-left: 10px;">
                <form>
                    <div class="form-row">
                        <div class="col float-right flex-grow-1 flex-shrink-1 justify-content-center align-items-center align-content-center flex-wrap m-auto">
                             <div class="border rounded shadow-sm scrollbar" style="height: 800px;background-color: #ededed;overflow-y: scroll;margin-bottom: 15px; padding:20px;" id="show"></div>
                        </div>
                    </div>
                    <div class="form-row">
						<input type="hidden" name="name" id="name" value="<?php echo $_SESSION['adminname'] ?>"  class="form-control" >
                        <div class="col"><input class="form-control"  name="msg" id="msg" type="text"></div>
                        <div class="col-auto"><input type="reset" name="send" id="send" value="Send" class="btn btn-warning" style="color:white; font-weight:bold;"></div>
                    </div>
                </form>
            </div>
        </div>
                        <table id="myTable" class="table" style="margin-top:20px;">
                            <thead>
                                <tr class="text-center" style="color: rgb(255,255,255);background-color: #333332;">
                                    <th class="border rounded-0">Username</th>
                                    <th class="border rounded-0">Status</th>
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

                                    $sql = "SELECT * FROM users where isActive = '1'";
                                    $result = mysqli_query($conn, $sql);

                                    echo "<tr>";
                                    if (mysqli_num_rows($result) > 0) {
                                        // output data of each row
                                    while($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>
                                            <td class='border rounded-0'>" . $row["username"]. "</td> ";
                                    $active=$row['isOnline'];
                                    $id = $row['id'];
                                    
                                    $row = json_encode($row);

                                            if($active==1){
                                            echo "<td class='text-center border rounded-0'><button class='btn toggle' data-user='$row' style='color: white;font-weight: bold;background-color: #888888;'><a href='includes/deactivatechat.php?update=$id'>Active</a></button>
                                            </td></tr>";    
                                        }
                                            if($active==0){
                                            echo "<td class='text-center border rounded-0'><button class='btn btn-success' data-user='$row' style='color: white;font-weight: bold;background-color: #333332; '><a href='includes/activatechat.php?update=$id'>Kicked</a></button>
                                            </td></tr>";    
                                        }
                                    
                                    }}

                                        echo "</tbody>
                                        </table>";
                                        mysqli_close($conn);
                                        ?>    </div>
                                        </div>
</body>

</html>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="assets/js/agency.js"></script>
    <script src="assets/js/bs-animation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script>
<script type="text/javascript">
		$(document).ready(function() {
			setInterval(function () {
				$('#Userlog').load('UserLog.php')
			}, 1000);
		});

</script>