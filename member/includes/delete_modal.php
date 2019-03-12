<!-- Trigger the modal with a button -->
<!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->


<!-- Modal  -->
<div id="myModal" class="modal fade" role="dialog" tabindex="-1" style="opacity: 1;font-family: Montserrat, sans-serif;">
<div class="modal-dialog" role="document">
<!-- Modal Content -->
   
   <div class="modal-content">
       
       <div class="modal-container">
          <div class="modal-header" style="color: rgb(255,255,255);background-color: rgb(255,193,7);">
        <h5 class="modal-title" style="font-weight:bold;">Edit Profile</h5>
        <button type="button"  class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body  d-flex d-lg-flex justify-content-center justify-content-lg-center align-items-lg-center" >

        <section  style="height: 950px;padding-top: 0px;background-color: #ffffff;font-family: Montserrat, sans-serif; padding:10px; max-width: 600px;width: 600px;">
           
        <?php
        include "config.php";

        $query="SELECT*
        FROM users
        INNER JOIN mfillup ON users.username= mfillup.username WHERE users.username = '" . $_SESSION['username'] . "'";

        $run = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($run, MYSQLI_BOTH)) {
            $name = $row['username'];
        $gender = $row['u_gender'];
        $lname = $row['u_lname'];
        $fname = $row['u_fname'];
        $age = $row['u_age'];
        $address = $row['u_address'];
        $contact = $row['u_contact'];
        $desc = $row['u_joindesc'];
        $email = $row['email'];

        }
        ?>
        <?php
        $mysqli = new mysqli('localhost', 'root', "" , 'thesis');
        $sql = 'SELECT username, avatar FROM users';
        $result = $mysqli->query($sql); 
        
        ?>     

     <form action=""  method="post" enctype="multipart/form-data">
        <br>
       <center> <span class="user"><img class="rounded-circle mx-auto" src='../Signin/images/<?= $_SESSION['avatar']?>' width="100" height="100"></span><br/></center>
       <input class="btn" type="file" name="avatar" value="../Signin/images/<?= $_SESSION['avatar']?>"  /> 
        <td colspan="2">
        <input class="btn btn-warning" style="color:white;" type="submit" name="update" onsubmit="setTimeout(function () { window.location.reload(); }, 10)"value="Update Avatar"/></td></form>

        <form method="POST" action="edit.php">
        
        <div class="form-group" ><label style="margin-bottom:-13px; font-weight:bold;">Username</label></div>   
        <input type="text" name="username" value="<?php echo $_SESSION['username'] ?>" required="required" pattern="^[a-zA-Z0-9]+$" placeholder="Enter First Name" class="form-control">
          
            <div class="form-group" style="padding-top:10px "><label style="margin-bottom:-13px; font-weight:bold;">Firstname</label></div>
            <input  type="text" name="u_fname" value="<?php echo $fname; ?>" required="required" pattern="^[a-zA-Z_ ]+$" placeholder="Enter First Name" class="form-control">
            <div class="form-group" style="padding-top:10px "><label style="margin-bottom:-13px; font-weight:bold;">Lastname</label></div>
            <input  type="text" name="u_lname" value="<?php echo $lname ?>" required="required" pattern="^[a-zA-Z]+$" placeholder="Enter Last Name" class="form-control">
            <div class="form-group" style="padding-top:10px "><label style="margin-bottom:-13px; font-weight:bold;">Email</label></div>
            <input  type="email" name="email" value="<?php echo $email ?>" required="required" placeholder="Enter Email" class="form-control">

            <div class="form-group" style="padding-top:10px "><label style="margin-bottom:-13px; font-weight:bold;">Gender</label></div>
            <input  type="text" name="u_gender" value="<?php echo $gender ?>" required="required" pattern="^[a-zA-Z]+$" placeholder="Enter Gender" class="form-control">

            <div class="form-group" style="padding-top:10px "><label style="margin-bottom:-13px; font-weight:bold;">Age</label></div>
            <input type="text" name="u_age" value="<?php echo $age ?>" required="required" pattern="^[0-9]+$" placeholder="Enter Age" class="form-control">

            <div class="form-group" style="padding-top:10px "><label style="margin-bottom:-13px; font-weight:bold;">Address</label></div>
            <input type="text" name="u_address" value="<?php echo $address ?>"  required="required" placeholder="Enter Address" class="form-control">

            <div class="form-group" style="padding-top:10px "><label style="margin-bottom:-13px; font-weight:bold;">Contact</label></div>
            <input type="text" name="u_contact" value="<?php echo $contact ?>"  required="required" pattern="^[\d\(\)\-+]+$" placeholder="Enter Contact" class="form-control">
            <div class="form-group" style="padding-top:10px "><label style="margin-bottom:-13px; font-weight:bold;">Why did you join?</label></div>
            <input type="text" name="u_joindesc" value="<?php echo $desc ?>" required="required" pattern="^[a-zA-Z\._ ]+$" placeholder="" class="form-control">
  
       <div class="modal-footer" style="height: 57px;">
       <button class="btn btn-warning form-btn" type="submit" name="submit" style="margin-top:20px; color:white;"  >Update</button>
       <button class="btn btn-danger" type="button" data-dismiss="modal" style="margin-top:20px; font-weight:bold; color: rgb(255,255,255);">Cancel</button></div>
    </form> 


    </div>             
       </div>
    </div>
   </div>
   </div>
</div>