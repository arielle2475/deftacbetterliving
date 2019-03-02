<?php include "includes/admin_header.php"; ?>


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
                <li  class="active">
                <a href="#adminSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Admins</a>
                    <ul class="collapse list-unstyled" id="adminSubmenu">
                        <li>
                            <a href="adminlist.php">Admin List</a>
                        </li>
                        <li  class="active">
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
                <li class="active">
                    <a href="calendar.php">Calendar</a>
                </li>

            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a href="profile.php" class="download">Profile</a>
                </li>
                <li>
                    <a href="../signin/login.php" class="article">Logout</a>
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
                    <h1>Admin Status</h1>
                    <div class="table-responsive border rounded shadow-lg" style="background-color: #ffffff;">
                                                  
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
                                  $avatar_path = $mysqli->real_escape_string('..//images/'.$_FILES['adminavatar']['name']);
                                  

                                  //make sure filetype is image
                                  // if (preg_match("!images!",$_FILES['avatar']['type']))   {         
                                
                                    //copy image to images/ folder 
                                  if (copy($_FILES['adminavatar']['tmp_name'], $avatar_path)) {
                                        //set session variables to display on welcome page


                              //create SQL query string for inserting data into the database
                              $sql = "INSERT INTO admins (adminname, adminemail, password, adminavatar) "
                              . "VALUES ('$username', '$email', '$password', '$avatar_path')";
                                      
                                      
                                          if ($mysqli->query($sql) === true){
                                              $_SESSION['message'] = "Registration successful!"
                                              . "Added $username to the database!";
                                              header("location: ../admin/adminlist.php");
                                          }
                                          else {
                                              $_SESSION['message'] = 'User could not be added to the database!';
                                          }
                                          // $mysqli->close();          
                                      }
                                    else {
                                          $_SESSION['message'] = 'File upload failed!';
                                      }
                                    }
                                //  else {
                                //      $_SESSION['message'] = 'Please only upload GIF, JPG or PNG images!';
                                //  }
                              //}
                              else {
                                    $_SESSION['message'] = 'Two passwords do not match!';
                                }
                                }


                              ?>
                 <form class="form" action="editadmin.php" method="post" enctype="multipart/form-data" autocomplete="off">
                 <div class="alert alert-error"><?= $_SESSION['message'] ?></div>    

                    <div class="form-row profile-row" style="padding: 13px;">
                    
                        <div class="col-md-4 relative">
                                <div class="avatar-bg center">
                            </div>
                            <input type="file" class="form-control" name="adminavatar" accept="image/*" required></div>
                        <div class="col-md-8">
                            <h1>Admin Profile </h1>
                            <hr>
                            <div class="form-row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group"><label>Username</label>
                                    <input class="form-control" type="text" name="adminname"></div>
                                </div>
                            </div>
                            <div class="form-group"><label>Email </label>
                            <input class="form-control" type="email" autocomplete="off" required="" name="adminemail"></div>
                            <div class="form-row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group"><label>Password </label>
                                    <input class="form-control" type="password" name="password" autocomplete="new-password" required=""></div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group"><label>Confirm Password</label>
                                    <input class="form-control" type="password" name="confirmpassword" autocomplete="new-password" required=""></div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-row">
                                <div class="col-md-12 content-right">
                                <input type="submit" value="Register Admin" name="register" style="font-weight:bold;" class="btn btn-success form-btn" />
                                    <button class="btn btn-danger form-btn" style="font-weight:bold;" type="reset">Cancel </button></div>
                            </div>
                        </div>
                    </div>
                </form>




 
                   
                </div>
            </div>
        </div>
    </div>

        <?php include "includes/footer.php"; ?>

</body>
</html>


   