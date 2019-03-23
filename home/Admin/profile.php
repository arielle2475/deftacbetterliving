<?php include"includes/admin_header.php"; ?>
<?php
if(isset($_SESSION['adminname'])){
    
    $profile_user = $_SESSION['adminname'];
    $query = "SELECT * FROM admins WHERE adminname = '$profile_user'";
    $edit_user_profile = mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($edit_user_profile)){
        
        $username = $row['adminname'];
        $user_password = $row['password'];
        $user_image = $row['adminavatar'];
        $user_email = $row['adminemail'];
        $user_role = $row['isactive'];

    }
    
    if(isset($_POST['update_profile'])){
    $username = $_SESSION['adminname'];
    $user_password = $_POST['password'];
    
    $user_image = $_FILES['adminavatar']['name'];
    $tmp_user_image = $_FILES['adminavatar']['tmp_name'];
    
    $user_email = $_POST['adminemail'];
    $user_role = $_POST['isActive'];
    move_uploaded_file($tmp_user_image, "./images/$user_image");
        
        if(!$user_image){
            $query = "SELECT * FROM admins WHERE adminname = '$profile_user'";
            $edit_user_profile = mysqli_query($connection,$query);
            while($row = mysqli_fetch_assoc($edit_user_profile)){

               $user_image = $row['adminavatar'];
            }
        }
    
    $query = "UPDATE admins SET password='$user_password',adminavatar='$user_image',adminemail='$user_email',isactive ='$user_role' WHERE admins ='$username' ";

    
    $create_user = mysqli_query($connection,$query);
    
    confirm_query($create_user);
    }
}


    

?>
    <div id="wrapper">

        <!-- Navigation -->
        <?php include"includes/admin_navigation.php"; ?>
         
    <!-- Content of the admin page --->
       
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to the Admin,
                            <small><?php echo $_SESSION['adminname']; ?></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="./index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Profile
                            </li>
                        </ol>
                        
                        
                        
                    </div>
                    <div class="col-md-12">
                        
                        <form action="" method="post" enctype="multipart/form-data">
                           <div class="col-md-5">
                               <div class="form-group">
                               <label for="adminavatar">Profile Image</label>
                               <p><img width="400px" src="./images/<?php echo $user_image; ?>" alt=""></p>
                                <input type="file" name="adminavatar">
                            </div>
                           </div>
                            <div class="col-md-6">
                            <h1 >User Profile</h1>
                            <div class="form-group">
                               <label for="adminname"> Username</label>
                                <input value='<?php echo $username; ?>' type="text" class="form-control" name="adminname" disabled>
                            </div>

                            <div class="form-group">
                               <label for="password"> Password</label>
                                <input value='<?php echo $user_password; ?>' type="password" class="form-control" name="password">
                            </div>


                            
                                 </select></p>
                            </div>

                           
                             <div class="form-group">
                               <label for="adminemail"> Email</label>
                                <input value='<?php echo $user_email; ?>' type="email" class="form-control" name="adminemail">
                            </div>

                            <div class="form-group text-center">
                                <input type="submit" value="Update Profile" class="btn btn-primary" name="update_profile">
                            </div>
                            </div>
                        </form>
                        

                    </div>
                    
                    
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include"includes/admin_footer.php"; ?>
