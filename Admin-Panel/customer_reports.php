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
    <script type="text/javascript" src="assets/getData.js"></script>
    <title>Manage Bills</title>
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
                            <h3 class="card-title text-bold">List of Customer wise reports</h3>
                            <a href="./index.php" title="Add Users">
                                <i class="fas fa-backward float-right"></i>
                            </a>
                        </div>
                        <div class="card-body">
                            <form action="" method="GET" ">
                              
                                    <div class="form-group form-inline">
                                        <label for=""></label>
                                        <select class="form-control" id="employee" name="name" >
                                            <option value="">--SELECT ORDERS DATE--</option>
                                            <?php
                                            $query = "SELECT * FROM orders";
                                            $result = mysqli_query($con,$query);
                                            foreach($result as $row)
                                            {
                                                $id = $row['order_id'];
                                                $name = $row['order_date'];
                                                ?>
                                                <option value="<?php echo $id ?>"><?php echo $name ?></option>
                                                <?php
                                            }
                                            ?>
                                    </select>&nbsp;
                                    <button class="btn btn-outline-primary mr-2" type="submit">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="jumbotron">
                        <div class="panel-group d-flex justify-content-center">
                            <div class="panel panel-default">
                                <div class="panel-body">

                                    <div class="card-body pt-2">
                                        <table id="example1" class="table table-bordered table-hover serial">
                                            <thead>
                                                <tr>
                                                    <th>Sr No</th>
                                                    <th>Order No</th>
                                                    <th>Customer Name</th>
                                                    <th>Product Name</th>
                                                    <th>Quantity</th>
                                                    <th>Order Date</th>
                                                    <th>Product Price</th>
                                                    <th>Phone</th>
                                                    <th>Total cost </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                               $x=0;
                                if(isset($_GET['name']))
                                {
                                    $search = $_GET['name'] ;
                                    //$searchQuery = "SELECT * FROM user WHERE CONCAT(users_id,username,email_id,mobileno,Area_name) like '%$search%'";
                                  
                    
                                    $fetch = "SELECT customer.cus_name, customer.cus_mo_no,orders.order_id,orders.order_date, 
                                    order_details.price ,order_details.qty ,product.pro_name, product.pro_price,orders.total_amt
                                    from orders 
                                    inner join customer on orders.Customer_cus_id = customer.cus_id 
                                    inner join order_details on orders.order_id=order_details.Order_order_id 
                                    inner JOIN product on product.pro_id = order_details.Product_product_id where 
                                    concat(cus_id) like '%$search%'";
                                    $serachResult = mysqli_query($con,$fetch);
                                        foreach($serachResult as $row)
                                        {
                                            $id = $row['order_id'];
                                            $pro_name = $row['pro_name'];
                                            $price = $row['pro_price'];
                                            $date = $row['order_date'];
                                            $mobile = $row['cus_mo_no'];
                                            $cus_name = $row['cus_name'];
                                            $qty = $row['qty'];
                                            $tamt = $row['qty']*$row['pro_price'];
                                            $cmobile = $row['cus_mo_no'];   
                                        ?>
                                                <tr>
                                                    <td><?php echo  ++$x; ?></td>
                                                    <td><?php echo $id ?></td>
                                                    <td><?php echo $cus_name ?></td>
                                                    <td><?php echo $pro_name ?></td>
                                                    <td><?php echo $qty ?></td>
                                                    <td><?php echo $date ?></td>
                                                    <td><?php echo $price?></td>
                                                    <td><?php echo $mobile?></td>
                                                   <td><?php echo $tamt ?></td>
                                                </tr>
                                                <?php 
                                    }
                                        $amount = "SELECT orders.total_amt from orders
                                        inner join customer on orders.Customer_cus_id = customer.cus_id
                                        
                                        where  concat(cus_id) like '$search'";
                                        $aresult = mysqli_query($con,$amount);
                                        if(mysqli_num_rows($aresult) > 0){
                                        while($row = mysqli_fetch_assoc($aresult))
                                        {
                                            $total_price = $row['total_amt'];
                                        ?>
                                        <h3 class="float-right">
                                            <font color="red">Total Amount : </font><i
                                                class="fas fa-rupee-sign rupee-sign"></i>
                                            <?php echo $total_price?>
                                        </h3>
                                        
                                <?php
                                }}
                            }
                        
                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

</body>

</html>