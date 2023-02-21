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
    <link rel="stylesheet" href="Partial/style.css">
    <title>Prepared-Order</title>
    <style>
    /* .serial{
            counter-reset: serial-number;

        }
        .serial{
            counter-increment:serial-number;
            content : counter(serial-number);
        } */
    .fa-eye {
        font-weight: 900;

        color: #07b759;
        font-size: 22px;
    }
    </style>
</head>

<body>

    <section class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title text-bold">List of Prepared Orders</h3>
                            <a href="./index.php" title="GO TO BACK">
                                <i class="fas fa-backward i float-right"></i>
                            </a>
                        </div>

                        <!-- To Search item -->
                        <div class="card-text mt-2">
                            <form action="" metho="GET">
                                <div class="form-group form-inline float-right">
                                    <button class="btn btn-outline-primary mr-2" type="submit">Search</button>
                                    <input type="text" name="search" class="form-control mr-3"
                                        value="<?php if(isset($_GET['search'])){echo $_GET['search'];}?>">
                                </div>
                                <div class="form-group form-inline ml-4">
                                    <label for="example">Select : </label>
                                    <select name="" class="form-control ml-2">
                                        <option>Select Value</option>
                                        <option name="5">5</option>
                                        <option name="10">10</option>
                                        <option name="15">15</option>
                                        <option name="20">20</option>
                                    </select>
                                </div>
                            </form>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body pt-2">
                            <table id="example1" class="table table-bordered table-hover serial">
                                <thead>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>Order No</th>
                                        <th>Order Date</th>
                                        <th>Order Cost </th>
                                        <th>Customer Name</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                               $count = 1;
                                if(isset($_GET['search']))
                                {
                                    $search = $_GET['search'];
                                    //$searchQuery = "SELECT * FROM user WHERE CONCAT(users_id,username,email_id,mobileno,Area_name) like '%$search%'";
                                  
                                    $searchQuery = "SELECT order_id, order_date,total_amt, cus_name, cus_mo_no 
                                    FROM orders o  join customer c on o.Customer_cus_id = c.cus_id 
                                    where concat(order_id,order_date,total_amt,cus_name,cus_mo_no) like '%$search%'
                                    and order_status = '1'";
                                     
                                    $serachResult = mysqli_query($con,$searchQuery);
                                   
                                   
                                        foreach($serachResult as $row)
                                        {
                                            $id = $row['order_id'];
                                            $date = $row['order_date'];
                                            $tamt = $row['total_amt'];
                                            $cname = $row['cus_name']; 
                                            $cmobile = $row['cus_mo_no'];   
                                    ?>
                                    <tr>
                                        <td><?php echo  $count++; ?></td>
                                        <td><?php echo $id ?></td>
                                        <td><?php echo $date ?></td>
                                        <td><i class="fas fa-rupee-sign"> </i> <?php echo $tamt ?></td>
                                        <td><?php echo $cname ?></td>
                                        <td><?php echo $cmobile ?></td>
                                        <td><span class="badge badge-primary">Prepared</span></td>
                                        <td>
                                            <a href="./view_prepared_order.php?order_id=<?php echo $id?>" class="">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="./code.php?order_id=<?php echo $id ?>" class="deleteUsers"
                                                onclick="return confirmDelete()">
                                                <i class="fas fa-trash bg-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php 
                                    }
                                }
                                else
                                {
                                $fetch = "SELECT order_id, order_date,total_amt, cus_name, cus_mo_no 
                                FROM orders o  join customer c on o.Customer_cus_id = c.cus_id where order_status='1'";
                             
                                $result_fetch = mysqli_query($con,$fetch);   
                                
                                    foreach($result_fetch as $row)
                                    {
                                        $id = $row['order_id'];
                                        $date = $row['order_date'];
                                        $tamt = $row['total_amt'];
                                        $cname = $row['cus_name']; 
                                        $cmobile = $row['cus_mo_no'];   
                                ?>

                                    <tr>
                                        <td><?php echo  $count++; ?></td>
                                        <td><?php echo $id ?></td>
                                        <td><?php echo $date ?></td>
                                        <td><i class="fas fa-rupee-sign"> </i> <?php echo $tamt ?></td>
                                        <td><?php echo $cname ?></td>
                                        <td><?php echo $cmobile ?></td>
                                        <td><span class="badge badge-primary">Prepared</span></td>
                                        <td>
                                            <a href="./view_prepared_order.php?order_id=<?php echo $id?>" class="">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="./code.php?order_id=<?php echo $id ?>" class="deleteUsers"
                                                onclick="return confirmDelete()">
                                                <i class="fas fa-trash bg-danger"></i>
                                            </a>
                                        </td>
                                    </tr>

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

    <script>
    function confirmDelete() {
        let str = 'Are You Sure You Want To Delete ???? ';
        return confirm(str);
    }
    </script>
    <?php
include "Partial/_footer.php";
?>


</body>

</html>