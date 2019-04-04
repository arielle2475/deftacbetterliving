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

    <title>Blog Home | Deftac Betterliving</title>

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
                              <div class="nav-item" role="presentation"><a class="nav-link" href="logout.php">Logout</a></>        
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
    <!-- Page Content -->
    <div class="container" style="padding-top: 50px;">

    <div class="row" style="padding-left: 30px;padding-right: 30px;padding-top: 57px;">
                <div class="col-md-10 col-lg-7 offset-md-1 offset-lg-0" data-aos="fade-up" data-aos-duration="500" data-aos-delay="50" data-aos-once="true">
        
            <!-- Blog Entries Column -->
                <h1 class="page-header">
                    Latest Posts
                    <small>By Uploads</small>
                </h1>
                <?php
                    $per_page = 4;
                
                if(isset($_GET['page'])){
                    $page = $_GET['page'];
                    
                    $page_1 = ($page*$per_page)-$per_page;
                    }
                else{
                    $page = 1;
                    $page_1 = 0;
                }
                
                $query="SELECT * FROM posts";
                $find_post_count =mysqli_query($connection, $query);
                $post_count = mysqli_num_rows($find_post_count);
                $post_count = ceil($post_count/$per_page);
                
                $query = "SELECT * FROM posts WHERE post_status ='Publish' ORDER BY post_id DESC LIMIT $page_1,$per_page";
                $get_all_posts = mysqli_query($connection, $query);
                
                while($row = mysqli_fetch_assoc($get_all_posts)){
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content =substr($row['post_content'],0,220);
                    $post_views = $row['post_views'];
                ?>
                

                    <!-- Blog Post -->
                    <h2>
                        <a href="post.php?post_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                    </h2>
                    <p class="lead">
                        By <a href="author_related_posts.php?author=<?php echo $post_author; ?>"><?php echo $post_author; ?></a>
                        <small class="pull-right"><?php echo $post_views;?> Views</small>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
                    <hr>
                    <a href="post.php?post_id=<?php echo $post_id; ?>"><img width="500px"  class="img-fluid img-responsive" src="../images/<?php echo $post_image; ?>" alt=""></a>
                    <hr>
                    <p><?php echo $post_content; ?></p>
                    <a class="btn btn-primary" href="post.php?post_id=<?php echo $post_id; ?>"> <span class="glyphicon glyphicon-chevron-right"></span></a>

                    <a class="btn btn-primary" href="post.php?post_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                <?php } 
                    //Display No result
                    $count = mysqli_num_rows($get_all_posts);
                    if($count == 0 ){
                        
                        echo "<h1 class='text-center'>No Posts Found!</h1>";
                    }  
                ?>
                

            </div>

            <!-- Blog Sidebar Widgets Column -->
      <!-- Blog Sidebar Widgets Column -->
            
      <div style="padding-left:100px;" class="col-md-5">


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
