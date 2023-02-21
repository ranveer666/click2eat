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
    <title>Menu Page</title>
    <style>
    .queMrk {
        left: 40%;
    }
    </style>
</head>

<body>
    <!-- Modal For Add MenuName -->
    <div class="modal fade" id="DltUser">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Menu Name</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="./code.php" method="POST" onsubmit="return menu_valid()">
                        <div class="form-group">
                            <label for="mname">Menu Name</label>
                            <input type="text" class="form-control" name="menuName" placeholder="Enter Menu Name"
                                id="menuName">
                            <span id="upsc" class="text-danger font-weight-bold"></span>
                        </div>
                        <div class="form-group">
                            <label for="">Area Name</label>
                            <select name="item_type" id="" class='form-control'>Item Type
                                <option value="">-Select Item Types-</option>
                                <?php 
                            $result = mysqli_query($con,"SELECT * FROM items");
                            while($row = mysqli_fetch_assoc($result))
                            {
                                $id = $row['item_id'];
                                $name = $row['item_type'];
                             ?>
                                <option value="<?php echo $id ?> ">
                                    <?php 
                                    echo $name;
                                    ?>
                                </option>
                                <?php
                            }
                            ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="addMenu">Submit</button>
                            <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <!-- Modal for Deleting -->

    <div class="modal fade" id="deleteMenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <h3 class="modal-title text-danger">Warning!!</h3>
                <h5 class="modal-title">Are you sure??
                    You Want to Delete !!</h5>
                <div class="modal-body queMrk ">
                    <img src="../Images/question_mark.jpg" id="">
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-outline-danger" name="dltMenu" type="submit">Delete</a>
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End deleting modal -->

    <!-- To show Alert message -->
    <section class="content-wrapper">
        <div class="container-fluid mt-3 mr-3">
            <div class="row mt-2">
                <div class="col-md-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title text-bold">Menu Name</h3>
                            <a href="#" data-toggle="modal" data-target="#DltUser" title="Add Users">
                                <i class="fas fa-plus i float-right"></i>
                            </a>
                        </div>
                        <?php 
                    // Start Showing Alert Message !!!!!!!!!!!
                    if(isset($_SESSION['addedMenu']))
                    {
                        echo    '<div class="alert alert-primary ml-4 mr-4  alert-dismissible fade show mt-3" role="alert">
                                        <strong>'.$_SESSION['addedMenu'].'!</strong> 
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>';
                        unset($_SESSION['addedMenu']);
                    }
                    if(isset($_SESSION['Updated']))
                    {
                        echo    '<div class="alert ml-4 mr-4 mt-3 alert-primary alert-dismissible fade show">
                                    <strong>'.$_SESSION['Updated'].'</strong>
                                    <button class="close text-danger" data-dismiss="alert" aria-label="close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>';
                        unset($_SESSION['Updated']);
                    }
                    if(isset($_SESSION['DeleteMenu']))
                    {
                        echo    '<div class="alert ml-4 mr-4 mt-3 alert-primary alert-dismissible fade show">
                                    <strong>'.$_SESSION['DeleteMenu'].'</strong>
                                    <button class="close text-danger" data-dismiss="alert" aria-label="close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>';
                        unset($_SESSION['DeleteMenu']);
                    }
                    ?>
                        <!-- End Showing Alert Message !!!!!!!!!!! -->

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
                                        <option>-Select Value-</option>
                                        <option name="5">5</option>
                                        <option name="10">10</option>
                                        <option name="15">15</option>
                                        <option name="20">20</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>Menu Name</th>
                                        <th>Items Types</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $cnt=1;
                                    if(isset($_GET['search']))
                                    {
                                        $search = $_GET['search'];
                                        $searching = "SELECT * FROM category c join items i on c.item_type = i.item_id where CONCAT(cat_id,cat_name,item_id) like '%$search%'";
                                        $result = mysqli_query($con,$searching);
                                        while($row = mysqli_fetch_assoc($result))
                                        {
                                            $id = $row['cat_id'];
                                            $name = $row['cat_name'];
                                            $types = $row['item_type'];
                                            ?>
                                    <tr>
                                        <td><?php echo $cnt++; ?></td>
                                        <td><?php echo $name ?></td>
                                        <td>
                                            <?PHP ECHO $types ?>
                                        </td>

                                        <td>
                                            <a href="./menu_edit.php?cat=<?php echo $id ?>" name="editMenu"><i
                                                    class="fas fa-edit"></i>
                                                <a href="./code.php?menu_id=<?php echo $id ?>"
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
                                    // $query ="SELECT
                                    // product.pro_id,category.cat_name,product.pro_name,product.pro_description,
                                    // product.pro_price FROM product INNER JOIN category ON product.cat_fk_id =
                                    // category.cat_id";
                                    $query = "SELECT * FROM category c 
                                    join items i on c.item_type = i.item_id ";
                                    $result = mysqli_query($con,$query);
                                    while($row = mysqli_fetch_assoc($result))
                                        {
                                            $id = $row['cat_id'];
                                            $name = $row['cat_name'];
                                            $types = $row['item_type'];
                                            ?>
                                    <tr>
                                        <td><?php echo $cnt++; ?></td>
                                        <td><?php echo $name ?></td>
                                        <td>
                                            <?PHP ECHO $types ?>
                                        </td>

                                        <td>
                                            <a href="./menu_edit.php?cat=<?php echo $id ?>">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="./code.php?menu_id=<?php echo $id ?>"
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
        return confirm("Are You Sure You want to Delete???");
    }
    </script>

    <?php
include "Partial/_footer.php";
?>

</body>

</html>