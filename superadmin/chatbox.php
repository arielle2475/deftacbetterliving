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
 <?php
$mysqli = new mysqli('localhost', 'root', "" , 'thesis');
if(isset($_SESSION['adminname'])){
    $sql = "SELECT adminname, adminavatar FROM admins WHERE adminname='".$_SESSION["adminname"]."'";
}else{
    $sql = "SELECT adminname, adminavatar FROM admins";
}	

$result = $mysqli->query($sql); //$result = mysqli_result object
while ($row =  $result->fetch_assoc()){
    $_SESSION['adminavatar'] = $row['adminavatar'];
    
}?>
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
                </li>                <li>
                    <a href="#memberSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Members</a>
                    <ul class="collapse list-unstyled" id="memberSubmenu">
                        <li>
                            <a href="memberlist.php">Membership List</a>
                        </li>
                        <li>
                            <a href="userlist.php">Membership Status</a>
                        </li>
                        <li>
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
                            <a href="editadmin.php">Admin Status</a>
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
                <li >
                    <a href="calendar.php">Calendar</a>
                </li>
                <li class="active">
                    <a href="chatbox.php">Chatbox</a>
                </li>

            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a href="profile.php" class="download">Profile</a>
                </li>
                <li>
                    <a href="logout.php" class="article">Logout</a>
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
                    <h1>Welcome,  <span class="user"><?= $_SESSION['adminname'] ?></span></h1>
                </li>

            </ul>
        </div>
    </div>
</nav>
         <!-- CHAT BOX -->
        <div class="container-fluid text-center border rounded shadow-lg" style="padding-top: 24px;padding-right: 20px;padding-left: 20px;margin: 0px;margin-right: 0px;margin-left: 0px;padding-bottom: 44px;background-color: #ffffff;">
            <div class="row" data-aos="fade-up" data-aos-delay="200" data-aos-once="true" style="margin-right: 0px;background-color: #ffffff;padding: 0px;margin-left: 0px;padding-top: 0px;">
                <div class="col-auto col-md-4 text-left flex-grow-1" style="padding-right: 10px;padding-left: 0px;padding-top: 0px;padding-bottom: 0px;">
                    <h1 class="text-center" style="width: 0px;max-width: 383px;min-width: 0px;">Users</h1>
                    
                    <form style="padding-right: -1px;">
                        <div class="border rounded border-light shadow d-flex flex-grow-1 flex-shrink-1 flex-fill justify-content-center align-items-xl-center" style="padding-top: 12px;padding-bottom: 16px;padding-left: 19px;padding-right: 12px;">
                            <div class="form-row">
                                <div class="col-2 text-center" style="padding-right: 0px;padding-left: 0px;width: 92px;"><span class="user"><img width="45px" class="rounded-circle mx-auto" height="45px" src='../Signin/<?= $_SESSION['adminavatar']?>' </span></div>
                                <div class="col-4" style="padding-right: 200px;padding-left: 0px;width: 220px;">
									<h1 style="font-size: 16px;width: 150px;margin-top: 8px;margin-left: 11px;">					
									<div id="Userlog"> <a href="index.php" style="float: right;" class="btn btn-danger btn-sm">Logout</a>
								</div>
							</h1>

                            </div>
                        </div>

                </div>
                </form>
            </div>
			<div class="col-md-8" style="padding-right: 0px;padding-left: 10px;">
                <form>
                    <div class="form-row">
                        <div class="col float-right flex-grow-1 flex-shrink-1 justify-content-center align-items-center align-content-center flex-wrap m-auto">
                            <h1 class="text-left align-items-center" style="width: 0px;max-width: 730px;min-width: 455px;">Messages</h1>
                             <div class="border rounded shadow-sm scrollbar" style="height: 500px;background-color: #ededed;overflow-y: scroll;margin-bottom: 15px; padding:20px;" id="show"></div>
                        </div>
                    </div>
                    <div class="form-row">
						<input type="hidden" name="name" id="name" value="<?php echo $_SESSION['adminname'] ?>"  class="form-control" >
                        <div class="col"><input class="form-control"  name="msg" id="msg" type="text"></div>
                        <div class="col-auto"><input type="reset" name="send" id="send" value="Send" class="btn btn-primary"></div>
                    </div>
                </form>
            </div>
        </div>
        </div>
    
</div>


    </div>
            
    <?php include "includes/footer.php"; ?>
</body>

</html>

<script type="text/javascript">
		$(document).ready(function() {
			setInterval(function () {
				$('#Userlog').load('UserLog.php')
			}, 1000);
		});

	</script>