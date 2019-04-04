<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';
$mail = new PHPMailer(true);

$emailBody = "<div>" . $user["username"] . ",<br><br><p>Click this link to recover your password<br><a href='" . "http://localhost/deftacbetterliving/signin/forgotpassword/reset_password.php?name=" . $user["username"] . "'>" . "http://localhost/forgotpassword/php-forgot-password-recover-code/reset_password.php?name=" . $user["username"] . "</a><br><br></p>Regards,<br> Admin.</div>";

$mail->IsSMTP();
$mail->SMTPDebug = 0;
$mail->SMTPAuth = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port     = 587;  
$mail->Username = "deftac.thesis@gmail.com";
$mail->Password = "deftacbetterliving";
$mail->Host     = "smtp.gmail.com";
$mail->Mailer   = "smtp";

$mail->SetFrom("deftac.thesis@gmail.com", "Deftac Betterliving");
// $mail->AddReplyTo("ariellevalmonte@gmail.com", "Arielle Valmonte");
$mail->ReturnPath="deftac.thesis@gmail.com";	
$mail->AddAddress($user["email"]);
$mail->Subject = "Forgot Password Recovery";		
$mail->MsgHTML($emailBody);
$mail->IsHTML(true);

if(!$mail->Send()) {
	$error_message = 'Problem in Sending Password Recovery Email';
} else {
	$success_message = 'Please check your email to reset password!';
}

?>
