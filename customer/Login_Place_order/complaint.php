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
<?php
$cid = $_SESSION['cid']; 
//echo $cid;
$oid =  $_SESSION['oid'];
$today = date('Y-m-d',strtotime('Now'));
//echo $oid;
if(isset($_POST['complaints']))
{
    $complaint = $_POST['complaint'];
 
   
        $feed = mysqli_query($con,"INSERT into complaint(com_description,Customer_cus_id,date_of_complaint) 
        values('$complaint','$cid','$today')");
       if($feed)
       {
        $_SESSION['update']="Thanks For your Complaint";
        header("Location:feedback&complaint.php");
       }
       else{
        $_SESSION['update']="Sorry!!";
        header("Location:feedback&complaint.php");
       }
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
                            <p class="card-title">Make Complaint</p>
                            <a href="./raw_material.php" title="Go Back" class="float-right">
                                <span><i class="fas fa-backward"></i></span>
                            </a>
                        </div>
                        <div class="card-body">
                            <form action='' method="POST">

                                <div class="form-group">
                                    <textarea type='text' class="form-control" placeholder="Give Your Complaint"
                                        name='complaint' id="exampleFormControlTextarea1"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="complaints" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>