<?php 
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
    session_destroy();
    header('location: ../Signin/login.php?error=Login to access.');
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>New Member | Deftac Betterliving</title>
    <?php include "includes/header.php"; ?>

  
    <style>.dropdown:hover .dropdown-menu {
  display: block;
}</style>
</head>

<body style="margin: 0px;margin-left: 0px;padding: 0px;">

    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark" id="mainNav" style="padding-top: 10px;padding-bottom: 10px;">
    <div class="container"><a class="navbar-brand" href="#page-top" style="background-size: contain;"><img class="img-fluid" src="../assets/img/deftacmain.png" width="140px" data-bs-hover-animate="wobble"></a><button class="navbar-toggler navbar-toggler-right" data-toggle="collapse"
                data-target="#navbarResponsive" type="button" data-toogle="collapse" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto text-uppercase" style="margin-top:10px;">

                  <li class="nav-item" role="presentation"><a class="active nav-link js-scroll-trigger" href="submit.php">Membership</a></li>
				  <li class="nav-item dropdown" style="opacity: 0.93;" ><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#" style="margin-top: -10px;">MY Account&nbsp;<span class="user"><img width="45px" class="rounded-circle mx-auto" height="45px" src='../Signin/<?= $_SESSION['avatar']?>' </span></a>
                  <div class="dropdown-menu border-dark" role="menu" data-aos="fade-up" data-aos-once="true" style="background-color: rgb(52,58,64);margin-right: 60px;opacity: 1;padding-top: -5px;margin-top: -15px;">
                            <a class="dropdown-item"  role="presentation" href="logout.php" style="font-family: Montserrat, sans-serif;color: rgb(255,255,255);">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section>
        <h1 class="text-center bg-success border rounded border-success shake animated " style="font-size: 23px;padding-right: 70px;padding-left: 70px;color: rgb(255,255,255);margin-right: 70px;margin-left: 70px;filter: brightness(100%) contrast(110%) saturate(104%);background-color: rgb(102,156,33);"><br>FORM SUBMITTED!<i class="fa fa-check-circle" style="margin-top: 0px;padding-right: 6px;padding-left: -4px;width: 42px;height: 49px;"></i></h1>
        <div role="tablist" id="accordion-1" style="padding: 160px;padding-top: 30px;">
            <div class="card">
                <div class="card-header" role="tab" style="background-color: rgb(52,58,64);">
                    <h5 class="mb-0"><a data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 .item-1" href="div#accordion-1 .item-1">What's the next step?</a></h5>
                </div>
                <div class="collapse item-1" role="tabpanel" data-parent="#accordion-1">
                    <div class="card-body">
                        <p class="card-text" style="font-family: Montserrat, sans-serif;">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" role="tab" style="background-color: #343a40;">
                    <h5 class="mb-0"><a data-toggle="collapse" aria-expanded="true" aria-controls="accordion-1 .item-2" href="div#accordion-1 .item-2">What should I bring?</a></h5>
                </div>
                <div class="collapse show item-2" role="tabpanel" data-parent="#accordion-1">
                    <div class="card-body">
                        <p class="card-text" style="font-family: Montserrat, sans-serif;">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" role="tab" style="background-color: #343a40;">
                    <h5 class="mb-0"><a data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 .item-3" href="div#accordion-1 .item-3">When can I come back?</a></h5>
                </div>
                <div class="collapse item-3" role="tabpanel" data-parent="#accordion-1">
                    <div class="card-body">
                        <p class="card-text" style="font-family: Montserrat, sans-serif;">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" role="tab" style="background-color: #343a40;">
                    <h5 class="mb-0"><a data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 .item-4" href="div#accordion-1 .item-4">Are there any additional fees?</a></h5>
                </div>
                <div class="collapse item-4" role="tabpanel" data-parent="#accordion-1">
                    <div class="card-body">
                        <p class="card-text" style="font-family: Montserrat, sans-serif;">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include "includes/footer.php"; ?>
