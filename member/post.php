<?php include "includes/database.php"; ?>
<?php include "../admin/functions.php"; ?>
<?php 
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
    session_destroy();
    header('location: ../Signin/login.php?error=Login to access.');
    }
?><!DOCTYPE html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Post | Deftac Betterliving</title>

  
    <?php include "includes/header.php"; ?>

  
    </head>
</head>
<body style="font-family: Montserrat, sans-serif;">
<nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark" id="mainNav" style="padding-top: 10px;padding-bottom: 10px;">
                <div class="container"><a class="navbar-brand" href="welcome.php" style="background-size: contain;"><img class="img-fluid" src="../assets/img/deftacmain.png" width="140px" data-bs-hover-animate="wobble"></a><button class="navbar-toggler navbar-toggler-right" data-toggle="collapse"
                            data-target="#navbarResponsive" type="button" data-toogle="collapse" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                        <div class="collapse navbar-collapse" id="navbarResponsive">
                            <ul class="nav navbar-nav ml-auto text-uppercase" style="margin-top:10px;">
                              <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="welcome.php">Home</a></li>
                              <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger active" href="bloghome.php">Blog</a></li>
                              <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="gallery.php">Gallery</a></li>
                              <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="coaches.php">Coaches</a></li>
                              <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="index.php">CHAt</a></li>
                              <li class="nav-item dropdown" style="opacity: 0.93;" ><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#" style="margin-top: -10px;">MY Account&nbsp;<span class="user"><img width="45px" class="rounded-circle mx-auto" height="45px" src='../Signin/<?= $_SESSION['avatar']?>' </span></a>
                              <div class="dropdown-menu border-dark" role="menu" data-aos="fade-up" data-aos-once="true" style="background-color: rgb(52,58,64);">
                              <div class="nav-item" role="presentation"><a class="nav-link" href="userprofile.php">My Profile</a></>        
                              <div class="nav-item" role="presentation"><a class="nav-link" href="../index.php">Logout</a></>        
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                  <?php
                    
                    $query = "SELECT * FROM categories";
                    $getData = mysqli_query($connection, $query);
                    
                    while($row = mysqli_fetch_assoc($getData)){
                        $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title'];
                        
                        $class_category = '';
                        $registration = 'registration.php';
                        $registration_class = '';
                        $contact = 'contact.php';
                        $contact_class = '';
                        
                        $pageName = basename($_SERVER['PHP_SELF']);
                        
                        if(isset($_GET['cat_id']) && $_GET['cat_id'] == $cat_id){
                            $class_category = 'active';
                        }
                        else if($pageName == $registration){
                            $registration_class ='active';
                        }
                        else if($pageName == $contact){
                            $contact_class = 'active';
                        }
                        
                    }
                    
                   ?>
             
    <!-- Page Content -->
    <div class="container" style="padding-top: 130px;">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                
                <?php
                if(isset($_GET['post_id'])){
                    
                $post_id = $_GET['post_id'];
                    
                $query="UPDATE posts SET post_views = post_views + 1 WHERE post_id = $post_id";
                $get_post_view = mysqli_query($connection,$query);
                    
                $query = "SELECT * FROM posts WHERE post_id ={$post_id} ";
                $get_all_posts = mysqli_query($connection, $query);
                
                while($row = mysqli_fetch_assoc($get_all_posts)){
                    
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];
                    $post_views = $row['post_views'];
                ?>
                <!-- <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1> -->

                <!-- First Blog Post -->
                <div  data-aos="fade-up" data-aos-duration="500" data-aos-delay="50" data-aos-once="true">

                <h1>
                   <?php echo $post_title; ?>
                    
                </h1>

                <p class="lead">
                    by <a href="author_related_posts.php?author=<?php echo $post_author; ?>"><?php echo $post_author; ?></a>
                    <small class="pull-right"><?php echo $post_views;?> Views</small>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
                <hr>
                <img class="img-responsive" width="700px"  src="../images/<?php echo $post_image; ?>" alt="">
                <hr>
                <p><?php echo $post_content; ?></p>

                <hr>
                <?php } 
                }
                else{
                    header("Location: bloghome.php");    
                }
                ?>
                
                <!-- Comments Form -->
                
                <?php
                
                if(isset($_POST['add_comment'])){
                        $comment_post_id = $_GET['post_id'];
                        $comment_author = $_POST['comment_author'];
                        $comment_email = $_POST['comment_email'];
                        $comment_content = $_POST['comment_content'];
                        $comment_date = date('d-m-y');

                        if(!empty($comment_author) && !empty($comment_email) && !empty($comment_content)){
                             $query = "INSERT INTO comments(comment_post_id ,comment_author ,comment_email, comment_content, comment_date) values($comment_post_id,'$comment_author','$comment_email','$comment_content',now() )";

                            $add_comment = mysqli_query($connection, $query);

                            confirm_query($add_comment);
                                $success = "Succesfully Commented!";
                        }
                        else{
                            $error = "All fields are requried!";
                        }
                } 
                ?>
                    <div class="border rounded shadow toc" style="padding: 16px;margin-top: 20px;">
                    
<?php if(isset($error)){
                    echo "<p class='alert alert-danger text-center'>{$error}</p>";
                        } 
                    if(isset($success)){
                    echo "<p class='alert alert-success text-center'>{$success}</p>";
                        }
                    ?>
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="" method="post">
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

                           <div class="form-group">
                           <label for="comment_author">Author</label>
                           <input type="text" value="<?php echo $fname." ".$lname ?> (member)" class="form-control" name="comment_author" readonly>
                            </div>
                          
                            <div class="form-group">
                           <label for="comment_email">Email</label>
                           <input type="email" value="<?php echo $email ?>"  class="form-control" name="comment_email" readonly>
                            </div>
                            
                        <div class="form-group">
                           <label for="comment_content">Comment</label>
                            <textarea class="form-control" name="comment_content" rows="5"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="add_comment">Add Comment</button>
                    </form>
                  
                    
                </div>
</div>
                <hr>

                <!-- Posted Comments -->

                <!--Display Only Approved Comments Comment -->
                <?php
                
                if(isset($_GET['post_id'])){
                    $post_id = $_GET['post_id'];
                    
                    $query = "SELECT * FROM comments WHERE comment_post_id = $post_id AND comment_status ='Approved' ORDER BY comment_id DESC";
                    $get_comments = mysqli_query($connection,$query);
                    
                    while($row = mysqli_fetch_assoc($get_comments)){
                        $comment_author = $row['comment_author'];
                        $comment_email = $row['comment_email'];
                        $comment_content = $row['comment_content'];
                        $comment_date = $row['comment_date'];
                        $comment_status = $row['comment_status'];
                         ?>

                        <div class="media">

                    <a class="pull-left" href="#">
                        <img class="media-object" width="64" height="64" src="../images/Dark%20path.jpg" alt="" style="padding: 10px";>
                    </a>
                    <div class="media-body">
                        <h2 class="media-heading" style="padding-right: 10px";><?php echo $comment_author;?></h2>
                            <p>From <?php echo $comment_email; ?>,<br> <?php echo $comment_date; ?></p>
                        <?php echo $comment_content; ?>
                    </div>
                    </div>
                               
                        <?php } } ?>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            
            <div class="col-md-4">


<!-- Blog Search Well -->
<form action="search.php" method="post">

            <div class="row padMar">
                <div class="col padMar" data-aos="fade-up" data-aos-duration="500" data-aos-delay="100" data-aos-once="true" style="padding: 18px;">
                    <div class="input-group">
                        <div class="input-group-prepend"></div><input name="search"class="form-control autocomplete" type="text" placeholder="Search">
                        <div class="input-group-append">
                        <span class="input-group-btn">
<button class="btn btn-warning" name="submit" type="submit"><i class="fa fa-search"></i></button></span>
</div>
                    </div>
                </div>
            </div>
            </form>

<!--  Login Well -->

<!-- Blog Categories Well -->
<div class="border rounded shadow toc" data-aos="fade-up" data-aos-duration="500" data-aos-delay="200" data-aos-once="true" style="padding: 16px;">
<p style="font-size: 20px;">Blog Categories</p>
    <div class="row">
        <div class="col-lg-6">
            <ul class="list-unstyled">
                <?php
    
                $query = "SELECT * FROM categories LIMIT 6";
                $get_categories = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($get_categories)){
                    $sidebar_cat_id = $row['cat_id'];
                    $sidebar_cat_title = $row['cat_title'];

                echo "<li><a href='./category.php?cat_id=$sidebar_cat_id'>{$sidebar_cat_title}</a></li>";
                }

               ?>
            </ul>
        </div>
        <!-- /.col-lg-6 -->
        <!-- <div class="col-lg-6">
            <ul class="list-unstyled">
                <li><a href="#">Category Name</a>
                </li>
                <li><a href="#">Category Name</a>
                </li>
                <li><a href="#">Category Name</a>
                </li>
                <li><a href="#">Category Name</a>
                </li>
            </ul>
        </div> -->
        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
</div>

<!-- Side Widget Well -->
<div class="border rounded shadow toc" data-aos="fade-up" data-aos-duration="500" data-aos-delay="300" data-aos-once="true" style="padding: 16px;margin-top: 20px;">
<p style="font-size: 21px;">Recent Posts</p>
    <?php 
    $query = "SELECT * FROM posts ORDER BY post_id DESC";
    $get_recent_posts = mysqli_query($connection, $query);
    
    while($row = mysqli_fetch_assoc($get_recent_posts)){
        $post_id = $row['post_id'];
        $post_title = $row['post_title'];
        $post_date = $row['post_date'];
        ?>
        
        <h5><a href="post.php?post_id='<?php echo $post_id; ?>'"><?php echo $post_title; ?></a></h5>
        <span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?>
        
        <?php
    }
    
    
    ?>
</div>
</div>
        </div>
</div>
        <!-- /.row -->

        <hr>
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5bc042f8f9057f77"></script>
 <!-- Footer -->
 <?php include "includes/footer.php"; ?>
