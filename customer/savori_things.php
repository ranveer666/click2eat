
<?php include("header.php");
 $servar = "localhost";
 $username = "root";
 $password = "";
 $database = "project";
 
 $con = mysqli_connect($servar,$username,$password,$database);
 if(!$con)
 {
     die(mysqli_connect_error());
 }
 else{
     // echo "Connected";
 }
 
?>
<style>
    
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <style>
        del{
            color:#00000;
        }
    </style>
</head>
<body style="background-color:#13131a;text-align:center">
    <div class="container mt-5">
        <div class="row">

        <?php 
            $fetch = "SELECT * FROM product WHERE cat_fk_id='2' and status='1'";
            $result = mysqli_query($con,$fetch);
            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_assoc($result))
                {
                    $path = $row['image_path'];
                    $name = $row['pro_name'];
                    $price = $row['pro_price'];
                    
                    $des = $row['pro_description'];
                    $Serial_No=$row['pro_id'];
                    $offerpric=$price * 5/100;
                    $mrp=$price-$offerpric;
        
          echo ' <div class="col-lg-3 mt-3">
                    <form action="manage_cart.php" method="POST">
                    <div class="card">
                    <img src="'.$path.'" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title">'.$name.'</h5>
                        <p class="card-text">'.substr($des,0,45).'..</p>
                        <p class="card-text"> ₹<del>'.$price.' </del><b>'.$mrp.'</b></p>
                        <button class="btn btn-danger" name="Add_To_Cart">Add To Cart</button>
                        <input type="hidden" name="Serial_No" value=" '.$Serial_No.'">
                        <input type="hidden" name="Item_Name" value="'.$name.'">
                        <input type="hidden" name="Price" value="'.$mrp.'">
                    </div>
                    </div>
                </form>
            </div>';
                }
            }
            ?>
        </div>
    </div>
</body>
</html>