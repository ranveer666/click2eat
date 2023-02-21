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
$email = $_SESSION['EMAIL'];

$fetch = "SELECT * FROM customer WHERE cus_email='$email'";
$result = mysqli_query($con,$fetch);
if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
          $cid = $row['cus_id'];
          
      }
  }
  $_SESSION['cid'] = $cid;
  
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Bootstrap/bootstrap.css">
    <script src="Bootstrap/jquery.js"></script>
    <script src="Bootstrap/popper.js"></script>
    <script src="Bootstrap/bootstrap.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
    th {
        text-transform: uppercase;
    }

    a {
        text-decoration: none;
    }
    </style>
</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="./index.php">CL<span class='text-success'>I</span>CK<span
                class='text-danger'>2</span>EAT
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-link">
                    <a class="nav-link " href="./index.php">MENU</a>
                </li>
                <li class="nav-link">
                    <a class="nav-link " href="./feedback&complaint.php">View Your previous orders</a>
                </li>
                <li class="nav-link">


                    <a href="" data-toggle="modal" style="text-decoration: none;" data-target="#Feedaback-Modal"><i
                            class="nav-link text-warning">Give Feedback</i></a>
                    </td>
                </li>

                <li class="nav-link dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Complaint
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="complaint.php">Make Complaint</a>
                        <a class="dropdown-item" href="response.php">View Response</a>

                    </div>
                </li>
                <li class="nav-link">
                    <td>
                        <?php
                        $select = mysqli_query($con,"SELECT order_staus from `order` where order_staus='0' and Customer_cus_id='$cid'");
                        while($row = mysqli_fetch_assoc($select)){    
                        if($row['order_staus']==0){
                            echo "<p class='badge bg-danger'>Pending</p>";
                        }
                        else
                        {
                         echo "<p class='text-success'>Order is Ready</p>";
                        }
                       
                        }
                       ?>
                    </td>
                </li>
            </ul>
            <?php
                    $count=0;
                    if(isset($_SESSION['cart']))
                    {
                        $count=count($_SESSION['cart']);
                    }
                  ?>
            <a href="logout.php" class="btn btn-outline-success">LogOut</a>
            &nbsp;
            <a href="mycart.php" class="btn btn-success"><i class="fa fa-shopping-cart"></i>(<?php echo $count;?>)</a>
        </div>
    </nav>



    <!-- Modal Start -->

</body>

</html>


<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12 col-16">

            <?php
        if(isset($_SESSION['update']))
        {
            echo    '<div class="alert alert-primary ml-4 mr-4  alert-dismissible fade show mt-3" role="alert">
                            <strong> '.$_SESSION['update'].'!</strong> 
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                    </div>';
            unset($_SESSION['update']);
        }
        ?>
            <!-- Feedback Modal -->
            <div class="modal fade" id="Feedaback-Modal" tabindex="-1" role="dialog" aria-labelledby="Feedaback-Modal"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="Feedaback-Modal">Feedabck</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action='feedback.php' method="POST">
                            <div class="form-group">
                                <textarea type='text' class="form-control" placeholder="Give Your Feedback" name='feed'
                                    id="exampleFormControlTextarea1"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="feedback" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End  Feedback Modal -->

            <!-- Complaint Modal -->
            <div class="modal fade" id="Complaint-Modal" tabindex="-1" role="dialog" aria-labelledby="Complaint-Modal"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="Complaint-Modal">Complaint</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action='complaint.php' method="POST">
                            <div class="form-group">
                                <textarea type='text' class="form-control" placeholder="Give Your Complaint"
                                    name='complaint' id="exampleFormControlTextarea1"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="complaints" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End  Complaint Modal -->
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th>Item Name</th>
                        <th> Price</th>
                        <th>Quantity</th>
                        <th scope="col">Date</th>
                        <th>Total price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                        $i = 1;
                        $fetch = "SELECT customer.cus_name,customer.cus_id, customer.cus_mo_no,`order`.order_id,`order`.order_date, 
                        order_details.price ,order_details.qty ,product.pro_name, product.pro_price,product.pro_id
                        from `order` 
                        inner join customer on `order`.Customer_cus_id = customer.cus_id 
                        inner join order_details on `order`.order_id=order_details.Order_order_id 
                        inner JOIN product on product.pro_id = order_details.Product_product_id where cus_email='$email'";
                        $result = mysqli_query($con,$fetch);
                        $count=0;
                        while($row = mysqli_fetch_assoc($result))
                        {
                        $total_price = $row['price'];
                        $date = $row['order_date'];
                        $pro_name = $row['pro_name'];
                        $cid = $row['cus_id'];
                        $oid = $row['order_id'];
                        $pid = $row['pro_id'];
                        $_SESSION['cid'] = $cid;
                        $_SESSION['oid'] = $oid;
                        //$_SESSION['pid'] = $pid;
                        $qty = $row['qty'];
                        $total_price = $row['price'];
                        $total = $qty * $total_price;
                        

                        ?>
                    <tr>
                        <td><?php echo ++$count?></td>
                        <td><?php echo $pro_name ?></td>
                        <td><?php echo $total_price?></td>
                        <td><?php echo $qty?></td>
                        <td><?php echo $date?></td>
                        <td><?php echo $total?></td>


                        <?php
                    } ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>

</html>