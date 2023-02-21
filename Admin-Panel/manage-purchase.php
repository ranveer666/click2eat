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
    <link rel="stylesheet" href="Partial/style.css">
    <script src="assets/validation.js"></script>
    <title>Manage-Users</title>
</head>
<body>
    <div class="content-wrapper">
        <div class="container-fluid mt-3 mr-3">
            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title text-bold">Manage Purchase</h3>
                            <a href="#" data-toggle="modal" data-target="#AddUser" title="Add Users">
                                <i class="fas fa-plus i float-right"></i>
                            </a>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>