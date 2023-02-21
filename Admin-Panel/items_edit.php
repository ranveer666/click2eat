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
    <link rel="stylesheet" href="Partial/editing_style.css">
    <script src="assets/jquery-3.3.1.js"></script>
    <title>Product_Editing</title>
</head>

<body>

    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row mt-5">
                <div class="col-md-12 mt-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Item</h3>
                            <a href="./items.php" class="float-right">
                                <i class="fas fa-backward"></i>
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <form action="./code.php" method="POST"  >
                                        <div class="form-group">
                                            <label for="">Menu</label>
                                            <font color="red">*</font>
                                            <select name="" id="" class="form-control">
                                                <!-- <option value="">-SELECT ONE OPTION-</option> -->
                                                <?php
                                                    if(isset($_GET['cat_name']))
                                                    {
                                                        $name = $_GET['cat_name'];
                                                        // $fetch = "SELECT cat_name FROM category";
                                                        //$result = mysqli_query($con,$fetch);
                                                       // while($row = mysqli_fetch_assoc($result))
                                                        // {
                                                        //     $name = $row['cat_name'];
                                                            // echo '<option>'.$name.'</option>';
                                                            ?>
                                                <option <?php 
                                                                if($name == 'Sweet Things')
                                                                {
                                                                    echo 'selected';
                                                                }
                                                            ?>>
                                                    Sweet Things
                                                </option>
                                                <option <?php 
                                                                if($name == 'Savory Things')
                                                                {
                                                                    echo 'selected';
                                                                }
                                                            ?>>
                                                    Savory Things
                                                </option>
                                                <option <?php 
                                                                if($name == 'Desserts')
                                                                {
                                                                    echo 'selected';
                                                                }
                                                            ?>>
                                                    Desserts
                                                </option>
                                                <?php
                                                        }  
                                                ?>
                                            </select>
                                        </div>
                                        <?php 
                                        if(isset($_GET['pro_id']))
                                        {
                                            $id = $_GET['pro_id'];
                                            $fetch = "SELECT * FROM product WHERE pro_id = '$id'";
                                            $result = mysqli_query($con,$fetch);
                                            while($row = mysqli_fetch_assoc($result))
                                            {
                                                $id = $row['pro_id'];
                                                $name = $row['pro_name'];
                                                $price = $row['pro_price'];  
                                                $image = $row['image_path'];
                                                $des = $row['pro_description'];
                                       ?>
                                       <input type="hidden" value="<?php echo $id ?>" name="pro_id">
                                        <div class="form-group"  onsubmit="return validation()">
                                            <label for="">Item Name</label>
                                            <font color="red">*</font>
                                            <input type="text" value="<?php echo $name ?>" class="form-control" name ="name" id ="name">
                                            <span id="upsc" class="text-danger font-weight-bold"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Item Price</label>
                                            <font color="red">*</font>
                                            <input type="text" value="<?php echo $price ?>" class="form-control" name ="price" id ="price">
                                            <span id="gpsc" class="text-danger font-weight-bold"></span>
                                        </div>
                                        <?php
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <input name="des" id="" cols="30" rows="10" class="form-control " value="<?php echo $des ?>"></input>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Item Image</label>
                                        <font color="red">*</font><br>
                                        <input type="hidden" name="image" class="form-control" >
                                        <input type='file' name="item_img" class="form-control" value="<?php echo $image ?>"/>
                                    </div>
                                </div>
                                <?php 
                                 }
                                }
                                ?>
                                <button class="btn btn-outline-primary" name="item_update">Update</button>
                            </form>
                            </div>
                        </div>
                    </div>
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
<?php 
include "Partial/_footer.php"
?>
</body>

</html>
<!-- <input type="hidden" name="item_img_old" value=""> -->
<!-- <img id="blah" class="img-rounded" src="#" alt="your image" /> -->
<!-- Start jQuery -->
<!-- <script>
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#blah')
                .attr('src', e.target.result)
                .width(150)
                .height(150);
        };
           reader.readAsDataURL(input.files[0]);
    }
}
</script> -->
<!-- End jQuery -->