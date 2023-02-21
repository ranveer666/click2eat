<?php 

include "Partial/_auth.php";
include "Partial/_header.php";
include "Partial/_topbar.php";
include "Partial/_sidebar.php";
include "Partial/_dbconnect.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Orders</title>
    <style>
    .rupee-sign {
        font-size: 23px;
        color: #6666;
    }

    h3 {
        font-family: Serif;
    }

    #changes {
        font-size: 15px;

        font-weight: normal;
    }
    </style>
</head>

<body>
    <section class="content-wrapper">
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-md-12 mt-5">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title text-bold">List of New Orders</h3>
                            <a href="./new_order.php" title="GO TO BACK">
                                <i class="fas fa-backward float-right"></i>
                            </a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Order No </th>
                                        <th>Item Name</th>
                                        <th>Item Cost</th>
                                        <th>Total Quntity</th>
                                        <th>Total Amount </th>
                                        <th>Status </th>
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                if(isset($_GET['order_id']))
                                {
                                    $order_id = $_GET['order_id'];
                                    $fetch = "SELECT customer.cus_name, customer.cus_mo_no,orders.order_id,orders.order_date, 
                                    order_details.price ,order_details.qty ,product.pro_name, product.pro_price
                                    from orders 
                                    inner join customer on orders.Customer_cus_id = customer.cus_id 
                                    inner join order_details on orders.order_id=order_details.Order_order_id 
                                    inner JOIN product on product.pro_id = order_details.Product_product_id where order_id = '$order_id'";
                                    $result = mysqli_query($con,$fetch);
                                    $count=0;
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                        $id = $row['order_id'];
                                        
                                        $total_price = $row['price'];
                                       
                                        $pro_name = $row['pro_name'];
                                        $pro_price = $row['pro_price'];
                                        $qty = $row['qty'];
                                        $total_price = $row['price'];
                                        
                                        ?>
                                    <tr>
                                        <td><?php echo ++$count?></td>
                                        <td><?php echo $id ?></td>
                                        <td><?php echo $pro_name ?></td>
                                        <td><?php echo $pro_price?></td>
                                        <td><?php echo $qty?></td>
                                        <td><?php echo $total_price?></td>
                                        <td class="text-danger">New</td>
                                    </tr>
                                    <?php
                                    }
                                    $amount = "SELECT sum(price) from order_details where Order_order_id='$order_id'";
                                    $aresult = mysqli_query($con,$amount);
                                    while($row = mysqli_fetch_assoc($aresult))
                                    {
                                        $total_price = $row['sum(price)'];
                                    ?>
                                    <h3 class="float-right">
                                        <font color="red">Total Amount : </font><i
                                            class="fas fa-rupee-sign rupee-sign"></i>
                                        <?php echo $total_price?>
                                    </h3>

                                    <?php
                                 
                                    }
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>

            </div>
        </div>
    </section>

</body>

</html>