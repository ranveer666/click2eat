<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
    <script src="jquery-3.3.1.js"></script>
    <link rel="stylesheet" href="Bootstrap/bootstrap.css">
    <script src="Bootstrap/jquery.js"></script>
    <script src="Bootstrap/popper.js"></script>
    <script src="Bootstrap/bootstrap.js"></script>
    <!-- <link rel="stylesheet" type="text/css" href="Partial/style.css"> -->
    <?php
echo "<body style='background: url(images/homepage3.jpg); background-repeat:norepeat; background-attachment:fixed;background-size:100% 100%;'>";
?>
    <style>
    .col-xl-6 {
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px 0px #000;
        margin-top: 50px;
    }
    .change{
        font-size: 2.2rem;
    color: crimson;
    text-transform: uppercase;
    font-family: cursive;
    }
    label,.btn{
        font-size: 1.5rem;
    color: cornsilk;
    }
    </style>
</head>

<body style="">
    <?php include "../Partial/_nav.php" ?>
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="text-center">
                    <h2 class="change text-center">Login</h2>
                    <?php
                    
                   if(isset($_SESSION['loggedin']))
                    {
                       echo  '<div class="alert alert-danger alert-dismissible fade show">
                           <strong>Hey! </strong>' .$_SESSION['loggedin'] .' <button class="close" data-dismiss="alert" aria-label="close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                       </div>';
                       unset($_SESSION['loggedin']);
                    }
                    
                    
                    ?>
                    
                </div>
                <form action="./login_code.php" method="POST" class="form mt-5">
                    <div class="form-group">
                        <label for="email" class="">Email ID</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter Your Email">
                    </div>

                    <div class="form-group">
                        <label for="Name">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter Your Password">
                    </div>

                    <button class="btn btn-block bg-primary  text-light">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>