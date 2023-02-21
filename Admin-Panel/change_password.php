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
    <title>Change Password</title>
</head>

<body>
    <div class="content-wrapper">
        <div class="row mt-5 mr-5 ml-5">
            <div class="col-md-12 mt-5 ">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Change Password</h3>
                        <a href="./index.php" class="float-right">
                            <i class="fas fa-backward"></i>
                        </a>
                    </div>
                    <?php
                     if(isset($_SESSION['changed']))
                     {
                         echo  '<div class="alert alert-success alert-dismissible mt-3 ml-3 mr-5 fade show">
                                    <strong> ' .$_SESSION['changed'] .'</strong>
                                    <button class="close" data-dismiss="alert" aria-label="close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>';
                                unset($_SESSION['changed']);
                     }
                    ?>
                    <div class="card-body">
                        <form action="./code_change_pass.php?change_id=<?php echo $_SESSION['username'];?>"
                            name="updateForm" method="POST" onsubmit="return  updateValidate(this)">
                            <div class="form-group">
                                <label for="pass" class="control-label">Current Password <font color='red'>*</font>
                                    </label>
                                <input type="password" class="form-control" name="opass"
                                    placeholder="Enter Current Password">
                            </div>
                            <div class="form-group">
                                <label for="pass" class="control-label">New Password <font color='red'>*</font></label>
                                <input type="password" class="form-control" name="npass"
                                    placeholder="Enter new Password">
                            </div>
                            <div class="form-group">
                                <label for="pass" class="control-label">Confrim New Password <font color='red'>*</font>
                                    </label>
                                <input type="password" class="form-control" name="cpass"
                                    placeholder="Enter Confirm Password">
                            </div>
                            <button class="btn" name="change_password">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    function updateValidate(updateForm) {
        var validationVerified = true;
        var errorMessage = "";

        if (updateForm.opass.value == "") {
            errorMessage += "Please provide your current password.\n";
            validationVerified = false;
        }
        if (updateForm.npass.value == "") {
            errorMessage += "Please provide a new password.\n";
            validationVerified = false;
        }
        if (updateForm.cpass.value == "") {
            errorMessage += "Please confirm your new password.\n";
            validationVerified = false;
        }
        if (updateForm.cpass.value != updateForm.npass.value) {
            errorMessage += "Confirm password and new password do not match!\n";
            validationVerified = false;
        }
        if (!validationVerified) {
            alert(errorMessage);
        }
        return validationVerified;
    }
    </script>
    <?php 
include "Partial/_footer.php";
?>
</body>

</html>