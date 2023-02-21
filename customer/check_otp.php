<?php
session_start();
$con=mysqli_connect('localhost','root','','project');
$otp=$_POST['otp'];
$email=$_SESSION['EMAIL'];
$res=mysqli_query($con,"select * from customer where cus_email='$email' and otp='$otp'");
$count=mysqli_num_rows($res);
if($count>0){
	mysqli_query($con,"update customer set otp= '' where cus_email='$email'");
	$_SESSION['IS_LOGIN']=$email;
	
	echo "yes";
}else{
	echo "not_exist";
}
?>