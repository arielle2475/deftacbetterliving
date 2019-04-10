<?php include "includes/admin_header.php"; ?>
<?php include "includes/confirm_admin_modal.php"; ?>
<?php include "includes/delete_modal.php"; ?>

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
 <!-- Footer -->
 <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="assets/js/-Filterable-Gallery-with-Lightbox-BS4-.js"></script>
    <script src="assets/js/agency.js"></script>
    <script src="assets/js/bs-animation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="assets/js/Dynamically-Queue-Videos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
    <script src="https://www.youtube.com/iframe_api"></script>
    <script src="assets/js/Profile-Edit-Form.js"></script>
    <script src="assets/js/SlideShow.js"></script>
    <script src="assets/js/Swipe-Slider-9.js"></script>
    <script src="assets/js/Swiper-Slider-Card-For-Blog-Or-Product.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });
    </script>
 <!-- Data Tables -->
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
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
                <li class="active">
                <a href="#adminSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Admins</a>
                    <ul class="collapse list-unstyled" id="adminSubmenu">
                        <li class="active">
                            <a href="adminlist.php">Admin Status</a>
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
                    <h1>Admin Status</h1>
                    <div class="table-responsive border rounded shadow-lg" style="background-color: #ffffff; padding:30px;">

                        <table id="myTable" class="table table-striped table-bordered"> 
                            <thead>
                                <tr class="text-center" style="color: rgb(255,255,255);background-color: #333332;">
                                    <th class="border rounded-0">Avatar</th>
                                    <th class="border rounded-0">Username</th>
                                    <th class="border rounded-0">Email Address</th>
                                    <th class="border rounded-0">Status</th>
                                    <th class="border rounded-0">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            <?php  //delete admins
                                 delete_admins();
                                ?>
                            <?php
                            // DISPLAY THE images:
                            //Select the images from the table limited as per our $offet and $per_page total:
                            $result = mysqli_query($connection, "SELECT * FROM admins ORDER by id ASC ");

                            while($row = mysqli_fetch_array($result)) {//Open the while array loop

                            //Define the image variable:
                            $admins=$row['adminname'];
                            $id = $row['id'];


                                    echo "<tr>
                                    <td class='text-center border rounded-0'><img class='img-thumbnail border rounded-0 shadow-sm' src='".$row['adminavatar']."' width='100px' height='100px' style='width: 100px;'></td>
                                    <td class='border rounded-0'>" . $row["adminname"]. "</td> 
                                    <td class='border rounded-0'>" . $row["adminemail"]. "</td>";

                            $active=$row['isactive'];

                            $row = json_encode($row);

                                    if($active==1){
                                    echo "<td class='text-center border rounded-0'><button class='btn p-2 mr-2 mb-2' data-toggle='modal' data-target='#confirmModal' data-user='$row' style='color: white;font-weight: bold;background-color: rgb(40,167,69);'>Active</button>
                                    </td>";    
                                }
                                    if($active==0){
                                    echo "<td class='text-center border rounded-0'><button class='btn p-2 mr-2 mb-2'data-toggle='modal' data-target='#confirmModal' data-user='$row' style='color: white;font-weight: bold;background-color: rgb(220,53,69);'>Blocked</button>
                                    </td>";    
                                }

                                echo"<td class='text-center border rounded-0'><a class='btn p-2 mr-2 mb-2' style='color: white;font-weight: bold;background-color: rgb(220,53,69);' data-toggle='modal' data-target='#myModal' data-href='adminlist.php?delete=$id' href='javascript:void(0)'>Delete</a> 
                                </td></tr>";

                            }//Close the while array loop

                            echo '</div> </tbody>
                            </table>';// Gallery end
                          
                            echo '<div class="clearfix"></div>';// Gallery end
                            ?>
         </div></div>              
                    </div>
                </div>
            </div>
        </div>
    </div>



<!-- Admin Modal -->
<?php include "includes/confirm_admin_modal.php"; ?>
           <script>

$('#myModal').on('show.bs.modal', function (e) {
  
      $(this).find('.modal_delete_link').attr('href', $(e.relatedTarget).data('href'));

  });

$('#confirmModal').on('show.bs.modal', function (e) {
  
    let user = JSON.parse(e.relatedTarget.dataset.user);
    console.log(user);
    let number = 'Admin #';
    let title = 'Are you sure you want to ';
    let titleQuestion = user.isactive === '1' ? 'deactivate?' : 'activate?';
    let buttonStyle = user.isactive === '1' ? 'btn-danger' : 'btn-success';
    let buttonStyleOpposite = user.isactive === '0' ? 'btn-danger' : 'btn-success';
    let buttonText = user.isactive === '1' ? 'Deactivate' : 'Activate';
    let formAction = user.isactive === '1' ? 'includes/deactivateadmin.php?update='+user.id : 'includes/activateadmin.php?update='+user.id;
    
    document.querySelector('#userID').textContent = number + user.id;
    document.querySelector('#confirmTitle').textContent = title + titleQuestion;
    document.querySelector('#userImage').src = user.adminavatar;
    document.querySelector('#userName').textContent = user.adminname;
    document.querySelector('#userEmail').textContent = user.adminemail;
    
    document.querySelector('#confirmButton').value = buttonText;
    document.querySelector('#confirmButton').classList.add(buttonStyle);
    document.querySelector('#confirmButton').classList.remove(buttonStyleOpposite);

    document.querySelector('#confirmForm').action = formAction;
});

$(document).ready(function(){

// Number of rows selection
$("#num_rows").change(function(){

    // Submitting form
    $("#form").submit();

});
});
</script>
      
</body>
</html>
<script>
$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>