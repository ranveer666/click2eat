<?php
include "Partial/_auth.php";
require 'Partial/_dbconnect.php';
if(isset($_GET['change_id']))
{
   // $user = $_SESSION['username'];
    $name = $_GET['change_id'];
    $opass = $_POST['opass'];
    $new = $_POST['npass'];
    $cnew = $_POST['cpass'];

    $check = "SELECT user_password from user where username='$name' and user_password='$opass'";
    $result = mysqli_query($con,$check);
   
            $result = mysqli_query($con,"UPDATE user SET user_password='$new' WHERE username='$name' AND user_password='$opass'")
            or die("The admin does not exist ... \n". mysql_error()); 
            
            // redirect back to the member profile
            $_SESSION['changed'] = 'Password has been changed';
            header("Location: change_password.php");
            exit();
      
      
   
}
else
// if id isn't set, give an error
{
   die("Password changing failed ..." . mysql_error());
}
    




?>