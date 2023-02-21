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
  

global $conn;
$userId = $_SESSION["user_id"];

// echo $dateNow; 
$response = array(
    'status' => "fail",
    'order_id' => -1
);

if ($userId) {
    if ($_POST['action'] !== 'place') {
        $dateNow = date('Y-m-d', 'Now');
        $total_qty = $_POST['totalQty'];
        $query = "INSERT INTO sales (`date`, `qty`, `user_id` ) VALUES (CURDATE() ,{$total_qty}, {$userId})";
        if ($conn->query($query) === TRUE) {
            $response["order_id"] = $conn->insert_id;
            $response['status'] = 'success';
        } else {
            $err = $conn->error;
            $response['order_id'] = -1;
            $response['status'] = 'fail -> ' . $err;
        }
    } else {
        $sid = $_GET['order'];
        $pid = $_POST['pid'];
        $vid = $_POST['vid'];
        $qty = $_POST["qty"];
        $price = $_POST["price"];
        $query = "INSERT INTO sales_detail (`sales_id`, `product_id`, `vendor_company_id`, `qty`, `price` ) VALUES ({$sid},{$pid}, {$vid}, {$qty}, {$price}); ";
        if ($conn->query($query) === TRUE) {
            $response["order_id"] = "-1";
            $response['status'] = 'success';
        } else {
            $err = $conn->error;
            $response['order_id'] = -1;
            $response['status'] = 'fail -> ' . $err . $query;
        }
    }
}

echo json_encode($response, JSON_PRETTY_PRINT);
die();
