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
    <script src="assets/validation.js"></script>
    <title>Manage-Users</title>
</head>

<body>


    <!-- Modal For Add User -->

    <div class="modal fade" id="AddSupplier">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="AddSupplier">Add Supplier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="./code.php" method="POST" onsubmit="return supplier_valid()">
                        <div class="form-group">
                            <label for="Sname">Supplier Name</label>
                            <input type="text" class="form-control" name="sname" placeholder="Enter Supplier Name"
                                id="sname">
                            <span id="leo" class="text-danger font-weight-bold"></span>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Numner</label>
                            <input type="phone" class="form-control" name="phone" placeholder="Enter Phone Number"
                                id="phone">
                            <span id="virgo" class="text-danger font-weight-bold"></span>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Id </label>
                            <input type="email" class="form-control" name="email" placeholder="Enter Email Id"
                                id="email">
                            <span id="jupiter" class="text-danger font-weight-bold"></span>
                        </div>
                        <button type="submit" name="AddSupplier" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- End Modal -->


    <!-- To show Alert message -->

    <section class="content-wrapper">
        <div class="container-fluid mt-3 mr-3">
            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title text-bold">Manage Supplier Data</h3>
                            <a href="#" data-toggle="modal" data-target="#AddSupplier" title="Add Users">
                                <i class="fas fa-plus i float-right"></i>
                            </a>
                        </div>
                        <?php 
                            if(isset($_SESSION['updated']))
                            {
                                echo  '<div class="alert ml-4 mr-4 mt-2 alert-primary alert-dismissible fade show">
                                            <strong>'.$_SESSION['updated'].'</strong>
                                            <button class="close" data-dismiss="alert" aria-label="close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>';
                                unset($_SESSION['updated']);
                            }
                            if(isset($_SESSION['Added']))
                            {
                                echo  '<div class="alert ml-4 mr-4 mt-2 alert-primary alert-dismissible fade show">
                                            <strong>'.$_SESSION['Added'].'</strong>
                                            <button class="close" data-dismiss="alert" aria-label="close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>';
                                unset($_SESSION['Added']);
                            }
                            if(isset($_SESSION['Deleted']))
                            {
                                echo  '<div class="alert ml-4 mr-4 mt-2 alert-primary alert-dismissible fade show">
                                            <strong>'.$_SESSION['Deleted'].'</strong>
                                            <button class="close" data-dismiss="alert" aria-label="close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>';
                                unset($_SESSION['Deleted']);
                            }
                    ?>

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
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Supplier Name</th>
                                        <th>Supplier Email</th>
                                        <th>Supplier Phone Number</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                if(isset($_GET['search']))
                                {
                                    $search = $_GET['search'];
                                    $searchQuery = "SELECT * FROM supplier WHERE CONCAT(supplier_id,supplier_name,supplier_email,supplier_mo_no) like '%$search%'";
                                    $serachResult = mysqli_query($con,$searchQuery);
                                    foreach($serachResult as $row)
                                    { 
                                        $id = $row['supplier_id'];
                                        $name = $row['supplier_name'];
                                        $email = $row['supplier_email'];
                                        $phone = $row['supplier_mo_no'];
                                ?>
                                    <tr>
                                        <td><?php echo $id?></td>
                                        <td>
                                            <img src="../Images/user.png"
                                                class="img-responsive icon-profile">&nbsp;&nbsp;<?php echo $name ?>
                                        </td>
                                        <td><?php echo $email ?></td>
                                        <td><?php echo $phone ?></td>

                                        <td>
                                            <a href="edit_supplier.php?sup_id=<?php echo $id?>" class=""><i
                                                    class="fas fa-edit"></i>
                                            </a>
                                            <a href="./code.php?sup_id=<?php echo $id; ?>"
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
                                    $fetch = "SELECT * FROM supplier";
                                    $result_fetch = mysqli_query($con,$fetch);
                                    foreach($result_fetch as $row)
                                    {
                                        $id = $row['supplier_id'];
                                        $name = $row['supplier_name'];
                                        $email = $row['supplier_email'];
                                        $phone = $row['supplier_mo_no'];
                                ?>
                                    <tr>
                                        <td><?php echo $id?></td>
                                        <td>
                                            <img src="../Images/user.png"
                                                class="img-responsive icon-profile">&nbsp;&nbsp;<?php echo $name ?>
                                        </td>
                                        <td><?php echo $email ?></td>
                                        <td><?php echo $phone ?></td>

                                        <td>
                                            <a href="edit_supplier.php?sup_id=<?php echo $id?>" class=""><i
                                                    class="fas fa-edit"></i>
                                            </a>
                                            <a href="./code.php?sup_id=<?php echo $id; ?>"
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
    confirmDelete = () => {
        return confirm("Are you sure you want to delete???");
    }
    </script>
    <?php
include "Partial/_footer.php";
?>
</body>

</html>