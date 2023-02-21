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
    <title>Items</title>
</head>

<body>
    <!-- Start Modal Adding -->

    <div class="modal fade" id="AddItems">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="AddItems">Add Items</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="./code.php" method="POST" onsubmit="return validation()" >
                        <div class="form-group">
                            <label for="tname">Items Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter Item Name" id="name">
                            <span id="upsc" class="text-danger font-weight-bold"></span>
                        </div>
                        <div class="form-group">
                            <label for="Upass">Items Price</label>
                            <input type="text" class="form-control" name="price" placeholder="Enter Item Price" id="price">
                            <span id="gpsc" class="text-danger font-weight-bold"></span>
                        </div>
                        <div class="form-group">
                            <label for="Upass">Item Images</label>
                            <input type="file" class="form-control" name="image_path" p id="price">
                            <span id="gpsc" class="text-danger font-weight-bold"></span>
                        </div>
                        <div class="form-group">
                            <label for="">Menu Name</label>
                            <select name="menu_name" id="" class='form-control'>
                                <option value="">-Select Your Menu-</option>
                                <?php 
                            $result = mysqli_query($con,"SELECT * FROM category");
                            while($row = mysqli_fetch_assoc($result))
                            {
                                $id = $row['cat_id'];
                                $name = $row['cat_name'];
                             ?>
                                <option value="<?php echo $id ?>">
                                    <?php 
                                    echo $name;
                                    ?>
                                </option>
                                <?php
                            }
                            ?>
                            </select>
                        </div>
                        <button type="submit" name="AddItems" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Close</button>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript"> 
    
    function validation() {


var user = document.getElementById('name').value;
var b = document.getElementById('price').value;




if (user == "") {

    document.getElementById('upsc').innerHTML = "** Please enter itemname";
    return false;
}
if(!isNaN(user)){
   
    document.getElementById('upsc').innerHTML = "**Only characters are allowed";
    return false;
}

if((user.length <= 2) || (user.length > 30)) {

    document.getElementById('upsc').innerHTML = "** name length must be between 2 and 30";
    return false;
}



if (b == "") {

    document.getElementById('gpsc').innerHTML = "** Please fill the price";
    return false;
}

if(isNaN(b)){
   
    document.getElementById('gpsc').innerHTML = "**Only numbers are allowed";
    return false;
}
}
    
    </script>
    <!-- End Modal Adding -->
    <section class="content-wrapper">
        <div class="container-fluid mt-3 mr-3">
            <div class="row">
                <div class="col-md-12 col-16">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title text-bold">Item Lists</h3>
                            <a href="#" data-toggle="modal" data-target="#AddItems" title="Add Items">
                                <i class="fas fa-plus i float-right"></i>
                            </a>
                        </div>
                        <!-- Session Start -->
                        <?php
                        if(isset($_SESSION['additems']))
                        {
                            echo    '<div class="alert alert-primary ml-4 mr-4  alert-dismissible fade show mt-3" role="alert">
                                            <strong>Items '.$_SESSION['additems'].'!</strong> 
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>';
                            unset($_SESSION['additems']);
                        }
                        if(isset($_SESSION['deleted']))
                        {
                            echo    '<div class="alert alert-primary ml-4 mr-4  alert-dismissible fade show mt-3" role="alert">
                                            <strong>Items '.$_SESSION['deleted'].'!</strong> 
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>';
                            unset($_SESSION['deleted']);
                        }
                        if(isset($_SESSION['update']))
                        {
                            echo    '<div class="alert alert-primary ml-4 mr-4  alert-dismissible fade show mt-3" role="alert">
                                            <strong>Items '.$_SESSION['update'].'!</strong> 
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>';
                            unset($_SESSION['update']);
                        }
                        ?>
                        <!-- Sesstion End -->
                        <div class="card-text mt-2">
                            <form action="#" method="GET">
                                <div class="form-group form-inline float-right mr-3">
                                    <button class="btn btn-outline-primary mr-1" Type="submit">Search</button>
                                    <input type="text" class="form-control" name="ItemsSearch"
                                        value="<?php if(isset($_GET['ItemsSearch'])){ echo $_GET['ItemsSearch'];} ?>">
                                </div>
                                <div class="form-group form-inline ml-4">
                                    <label for="select">Select : </label>
                                    <select class="form-control ml-2 ">
                                        <option>Select Value</option>
                                        <option>5</option>
                                        <option>10</option>
                                        <option>20</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="card-body pt-1">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Menu Name</th>
                                        <th>Items Name</th>
                                        <th>Items Price</th>
                                       
                                        <th>Item Images</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                      if(isset($_GET['itemid']))
                                      {
                                          $id = mysqli_real_escape_string($con,$_GET['itemid']);
                                          $type = mysqli_real_escape_string($con,$_GET['type']);
                                          if($type == 'active')
                                          {
                                              $status = 1;
                                          }
                                          else
                                          {
                                              $status = 0;
                                          }
                                          mysqli_query($con,"UPDATE product set status='$status' where pro_id='$id'");
                                      }
      
                                if(isset($_GET['ItemsSearch']))
                                {
                                    $item = $_GET['ItemsSearch'];
                                    //$search = "SELECT * FROM product where concat(pro_name,pro_price) like '%$item%'";
                                    $search = "SELECT category.cat_name,category.item_type,
                                    product.pro_name,product.image_path,
                                    product.status,
                                    product.pro_price FROM product 
                                    INNER JOIN category ON 
                                    product.cat_fk_id = category.cat_id 
                                    where concat(cat_name,pro_name,pro_price,item_type) like '%$item%'";
                                    
                                    $result = mysqli_query($con,$search);
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                        ?>
                                    <tr>
                                        <td><?php echo "<b>". $row['cat_name'] ."</b>"?></td>
                                        <td><?php echo $row['pro_name'] ?></td>
                                        <td><i class="fas fa-rupee-sign"></i> <?php echo $row['pro_price'] ?></td>
                                        <td>
                                            <?php echo ' <img src="'.$row['image_path'].'" alt="" class="mx-auto d-block img-thumbnail">' ?>
                                        </td>
                                        <td>
                                            <?php
                                         if($row['status']==1){
                                            echo "<a href='?itemid=".$id."&type=deactive' class='badge bg-success'>active</a>";
                                        }else{
                                        echo "<a href='?itemid=".$id."&type=active' class='badge bg-danger'>Deactive</a>";
                                          }
                                       ?>
                                        </td>
                                        <td>
                                            <a
                                                href="items_edit.php?pro_id=<?php echo $id ?> &cat_name=<?php echo $cat_name ?>"><i
                                                    class="fas fa-edit"></i></a>
                                            <a href="#"><i class="fas fa-trash bg-danger"></i></a>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                }
                                else
                                {
                                    $query = "SELECT category.cat_name,cat_id,category.item_type,
                                     product.pro_id,
                                     product.pro_name,
                                     product.image_path,
                                     product.status,
                                     product.pro_description,
                                     product.pro_price
                                     FROM product INNER JOIN category ON 
                                     product.cat_fk_id = category.cat_id";
                                    $result = mysqli_query($con,$query);
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                        $id = $row['pro_id'];
                                        $cid = $row['cat_id'];
                                        $cat_name = $row['cat_name'];
                                        $image = $row['image_path'];
                                        //$type = $row['item_type'];
                                        $pro_name = $row['pro_name'];
                                        $price = $row['pro_price'];
                                        $des = $row['pro_description'];
                                        //$des = $row['pro_description'];
                                        ?>
                                    <tr>
                                        <td><?php echo "<b>". $cat_name ."</b>"?></td>
                                        <td><?php echo $pro_name ?></td>
                                        <td><i class="fas fa-rupee-sign"></i> <?php echo $price ?></td>
                                        <input type="hidden" name="pro_description" class="form-control" value="<?php echo $des ?>"/>
                                        <td>
                                            <?php echo ' <img src="images/'.$image.'" alt="" class="mx-auto d-block img-thumbnail">' ?>
                                        </td>
                                        <td>
                                            <?php
                                        if($row['status']==1){
                                            echo "<a href='?itemid=".$id."&type=deactive' class='badge bg-success'>active</a>";
                                        }else{
                                        echo "<a href='?itemid=".$id."&type=active' class='badge bg-danger'>Deactive</a>";
                                          }
                                       ?>
                                        </td>
                                        <td>
                                            <a
                                                href="items_edit.php?pro_id=<?php echo $id ?> &cat_name=<?php echo $cat_name ?>"><i
                                                    class="fas fa-edit"></i></a>
                                            <a href="./code.php?pro_id=<?php echo $id ?>" onclick="return confirmDelete()"><i class="fas fa-trash bg-danger"></i></a>
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