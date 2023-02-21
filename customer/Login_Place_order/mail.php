<?php
session_start();
$_SESSION['EMAIL']=$email;
$con=mysqli_connect('localhost','root','','project');
$email=$_POST['email'];
$res=mysqli_query($con,"select * from customer where cus_email='$email'");
$count=mysqli_num_rows($res);
$html = ''; 
if($count>0){
	$otp=rand(11111,99999);
	mysqli_query($con,"update customer set otp='$otp' where cus_email='$email'");
	$html="Your otp verification code is ".$otp;
	$_SESSION['EMAIL']=$email;
	echo "yes";
}else{
    $res=mysqli_query($con,"INSERT INTO customer(cus_email) values ('$email')");
	$otp=rand(11111,99999);
	mysqli_query($con,"update customer set otp='$otp' where cus_email='$email'");
	$html="Your otp verification code is ".$otp;
	$_SESSION['EMAIL']=$email;
	echo "yes";
}

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'PHPMAILER/PHPMailer.php';
require 'PHPMAILER/Exception.php';
require 'PHPMAILER/SMTP.php';
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'click2eat01@gmail.com';                     //SMTP username
    $mail->Password   = 'Rahul@1999';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('click2eat01@gmail.com', 'Click 2 Eat');
    $mail->addAddress($email);     //Add a recipien

    
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'One Time Verification Code';
    $mail->Body    = $html;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}