<?php
session_start();
$servar = "localhost";
$username = "root";
$password = "";
$database = "project";

$con = mysqli_connect($servar,$username,$password,$database);
if(!$con)
{
    die(mysqli_connect_error());
}
else{
    // echo "Connected";
}
$cid = $_SESSION['cid'];
$oid =  $_SESSION['oid'];
$today = date('Y-m-d',strtotime('Now'));
$select = mysqli_query($con,"select * from order_details where Order_order_id='$oid'");
while($row = mysqli_fetch_assoc($select))
{
    $pid = $row['Product_product_id'];
    echo 'pid'.$pid;
}
if(isset($_POST['feedback']))
{
    $feedback = $_POST['feed'];
   
        $feed = mysqli_query($con,"INSERT into feedback(feedback_note,Customer_cus_id,Product_product_id,date) 
        values('$feedback','$cid','$pid','$today')");
       if($feed)
       {
        $_SESSION['update']="Thanks For your feedback";
        header("Location:feedback&complaint.php");
       }
       else{
        $_SESSION['update']="Sorry!!";
        header("Location:feedback&complaint.php");
       }
}

?>