<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <style>
    #dropdown i
    {   
        color:green;
    }
    span{
        padding :0 15px;
    }
   
    </style>
</head>

<body >
 
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light fixed-top">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-text">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-text d-none d-sm-inline-block">
                <a href="index.php" class="nav-link">Home</a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->
            <li class="nav-item">
            <li class="crungh-logout dropdown clearfix">
			<span>Administrator</span>	 
            <a href="#" class="dropdown-toggle avatar " data-toggle="dropdown">
	        		<img src="assets/dist/img/avatar.png" class="rounded-circle" style="width:30px;"></a>
	        		<ul class="dropdown-menu" id="dropdown">
						<li class="dropdown-item">
                            <a href="#">
                                <i class="fa fa-user"></i>
                                <span>Profile</span>
                            </a>
                        </li>
						<li class="dropdown-item">
                            <a href="#">
                                <i class="fa fa-lock"></i>
                                <span>Change Password</span>                                   
                            </a>
                        </li>
						<li class="dropdown-item">
                            <a href="#">
                                <i class="fas fa-user-alt-slash"></i>
                                <span>LogOut</span> 
                            </a>
                        </li>	
	        		</ul>
	      		</li>
            </li>
            <!-- Messages Dropdown Menu-
             Notifications Dropdown Menu -->
            <!-- <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">15 Notifications</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> 4 new messages
                        <span class="float-right text-muted text-sm">3 mins</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-users mr-2"></i> 8 friend requests
                        <span class="float-right text-muted text-sm">12 hours</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-file mr-2"></i> 3 new reports
                        <span class="float-right text-muted text-sm">2 days</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                    <i class="fas fa-th-large"></i>
                </a>
            </li>  -->
        </ul>
    </nav>
    <!-- /.navbar -->

</body>

</html>