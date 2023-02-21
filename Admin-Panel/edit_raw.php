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
                            <p class="card-title">Raw-Material Edit</p>
                            <a href="./raw_material.php" title="Go Back" class="float-right">
                                <span><i class="fas fa-backward"></i></span>
                            </a>
                        </div>
                        <div class="card-body">
                            <form action="./code.php" method="POST" onsubmit="return validation()">
                                <?php 
                                require "Partial/_dbconnect.php";
                                if(isset($_GET['raw_id']))
                                {
                                    $id = $_GET['raw_id'];
                                    $fetch = "SELECT * FROM raw_material WHERE raw_id = '$id'";
                                    $result = mysqli_query($con,$fetch);
                                    while($row = mysqli_fetch_assoc($result))
                                    {
        
                                        $name = $row['name_raw_material'];
                                        $des = $row['raw_description'];
                                        $qty = $row['qty_on_hand'];
                                        ?>
                                <input type="text" value="<?php echo $id ?>" class="form-control" name="id" hidden>
                                <div class="form-group">
                                    <label for="Name" class="control-label">Raw-Material Name</label>
                                    <input type="text" value="<?php echo $name ?>" class="form-control" name="name"
                                        placeholder="Enter Raw-Material Name" id="name">
                                    <span id="leg" class="text-danger font-weight-bold"></span>
                                </div>
                                <div class="form-group">
                                    <label for="Des" class="control-label">Raw-Material Description</label>
                                    <input type="text" value="<?php echo $des ?>" class="form-control" name="des"
                                        placeholder="Enter Raw-Material Description" id="des">
                                    <span id="pag" class="text-danger font-weight-bold"></span>
                                </div>
                                <div class="form-group">
                                    <label for="qty">Quntity</label>
                                    <input type="text" class="form-control" value="<?php echo $qty ?>" name="qty"
                                        placeholder="Enter Quntity" id="qty">
                                    <span id="nag" class="text-danger font-weight-bold"></span>
                                </div>
                                <div class="form-group">
                                    <label for="sup">Supplier Name</label>
                                    <select name="supplier_name" class="form-control" id="">
                                        <option value="">--Select Supplier Name--</option>
                                        <?php 
                                                $fetch = mysqli_query($con,"select * from supplier");
                                                while($row = mysqli_fetch_assoc($fetch))
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
                                <?php
                                    }
                                }
                                ?>
                                <div class="form-group">
                                    <button class="btn" name="UpdateRaw-Material">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
    function validation() {


        var box = document.getElementById('name').value;
        var cap = document.getElementById('des').value;
        var ter = document.getElementById('qty').value;


        if (box == "") {

            document.getElementById('leg').innerHTML = "** Please enter the raw material name";
            return false;
        }
        if(!isNaN(box)){
       
       document.getElementById('leg').innerHTML = "**Only characters are allowed";
       return false;
   }

   if((box.length <= 10) || (box.length > 1000)) {

       document.getElementById('leg').innerHTML = "** name length must be between 10 and 1000";
       return false;
   }



        if (cap == "") {

            document.getElementById('pag').innerHTML = "** Please enter raw material description";
            return false;
        }
        if(!isNaN(cap)){
       
       document.getElementById('pag').innerHTML = "**Only characters are allowed";
       return false;
   }

   if((cap.length <= 10) || (cap.length > 1000)) {

       document.getElementById('pag').innerHTML = "** description length must be between 10 and 1000";
       return false;
   }



        if (ter == "") {

            document.getElementById('nag').innerHTML = "** Enter quantity";
            return false;
        }

        if(isNaN(ter)){
       
       document.getElementById('nag').innerHTML = "**Only numbers are allowed";
       return false;
   }


    }
    </script>
    <?php include "Partial/_footer.php" ?>
</body>

</html>