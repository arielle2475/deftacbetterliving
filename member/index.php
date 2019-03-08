<?php 
include 'config.php';
include 'action.php';
session_start();
	if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
		session_destroy();
		header('location: ../Signin/login.php?error=Login to access.');
		}
 ?>
<!DOCTYPE html> 
<html>
	<head>
		<title>CHATBOX</title>
	<script type="text/javascript" src="jquery-3.1.1.min.js"></script>
	    <link rel="stylesheet" type="text/css" href="css/ScrollBar.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="../assets/js/main2.js"></script>
	<?php include "includes/header.php"; ?>
	</head>
	
<body class="text-center" style="background-size: cover;background-repeat: no-repeat;background-position: center;">
<nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark" id="mainNav" style="padding-top: 10px;padding-bottom: 10px;">
                <div class="container"><a class="navbar-brand" href="welcome.php" style="background-size: contain;"><img class="img-fluid" src="../assets/img/deftacmain.png" width="140px" data-bs-hover-animate="wobble"></a><button class="navbar-toggler navbar-toggler-right" data-toggle="collapse"
                            data-target="#navbarResponsive" type="button" data-toogle="collapse" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                        <div class="collapse navbar-collapse" id="navbarResponsive">
                            <ul class="nav navbar-nav ml-auto text-uppercase" style="margin-top:10px;">
							<li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="welcome.php">Home</a></li>
                              <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="bloghome.php">Blog</a></li>
                              <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="gallery.php">Gallery</a></li>
                              <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="coaches.php">Coaches</a></li>
							  <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger active" href="chat.php">CHAt</a></li>                             
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
                        <h1  data-aos="fade-up" data-aos-delay="50" data-aos-once="true" style="font-family: Montserrat, sans-serif;font-weight: bold;font-size: 54px;color: rgb(254,209,54);"><strong>FAMILY AS ONE</strong><br></h1>
                        <p  data-aos="fade-up" data-aos-delay="100" data-aos-once="true" style="font-size: 18px;font-weight: 500;font-family: Montserrat, sans-serif;">Message your fellow brothers and sisters in our chatbox to become closer than grappling on the mats.<br></p></div>
                    <div class="col-md-5 col-lg-5 offset-lg-1 offset-xl-0 d-none d-lg-block phone-holder">
                        <div class="iphone-mockup"></div>
                    </div>
                </div>
            </div>
        </div>
    <section style="padding-right: 50px;padding-left: 50px; margin-bottom: -100px; background-color: #f2f2f2;padding-top: 100px;">
        <div class="container-fluid text-center border rounded shadow-lg" style="padding-top: 24px;padding-right: 20px;padding-left: 20px;margin: 0px;margin-right: 0px;margin-left: 0px;padding-bottom: 44px;background-color: #ffffff;">
            <div class="row" data-aos="fade-up" data-aos-delay="200" data-aos-once="true" style="margin-right: 0px;background-color: #ffffff;padding: 0px;margin-left: 0px;padding-top: 0px;">
                <div class="col-auto col-md-4 text-left flex-grow-1" style="padding-right: 10px;padding-left: 0px;padding-top: 0px;padding-bottom: 0px;">
                    <h1 class="text-center" style="width: 0px;max-width: 383px;min-width: 0px;">Users</h1>
                    <form style="padding-right: -1px;">
                        <div class="border rounded border-light shadow d-flex flex-grow-1 flex-shrink-1 flex-fill justify-content-center align-items-xl-center" style="padding-top: 12px;padding-bottom: 16px;padding-left: 19px;padding-right: 12px;">
                            <div class="form-row">
                                <div class="col-2 text-center" style="padding-right: 0px;padding-left: 0px;width: 92px;"><span class="user"><img width="45px" class="rounded-circle mx-auto" height="45px" src='../Signin/<?= $_SESSION['avatar']?>' </span></div>
                                <div
                                    class="col-4" style="padding-right: 200px;padding-left: 0px;width: 220px;">
									<h1 style="font-size: 16px;width: 150px;margin-top: 8px;margin-left: 11px;">					
									<div id="Userlog"> <a href="index.php" style="float: right;"></a>
								</div>
							</h1>
                            </div>
                        </div>
                </div>
                </form>
            </div>
			<div class="col-md-8" style="padding-right: 0px;padding-left: 10px;">
                <form>
                    <div class="form-row">
                        <div class="col float-right flex-grow-1 flex-shrink-1 justify-content-center align-items-center align-content-center flex-wrap m-auto">
                            <h1 class="text-left align-items-center" style="width: 0px;max-width: 730px;min-width: 455px;">Messages</h1>
                             <div class="border rounded shadow-sm scrollbar" style="height: 500px;background-color: #ededed;overflow-y: scroll;margin-bottom: 15px; padding:20px;" id="show"></div>
                        </div>
                    </div>
                    <div class="form-row">
						<input type="hidden" name="name" id="name" value="<?php echo $_SESSION['username'] ?>"  class="form-control" >
                        <div class="col"><input class="form-control"  name="msg" id="msg" type="text"></div>
                        <div class="col-auto"><input type="reset" name="send" id="send" value="Send" class="btn btn-primary"></div>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </section>
	
					
<?php include "includes/footer.php"; ?>

</body>
</html>

<script type="text/javascript">
		$(document).ready(function() {
			setInterval(function () {
				$('#Userlog').load('UserLog.php')
			}, 1000);
		});

	</script>