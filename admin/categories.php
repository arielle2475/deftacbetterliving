<?php include "includes/admin_header.php"; ?>
<?php include "includes/delete_modal.php"; ?>
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
                            <a href="adminlist.php">Admin Status</a>
                        </li>
                        <li>
                            <a href="editadmin.php">Add Admin</a>
                        </li>

                    </ul>
                </li>
                <li  class="active">
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Blog</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="posts.php">View Posts</a>
                        </li>
                        <li>
                            <a href="categories.php">View Categories</a>
                        </li>
                        <li  class="active">
                            <a href="comment.php">View Comments</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="calendar.php">Calendar</a>
                </li>
                <li >
                <a class="h ha"  href="gallery.php">Gallery</a>
            </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a href="profile.php" class="btn p-2 mr-2 mb-2  download" style="color:black; font-weight:bold;">Profile</a>
                </li>
                <li>
                    <a class="btn p-2 mr-2 mb-2 btn-danger article" href="../signin/login.php" style="color:white; font-weight:bold;">Logout</a>
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
            </nav>
                <div class="col-md-12 search-table-col" data-aos="fade-up" data-aos-once="true" style="margin-top: 30px;padding-top: 0px;font-family: Montserrat, sans-serif;">
                    <div class="form-group pull-right "><input type="text" id="myInput" onkeyup="myFunction()" ptitle="Type in a category"  placeholder="Search Category" class="search form-control"></div>
                    <h1>Categories</h1>
                    <div class="row" style="padding-top:30px;">
                        <div class="col-sm-6">

                        <?php insert_categories(); ?>
                        <form action="" method="post">
                            <div class="form-group">
                            <label for="cat_title">Category's Name</label>
                            <input type="text" placeholder="Eg.PHP" name="cat_title" class="form-control">
                            </div>
                            <div class="form-group">
                            <input type="submit" name="submit" class="btn" style="color: white;font-weight: bold;background-color: rgb(40,167,69);" value="Add Category">
                            </div>
                        </form>
      
                        <?php  //Show update function
                        
                            if(isset($_GET['update'])){
                            
                                $cat_id =$_GET['update'];
                                include "includes/update_categories.php";
                        
                            }
                            
                        ?>   
                        </div>
                        <div class="col-md-6">
                            <div class="table-responsive border rounded shadow-lg" style="background-color: #ffffff;">
                            <table id="myTable" class="table">
                                <thead class="thead-dark">
                                    <tr class="text-center" style="color: rgb(255,255,255);background-color: #333332;">
                                        <th class="border rounded-0">Id</th>
                                        <th class="border rounded-0">Category Title</th>
                                        <th class="border rounded-0">Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php  //Displasy table from categories
                                    include "includes/view_all_categories.php";?>
                                    
                                    
                                <?php  //delete categories
                                 delete_categories();
                                ?>
                                 
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <p class="text-center" style="padding-top:40px;">Note: * Deleting categories will also delete the their corresponding posts *</p>
                    
                    
                </div>
               
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    
 
     <script>
            function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
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

$('#myModal').on('show.bs.modal', function (e) {
  
      $(this).find('.modal_delete_link').attr('href', $(e.relatedTarget).data('href'));

  });

</script>
</div>
</div>
    <?php include "includes/footer.php"; ?>
