<?php include "includes/admin_header.php"; ?>
<?php include "includes/delete_modal.php"; ?>


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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  .name {
  float: right;
  
}

.h{
color:white;

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
 <div id="imageModal" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
  <div class="modal-container">

   <form method="POST" id="edit_image_form">
   <div class="modal-header bg-dark" style="background-color: black;height: 66px;padding: 13px;">
   <h4 class="modal-title" style="padding-top:10px;color: rgb(255,255,255); font-weight:bold;">Update Desciption</h4>
   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
    </div>
    <div style="padding-top: 8px;" class="modal-body" style="height: 98px;">
     <div class="form-group">
      <label>Image Name</label>
      <input type="text" name="image_name" id="image_name" class="form-control" readonly />
     </div>
     <div class="form-group">
      <label>Image Description</label>
      <input type="text" name="image_description" id="image_description" class="form-control" />
     </div>
    </div>
    <div class="modal-footer" style="height: 57px;">
     <input type="hidden" name="image_id" id="image_id" value="" />
     <input type="submit" name="submit" class="btn" style="font-weight:bold; color:white;background-color: #ffd221;" value="Edit" />
     <button class="btn " type="button" data-dismiss="modal" style="font-weight:bold; background-color: #d1101a; color:white;">Cancel</button>
    </div>
   </form>
  </div>
 </div>
</div>


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
            <li class="active">
                <a class="h ha"  href="#gallerySubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Gallery</a>
                <ul class="collapse list-unstyled" id="gallerySubmenu">
                    <li>
                        <a class="h ha active"  href="gallery.php">View Images</a>
                    </li>
                    <li>
                        <a class="h ha"  href="video.php">View Videos</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="h ha"  href="calendar.php">Calendar</a>
            </li>
            <li >
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
                        <h1  style="font-size:40px;">Welcome, <span class="user"><?= $_SESSION['adminname'] ?></span></p>
                        </li>

                    </ul>
                </div>
            </div>
        </nav> 
        
                    <div class="form-group pull-right col-lg-4" ><input type="text" id="myInput" onkeyup="myFunction()" ptitle="Type in a name"  placeholder="Search Username" class="search form-control"></div>
                    <h1 style="font-size:45px;"data-aos="fade-up" data-aos-once="true" >Gallery Editor</h1>
                    <div class="table-responsive border rounded shadow-lg" data-aos="fade-up" data-aos-once="true" style="background-color: #ffffff;">
                    <div class="container">
                        <br>
                        <div align="right">
                            <input style="color:white;"type="file" name="multiple_files" id="multiple_files" multiple />
                            <br>
                            <span class="text-muted">Only .jpg, png, .gif file allowed</span>
                            <span id="error_multiple_files"></span>
                        </div>
<br>
                             <div class="table-responsive" id="image_table">
    
                            </div>
                </div>
            </div>
        </div>
    </div> 


    <?php delete_images(); ?>




 </body>
</html>

<script>
$(document).ready(function(){
 load_image_data();
 function load_image_data()
 {
  $.ajax({
   url:"gallery/fetch.php",
   method:"POST",
   success:function(data)
   {
    $('#image_table').html(data);
   }
  });
 } 
 $('#multiple_files').change(function(){
  var error_images = '';
  var form_data = new FormData();
  var files = $('#multiple_files')[0].files;
  if(files.length > 10)
  {
   error_images += 'You can not select more than 10 files';
  }
  else
  {
   for(var i=0; i<files.length; i++)
   {
    var name = document.getElementById("multiple_files").files[i].name;
    var ext = name.split('.').pop().toLowerCase();
    if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
    {
     error_images += '<p>Invalid '+i+' File</p>';
    }
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("multiple_files").files[i]);
    var f = document.getElementById("multiple_files").files[i];
    var fsize = f.size||f.fileSize;
    if(fsize > 2000000)
    {
     error_images += '<p>' + i + ' File Size is very big</p>';
    }
    else
    {
     form_data.append("file[]", document.getElementById('multiple_files').files[i]);
    }
   }
  }
  if(error_images == '')
  {
   $.ajax({
    url:"gallery/upload.php",
    method:"POST",
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
     $('#error_multiple_files').html('<br /><label class="text-primary">Uploading...</label>');
    },   
    success:function(data)
    {
     $('#error_multiple_files').html('<br /><label class="text-success">Uploaded</label>');
     load_image_data();
    }
   });
  }
  else
  {
   $('#multiple_files').val('');
   $('#error_multiple_files').html("<span class='text-danger'>"+error_images+"</span>");
   return false;
  }
 });  
 $(document).on('click', '.edit', function(){
  var image_id = $(this).attr("id");
  $.ajax({
   url:"gallery/edit.php",
   method:"post",
   data:{image_id:image_id},
   dataType:"json",
   success:function(data)
   {
    $('#imageModal').modal('show');
    $('#image_id').val(image_id);
    $('#image_name').val(data.image_name);
    $('#image_description').val(data.image_description);
   }
  });
 }); 
 $(document).on('click', '.delete', function(){
  var image_id = $(this).attr("id");
  var image_name = $(this).data("image_name");
  if(confirm("Are you sure you want to remove it?"))
  {
   $.ajax({
    url:"gallery/delete.php",
    method:"POST",
    data:{image_id:image_id, image_name:image_name},
    success:function(data)
    {
     load_image_data();
     alert("Image removed");
    }
   });
  }
 }); 
 $('#edit_image_form').on('submit', function(event){
  event.preventDefault();
  if($('#image_name').val() == '')
  {
   alert("Enter Image Name");
  }
  else
  {
   $.ajax({
    url:"gallery/update.php",
    method:"POST",
    data:$('#edit_image_form').serialize(),
    success:function(data)
    {
     $('#imageModal').modal('hide');
     load_image_data();
     alert('Image Details updated');
    }
   });
  }
 }); 
});
</script>
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
    <script src="assets/js/bs-animation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
