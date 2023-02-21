
<?php
include "Partial/_dbconnect.php";
include "Partial/_auth.php";
include "Partial/_header.php";
include "Partial/_topbar.php";
include "Partial/_sidebar.php";


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="Partial/style.css"> -->
    <title>DashBoard</title>
    <style>
    .stats-media-white {
        margin-bottom: 15px;
        padding: 10px 20px;
        transition: all .25s ease;
        border-radius: 2px;
    }
   
    /* .card mt-4{
        margin-top:60px;
    } */
    .stats-media-white:hover,
    .card:hover {
        /* box-shadow: 0 20px 21px 0 rgba(225, 225, 225, 0.9); */
        /* background-color:rgb(238,130,238); */
    }
    .card{
        box-shadow:0 4px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
    }
    .media-body p{
        font-weight:bold;
        font-size:1rem;
        color:black;
        text-decoration:none;
    }
    .media-left  {
        color:#DD2F6E;
        font-size:2rem;
    }
   
    </style>
</head>

<body>
    <div class="content-wrapper mt-5 ">
        <div class="container-fluid">
           <div class="container mt-3">
           <?php
            
             
             if(isset($_SESSION['updated']))
             {
                 echo  '<div class="alert alert-success alert-dismissible mt-3 fade show">
                            <strong>' .$_SESSION['updated'] .'</strong>
                            <button class="close" data-dismiss="alert" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>';
                        unset($_SESSION['updated']);
             }
             
            ?>
           </div>
            <div class="row pl-3 mr-2">
            <div class="col-xl-3 col-6">
                    <div class="card mt-4">
                        <a href="./manage-users.php">
                        <div class="media stats-media-white ">
                            <div class="media-body  mt-4">
                                <p>Manage-Users<br>
                                    <?php
                                    $count = "SELECT users_id  FROM user u inner join area a on u.Area_Area_id = a.Area_id";
                                    $result = mysqli_query($con,$count);
                                    $row = mysqli_num_rows($result);
                                    echo $row;
                                    ?>
                                    </br>
                                </p>
                            </div>
                            <div class="media-left mt-4">
                                <span class="fas fa-users"></span>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-6">
                    <div class="card mt-4">
                        <a href="manage-menu.php" >
                        <div class="media stats-media-white ">
                            <div class="media-body  mt-4">
                                <p>Manage-Menu<br>
                                    <?php 
                                        $query = "SELECT cat_id FROM category";
                                        $result = mysqli_query($con,$query);
                                        $row = mysqli_num_rows($result);
                                        echo $row;
                                    ?>
                                    </br>
                            </p>
                            </div>
                            <div class="media-left mt-4">
                                <span class="fas fa-bars "></span>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-6">
                    <div class="card mt-4">
                        <a href="./items.php">
                        <div class="media stats-media-white ">
                            <div class="media-body  mt-4">
                                <p>Items <br>
                                <?php 
                                    $query = "SELECT pro_id FROM product";
                                    $result = mysqli_query($con,$query);
                                    $row = mysqli_num_rows($result);
                                    echo $row;
                                ?>
                                </p>
                            </div>
                            <div class="media-left mt-4">
                                <span class="fas fa-utensils"></span>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-6">
                    <div class="card mt-4">
                        <a href="offers.php">
                        <div class="media stats-media-white ">
                            <div class="media-body  mt-4">
                                <p>Manage-Offers <br>
                                <?php 
                                $count = "SELECT offer_id FROM offer";
                                $result = mysqli_query($con,$count);
                                $row = mysqli_num_rows($result);
                                echo $row;
                                ?>
                                </p>
                            </div>
                            <div class="media-left mt-4">
                                <span class="fas fa-bolt"></span>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-6">
                    <div class="card mt-4">
                        <a href="./manage-feedback.php">
                        <div class="media stats-media-white ">
                            <div class="media-body  mt-4">
                                <p>Feedback <br>
                                <?php 
                                $count = "SELECT feedback_id FROM feedback";
                                $result = mysqli_query($con,$count);
                                $row = mysqli_num_rows($result);
                                echo $row;
                                ?>
                                </p>
                            </div>
                            <div class="media-left mt-4">
                                <span class="fas fa-star"></span>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
                
                <div class="col-xl-3 col-6 ">
                    <div class="card mt-4 border-black">
                        <a href="./customer_reports.php">
                        <div class="media stats-media-white ">
                            <div class="media-body  mt-4">
                                <p class=""> View Payment <br>1 </p>
                            </div>
                            <div class="media-left mt-4">
                                <span class="fas fa-rupee-sign"></span>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php
include "Partial/_footer.php";
?>

</body>

<!-- Content Wrapper. Contains page content -->

<!-- <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard v1</li>
                </ol>
            </div>
        </div>
    </div>
</div> -->

</html>