<?php
session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        require '../Partial/_dbconnect.php';
        $login = false;
        $email = $_POST['email'];
        $name = $_POST['name'];
        $select = mysqli_query($con,"SELECT * FROM customer where  cus_email ='$email'");
        $check = mysqli_num_rows($select);
        if($check == 1)
        {
            foreach($select as $row)
            {
                $userid = $row['cus_id'];
                $name = $row['cus_name'];
                $email = $row['cus_email'];
            }
            $login = true;
            $_SESSION['email'] = $email;
            $_SESSION['loggedin'] = 'Login Successfull';
            header("location:index.php");
        }
        else
        {
            $_SESSION['loggedin'] = "Invalid Credential";  
        }
    }
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
echo "<body style='background: url(../../Admin-Panel/images/homepage.png); background-repeat:norepeat; background-attachment:fixed;background-size:100% 100%;'>";
?>
    <style>
    .col-xl-6 {
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px 0px #000;
        margin-top: 50px;
    }

    .change {
        font-size: 2.2rem;
        color: crimson;
        text-transform: uppercase;
        font-family: cursive;
    }
    h2{
        font-size:3rem;
        font-family:auto;
    }
    label,
    .btn {
        font-size: 1.5rem;
        color: cornsilk;
    }
    </style>
</head>

<body style="">
    <div class="container page-content">
        <div class="holder d-flex justify-content-center align-items-center mt-5">
            <div class="container">
                <div class="title-wrap text-center">
                    <h2 class="h1-style text-light m-0">Clic<span class="text-success">2</span>Eat</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
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
                <form action="" method="POST" class="form mt-5">
                    <div class="form-group">
                        <label for="Name">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Your Name">
                    </div>
                    <div class="form-group">
                        <label for="email" class="">Email ID</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter Your Email">
                    </div>
                    <button class="btn btn-block btn-outline-success">Login</button>
                </form>
            </div>
        </div>
    </div>



</body>

</html>