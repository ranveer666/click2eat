<?php
include "Partial/_auth.php";
include "Partial/_header.php";
include "Partial/_topbar.php";
include "Partial/_sidebar.php";
require "Partial/_dbconnect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Partial/style.css">
    <script src="assets/validation.js"></script>
    <title>Manage Offers</title>
</head>

<body>

    <!-- For Add Offer Details start modal -->


    <div class="modal fade" id="AddOffer">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="AddUser">Add Offer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="./code.php" method="POST" onsubmit="return offer_valid()">
                        <div class="form-group">
                            <label for="name">Offer Name</label>
                            <input type="text" class="form-control" name="offername" placeholder="Enter Offer Name"
                                id="offername">
                            <span id="upsc" class="text-danger font-weight-bold"></span>
                        </div>
                        <div class="form-group">
                            <label for="price">Offer Price</label>
                            <input type="text" class="form-control" name="offerprice" placeholder="Enter Offer Price"
                                id="offerprice">
                            <span id="cat" class="text-danger font-weight-bold"></span>
                        </div>
                        <div class="form-group">
                            <label for="sdate">Start Date</label>
                            <input type="date" class="form-control" name="startdate" placeholder="Enter Start Date"
                                id="startdate">
                            <span id="xat" class="text-danger font-weight-bold"></span>
                        </div>
                        <div class="form-group">
                            <label for="edate">Valid Date</label>
                            <input type="date" class="form-control" name="enddate" placeholder="Enter Valid Date"
                                id="enddate">
                            <span id="cmat" class="text-danger font-weight-bold"></span>
                        </div>
                        <button type="submit" name="AddOffers" class="btn btn-primary">Add Details</button>
                        <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Close</button>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>


    <!-- End Modal -->
    <div class="content-wrapper">
        <div class="cotainer-fluid mt-3 mr-3 ml-3">
            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title text-bold">View Offers</h3>
                            <a href="#" data-toggle="modal" data-target="#AddOffer" title="Add Offer Details"
                                class="float-right">
                                <i class="fas fa-plus"></i>
                            </a>
                        </div>
                        <?php 
                    if(isset($_SESSION['AddedOffers']))
                    {
                        echo '<div class="alert mt-3 mr-4 ml-4 alert-primary alert-dismissible fade show">
                                <strong>'.$_SESSION['AddedOffers'].'</strong>
                                <button class="close" data-dismiss="alert" aria-label="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>';
                            unset($_SESSION['AddedOffers']);
                    }
                    if(isset($_SESSION['deleted']))
                    {
                        echo '<div class="alert mt-3 mr-4 ml-4 alert-primary alert-dismissible fade show">
                                <strong>'.$_SESSION['deleted'].'</strong>
                                <button class="close" data-dismiss="alert" aria-label="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>';
                            unset($_SESSION['deleted']);
                    }
                    if(isset($_SESSION['Updated']))
                    {
                        echo '<div class="alert mt-3 mr-4 ml-4 alert-primary alert-dismissible fade show">
                                <strong>'.$_SESSION['Updated'].'</strong>
                                <button class="close" data-dismiss="alert" aria-label="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>';
                            unset($_SESSION['Updated']);
                    }
                    ?>
                        <div class="card-text mt-3">
                            <form action="" method="GET">
                                <div class="form-group form-inline float-right">
                                    <button class="btn btn-outline-primary mr-2" name="search"
                                        value="<?php if(isset($_GET['search'])){ echo $_GET['search'];} ?>">Search</button>
                                    <input type="text" class="form-control mr-3" name="search">
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
                        <div class="card-body mb-5">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Offer Name</th>
                                        <th>Offer Price</th>
                                        <th>Offer Start Date</th>
                                        <th>Offer Valid Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    
                                     if(isset($_GET['offer_id']))
                                     {
                                         $id = mysqli_real_escape_string($con,$_GET['offer_id']);
                                         $type = mysqli_real_escape_string($con,$_GET['type']);
                                         if($type == 'active')
                                         {
                                             $status = 1;
                                         }
                                         else
                                         {
                                             $status = 0;
                                         }
                                         mysqli_query($con,"UPDATE offer set status='$status' where offer_id='$id'");
                                     }
                                if(isset($_GET['search']))
                                {
                                    $search = $_GET['search'];
                                    $searching = "SELECT * FROM offer WHERE concat(offer_name,offer_price,offer_start_date,offer_end_date) LIKE '%$search%'";
                                    $result = mysqli_query($con,$searching);
                                    if(mysqli_num_rows($result) > 0)
                                    {
                                        while($row = mysqli_fetch_assoc($result))
                                        {
                                            //$id = $row['offer_id'];
                                            $name = $row['offer_name'];
                                            $price = $row['offer_price'];
                                            $sdate = $row['offer_start_date'];
                                            $vdate = $row['offer_end_date'];
                                            $status = $row['status'];
                                            $id = $row['offer_id'];
                                            ?>
                                    <tr>
                                        <td><?php echo substr($name,0,20); ?></td>
                                        <td><i class="fas fa-rupee-sign"> </i> <?php echo $price; ?></td>
                                        <td><?php echo $sdate;?></td>
                                        <td><?php echo $vdate; ?></td>
                                        <td>
                                            <?php
                                        if($row['status']==1){
                                            echo "<a href='?offer_id=".$id."&type=deactive' class='badge bg-success'>active</a>";
                                        }else{
                                        echo "<a href='?offer_id=".$id."&type=active' class='badge bg-danger'>Deactive</a>";
                                          }
                                       ?>
                                        </td>
                                        <td>
                                            <a href="./offer_edit.php?offer_id=<?php echo $id; ?>">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="./code.php?offer_id=<?php echo $id; ?>"
                                                onclick="return confirmDelete()">
                                                <i class="fas fa-trash bg-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                        }
                                    }
                                }
                                else
                                {
                                    $fetch = "SELECT * FROM offer";
                                    $result = mysqli_query($con,$fetch);
                                    if(mysqli_num_rows($result) > 0)
                                    {
                                        while($row = mysqli_fetch_assoc($result))
                                        {
                                            $id = $row['offer_id'];
                                            $name = $row['offer_name'];
                                            $price = $row['offer_price'];
                                            $sdate = $row['offer_start_date'];
                                            $vdate = $row['offer_end_date'];
                                            $status = $row['status'];
                                            ?>
                                    <tr>
                                        <td><?php echo substr($name,0,30); ?>..</td>
                                        <td><i class="fas fa-rupee-sign"> </i> <?php echo $price; ?></td>
                                        <td><?php echo $sdate;?></td>
                                        <td><?php echo $vdate; ?></td>
                                        <td>
                                            <?php
                                        if($row['status']==1){
                                            echo "<a href='?offer_id=".$id."&type=deactive' class='badge bg-success'>active</a>";
                                        }else{
                                        echo "<a href='?offer_id=".$id."&type=active' class='badge bg-danger'>Deactive</a>";
                                          }
                                       ?>
                                        </td>
                                        <td>
                                            <a href="./offer_edit.php?offer_id=<?php echo $id; ?>">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="./code.php?offer_id=<?php echo $id; ?>"
                                                onclick="return confirmDelete()">
                                                <i class="fas fa-trash bg-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                        }
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
    </div>
    <script>
    confirmDelete = () => {
        return confirm("Are you sure you want to delete???");
    }
    </script>
    <?php
include "Partial/_footer.php";
?>
</body>

</html>