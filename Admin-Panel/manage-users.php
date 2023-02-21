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

    <!-- Modal For Add User -->

    <div class="modal fade" id="AddUser">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="" id="AddUser">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="./code.php" method="POST" name="formvalid" onsubmit="return validation()">
                        <div class="form-group">
                            <label for="Uname">User Name</label>
                            <input type="text" class="form-control" name="uname" placeholder="Enter User Name"
                                id="uname">
                            <span id="username" class="text-danger font-weight-bold"></span>
                        </div>
                        <div class="form-group">
                            <label for="Upass">User Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter Email" id="email">
                            <span id="umail" class="text-danger font-weight-bold"></span>
                        </div>
                        <div class="form-group">
                            <label for="Upass">User Phone Number</label>
                            <input type="text" maxlength="13" class="form-control" name="phone"
                                placeholder="Enter Phone" id="phone">
                            <span id="unum" class="text-danger font-weight-bold"></span>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password"
                                        placeholder="Enter Password" id="password">
                                        <span id="pop" class="text-danger font-weight-bold"></span>
                                </div>
                                <div class="col">
                                    <label for="cpassword">Confirm Password</label>
                                    <input type="password" class="form-control" name="cpassword"
                                        placeholder="Enter Confrim Password" id="cpassword">
                                        <span id="passi" class="text-danger font-weight-bold"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Area Name</label>
                            <select name="area" id="" class='form-control'>Area_name
                                <option value="">-Select Your Area-</option>
                                <?php 
                            $result = mysqli_query($con,"SELECT * FROM area");
                            while($row = mysqli_fetch_assoc($result))
                            {
                                $id = $row['Area_id'];
                                $name = $row['Area_name'];
                             ?>
                                <option value="<?php echo $id ?> ">
                                    <?php 
                                    echo $name;
                                    ?>
                                </option>
                                <?php
                            }
                            ?>
                            </select>
                        </div>
                        <button type="submit" name="AddUsers" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Close</button>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

    <!-- End Modal -->

    <div class="content-wrapper">
        <div class="container-fluid mt-3 mr-3">
            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title text-bold">Manage Users</h3>
                            <a href="#" data-toggle="modal" data-target="#AddUser" title="Add Users">
                                <i class="fas fa-plus i float-right"></i>
                            </a>
                        </div>
                        <?php 
                            if(isset($_SESSION['updated']))
                            {
                                echo  '<div class="alert ml-4 mt-3 mr-3 alert-primary alert-dismissible fade show">
                                            <strong>'.$_SESSION['updated'].'</strong>
                                            <button class="close" data-dismiss="alert" aria-label="close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>';
                                unset($_SESSION['updated']);
                            }
                            if(isset($_SESSION['check']))
                            {
                                echo  '<div class="alert ml-4 mt-3 mr-3 alert-primary alert-dismissible fade show">
                                            <strong>'.$_SESSION['check'].'</strong>
                                            <button class="close" data-dismiss="alert" aria-label="close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>';
                                unset($_SESSION['check']);
                            }
                           
                    ?>
                    
                    <!-- To Search item -->
                    <div class="card-text mt-2">
                        <form action="" metho="GET">
                            <div class="form-group form-inline float-right">
                                <button class="btn btn-outline-primary mr-2" type="submit">Search</button>
                                <input type="text" name="search" class="form-control mr-3"
                                    value="<?php if(isset($_GET['search'])){echo $_GET['search'];}?>">
                            </div>
                            <div class="form-group form-inline ml-4">
                                <label for="example">Select : </label>
                                <select name="" class="form-control ml-2">
                                    <option>Select Value</option>
                                    <option name="5">5</option>
                                    <option name="10">10</option>
                                    <option name="15">15</option>
                                    <option name="20">20</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body pt-2">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Sr No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <!-- <th>City</th> -->
                                    <th>Area</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Showing status 
                                // Make active to deactive or deactive to active
                                $i=1;
                                if(isset($_GET['usersid']))
                                {
                                    $id = mysqli_real_escape_string($con,$_GET['usersid']);
                                    $type = mysqli_real_escape_string($con,$_GET['type']);
                                    if($type == 'active')
                                    {
                                        $status = 1;
                                    }
                                    else
                                    {
                                        $status = 0;
                                    }
                                    mysqli_query($con,"UPDATE user set status='$status' where users_id='$id'");
                                }

                                if(isset($_GET['search']))
                                {
                                    $search = $_GET['search'];
                                    //$searchQuery = "SELECT * FROM user WHERE CONCAT(users_id,username,email_id,mobileno,Area_name) like '%$search%'";
                                    $searchQuery = "SELECT * FROM user u inner join area a on u.Area_Area_id = a.Area_id WHERE CONCAT(users_id,username,email_id,mobileno,Area_name) like '%$search%'";
                                    $serachResult = mysqli_query($con,$searchQuery);
                                    
                                    foreach($serachResult as $row)
                                    { 
                                        $id = $row['users_id'];
                                        $name = $row['username'];
                                        $email = $row['email_id'];
                                        $phone = $row['mobileno'];  
                                     //$city = $row['city_name'];
                                        $area = $row['Area_name'];    
                                ?>
                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td>
                                        <img src="../Images/user.png"
                                            class="img-responsive icon-profile">&nbsp;&nbsp;<?php echo $name ?>
                                    </td>
                                    <td><?php echo $email ?></td>
                                    <td><?php echo $phone ?></td>

                                    <td><?php echo $area ?></td>
                                    <td>
                                        <?php
                                        if($row['status']==1){
                                            echo "<a href='?usersid=".$id."&type=deactive' class='badge bg-success'>active</a>";
                                        }else{
                                        echo "<a href='?usersid=".$id."&type=active' class='badge bg-danger'>Deactive</a>";
                                          }
                                       ?>

                                    </td>
                                    <td>
                                        <a href="user_edit.php?users_id=<?php echo $id?> &aname=<?php echo $area ?>"
                                            class="">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="./code.php?users_id=<?php echo $id ?>" class="deleteUsers"
                                            onclick="return confirmDelete()">
                                            <i class="fas fa-trash bg-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php 
                                    }
                                }
                                else
                                {
                                   // $fetch = "SELECT user.username, user.users_id, uesr.email_id, user.mobileno, city.city_name, area.Area_name From user INNER JOIN city,area ON 
                                    //user.Area_Area_id = ";
                                    //$fetch = "SELECT * from user ";
                               // $fetch = "SELECT users_id, username, email_id, mobileno,Area_name, city_name FROM user u, area a, city c WHERE u.Area_Area_id = a.Area_id";
                               $fetch = " SELECT users_id, username, email_id, mobileno, Area_Area_id, Area_name,status  FROM user u inner join area a on u.Area_Area_id = a.Area_id "; 
                               $result_fetch = mysqli_query($con,$fetch);
                                    foreach($result_fetch as $row)
                                    {
                                        $id = $row['users_id'];
                                        $name = $row['username'];
                                        $email = $row['email_id'];
                                        $phone = $row['mobileno'];  
                                        //$city = $row['city_name'];
                                        $area = $row['Area_name']; 
                                        $status = $row['status']; 
                                        $aid = $row['Area_Area_id']; 
                                ?>
                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td>
                                        <img src="../Images/user.png"
                                            class="img-responsive icon-profile">&nbsp;&nbsp;<?php echo $name ?>
                                    </td>
                                    <td><?php echo $email ?></td>
                                    <td><?php echo $phone ?></td>

                                    <td value="<?php echo $aid ?>"><?php echo $area ?></td>
                                    <td>
                                        <?php
                                        if($row['status']==1){
                                            echo "<a href='?usersid=".$id."&type=deactive' name='active' class='badge bg-success'>active</a>";
                                        }else{
                                        echo "<a href='?usersid=".$id."&type=active' name='deactive' class='badge bg-danger'>Deactive</a>";
                                          }
                                       ?>
                                    </td>
                                    <td>
                                        <a href="user_edit.php?users_id=<?php echo $id?> & aname=<?php echo $area ?>"
                                            class="">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="./code.php?users_id=<?php echo $id ?> & status=<?php echo $status ?>" class="deleteUsers"
                                            onclick="return confirmDelete()">
                                            <i class="fas fa-trash bg-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php 
                                    }
                                } 
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
    function confirmDelete() {
        let str = 'Are You Sure You Want To Delete ???? ';
        return confirm(str);
    }
    </script>
    <?php
include "Partial/_footer.php";
?>


</body>

</html>