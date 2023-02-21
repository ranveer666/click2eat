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

    <title>Profile</title>
</head>

<body>
    <div class="content-wrapper">
        <div class="container-fluid mt-5">
            <div class="row ml-5 mr-5">
                <div class="col-md-12">
                    <div class="card mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Profile </h3>
                            <a href="index.php" title="Go to Back" class="float-right">
                                <span><i class="fas fa-backward"></i></span>
                            </a>
                        </div>
                        <div class="card-body">
                            <form action="./code.php" method="POST" onsubmit="return profile()">

                                <?php 
                            $user = $_SESSION['username'];
                            $fetch = " SELECT users_id, username,Area_Area_id, email_id, mobileno,user_password,Area_name FROM user u inner join area a on u.Area_Area_id = a.Area_id where username like '$user'";                             
                           // $fetch = "SELECT * FROM user WHERE users_id='$srno'";
                            $result=mysqli_query($con,$fetch);
                            if(mysqli_num_rows($result) > 0)
                            {
                                while($row = mysqli_fetch_assoc($result))
                                {
                                    $id = $row['users_id'];
                                    $fk = $row['Area_Area_id'];
                                    $name = $row['username'];
                                    $pass = $row['user_password'];
                                    //$pass = $row['user_password'];
                                    $area = $row['Area_name']; 
                                    $email = $row['email_id'];
                                    $phone = $row['mobileno']; 
                                ?>
                                <input type="hidden" value="<?php echo $id; ?>" name="users_id">
                                <div class="form-group">
                                    <label for="">Area Name</label>
                                    <select name="area" id="" class='form-control'>
                                        <option value="">--SELECT--</option>
                                        <?php 
                                    $result = mysqli_query($con,"SELECT * FROM area");
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                        $id = $row['Area_id'];
                                        $aname = $row['Area_name'];
                                       
                                    ?>
                                       
                                        <option value="<?php echo $id ?>">
                                            <?php 
                                            echo $aname;
                                            ?>
                                        </option>
                                        <?php
                                    }
                                    ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="control-label">Name</label>
                                    <input value="<?php echo $name?>" name="uname" class="form-control"
                                        placeholder="Enter Your Name" id="uname">
                                    <span id="tiger" class="text-danger font-weight-bold"></span>
                                </div>

                                <div class="form-group">
                                    <label for="phone" class="control-label">Phone Number </label>
                                    <input value="<?php echo $phone?>" name="phone" class="form-control"
                                        placeholder="Enter Your Mobile No" id="phone">
                                    <span id="lion" class="text-danger font-weight-bold"></span>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="control-label">Email Id </label>
                                    <input value="<?php echo $email?>" name="email" class="form-control"
                                        placeholder="Enter Your Email Id " id="email">
                                    <span id="cheetah" class="text-danger font-weight-bold"></span>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" value="<?php echo $pass ?>" name="password"
                                        class="form-control" id="pass" placeholder="Enger Password">
                                    <span id="password" class="text-danger font-weight-bold"></span>
                                </div>
                                <?php 
                                }
                            }
                        
                           
                        ?>
                                <button class="btn " name="update_profile">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    // User Edit
    function profile() {


        var def = document.getElementById('uname').value;
        var van = document.getElementById('phone').value;
        var ask = document.getElementById('email').value;
        var pass = document.getElementById('pass').value;

        if (def == "") {

            document.getElementById('tiger').innerHTML = "** Please fill the username field";
            return false;
        }
        if (van == "") {

            document.getElementById('lion').innerHTML = "** Please fill the phone field";
            return false;
        }
        if (ask == "") {

            document.getElementById('cheetah').innerHTML = "** Please fill the email field";
            return false;
        }
        if (pass == "") {

            document.getElementById('password').innerHTML = "** Please fill the Password field";
            return false;
        }
    }
    </script>
    <?php
include "Partial/_footer.php";
?>

</body>

</html>