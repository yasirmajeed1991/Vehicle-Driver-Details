<?php  if(!isset($_SESSION)) 
		{ 
			session_start(); 
		}
 
		error_reporting(0);   
		ob_start();
 ?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Loxlift Admin Area</title>
   
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="vendors/jqvmap/dist/jqvmap.min.css">


    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href=""><img src="img/logolox.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href=""><img src="img/logolox.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                   
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Users</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-eye"></i><a href="lox_view_user.php">Active Users List</a></li>
                            <li><i class="fa fa-eye"></i><a href="lox_view_inactive_user.php">Inactive User List</a></li>
                            
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-car"></i>Vehicle Type</a>
                        <ul class="sub-menu children dropdown-menu">
                            
                            <li><i class="menu-icon fa fa-car"></i><a href="lox_view_vehicle_category.php">Vehicle Category</a></li>
                            <li><i class="menu-icon fa fa-plus"></i><a href="lox_add_vehicle_category.php">Add Vehicle Category</a></li>
                            
                        </ul>
                    </li>
                
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-flag-o"></i>City Names</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-eye"></i><a href="lox_view_cityname.php">View City Name</a></li>
							<li><i class="menu-icon fa fa-plus"></i><a href="lox_add_cityname.php">Add City Name</a></li>
                        </ul>
                    </li>
                    <li >
                        <a href="lox_view_category.php" > <i class="menu-icon fa fa-puzzle-piece"></i>Categories</a>
                       
                    </li>
                    <li >
                        <a href="licence_view.php" > <i class="menu-icon fa fa-address-card-o"></i>Licences</a>
                       
                    </li>
                    <li >
                        <a href="lox_view_payment_manually.php" > <i class="menu-icon fa fa-credit-card"></i>Payments</a>
                       
                    </li>
					<li >
                        <a href="lox_view_per_day_rate.php" > <i class="menu-icon fa fa-dollar"></i>Pricing</a>
                       
                    </li>
					<li ><a href="lox_view_faq.php"><i class="menu-icon fa fa-question"></i><span> Faq</span></a>
                      </li>
					<li ><a href="lox_view_feedback.php"><i class="menu-icon fa fa-comments-o"></i><span>Web Feedback</span></a>
                       </li>
                    <li ><a href="lox_view_c_feedback.php"><i class="menu-icon fa fa-comments-o"></i><span>Users Feedback</span></a>
                       </li>   
					<li ><a href="lox_view_news.php"><i class=" menu-icon fa fa-newspaper-o"></i><span> News Section</span></a>
                       </li>

					<li ><a href="settings.php"><i class=" menu-icon fa fa-wrench"></i><span> Settings</span></a>
                       </li>

                    <li ><a href="lox_view_user_admin.php"><i class=" menu-icon fa fa-users"></i><span> Admin Users</span></a>
                       </li>

                       
                     <li>
                        <a href="logout.php" > <i class="menu-icon fa fa-arrow-circle-right"></i>Logout</a>
                       
                    </li>
                    
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">
           <?php if($_SESSION['error_msg']!=''){echo $_SESSION['error_msg']; $_SESSION['error_msg']='';}?>
            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    
                </div>

               
            </div>

        </header><!-- /header -->
        <!-- Header-->
 