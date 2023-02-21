<?php
include "Partial/_dbconnect.php";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(isset($_POST['purchase']))
    {
        $name=$_POST['name'];
        $mobile=$_POST['Phone_No'];

        $quary1="UPDATE customer SET name='$name', mobile='$mobile' WHERE email='tyronewar666@gmail.com'";
        if(mysqli_query($con,$quary1))
        {
            echo 'done';
        }
        else
        {
            echo 'note done';
        }

    }
}

?>