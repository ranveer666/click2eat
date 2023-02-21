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
    <title>Editng_user</title>
</head>

<body>
    <div class="content-wrapper">
        <div class="container-fluid mt-5">
            <div class="row ml-5 mr-5">
                <div class="col-md-12">
                    <div class="card mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Manage Supplier Date</h3>
                            <a href="./manage-supplier.php" title="Go to Back" class="float-right">
                                <span><i class="fas fa-backward"></i></span>
                            </a>
                        </div>
                        <div class="card-body">
                            <form action="./code.php" method="POST" onsubmit="return validation()">
                                <?php 
                        if(isset($_GET['sup_id']))
                        {
                            $srno = $_GET['sup_id'];
                            $fetch = "SELECT * FROM supplier WHERE supplier_id='$srno'";
                            $result=mysqli_query($con,$fetch);
                            if(mysqli_num_rows($result) > 0)
                            {
                                foreach($result as $row)
                                {
                                    $id = $row['supplier_id'];
                                    $name = $row['supplier_name'];
                                    $email = $row['supplier_email'];
                                    $phone = $row['supplier_mo_no'];
                                    ?>
                                <input type="text" value="<?php echo $id ?>" name="sup_id" hidden>
                                <div class="form-group">
                                    <label for="name" class="control-label">Name</label>
                                    <input value="<?php echo $name?>" name="sname" class="form-control"
                                        placeholder="Enter Your Name" id="sname">
                                    <span id="jupiter" class="text-danger font-weight-bold"></span>
                                </div>

                                <div class="form-group">
                                    <label for="number" class="control-label">Phone Number </label>
                                    <input value="<?php echo $phone?>" name="phone" class="form-control"
                                        placeholder="Enter Your Mobile No" id="phone">
                                    <span id="uranus" class="text-danger font-weight-bold"></span>
                                </div>

                                <div class="form-group">
                                    <label for="number" class="control-label">Email Id </label>
                                    <input value="<?php echo $email?>" name="email" class="form-control"
                                        placeholder="Enter Your Email Id " id="email">
                                    <span id="neptune" class="text-danger font-weight-bold"></span>
                                </div>
                                <?php }
                            }
                            else{
                                echo "Failed to fetch data";
                            }
                        }
                        ?>
                                <button class="btn " name="updateSupplier">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    function validation() {


        var box = document.getElementById('sname').value;
        var cap = document.getElementById('phone').value;
        var ter = document.getElementById('email').value;


        if (box == "") {

            document.getElementById('jupiter').innerHTML = "** Please enter supplier name";
            return false;

            if((box.length <= 2) || (box.length > 20)) {

document.getElementById('jupiter').innerHTML = "** user length must be between 2 and 20";
return false;

}
if(!isNaN(box)){

document.getElementById('jupiter').innerHTML = "**Only characters are allowed";
return false;

}
        }
        if (cap == "") {

            document.getElementById('uranus').innerHTML = "** Please enter the phone number";
            return false;
 }

 if(cap.length!=10){

document.getElementById('uranus').innerHTML=" **Mobile number must be of 10 digits only";
return false;
}

if(isNaN(cap)){

document.getElementById('uranus').innerHTML = "**Only numbers are allowed";
return false;

}
        if (ter == "") {

            document.getElementById('neptune').innerHTML = "** Enter email id";
            return false;
        }


    }
    </script>
    <?php
include "Partial/_footer.php";
?>

</body>

</html>