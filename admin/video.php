<?php ob_start(); ?>
<?php include "../includes/database.php" ?>
<?php 
include('../SignIn/serverAdmin.php');
if (isAdmin()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../signIn/loginAdmin.php');
}   


if(!isset($_SESSION['adminname']) && !isset($_SESSION['password'])){
	session_destroy();
	header('location: ../Signin/loginadmin.php?error=Login to access.');
    }
 ?>
<?php include "includes/delete_modal.php"; ?>
<?php include "functions.php"; ?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content=""> 

    <title>Admin | Deftac Betterliving</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="assets/css/button.css">
   
    <link rel="stylesheet" href="assets/css/Table-With-Search.css">

</head>

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
                <li  class="active">
                    <a href="#gallerySubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Gallery</a>
                    <ul class="collapse list-unstyled" id="gallerySubmenu">
                        <li>
                            <a href="gallery.php">View Images</a>
                        </li>
                        <li  class="active">
                            <a href="video.php">View Videos</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="tutorial.php">Tutorials</a>
                </li>
                <li>
                    <a href="calendar.php">Calendar</a>
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
                            <h1>Welcome, <span class="user"><?= $_SESSION['adminname'] ?></span></p>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav> <div class="col-md-12 search-table-col" data-aos="fade-up" data-aos-once="true" style="margin-top: 30px;padding-top: 0px;font-family: Montserrat, sans-serif;">
                    <div class="form-group pull-right col-lg-4"><input type="text" id="myInput" onkeyup="myFunction()" ptitle="Type in a name"  placeholder="Search Title" class="search form-control"></div>
                    <h1>Video Uploads</h1>
                    <div class="table-responsive border rounded shadow-lg" style="background-color: #ffffff;">


<?php 
$mysqli = new mysqli("localhost", "root", "", "thesis");
if(isset($_POST['submit'])){
$name= $_FILES['file']['name'];
$tmp_name= $_FILES['file']['tmp_name'];
$submitbutton= $_POST['submit'];
$position= strpos($name, "."); 
$fileextension= substr($name, $position + 1);
$fileextension= strtolower($fileextension);
$description= $_POST['description_entered'];
$success= -1;
$descript= 0;
if (empty($description))
{
$descript= 1;
}
if (isset($name)) {
$path= '../superadmin/videos/';
if (!empty($name)){
if (($fileextension !== "mp4") && ($fileextension !== "ogg") && ($fileextension !== "webm"))
{
$success=0;
echo '<div style="margin:20px;"class="alert alert-danger alert-dismissible ">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Upload Failed!</strong> The file extension must be .mp4, .ogg, or .webm in order to be uploaded
</div>';
}
else if (($fileextension == "mp4") || ($fileextension == "ogg") || ($fileextension == "webm"))
{
$success=1;
if (move_uploaded_file($tmp_name, $path.$name)) {
echo '<div style="margin:20px;"class="alert alert-success alert-dismissible ">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Upload Successful!</strong> The video has been uploaded!
</div>';
}
}
}
}
}
?>

<div class="table-responsive" style="padding: 10px;" >


<form action="" style="text-align: right; padding-bottom:0px;" method='POST' enctype="multipart/form-data">
<input class="btn" style="background:#333332; color:white;" type="file" name="file"/><br>
<input style="margin-top:10px;" type="text" placeholder="Video Title" name="description_entered"/>
<input class="btn btn-success" type="submit" name="submit" value="Upload"/>

</form>


<?php
//Block 1
$user = "root"; 
$password = ""; 
$host = "localhost"; 
$dbase = "thesis"; 
$table = "tbl_video"; 

//Block 3
$connection= mysqli_connect ($host, $user, $password,$dbase);
if (!$connection)
{
die ('Could not connect:' . mysqli_connect_error());
}
mysqli_select_db($connection, $dbase);

//Block 4
if((!empty($description)) && ($success == 1)){
    $sql = "INSERT INTO $table (description, filename, fileextension)
VALUES ('$description', '$name', '$fileextension')";
mysqli_query($connection, $sql);
}
//Block 5

//////FIRST WE SET UP THE TOTAL images PER PAGE & CALCULATIONS:
// Number of images per page, change for a different number of images per page

// number of rows per page
$per_page = 5;
if(isset($_POST['num_rows'])){
    $per_page = $_POST['num_rows'];
}
// Get the page and offset value:
if (isset($_GET['page'])) {
$page = $_GET['page'] - 1;
$offset = $page * $per_page;
}
else {
$page = 0;
$offset = 0;
} 

// Count the total number of images in the table ordering by their id's ascending:
$admins = "SELECT count(id) FROM tbl_video ORDER by id ASC";
$result = mysqli_query($connection, $admins);

$row = mysqli_fetch_array($result);
$total_admins = $row[0];

// Calculate the number of pages:
if ($total_admins > $per_page) {//If there is more than one page
$pages_total = ceil($total_admins / $per_page);
$page_up = $page + 2;
$page_down = $page;
$display ='';//leave the display variable empty so it doesn't hide anything
} 
else {//Else if there is only one page
$pages = 1;
$pages_total = 1;
$display = ' class="display-none"';//class to hide page count and buttons if only one page
} 

////// THEN WE DISPLAY THE PAGE COUNT AND BUTTONS:
?>

<table id="myTable" class="table">
                            <thead>
                                <tr class="text-center" style="color: rgb(255,255,255);background-color: #333332;">
                                    <th class="border rounded-0">ID</th>
                                    <th class="border rounded-0">Video</th>
                                    <th class="border rounded-0">Title</th>
                                    <th class="border rounded-0">Edit</th>
                                    <th class="border rounded-0">Delete</th>

                                </tr>
                            </thead>
                            <tbody>
                            <?php delete_videos(); ?>
                            <?php
                             include('conn.php');

                            // DISPLAY THE images:
                            //Select the images from the table limited as per our $offet and $per_page total:
                            $query = "SELECT * FROM tbl_video ORDER by id ASC LIMIT $offset, $per_page";
                            $result = mysqli_query($connection, $query);

                            while($row = mysqli_fetch_array($result)) {//Open the while array loop

                            //Define the image variable:
                            $id_field= $row['id'];
                            $videos_field= $row['filename'];
                            $video_show= "../superadmin/videos/$videos_field";
                            $descriptionvalue= $row['description'];
                            $fileextensionvalue= $row['fileextension'];
                            $admins=$row['id'];
                            echo "<tr>
                            <td class='border rounded-0'>" . $row["id"]. "</td> 
                            <td class='border rounded-0' align=center><video width='120' controls><source src='$video_show' type='video/$fileextensionvalue'>Your browser doesnot support the video tag.</video></td>


                            <td class='border rounded-0'>" . $row["description"]. "</td>"; ?> 
                            

                            <td class="border rounded-0 text-center"><a href="#edit_videos<?php echo $row['id']; ?>" style="font-weight:bold; color:white;" data-toggle="modal" class="btn btn-warning">Edit</a>
							</td>   
                            <td class='border rounded-0 text-center'><a href='javascript:void(0)' data-href='video.php?delete=$id_field' data-toggle='modal' data-target='#myModal' style='font-weight:bold;' class='btn btn-danger'>Delete</a></td>
                            <?php include('edit_videos_modal.php'); ?>

                            </tr>  
<?php

                            }//Close the while array loop

                            echo '</div> </tbody>
                            </table></div>';// Gallery end
                          
                            echo '<div class="clearfix"></div>';// Gallery end


                          
?>
         </div>                  <div id="pagination"><!-- #pagination start -->
<?php 
                            $i = 1;//Set the $i counting variable to 1

                            echo '<div style="text-align: center; padding:10px;"  id="pageNav"'.$display.'>';//our $display variable will do nothing if more than one page
                            echo '<h6'.$display.'>Page '; echo $page + 1 .' of '.$pages_total.'</h6>';//Page out of total pages

                            // Show the page buttons:
                            if ($page) {
                            echo '  <div class="btn-group mr-2" role="group" aria-label="First group">
                            <a href="video.php"><button  class="btn btn-outline-dark" style="color="black; padding:5px;"><<</button></a>';//Button for first page [<<]
                            echo '<a href="video.php?page='.$page_down.'"><button  class="btn btn-outline-dark"><</button></a>';//Button for previous page [<]
                            } 

                            for ($i=1;$i<=$pages_total;$i++) {
                            if(($i==$page+1)) {
                            echo '<a href="video.php?page='.$i.'"><button  class="btn btn-outline-dark active">'.$i.'</button></a>';//Button for active page, underlined using 'active' class
                            }
                            
                            //In this next if statement, calculate how many buttons you'd like to show. You can remove to show only the active button and first, prev, next and last buttons:
                            if(($i!=$page+1)&&($i<=$page+3)&&($i>=$page-1)) {//This is set for two below and two above the current page
                            echo '<a href="video.php?page='.$i.'"><button  class="btn btn-outline-dark">'.$i.'</button></a>'; }
                            } 

                            if (($page + 1) != $pages_total) {
                            echo '<a href="video.php?page='.$page_up.'"><button  class="btn btn-outline-dark">></button></a>';//Button for next page [>]
                            echo '<a href="video.php?page='.$pages_total.'"><button  class="btn btn-outline-dark">>></button></a>';//Button for last page [>>]
                            }
                            echo "</div></div>";// #pageNav end
                            ?>

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
                td = tr[i].getElementsByTagName("td")[2];
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



 </body>
</html>
