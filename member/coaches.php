
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
    <title>Coaches | Deftac Betterliving</title>
    <?php include "includes/header.php"; ?>
 
  
    </head>
<body style="font-family: Montserrat, sans-serif;">
<nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark" id="mainNav" style="padding-top: 10px;padding-bottom: 10px;">
                <div class="container"><a class="navbar-brand" href="welcome.php" style="background-size: contain;"><img class="img-fluid" src="../assets/img/deftacmain.png" width="140px" data-bs-hover-animate="wobble"></a><button class="navbar-toggler navbar-toggler-right" data-toggle="collapse"
                            data-target="#navbarResponsive" type="button" data-toogle="collapse" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                        <div class="collapse navbar-collapse" id="navbarResponsive">
                            <ul class="nav navbar-nav ml-auto text-uppercase" style="margin-top:10px;">
							<li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="welcome.php">Home</a></li>
                              <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="bloghome.php">Blog</a></li>
                              <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="gallery.php">Gallery</a></li>
                              <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger active" href="coaches.php">Coaches</a></li>
							  <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="index.php">CHAt</a></li>                             
							 <li class="nav-item dropdown" style="opacity: 0.93;" ><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#" style="margin-top: -10px;">MY Account&nbsp;<span class="user"><img width="45px" class="rounded-circle mx-auto" height="45px" src='../Signin/<?= $_SESSION['avatar']?>' </span></a>
                              <div class="dropdown-menu border-dark" role="menu" data-aos="fade-up" data-aos-once="true" style="background-color: rgb(52,58,64);">
                              <div class="nav-item" role="presentation"><a class="nav-link" href="userprofile.php">My Profile</a></>        
                              <div class="nav-item" role="presentation"><a class="nav-link" href="editprofile.php">Edit Profile</a></>        
                              <div class="nav-item" role="presentation"><a class="nav-link" href="logout.php">Logout</a></>        
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>   
                <div class="header-blue" style="background-image: url(&quot;../assets/img/bg.gif&quot;);background-position: center;background-size: cover;background-repeat: no-repeat;">
           <div class="container hero">
                <div class="row" style="margin-top: 80px;">
                    <div class="col-12 col-lg-6 col-xl-5 offset-xl-1" style="margin-top: 29px;">
                        <h1  data-aos="fade-up" data-aos-delay="50" data-aos-once="true" style="font-family: Montserrat, sans-serif;font-weight: bold;font-size: 54px;color: rgb(254,209,54);"><strong>Get to know the Coaches!</strong><br></h1>
                        <p  data-aos="fade-up" data-aos-delay="100" data-aos-once="true" style="font-size: 18px;font-weight: 500;font-family: Montserrat, sans-serif;">Get to know your coaches who will teach you the ways of jiu-jitsu!<br></p>
                    <div class="col-md-5 col-lg-5 offset-lg-1 offset-xl-0 d-none d-lg-block phone-holder">
                        <div class="iphone-mockup"></div>
                    </div>
                </div>
            </div>
        </div></div>
    <section class="card-section-imagia" style="padding-top: 80px;">
        <h1 data-aos="fade-up" data-aos-delay="50" data-aos-once="true" style="padding-bottom: 30px;">COACHES</h1>
        <div class="container" data-aos="fade-up" data-aos-delay="100" data-aos-once="true">
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="card-container-imagia">
                        <div class="card-imagia">
                            <div class="front-imagia">
                                <div class="cover-imagia"><img src="../assets/img/bg2.png" alt=""></div>
                                <div class="user-imagia"><img class="img-thumbnail border rounded-circle img-circle" src="../assets/img/team/coachmartin.png" alt=""></div>
                                <div class="content-imagia">
                                    <h3 class="name-imagia">Coach Martin Toledo</h3>
                                    <p class="subtitle-imagia">Founder &amp; Head Coach</p>
                                    <p class="text-center"><em>Coach Martin Toledo was born and raised in the heart of the Cebu, Philippines. His dream was to be a positive influence for others and<br></em></p>
                                </div>
                                <div class="footer-imagia"><span><i class="fa fa-plus"></i> More info</span></div>
                            </div>
                            <div class="back-imagia">
                                <div class="content-imagia content-back-imagia">
                                    <div>
                                        <h3 class="text-center">Purple Belt</h3>
                                        <p class="text-center">&nbsp;help people through Jiu-Jitsu everywhere he could. Currently, he spends much of his time with his family in Paranaque<br>where he actively teaches and oversees Deftac Betterliving’s academic program as well
                                            as all matters related to his worldwide network of Jiu-Jitsu academies known as the Ribeiro Jiu-Jitsu Association.&nbsp;<br></p>
                                    </div>
                                </div>
                                <div class="footer-imagia">
                                    <div class="social-imagia text-center"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-linkedin"></i></a><a href="#"><i class="fa fa-twitter"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="card-container-imagia">
                        <div class="card-imagia">
                            <div class="front-imagia">
                                <div class="cover-imagia cover-gradient" style="background-image: url(&quot;../assets/img/bg.png&quot;);background-position: center;background-size: cover;background-repeat: no-repeat;"></div>
                                <div class="user-imagia"><img class="rounded-circle img-circle" src="../assets/img/team/coachrichard.jpg" alt=""></div>
                                <div class="content-imagia">
                                    <h3 class="name-imagia">Coach Richard Lasprilla</h3>
                                    <p class="subtitle-imagia">Co-Instructor</p>
                                    <p class="text-center"><em>Coach Richard Lasprilla was born and raised in the heart of the Amazon, Manaus, Brazil. Considered by many as the greatest Jiu-Jitsu competitor in &nbsp;<br></em></p>
                                </div>
                                <div class="footer-imagia"><span><i class="fa fa-plus"></i> More info</span></div>
                            </div>
                            <div class="back-imagia">
                                <div class="content-imagia content-back-imagia">
                                    <div>
                                        <h3 class="text-center">Purple Belt</h3>
                                        <p class="text-center"><br>&nbsp;the history of the sport, Richard excelled in competition at an early age. He received his Black Belt from the hands of his older brother, Saulo Lasprilla in 2001. A year later, both Richard and Saulo moved
                                            to Toledo, Ohio where they started the Ribeiro Jiu-Jitsu Association.&nbsp;<br></p>
                                    </div>
                                </div>
                                <div class="footer-imagia">
                                    <div class="social-imagia text-center"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-linkedin"></i></a><a href="#"><i class="fa fa-twitter"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="card-container-imagia">
                        <div class="card-imagia">
                            <div class="front-imagia">
                                <div class="cover-imagia"><img src="https://unsplash.it/720/500?image=1067" alt=""></div>
                                <div class="user-imagia"><img src="https://unsplash.it/120/120?image=64" class="img-circle" alt=""></div>
                                <div class="content-imagia">
                                    <h3 class="name-imagia">John Doe</h3>
                                    <p class="subtitle-imagia">Subtitle </p>
                                    <p class="text-center"><em>Tantum autem cuique tribuendum, primum quantum ipse efficere possis, deinde etiam quantum ille quem diligas atque adiuves. </em></p>
                                </div>
                                <div class="footer-imagia"><span><i class="fa fa-plus"></i> More info</span></div>
                            </div>
                            <div class="back-imagia">
                                <div class="content-imagia content-back-imagia">
                                    <div>
                                        <h3 class="text-center">Lorem Ipsum</h3>
                                        <p class="text-center">Et hanc quidem praeter oppida multa duae civitates exornant Seleucia opus Seleuci regis, et Claudiopolis quam deduxit coloniam Claudius Caesar. Isaura enim antehac nimium potens, olim subversa ut rebellatrix interneciva
                                            aegre vestigia claritudinis pristinae monstrat admodum pauca. </p>
                                    </div>
                                </div>
                                <div class="footer-imagia">
                                    <div class="social-imagia text-center"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-linkedin"></i></a><a href="#"><i class="fa fa-twitter"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div style="padding: 56px;">
        <h1 class="text-center" data-aos="fade" data-aos-delay="50" data-aos-once="true">Tutorials</h1>
        <p class="text-center" data-aos="fade-up" data-aos-delay="100" data-aos-once="true">Watch exclusive tutorials from our very own coaches and learn new submission or grappling holds</p>
        <div class="container" data-aos="fade-up" data-aos-delay="150" data-aos-once="true">
            <h3 class="text-left">Choke Holds</h3>
            <div class="row" style="padding-bottom: 30px;">
                <div class="col-md-4">
                    <div class="video-container"><iframe width="560" height="315" src="https://www.youtube.com/embed/nCCVE3zQfqc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
                </div>
                <div class="col-md-4">
                    <div class="video-container"><iframe width="560" height="315" src="https://www.youtube.com/embed/4mDKZOaTzBM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
                </div>
                <div class="col-md-4">
                    <div class="video-container"><iframe width="560" height="315" src="https://www.youtube.com/embed/YLYBOuXKzVQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
                </div>
            </div>
            <h3 class="text-left">Armbars</h3>
            <div class="row" style="padding-bottom: 30px;">
                <div class="col-md-4">
                    <div class="video-container"><iframe width="560" height="315" src="https://www.youtube.com/embed/Dq8nahFOnI4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
                </div>
                <div class="col-md-4">
                    <div class="video-container"><iframe width="560" height="315" src="https://www.youtube.com/embed/ZOlNtDJ60DY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
                </div>
                <div class="col-md-4">
                    <div class="video-container"><iframe width="560" height="315" src="https://www.youtube.com/embed/WnhJERWQvcg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
                </div>
            </div>
            <h3 class="text-left">Take Downs</h3>
            <div class="row">
                <div class="col-md-4">
                    <div class="video-container"><iframe width="560" height="315" src="https://www.youtube.com/embed/0wYR63ZsbI4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
                </div>
                <div class="col-md-4">
                    <div class="video-container"><iframe width="560" height="315" src="https://www.youtube.com/embed/tPYrtF9xc8g" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
                </div>
                <div class="col-md-4">
                    <div class="video-container"><iframe width="560" height="315" src="https://www.youtube.com/embed/dt-t6a5IxBI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
                </div>
            </div>
        </div>
    </div>
    <?php include "includes/footer.php"; ?>
