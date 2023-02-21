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
    <title>Manage-Complaint</title>
</head>

<body>
    <section class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title text-bold">View Complaint</h3>
                            <a href="index.php" title="Add Users">
                                <i class="fas fa-backward i float-right"></i>
                            </a>
                        </div>
                        <?php 
                            if(isset($_SESSION['Deleted']))
                            {
                                echo  '<div class="alert ml-4 mt-3 mr-3 alert-primary alert-dismissible fade show">
                                            <strong>'.$_SESSION['Deleted'].'</strong>
                                            <button class="close" data-dismiss="alert" aria-label="close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>';
                                session_unset();
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
                                        <th>Complaint</th>
                                        <th>Answer to Customer</th>
                                        <th>Date</th>
                                        <th>Customer</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                    
                                if(isset($_GET['search']))
                                {
                                    $search = $_GET['search'];
                                    // $fetch = "SELECT feedback.feedback_id,feedback.feedback_note,customer.cus_name 
                                    // FROM feedback INNER JOIN customer ON feedback.Customer_cus_id = customer.cus_id
                                    // where concat(feedback_id,feedback_note,cus_name) like '$search'"; 
                                    $searchQuery = "SELECT * FROM complaint c1 inner join customer c on c1.Customer_cus_id = c.cus_id 
                                    WHERE CONCAT(com_description,complaint_id,cus_name,date_of_complaint,com_response) like '%$search%';";
                                    $result_search = mysqli_query($con,$searchQuery);
                                    foreach($result_search as $row)
                                    {
                                        $id = $row['complaint_id'];
                                        $des = $row['com_description'];
                                        $response = $row['com_response'];
                                        $date = $row['date_of_complaint'];
                                        $name = $row['cus_name'];   
                                    ?>
                                     <tr>
                                        <td><?php echo substr($des ,0,60)?>...</td>
                                        <td><?php echo substr($response,0,20) ?></td>
                                        <td><?php echo $date ?></td>
                                        <td><?php echo $name ?></td>
                                        <td>
                                            <a href="./answerComplaint.php">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php 
                                    }
                                }
                                else
                                {
                                //$fetch = "SELECT feedback_id,feedback_note,cus_name FROM feedback f, customer c WHERE f.Customer_cus_id = c.cus_id;"; 
                                $fetch = "SELECT complaint.complaint_id,complaint.com_description,complaint.com_response,complaint.date_of_complaint,customer.cus_name 
                                FROM complaint 
                                INNER JOIN customer 
                                ON complaint.Customer_cus_id = customer.cus_id;";
                                $result_fetch = mysqli_query($con,$fetch);
                                foreach($result_fetch as $row)
                                {
                                    $id = $row['complaint_id'];
                                    $des = $row['com_description'];
                                    $response = $row['com_response'];
                                    $date = $row['date_of_complaint'];
                                    $name = $row['cus_name'];   
                                ?>
                                    <tr>
                                       
                                        <td><?php echo substr($des ,0,60)?>...</td>
                                        <td><?php echo substr($response,0,20)?>..</td>
                                        <td><?php echo $date ?></td>
                                        <td><?php echo $name ?></td>
                                        <td>
                                            <a href="./answerComplaint.php">
                                                <i class="fas fa-edit"></i>
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
    </section>

<script>
    deleteFun =  () =>  {
        return confirm("Are You Sure You want to delete???");
    }
</script>
<?php
include "Partial/_footer.php";
?>
</body>

</html>