<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar</title>
    <style>
        .main-sidebar{
            background-color:black;
            /* clip-path: polygon(100% 0%, 100% 50%, 50% 100%, 0 75%, 0 0); */
        }
        #dash{
            background: white;
            border-bottom-left-radius:25px;
            border-top-left-radius:25px;
            padding-bottom:5px;
            padding-top:5px;
        
        }
        
        #p,.fa-infinity{
            color:black;
        }
        #side:hover{
            background-color:rgba(124, 117, 117, 0.3);
            border:0.1px solid white;
        }
        .nav-link i{
            color:green;
        }
        .nav-item{
            margin-top:5px;
        }
        /* i:hover{
            color:white;
        } */
    </style>
</head>
   
<body>
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary ">
        <!-- Brand Logo -->
        <a href="./index.php" class="brand-link">
            <img src="assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
            <span class="brand-text text-bold">Click2Eat</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar  flex-column" data-widget="treeview" role="menu">
                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                    <li class="nav-pils" id="dash">
                        <a href="./index.php" class="nav-link">
                            <i class="nav-icon fas fa-infinity"></i>
                            <p id="p" class="text-bold ml-2">
                                Dashboard
                                <!-- <span class="right badge badge-danger">New</span> -->
                            </p>
                        </a>
                    </li>
                    <li class="nav-item mt-2">
                        <a href="./manage-users.php" class="nav-link" id="side">
                            <i class="nav-icon fas fa-users"></i>
                           <p>Manage-Users</p>
                        </a>
                    </li>
                    <!-- <li class="nav-item mt-2 mb-2 " id="side">
                        <span class="text-white text-sm">Manage-Orders</span>
                        <ul class="nav">
                            <li class="nav-item">
                                <a href="./new_order.php" class="nav-link">
                                    <i class="nav-icon fas fa-circle"></i>
                                    <p>New Orders</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./prepared_order.php" class="nav-link">
                                    <i class="nav-icon fas fa-circle"></i>
                                    <p>Prepared Orders</p>
                                </a>
                            </li>
                          
                        </ul>
                    </li> -->
                    <li class="nav-item">
                        <a href="./manage-menu.php" class="nav-link" id="side">
                            <i class="nav-icon fas fa-bars"></i>
                            <p>Manage-Menu</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./items.php" class="nav-link" id="side">
                            <i class="nav-icon fas fa-utensils "></i>
                            <p>Items Types</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./offers.php" class="nav-link" id="side">
                            <i class="nav-icon fas fa-bolt"></i>
                            <p>Manage-Offer</p>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a href="#" class="nav-link "id="side">
                            <i class="nav-icon fas fa-list"></i>
                            <p>
                                Manage-Order
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                            <a href="./new_order.php" class="nav-link"id="side">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>New Orders</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./prepared_order.php" class="nav-link"id="side">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Prepared Orders</p>
                                </a>
                            </li>
                           
                        </ul>
                    </li>
                    
                    <li class="nav-item">
                        <a href="./manage-purchase.php" class="nav-link"id="side">
                            <i class="nav-icon fas fa-book-open"></i>
                            <p>Manage-Purchase</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./customer_reports.php" class="nav-link"id="side">
                            <i class="nav-icon fas fa-rupee-sign"></i>
                            <p>View-Payment-Details</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./raw_material.php" class="nav-link"id="side">
                            <i class="nav-icon fas fa-shopping-bag"></i>
                            <p>Manage Raw-Materials</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./manage-supplier.php" class="nav-link"id="side">
                            <i class="nav-icon fas fa-user"></i>
                            <p>Manage Suppliers</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="#" class="nav-link "id="side">
                            <i class="nav-icon fas fa-industry"></i>
                            <p>
                                Reports
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                            <a href="#" class="nav-link"id="side">
                                    <i class="far fa-circle nav-icon"></i>
                                    
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="./manage-complain.php" class="nav-link"id="side">
                            <i class="nav-icon fas fa-comments"></i>
                            <p>Complaint</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./manage-feedback.php" class="nav-link"id="side">
                            <i class="nav-icon fas fa-star"></i>
                            <p>View Feedback</p>
                        </a>
                    </li>
                </ul>
                <!-- <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                   Dashboard
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="./index.html" class="nav-link active">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Manage</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./index2.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p></p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./index3.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Dashboard v3</p>
                    </a>
                </li>
            </ul>
        </li> -->

            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

</body>

</html>