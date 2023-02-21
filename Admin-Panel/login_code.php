<?php 
 session_start();

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    include 'Partial/_dbconnect.php';
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $sql = "SELECT * from user where email_id = '$email' AND user_password = '$password'";
    $result = mysqli_query($con,$sql);
    $num = mysqli_num_rows($result); # This shows you how many records are shown
    // if($num == 1)
    // {
    //     $login = true;
    //     session_start();
    //     $_SESSION['loggedin'] = true;
    //     $_SESSION['email'] = $email;
    //     # Redirect function
    //     header("location: index.php");
    // } 
    // else
    // {
    //     $showError = "Invalid credential";
    // }
    if($num == 1)
    {
      
         foreach($result as $row)
         {
             $userid = $row['users_id'];
             $name = $row['username'];
             $email = $row['email_id'];
             $phone = $row['mobileno'];
         }

        // $_SESSION['auth_user'] = [
            //     'userid' => $userid,
            //     'name'   => $name,
            //     'email'  => $email,
            //     'phone'  => $phone
            // ];
            $_SESSION['auth']=true;
            // $_SESSION['username'] =true;
            $_SESSION['username'] = $name;
            $_SESSION['loggedin'] = "Logged In Successfully";
            header('location: index.php');
            exit();        
    }   
    else
        {
            $_SESSION['loggedin'] = "Invalid Credential";
            header('location: login.php');
            exit();
        }
}
?>
