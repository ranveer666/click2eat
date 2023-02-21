<?php 

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
    <link rel="stylesheet" href="Partial/editing_style.css">
    <title>Document</title>
</head>

<body>

    <div class="content-wrapper">
        <div class="container-fluid mt-5">
            <div class="row mr-5 ml-5">
                <div class="col-md-12">
                    <div class="card mt-3">
                        <div class="card-header">
                            <p class="card-title">Menu Edit</p>
                            <a href="./manage-menu.php" title="Go Back" class="float-right">
                                <span><i class="fas fa-backward"></i></span>
                            </a>
                        </div>
                        <div class="card-body">
                            <form action="./code.php" method="POST" onsubmit="return validation()">
                                <?php 
                                require "Partial/_dbconnect.php";
                                if(isset($_GET['cat']))
                                {
                                    $id = $_GET['cat'];
                                    $fetch = "SELECT * FROM category c 
                                    join items i on c.item_type = i.item_id  WHERE cat_id = '$id'";
                                    $result = mysqli_query($con,$fetch);
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                        $name = $row['cat_name'];
                                        $item = $row['item_type'];
                                        ?>
                                <input type="text" value="<?php echo $id ?>" class="form-control" name="id" hidden>
                            
                                <div class="form-group">
                                        <label for="Menu Name" class="control-label">Menu Name</label>
                                        <input type="text" value="<?php echo $name ?>"  class="form-control" name="name" placeholder="Enter Menu Name" id="name">
                                        <span id="fat" class="text-danger font-weight-bold"></span>
                                </div>
                                    
                                <div class="form-group">
                                        <label for="">Area Name</label>
                                        <select name="item_type" id="" class='form-control'>Item Type
                                        <option value=""><?php echo $item ?></option>
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
                                <?php
                                    }
                                }
                                ?>
                                <div class="form-group">
                                    <button class="btn" name="updateMenuName">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    function validation() {


        var box = document.getElementById('name').value;
        var cap = document.getElementById('type').value;

        if (box == "") {

            document.getElementById('fat').innerHTML = "** Enter name";
            return false;
        }
        if((box.length <= 2) || (box.length > 50)) {

document.getElementById('fat').innerHTML = "** name length must be between 2 and 50";
return false;

}
if(!isNaN(box)){

document.getElementById('fat').innerHTML = "**Only characters are allowed";
return false;

}




        if (cap == "") {

            document.getElementById('slim').innerHTML = "** Enter item type";
            return false;
        }
        if((cap.length <= 2) || (cap.length > 50)) {

document.getElementById('slim').innerHTML = "** type name length must be between 2 and 50";
return false;

}
if(!isNaN(cap)){

document.getElementById('slim').innerHTML = "**Only characters are allowed";
return false;
}


    }
    </script>
    <?php include "Partial/_footer.php" ?>
</body>

</html>