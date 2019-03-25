<?php include "includes/admin_header.php"; ?>

<?php 
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
            <li class="active">
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
                            <a href="editadmin.php">Edit Admin</a>
                        </li>
                        <li>
                            <a href="createadmin.php">Create Admin</a>
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
                <li >
                    <a href="gallery.php">Gallery</a>
                </li>
                <li >
                    <a href="chatbox.php">Chatbox</a>
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
                                <h1>Welcome,  <span class="user"><?= $_SESSION['adminname'] ?></span></h1>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>
            <div class="col-md-12 search-table-col" data-aos="fade-up" data-aos-once="true" style="margin-top: 30px;padding-top: 0px;font-family: Montserrat, sans-serif;">
                <div class="row d-xl-flex justify-content-xl-start" style="padding-top: 33px;padding-right: 1px;padding-left: 0px;">
                    <div class="col-4 py-3 mx-auto col-xl-4 col-lg-6 col-md-6 col-sm-12" style="min-width: 300px;min-height: 300px;width: 281px;height: 294px;padding: 0px;padding-top: -10px;margin: 0px;margin-right: 0px;margin-left: 0px;padding-bottom: 1px;">
                        <div class="card shadow-lg" style="margin-right: 1px;padding-right: 0px;width: 298px;height: 182px;min-width: 0px;">
                            <div class="card-body" style="height: 89px;background-color: #3996be;">
                                <div class="row">
                                    <div class="col" style="width: 129px;font-size: 11px;">
                                        <h4 style="width: 100px;height: 61px;color: rgb(255,255,255);font-size: 34px;"> <?php
                                                $query = "SELECT * FROM posts";
                                                $get_posts = mysqli_query($connection, $query);
                                                $count_posts = mysqli_num_rows($get_posts);
                                                echo $count_posts;
                                              ?> Posts</h4>
                                    </div>
                                    <div class="col text-right" style="width: 85px;"><i class="fa fa-file-o" style="width: 60px;height: 54px;color: rgb(255,255,255);font-size: 73px;"></i></div>
                                </div>
                            </div><a class="btn btn-primary text-center border-white p-2 mr-2 mb-2" role="button" href="#" style="width: 294px;margin: 0px;margin-right: 0px;margin-bottom: 0px;padding: 0px;padding-top: 0px;padding-right: 0px;padding-bottom: 0px;padding-left: 0px;background-color: rgb(255,255,255);color: rgb(0,0,0);font-weight: bold;height: 42px;">View Details&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-arrow-circle-right" style="width: 24px;height: 25px;color: rgb(0,0,0);font-size: 20px;"></i></a></div>
                    </div>
                    <div class="col-4 py-3 mx-auto col-xl-4 col-lg-6 col-md-6 col-sm-12" style="min-width: 300px;min-height: 300px;width: 281px;height: 294px;padding: 0px;padding-top: -10px;margin: 0px;margin-right: 0px;margin-left: 0px;padding-bottom: 1px;">
                        <div class="card shadow" style="margin-right: 1px;padding-right: 0px;width: 298px;height: 182px;min-width: 0px;">
                            <div class="card-body" style="height: 89px;background-color: #c24e47;">
                                <div class="row">
                                    <div class="col" style="width: 129px;font-size: 11px;">
                                        <h4 style="width: 135px;height: 32px;color: rgb(255,255,255);font-size: 30px;"> <?php
                                                $query = "SELECT * FROM admins";
                                                $get_admins = mysqli_query($connection, $query);
                                                $count_admins = mysqli_num_rows($get_admins);
                                                echo $count_admins;
                                              ?> Admins</h4>
                                    </div>
                                    <div class="col text-right" style="width: 85px;"><i class="fa fa-list" style="width: 60px;height: 54px;color: rgb(255,255,255);font-size: 57px;"></i></div>
                                </div>
                                </div><a class="btn btn-primary text-center border-white p-2 mr-2 mb-2" role="button" href="#" style="width: 294px;margin: 0px;margin-right: 0px;margin-bottom: 0px;padding: 0px;padding-top: 0px;padding-right: 0px;padding-bottom: 0px;padding-left: 0px;background-color: rgb(255,255,255);color: rgb(0,0,0);font-weight: bold;height: 42px;">View Details&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-arrow-circle-right" style="width: 24px;height: 25px;color: rgb(0,0,0);font-size: 20px;"></i></a></div>
                    </div>
                    <div class="col-4 py-3 mx-auto col-xl-4 col-lg-6 col-md-6 col-sm-12" style="min-width: 300px;min-height: 300px;width: 281px;height: 294px;padding: 0px;padding-top: -10px;margin: 0px;margin-right: 0px;margin-left: 0px;padding-bottom: 1px;">
                        <div class="card shadow-lg" style="margin-right: 1px;padding-right: 0px;width: 298px;height: 182px;min-width: 0px;">
                            <div class="card-body" style="height: 89px;background-color: #c9cc4a;">
                                <div class="row">
                                    <div class="col" style="width: 129px;font-size: 11px;">
                                        <h4 style="width: 100px;height: 32px;color: rgb(255,255,255);font-size: 34px;"> <?php
                                                $query = "SELECT * FROM users";
                                                $get_users = mysqli_query($connection, $query);
                                                $count_users = mysqli_num_rows($get_users);
                                                echo $count_users;
                                              ?> Users</h4>
                                    </div>
                                    <div class="col text-right" style="width: 85px;"><i class="fa fa-users" style="width: 60px;height: 54px;color: rgb(255,255,255);font-size: 64px;"></i></div>
                                </div>
                                </div><a class="btn btn-primary text-center border-white p-2 mr-2 mb-2" role="button" href="#" style="width: 294px;margin: 0px;margin-right: 0px;margin-bottom: 0px;padding: 0px;padding-top: 0px;padding-right: 0px;padding-bottom: 0px;padding-left: 0px;background-color: rgb(255,255,255);color: rgb(0,0,0);font-weight: bold;height: 42px;">View Details&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-arrow-circle-right" style="width: 24px;height: 25px;color: rgb(0,0,0);font-size: 20px;"></i></a></div>
                    </div>
                </div>
                </div><?php 


require_once 'Reports.php';

$current_day = date('d');
$current_month = date('F');
$current_year = date('Y');

$yearly_sales = Reports::get_yearly_sales();
$yearly_title = "$current_month " . ($current_year - 1) .  "-$current_year";

$monthly_sales = Reports::get_monthly_sales();
$monthly_title = $monthly_sales[0]['SalesMonth'] . " " . $monthly_sales[0]['SalesDay'] . " - " . end($monthly_sales)['SalesMonth'] . " " . end($monthly_sales)['SalesDay'];

$weekly_sales = Reports::get_weekly_sales();
$week_title =  $weekly_sales[0]['SalesDate'] . " - " . end($weekly_sales)['SalesDate'];


 
      ?>

<br>
<br>
<br>

<div class="container">

<div id="week">
    <div class="col-lg-12" style="margin-bottom:40px; border: 3px solid black; border-radius: 25px;">
        <canvas id="weeklyChart"></canvas>

    </div>
    </div>


<div id="month">
        <div class="row">
            <div class="col-lg-12" style="margin-bottom:40px; border: 3px solid black; border-radius: 25px;">
                <canvas id="monthlyChart"></canvas>
            </div>

</div>


            <div id="year">
                <div class="row">

                    <div class="col-lg-12" style="margin-bottom:40px; border: 3px solid black; border-radius: 25px;">
                        <canvas id="yearlyChart"></canvas>
                    </div>
                </div>

            </div>
        </div>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
        <script>
            var yearly_chart = document.getElementById('yearlyChart').getContext('2d');
            var chart = new Chart(yearly_chart, {
                // The type of chart we want to create
                type: 'bar',
                // The data for our dataset
                data: {
                    labels: [
                        <?php foreach($yearly_sales as $key => $item){echo '"' . $item['SalesMonth'] . ' ('. $item['SalesYear'] . ')",';} ?>
                    ],

                    datasets: [{
                        label: "Sales",
                        borderColor: 'green',
                        backgroundColor: 'blue',
                        data: [
                            <?php foreach($yearly_sales as $key => $item){echo $item['TotalPrice'] . ',';} ?>
                        ],
                    }]
                },

                // Configuration options go here
                options: {
                    title: {
                        display: true,
                        text: 'Deftac Membership Yearly Sales Report (<?php echo $yearly_title ?>)',
                        fontSize: 18,
                        fontString: 'sans-serif',
                        fontColor: 'blue'

                    },
                    layout: {
                        padding: {
                            left: 150,
                            right: 150,
                            top: 150,
                            bottom: 150
                        }
                    }
                }
            });



            var monthly_chart = document.getElementById('monthlyChart').getContext('2d');
            var chart = new Chart(monthly_chart, {
                // The type of chart we want to create
                type: 'line',
                // The data for our dataset
                data: {
                    labels: [
                        <?php foreach($monthly_sales as $key => $item){echo '"' . $item['SalesMonth'] . ' '. $item['SalesDay'] . '",';} ?>
                    ],

                    datasets: [{
                        label: "Sales",
                        borderColor: 'blue',
                        backgroundColor: 'green',
                        data: [
                            <?php foreach($monthly_sales as $key => $item){echo $item['TotalPrice'] . ',';} ?>
                        ],
                    }]
                },

                // Configuration options go here
                options: {
                    title: {
                        display: true,
                        text: 'Deftac Membership Monthly Sales Report (<?php echo $monthly_title ?>)',
                        fontSize: 18,
                        fontString: 'sans-serif',
                        fontColor: 'green'
                    },
                    layout: {
                        padding: {
                            left: 150,
                            right: 150,
                            top: 150,
                            bottom: 150
                        }
                    }
                }
            });


            var weekly_chart = document.getElementById('weeklyChart').getContext('2d');
            var chart = new Chart(weekly_chart, {
                // The type of chart we want to create
                type: 'horizontalBar',
                // The data for our dataset
                data: {
                    labels: [
                        <?php foreach($weekly_sales as $key => $item){echo '"' . $item['SalesDay'] . ' '. $item['SalesDate'] . '",';} ?>
                    ],

                    datasets: [{
                        label: "Sales",
                        borderColor: 'yellow',
                        backgroundColor: 'orange',
                        data: [
                            <?php foreach($weekly_sales as $key => $item){echo $item['TotalPrice'] . ',';} ?>
                        ],
                    }]
                },

                // Configuration options go here
                options: {
                    title: {
                        display: true,
                        text: 'Deftac Membership Weekly Sales Report (<?php echo $week_title ?>)',
                        fontSize: 18,
                        fontString: 'sans-serif',
                        fontColor: 'orange',

                    },
                    layout: {
                        padding: {
                            left: 150,
                            right: 150,
                            top: 150,
                            bottom: 150
                        }
                    }
                }
            });
        </script>
        <script src="js/jquery-2.1.1.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/classie.js"></script>
        <script src="js/cbpAnimatedHeader.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/inspinia.js"></script>
        <script src="js/pace.min.js"></script>
        <script src="js/login.js"></script>
    </div>

    </div>
                  <?php
                  $query = "SELECT * FROM posts WHERE post_status ='Draft'";  //Draft Posts
                  $get_draft_posts = mysqli_query($connection, $query);
                  $count_drafts  = mysqli_num_rows($get_draft_posts);
                  
                  $query = "SELECT * FROM comments WHERE comment_status ='Unapproved'";  //Unapproved Comments
                  $get_unapproved_comment = mysqli_query($connection, $query);
                  $unapproved_comment_count  = mysqli_num_rows($get_unapproved_comment);
                  
                  $query = "SELECT * FROM users WHERE isActive ='1'";  //Subscriber Count
                  $get_subscriber = mysqli_query($connection, $query);
                  $count_subscriber  = mysqli_num_rows($get_subscriber);

                  $query = "SELECT * FROM admins WHERE isactive ='1'";  //Subscriber Count
                  $get_admins = mysqli_query($connection, $query);
                  $count_admins  = mysqli_num_rows($get_admins);
                  ?>
                  


    <?php include "includes/footer.php"; ?>
</body>

</html>