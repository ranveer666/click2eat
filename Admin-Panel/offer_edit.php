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
    <title>Offer Edit</title>
</head>

<body>
    <div class="content-wrapper">
        <div class="row mt-5 mr-5 ml-5">
            <div class="col-md-12 mt-5 ">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Offer</h3>
                        <a href="./offers.php" class="float-right">
                            <i class="fas fa-backward"></i>
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="./code.php" method="POST" onsubmit="return validation()">
                            <?php 
                        require("Partial/_dbconnect.php");
                        if(isset($_GET['offer_id']))
                        {
                            $id = $_GET['offer_id'];
                            $fetch = "SELECT * FROM offer WHERE offer_id='$id'";
                            $result = mysqli_query($con,$fetch);
                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_assoc($result))
                                {
                                    $name = $row['offer_name'];
                                    $price = $row['offer_price'];
                                    $start_date = $row['offer_start_date'];
                                    $valid_date = $row['offer_end_date']
                                    ?>
                            <input type="hidden" value="<?php echo $id; ?>" name="oid" class="form-control">
                            <div class="form-group">
                                <label for="">Offer Name</label>
                                <font color="red">*</font>
                                <input type="text" class="form-control" name="offer_name" value="<?php echo $name ?>"
                                    id="offer_name">
                                <span id="xat" class="text-danger font-weight-bold"></span>
                            </div>
                            <div class="form-group">
                                <label for="">Offer Price</label>
                                <font color="red">*</font>
                                <input type="text" value="<?php echo $price; ?>" class="form-control" name="price"
                                    id="price">
                                <span id="cat" class="text-danger font-weight-bold"></span>
                            </div>
                            <div class="form-group">
                                <label for="">Offer Start Date</label>
                                <font color="red">*</font>
                                <input type="date" value="<?php echo $start_date; ?>" class="form-control" name="sdate"
                                    id="sdate">
                                <span id="mat" class="text-danger font-weight-bold"></span>
                            </div>
                            <div class="form-group">
                                <label for="">Offer Valid Date</label>
                                <font color="red">*</font>
                                <input type="date" value="<?php echo $valid_date; ?>" class="form-control" name="edate"
                                    id="edate">
                                <span id="cmat" class="text-danger font-weight-bold"></span>
                            </div>

                            <?php
                                }
                            }
                        }
                            ?>
                           
                            <button class="btn" name="UpdateOffer">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    function validation() {


        var user = document.getElementById('offer_name').value;
        var b = document.getElementById('price').value;
        var c = document.getElementById('sdate').value;
        var r = document.getElementById('edate').value;


        if (user == "") {

            document.getElementById('xat').innerHTML = "** Please enter offername";
            return false;
        }
        if(!isNaN(user)){
       
       document.getElementById('xat').innerHTML = "**Only characters are allowed";
       return false;
   }

   if((user.length <= 20) || (user.length > 100)) {

       document.getElementById('xat').innerHTML = "** name length must be between 20 and 100";
       return false;
   }




        if (b == "") {

            document.getElementById('cat').innerHTML = "** Please fill the offer price";
            return false;
        }
        if(isNaN(b)){
       
       document.getElementById('cat').innerHTML = "**Only numbers are allowed";
       return false;
   }




        if (c == "") {

            document.getElementById('mat').innerHTML = "** Please mention sarting date of the offer";
            return false;
        }
        if (r == "") {

            document.getElementById('cmat').innerHTML = "** Please mention the offer valid date";
            return false;
        }



    }
    </script>
    <?php 
include "Partial/_footer.php";
?>
</body>

</html>