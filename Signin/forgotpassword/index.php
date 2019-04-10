


<?php include('../server.php') ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login | Deftac Betterliving</title>
    <?php include "includes/header.php"; ?>
	<?php
	if(!empty($_POST["forgot-password"])){
		$conn = mysqli_connect("localhost", "root", "", "thesis");
		
		$condition = "";
		if(!empty($_POST["user-login-name"])) 
			$condition = " username = '" . $_POST["user-login-name"] . "'";
		if(!empty($_POST["user-email"])) {
			if(!empty($condition)) {
				$condition = " and ";
			}
			$condition = " email = '" . $_POST["user-email"] . "'";
		}
		
		if(!empty($condition)) {
			$condition = " where " . $condition;
		}

		$sql = "Select * from users " . $condition;
		$result = mysqli_query($conn,$sql);
		$user = mysqli_fetch_array($result);
		
		if(!empty($user)) {
			
			require_once("forgot-password-recovery-mail.php");
		
		} else {
			$error_message = '<p class="text-center bg-danger border rounded border-danger bounce shake "style="padding:10px; font-size:13px; margin-bottom:10px; color:white;">No User Found!<p>';
		}
	}
?>
<link href="demo-style.css" rel="stylesheet" type="text/css">
<script>
function validate_forgot() {
	if((document.getElementById("user-login-name").value == "") && (document.getElementById("user-email").value == "")) {
		document.getElementById("validation-message").innerHTML = "<p class='text-center bg-danger border rounded border-danger bounce shake 'style='padding:10px; font-size:13px; margin-bottom:10px; color:white;'>Username or Email is required!!<p>"
		return false;
	}
	return true
}
</script>

</head>
<body>
<nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark" id="mainNav" style="padding-top: 10px;padding-bottom: 10px;">
        <div class="container"><a class="navbar-brand" href="#page-top"><img src="../../assets/img/deftacmain.png" style="width: 137px;"></a><button class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#navbarResponsive" type="button" data-toogle="collapse" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto text-uppercase">
                    <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="../../index.php">back to homepage</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div data-aos="fade" data-aos-duration="700" data-aos-delay="200" data-aos-once="true" class="login-dark" style="background-image: url(&quot;../../assets/img/bg.gif&quot;);">
	<form name="frmForgot" id="frmForgot"  style="opacity: 0.85;"  method="post" onSubmit="return validate_forgot();">
	<div class="illustration"><img src="../../assets/img/deftac.png" width="180px" data-bs-hover-animate="pulse"></div>

	<h5 style="text-align:center;">Forgot Password</h5>
	<p style="text-align:center;">You may either enter your username or email address</p>
	<?php if(!empty($success_message)) { ?>
	<div class="success_message"><?php echo $success_message; ?></div>
	<?php } ?>

	<div id="validation-message">
		<?php if(!empty($error_message)) { ?>
	<?php echo $error_message; ?>
	<?php } ?>
	</div>

	<div class="form-group">
		<div><input type="text" placeholder="Username" name="user-login-name" id="user-login-name" class="input-field form-control"></div>
	</div>
	
	<div class="form-group">
		<div><input type="text" name="user-email" placeholder="Email" id="user-email" class="input-field form-control"></div>
	</div>
	
	<div class="form-group">
		<div><input type="submit" style="background-color: rgb(254,209,54);" name="forgot-password" id="forgot-password" value="Submit" class="btn btn-primary btn-block"></div>
	</div>	
	<a href="../login.php" class="forgot">Back to Login</a>
    <a style="padding-top:10px;" href="../form.php" class="forgot">Not Yet a Member? Register now!</a>
</form>
    </div>

    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../assets/js/-Filterable-Gallery-with-Lightbox-BS4-.js"></script>
    <script src="../../assets/js/agency.js"></script>
    <script src="../../assets/js/bs-animation.js"></script>
    <script src="../../assets/js/Dynamically-Queue-Videos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
    <script src="https://www.youtube.com/iframe_api"></script>
    <script src="../../assets/js/Profile-Edit-Form.js"></script>
</body>

</html>