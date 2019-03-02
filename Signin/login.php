<?php include('server.php') ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login | Deftac Betterliving</title>
    <?php include "includes/header.php"; ?>

</head>
<body>
<nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark" id="mainNav" style="padding-top: 10px;padding-bottom: 10px;">
        <div class="container"><a class="navbar-brand" href="#page-top"><img src="../assets/img/deftacmain.png" style="width: 137px;"></a><button class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#navbarResponsive" type="button" data-toogle="collapse" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto text-uppercase">
                    <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="../index.php">back to homepage</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div data-aos="fade" data-aos-duration="700" data-aos-delay="200" data-aos-once="true" class="login-dark" style="background-image: url(&quot;../assets/img/bg.gif&quot;);">
        <form method="post" style="opacity: 0.85;" action="login.php">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><img src="../assets/img/deftac.png" width="180px" data-bs-hover-animate="pulse"></div>
            <div class="text-center bg-danger border rounded border-danger shake animated "style="padding-top:10px; margin-bottom:10px; color:white;"> 
            <?php include('errors.php'); ?>
</div>    
            <div class="form-group"><input class="form-control" type="text" name="username" required="" placeholder="Username" ></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name="login_user" style="background-color: rgb(254,209,54);">Log In</button></div><a href="form.php" class="forgot">Not Yet a Member? Register now!</a></form>
    </div>

    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/-Filterable-Gallery-with-Lightbox-BS4-.js"></script>
    <script src="../assets/js/agency.js"></script>
    <script src="../assets/js/bs-animation.js"></script>
    <script src="../assets/js/Dynamically-Queue-Videos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
    <script src="https://www.youtube.com/iframe_api"></script>
    <script src="../assets/js/Profile-Edit-Form.js"></script>
</body>

</html>