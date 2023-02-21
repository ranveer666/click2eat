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
  

function getProduct($p, $g) {
    global $conn;
    $query = "SELECT cart.product_id, cart.qty, p.product_name, price, product_image, cart.vendor_company_id FROM cart, vendor_product_detail v,product p 
    WHERE user_id = {$userId} and cart.product_id = p.product_id 
    and v.product_id = p.product_id 
    and cart.vendor_company_id = v.vendor_company_id;";
    $results = $conn->query($query);
    if ($results->num_rows > 0) {
        while ($row = $results->fetch_assoc()) {
            array_push($product_array, $row);
        }
    }
}

if (isset($_GET["pid"])) {

    global $conn;
   // $userId = $_SESSION['user_id'];
    $product_id = $_GET["pid"];
    //$vendor_id = $_GET["vid"];

    if (!isset($userId)) {
        // echo "Please login to add items to cart";
        // User ID nathi exist karti to eno matlab em ke user annonymous chhe 
        // $products = array() ; // Aa empty array chhe, jema aapde data save karisu 
        // Check kariye ke session variable cart defined chhe    
        if (isset($_SESSION['cart'])) {
            // Oh yes, aapdi pase variable defined chhe; 
            $cart = array(
                'product_id' => $product_id,
               // 'vendor_company_id' => $vendor_id,
                'qty' => 1 // by default qty 1, for simplicity purpose. 
            );

            array_push($_SESSION['cart'], $cart);
        } else {
            // Oh NO, aapdi pase variable defined nathi;
            // To apde session variable create karisu ane ene value aapi daisu  
            $_SESSION['cart'] = array(
                'product_id' => $product_id,
                'vendor_company_id' => $vendor_id,
                'qty' => 1 // by default qty 1, for simplicity purpose. 
            );
        }
        echo '<script>alert("item is already added");
        window.location.href="../index2.php";</script>';
        die();
    }

    $query = "INSERT INTO cart (product_id,vendor_company_id,qty, user_id) VALUES ( {$product_id}, {$vendor_id}, 1,{$userId})";
    if ($conn->query($query) === TRUE) {
        echo "Added to cart";
    } else {
        $err = $conn->error;
        if (strpos("Duplicate entry", $err) !== -1) {
            echo "Already added to cart";
        } else {
            echo "Something went wrong";
        }
    }
    die();
}
