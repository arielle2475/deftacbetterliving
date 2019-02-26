<?php include "includes/database.php"; ?>

<?php 
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
    session_destroy();
    header('location: ../Signin/login.php?error=Login to access.');
    }
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Renew Membership | Deftac Betterliving</title>
    <?php include "includes/header.php"; ?>

  
    </head>
</head>

<body style="background-color: #dfdfdf">
<nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark" id="mainNav" style="padding-top: 10px;padding-bottom: 10px;">
                <div class="container"><a class="navbar-brand" href="welcome.php" style="background-size: contain;"><img class="img-fluid" src="../assets/img/deftacmain.png" width="140px" data-bs-hover-animate="wobble"></a><button class="navbar-toggler navbar-toggler-right" data-toggle="collapse"
                            data-target="#navbarResponsive" type="button" data-toogle="collapse" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                        <div class="collapse navbar-collapse" id="navbarResponsive">
                            <ul class="nav navbar-nav ml-auto text-uppercase" style="margin-top:10px;">
                              <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger active" href="renewal.php">Membership</a></li>
                              <li class="nav-item dropdown" style="opacity: 0.93;" ><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#" style="margin-top: -10px;">MY Account&nbsp;<span class="user"><img width="45px" class="rounded-circle mx-auto" height="45px" src='../Signin/<?= $_SESSION['avatar']?>' </span></a>
                              <div class="dropdown-menu border-dark" role="menu" data-aos="fade-up" data-aos-once="true" style="background-color: rgb(52,58,64);">
                              <div class="nav-item" role="presentation"><a class="nav-link" href="userprofile.php">My Profile</a></>        
                              <div class="nav-item" role="presentation"><a class="nav-link" href="editprofile.php">Edit Profile</a></>        
                              <div class="nav-item" role="presentation"><a class="nav-link" href="../index.php">Logout</a></>        
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>   
    <section>
        <h1 class="text-center bg-danger border rounded border-danger bounce animated infinite" style="font-size: 23px;padding-right: 70px;padding-left: 70px;color: rgb(255,255,255);margin-right: 70px;margin-left: 70px;filter: brightness(100%) contrast(110%) saturate(104%);"><br>PLEASE PAY YOUR OUTSTANDING BALANCE OF P2500.00 TO CONTINUE USING YOUR ACCOUNT. YOU MAY PAY TO ANY OF THE COACHES SO THEY COULD GIVE YOU ACCESS AGAIN TO YOUR ACCOUNT.<br><br></h1>
        <div role="tablist" id="accordion-1" style="padding: 160px;padding-top: 30px;">
            <div class="card">
                <div class="card-header" role="tab" style="background-color: #343a40;">
                    <h5 class="mb-0"><a data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 .item-1" href="div#accordion-1 .item-1">How do I get my membership renewed?</a></h5>
                </div>
                <div class="collapse item-1" role="tabpanel" data-parent="#accordion-1">
                    <div class="card-body">
                        <p class="card-text" style="font-family: Montserrat, sans-serif;">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" role="tab" style="background-color: #343a40;">
                    <h5 class="mb-0"><a data-toggle="collapse" aria-expanded="true" aria-controls="accordion-1 .item-2" href="div#accordion-1 .item-2">What will happen to my account?</a></h5>
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
        </div>
    </section>
    <?php include "includes/footer.php"; ?>
