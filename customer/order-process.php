<?php
// phpinfo(); 
session_start();
// echo phpversion; 
$servername = "localhost";
$username = "root";
$password = "";
$db = "project"; 
// Create connection
$conn = new mysqli($servername, $username, $password, $db);
$user_id = $_SESSION['id'];

//  $user_id = 40;
$orderItems = json_decode($_POST['data']);
$today = date('Y-m-d',strtotime('Now'));
// echo $today;  
$sale_query = "INSERT INTO `order` (`order_date`,`Customer_cus_id`,order_staus)  VALUES ( '{$today}','{$user_id}', 0 )";
$select = mysqli_query($conn,"SELECT order_id from `order`");
$select = -1;
if ($conn->query($sale_query) === TRUE) {
    $insertedId = $conn->insert_id;
    $query_args = "";
    $i = 0;
    $last = count($orderItems);

    if ($insertedId != -1) {
        foreach ($orderItems as $orderItem) {
            if ($i != ($last - 1)) {
                $query_args = $query_args . "( {$insertedId}, {$orderItem->pid}, {$orderItem->qty},{$orderItem->price}),";
            } else {
                $query_args = $query_args . "( {$insertedId}, {$orderItem->pid}, {$orderItem->qty},{$orderItem->price});";
            }
            $i++;
        }
        $sd_query = "INSERT INTO order_details (Order_order_id,Product_product_id,qty,price)  VALUES {$query_args}";
        // echo $sd_query;
        $ins = $conn->query($sd_query);
        if ($ins) {
            // error_log($ins . "=> inserted"); 
            echo '{"status":"success", "id" :' . $insertedId . '}';
        } else {
            echo '{"status":"fail", "id" : -1}';
        }
    }
} else {
    echo '{"status":"fail", "id" : -1}';
}
die();