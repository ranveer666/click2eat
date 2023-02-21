<?php
session_start();
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Bootstrap/bootstrap.css">
    <script src="Bootstrap/jquery.js"></script>
    <script src="Bootstrap/popper.js"></script>
    <script src="Bootstrap/bootstrap.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Complaint</title>
</head>

<body>

    <div class="content-wrapper">
        <div class="container-fluid mt-5">
            <div class="row mr-5 ml-5">
                <div class="col-md-12">
                    <div class="card mt-3">
                        <div class="card-header">
                            <p class="card-title">View Resoponse</p>
                            <a href="./raw_material.php" title="Go Back" class="float-right">
                                <span><i class="fas fa-backward"></i></span>
                            </a>
                        </div>
                        <div class="card-body">
                            <?php
                                
                                $cid = $_SESSION['cid']; 
                                //echo $cid;
                                $select = mysqli_query($con,"SELECT com_response from complaint where Customer_cus_id='$cid'");
                                $check = mysqli_num_rows($select);
                                if($check == 1)
                                {
                                    while($row = mysqli_fetch_assoc($select))
                                    {
                                        $response = $row['com_response'];
                                        
                                ?>
                            <div class="form-group">
                                <input type='text' class="form-control" placeholder="Give Your Complaint"
                                    name='complaint' id="exampleFormControlTextarea1" value="<?php echo $response; ?>">
                            </div>

                            <?php
                                    
                                }
                                
                            }
                            else{
                                echo "There is no response";
                            }
                                ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>