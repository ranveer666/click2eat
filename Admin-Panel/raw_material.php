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
    <title>Raw-Material</title>
</head>

<body>


    <!-- Modal For Add User -->

    <div class="modal fade" id="AddRaw">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="AddRaw">Add Raw-Material</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="./code.php" method="POST" onsubmit="return raw_valid()">
                        <div class="form-group">
                            <label for="Name" class="control-label">Raw-Material Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter Raw-Material Name"
                                id="name">
                            <span id="dog" class="text-danger font-weight-bold"></span>
                        </div>
                        <div class="form-group">
                            <label for="Des" class="control-label">Raw-Material Description</label>
                            <input type="text" class="form-control" name="des"
                                placeholder="Enter Raw-Material Description" id="des">
                            <span id="leopard" class="text-danger font-weight-bold"></span>
                        </div>
                        <div class="form-group">
                            <label for="qty">Quntity</label>
                            <input type="text" class="form-control" name="qty" placeholder="Enter Quntity" id="qty">
                            <span id="leg" class="text-danger font-weight-bold"></span>
                        </div>
                        <div class="form-group">
                            <label for="qty">Supplier Name</label>
                            <select name="sname" id="" class="form-control">
                                <option value="">-Select Supplier Name</option>
                                <?php 
                                    $result = mysqli_query($con,"SELECT * from supplier");
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                        $id = $row['supplier_id'];
                                        $name = $row['supplier_name'];
                                        ?>
                                <option value="<?php echo $id ?>"><?php echo $name ?></option>
                                <?php
                                    }
                               ?>
                            </select>
                        </div>
                        <button type="submit" name="AddRaw" class="btn btn-primary">Submit</button>
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
                            <h3 class="card-title text-bold">Manage Raw-Material</h3>
                            <a href="#" data-toggle="modal" data-target="#AddRaw" title="Add Raw-Material">
                                <i class="fas fa-plus i float-right"></i>
                            </a>
                        </div>
                        <?php 
                            if(isset($_SESSION['Updated']))
                            {
                                echo  '<div class="alert ml-4 mr-4 mt-4 alert-primary alert-dismissible fade show">
                                            <strong>'.$_SESSION['Updated'].'</strong>
                                            <button class="close" data-dismiss="alert" aria-label="close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>';
                                unset($_SESSION['Updated']);
                            }
                            if(isset($_SESSION['AddedRaw']))
                            {
                                echo  '<div class="alert ml-4 mr-4 mt-4 alert-primary alert-dismissible fade show">
                                            <strong>'.$_SESSION['AddedRaw'].'</strong>
                                            <button class="close" data-dismiss="alert" aria-label="close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>';
                                        unset($_SESSION['AddedRaw']);
                            }
                            if(isset($_SESSION['Deleted']))
                            {
                                echo  '<div class="alert ml-4 mr-4 mt-4 alert-primary alert-dismissible fade show">
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

                                        <th>Name of Raw Material</th>
                                        <th>Raw Description</th>
                                        <th>Qty On Hand</th>
                                        <th>Supplier Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                if(isset($_GET['search']))
                                {
                                    $search = $_GET['search'];
                                    $searchQuery = "SELECT raw_id,qty_on_hand,raw_description,name_raw_material,supplier_name 
                                    FROM raw_material r 
                                    inner join supplier s 
                                    on r.supplier_fk_id = s.supplier_id
                                    WHERE CONCAT(raw_id,qty_on_hand,raw_description,name_raw_material,supplier_name) like '%$search%'";
                                    //$searchQuery = "SELECT * FROM raw_material WHERE CONCAT(raw_id,qty_on_hand,raw_description,name_raw_material) like '%$search%'";
                                    $serachResult = mysqli_query($con,$searchQuery);
                                    foreach($serachResult as $row)
                                    { 
                                        $id = $row['raw_id'];
                                        $qty = $row['qty_on_hand'];
                                        $des = $row['raw_description'];
                                        $name = $row['name_raw_material'];
                                        $supname = $row['supplier_name'];
                                ?>
                                    <tr>

                                        <td><?php echo $name ?></td>
                                        <td><?php echo $des ?></td>
                                        <td><?php echo $qty ?></td>
                                        <th><?php echo $supname ?></th>

                                        <td>
                                            <a href="edit_raw.php?raw_id=<?php echo $id?>" class="">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="./code.php?raw_id=<?php echo $id ?>" onclick="confrimDelete()"
                                                class="deleteUsers"><i class="fas fa-trash bg-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php 
                                    }
                                }
                                else
                                {
                                    $fetch = "SELECT raw_id,qty_on_hand,raw_description,name_raw_material,supplier_name FROM raw_material r inner join supplier s on r.supplier_fk_id = s.supplier_id";
                                    $result_fetch = mysqli_query($con,$fetch);
                                    foreach($result_fetch as $row)
                                    {
                                        $id = $row['raw_id'];
                                        $qty = $row['qty_on_hand'];
                                        $des = $row['raw_description'];
                                        $name = $row['name_raw_material'];
                                        $supname = $row['supplier_name'];
                                ?>
                                    <tr>

                                        <td><?php echo $name ?></td>
                                        <td><?php echo $des ?></td>
                                        <td><?php echo $qty ?></td>
                                        <th><?php echo $supname ?></th>

                                        <td>
                                            <a href="edit_raw.php?raw_id=<?php echo $id?>" class="">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="./code.php?raw_id=<?php echo $id ?>"
                                                onclick="return confrimDelete()" class="deleteUsers"><i
                                                    class="fas fa-trash bg-danger"></i>
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
    confrimDelete = () => {
        let str = 'Are You Sure You Want To Delete ???? ';
        return confirm(str);
    }
    </script>
    <?php
include "Partial/_footer.php";
?>
</body>

</html>