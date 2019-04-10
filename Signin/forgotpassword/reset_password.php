
<?php include('../server.php') ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login | Deftac Betterliving</title>
    <?php include "includes/header.php"; ?>
	<?php
	if(isset($_POST["reset-password"])) {
		$conn = mysqli_connect("localhost", "root", "", "thesis");
		$sql = "UPDATE `thesis`.`users` SET `password` = '" . md5($_POST["member_password"]). "' WHERE `users`.`username` = '" . $_GET["name"] . "'";
		$result = mysqli_query($conn,$sql);
		$success_message = "<p class='text-center bg-success border rounded border-success bounce animated 'style='padding:10px; font-size:13px; margin-bottom:10px; color:white;'>Password is reset successfully.<p>";
		
	}
?>
<link href="demo-style.css" rel="stylesheet" type="text/css">
<script>
function validate_password_reset() {
	if(document.getElementById("member_password").value == "") {
		document.getElementById("validation-message").innerHTML = "<p class='text-center bg-danger border rounded border-danger shake animated 'style='padding:10px; font-size:13px; margin-bottom:10px; color:white;'>Please Enter New Password!<p>"
		return false;
	}
	if(document.getElementById("member_password").value  != document.getElementById("confirm_password").value) {
		document.getElementById("validation-message").innerHTML = "<p class='text-center bg-danger border rounded border-danger shake animated 'style='padding:10px; font-size:13px; margin-bottom:10px; color:white;'>Both Password Should Be The Same!<p>"
		return false;
	}
	
	return true;
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

	<h5 style="text-align:center;">Reset Password</h5>
	<form name="frmReset" id="frmReset" method="post" onSubmit="return validate_password_reset();">
	<?php if(!empty($success_message)) { ?>
	<div class="success_message"><?php echo $success_message; ?></div>
	<?php } ?>

	<div id="validation-message">
		<?php if(!empty($error_message)) { ?>
	<?php echo $error_message; ?>
	<?php } ?>
	</div>

	<div class="form-group">
		<div>
		<input type="password" placeholder="Insert New Password" name="member_password" id="member_password" class="input-field form-control"></div>
	</div>
	

	
	<div class="form-group">
		<div><input type="submit" name="reset-password" id="reset-password" value="Reset Password" style="background-color: rgb(254,209,54);" class="btn btn-primary btn-block"></div>
	</div>	

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