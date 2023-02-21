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
//echo $cid;
$oid =  $_SESSION['oid'];
$today = date('Y-m-d',strtotime('Now'));
//echo $oid;
if(isset($_POST['complaints']))
{
    $complaint = $_POST['complaint'];
    $select = mysqli_query($con,"select * from order_details where Order_order_id='$oid'");
    while($row = mysqli_fetch_assoc($select))
    {
        $pid = $row['Product_product_id'];
    }
        $feed = mysqli_query($con,"INSERT into complaint(com_description,Customer_cus_id,Product_product_id,date_of_complaint) 
        values('$complaint','$cid','$pid','$today')");
       if($feed)
       {
        $_SESSION['update']="Thanks For your Complaint";
        header("Location:feedback&complaint.php");
       }
       else{
        $_SESSION['update']="Sorry!!";
        header("Location:feedback&complaint.php");
       }
}

?>