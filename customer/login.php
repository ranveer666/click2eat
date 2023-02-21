
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP OTP Login Form</title>
    <link rel="stylesheet" href="Bootstrap/bootstrap.css">
    <script src="Bootstrap/jquery.js"></script>
    <script src="Bootstrap/popper.js"></script>
    <script src="Bootstrap/bootstrap.js"></script>
    <style type="text/css">
    .login-form {
        width: 340px;
        margin: 50px auto;
    }

    .login-form form {
        margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }

    .login-form h2 {
        margin: 0 0 15px;
    }

    .form-control,
    .btn {
        min-height: 38px;
        border-radius: 2px;
    }

    .btn {
        font-size: 15px;
        font-weight: bold;
    }
    </style>
</head>

<body>
    <div class="container">
        <?php 
			 if(isset($_SESSION['updated']))
			 {
				 echo    '<div class="alert alert-primary ml-4 mr-4  alert-dismissible fade show mt-3" role="alert">
								 <strong>Items '.$_SESSION['updated'].'!</strong> 
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								 <span aria-hidden="true">&times;</span>
								 </button>
						 </div>';
				 unset($_SESSION['updated']);
			 }

		?>
    </div>
    <div class="login-form">
        <form method="POST">
            <h2 class="text-center">Log in</h2>
            
            <div class="form-group first_box">
                <input type="text" id="email" name='email' class="form-control" placeholder="Enter Your Email" required="required">
                <span id="email_error" class="field_error"></span>
            </div>
            
            <div class="form-group first_box">
                <button type="button" class="btn btn-primary btn-block" name="Check_Email" onclick="send_otp()">Send OTP</button>
            </div>
            <div class="form-group second_box">
                <input type="text" id="otp" class="form-control" placeholder="OTP" required="required">
                <span id="otp_error" class="field_error"></span>
            </div>
            <div class="form-group second_box">
                <button type="button" name="Send_Otp" class="btn btn-primary btn-block" onclick="submit_otp()">Submit
                    OTP</button>
            </div>
        </form>
    </div>
    <script>
    function send_otp() {
        var email = jQuery('#email').val();
        jQuery.ajax({
            url: 'mail.php',
            type: 'post',
            data: 'email=' + email,
            success: function(result) {
                if (result == 'yes') {
                    jQuery('.second_box').show();
                    jQuery('.first_box').hide();
                }
                if (result == 'not_exist') {
                    jQuery('#email_error').html('Please enter valid email');
                }
            }
        });
    }

    function submit_otp() {
        var otp = jQuery('#otp').val();
        jQuery.ajax({
            url: 'check_otp.php',
            type: 'post',
            data: 'otp=' + otp,
            success: function(result) {
                if (result == 'yes') {
                    window.location = 'checkout.php'
                }
                if (result == 'not_exist') {
                    jQuery('#otp_error').html('Please enter valid otp');
                }
            }
        });
    }
    </script>
    <style>
    .second_box {
        display;
    }

    .field_error {
        color: red;
    }
    </style>
</body>

</html>