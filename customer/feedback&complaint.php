<?php
include("header.php");
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
$_SESSION['EMAIL']="musk@gmail.com";
$email=$_SESSION['EMAIL'];
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
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-12 col-sm-12">

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
                        <textarea type='text' class="form-control" placeholder="Give Your Feedback" name='feed' id="exampleFormControlTextarea1" ></textarea>
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
                        <textarea type='text' class="form-control" placeholder="Give Your Complaint" name='complaint' id="exampleFormControlTextarea1" ></textarea>
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
                <th scope="col">Date</th>
                <th scope="col">Status</th>
                <th scope="col">Feedback</th>
                <th scope="col">Complaint</th>
                <th scope="col">Response</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
     
        $i = 1;
        $fetch2 = "SELECT * FROM `order` WHERE order_staus='0' AND Customer_cus_id=$cid ";
       $result = mysqli_query($con,$fetch2);
       $check = mysqli_num_rows($result);
       if($check > 0)
       {
           while($row = mysqli_fetch_assoc($result))
           {
               $date=$row['order_date'];
               $status=$row['order_staus'];
               $order_id = $row['order_id'];
               $_SESSION['oid'] = $order_id;
               ?>
            <td><?php echo $i++ ?></td>
            <td><?php echo $date ?></td>
            <td><b class="text-success">Order Prepared</b></td>
            <td><a href="" data-toggle="modal" data-target="#Feedaback-Modal"><i class="material-icons text-warning"
                        style="font-size:22px;">Feedback</i></a></td>
            <td><a href="" data-toggle="modal" data-target="#Complaint-Modal"><i class="material-icons text-danger" style="font-size:22px;">Complaint</i></a></td>
            <td>
                <?php 
                $select = mysqli_query($con,"SELECT * from complaint where Customer_cus_id='$cid'");
                while($row = mysqli_fetch_assoc($select))
                {
                    $des = $row['com_response'];
                    echo $des;
                }
                ?>
            </td>

            <?php
           }
        }
        
        
        ?>

        </tbody>
    </table>


</div>
</div>
</div>
</body>

</html>