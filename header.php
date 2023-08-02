<?php  if(!isset($_SESSION)) 
		{ 
			session_start(); 
		}
error_reporting(0);	
ob_start(); 
include "config.php";
include "functions.php";
include "contents.php";
date_default_timezone_set("Africa/Blantyre"); 
?>
<style>
.msg_err {
    color: red;
}

.success_msg {

    font-style: bold;
}
</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $web_site_title;?></title>
    <!-- Preloader CSS-->
    <style>
    #preloader:after,
    #preloader:before {
        content: "";
        display: block;
        left: -1px;
        top: -1px
    }

    #preloader-overlayer,
    #preloader:after,
    #preloader:before {
        position: absolute;
        height: 100%;
        width: 100%
    }

    #preloader-overlayer {
        position: fixed;
        top: 0;
        left: 0;
        background-color: #112E3B;
        z-index: 999
    }

    #preloader {
        height: 40px;
        width: 40px;
        position: fixed;
        top: 50%;
        left: 50%;
        margin-top: -20px;
        margin-left: -20px;
        z-index: 9999
    }

    #preloader:before {
        -webkit-animation: rotation 1s linear infinite;
        animation: rotation 1s linear infinite;
        border: 2px solid #42DB0C;
        border-top: 2px solid transparent;
        border-radius: 100%
    }

    #preloader:after {
        border: 1px solid rgba(255, 255, 255, .1);
        border-radius: 100%
    }

    @media only screen and (min-width:768px) {
        #preloader {
            height: 60px;
            width: 60px;
            margin-top: -30px;
            margin-left: -30px
        }

        #preloader:before {
            left: -2px;
            top: -2px;
            border-width: 2px
        }
    }

    @media only screen and (min-width:1200px) {
        #preloader {
            height: 80px;
            width: 80px;
            margin-top: -40px;
            margin-left: -40px
        }
    }

    @-webkit-keyframes rotation {
        from {
            -webkit-transform: rotate(0);
            transform: rotate(0)
        }

        to {
            -webkit-transform: rotate(359deg);
            transform: rotate(359deg)
        }
    }

    @keyframes rotation {
        from {
            -webkit-transform: rotate(0);
            transform: rotate(0)
        }

        to {
            -webkit-transform: rotate(359deg);
            transform: rotate(359deg)
        }
    }

    body {

        margin: 0;
        padding: 0;
        overflow-x: hidden;
    }
    </style>

    <link rel="shortcut icon" href="<?php echo substr($favicon, 3);?>" type="image/x-icon">
    <link rel="icon" href="<?php echo substr($favicon, 3);?>" type="image/x-icon">
    <!--
		All CSS Codes Loaded
		Ex: bootstrap, fontawesome, style, etc.
		-->

    <link rel="stylesheet" href="assets/libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/libs/fontawesome/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/libs/linearicons/linearicons.css">
    <link rel="stylesheet" href="assets/css/rentnow-icons.css">
    <link rel="stylesheet" href="assets/libs/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/custom-style.css">



</head>

<body class="rn-preloader">
    <div id="preloader"></div>
    <div id="preloader-overlayer"></div>
    <!-- Header-->
    <header class="rn-header">
        <!-- Topbar-->
        <div class="rn-topbar">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-sm-5 col-lg-3">
                        <!-- Tobar Social-->
                        <ul class="rn-social">
                            <li>
                                <a href="<?php echo $face_book_link?>" target="_blank">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo $twitter_link?>" target="_blank">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo $instagram_link?>" target="_blank">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-7 col-lg-9">
                        <!-- Topbar Contact with Icon-->
                        <div class="rn-icon-contents">
                            <div class="rn-phone rn-icon-content">
                                <!-- Phone No Will Not Be Shown For Now
									<div class="rn-icon">
										<i class="lnr lnr-phone"></i>
									</div>
							
									<div class="rn-info">
										<ul>
<?php if(!empty($web_phone_no)){ echo '<li>'.$web_phone_no.'</li>';}
?>
<?php if(!empty($web_mobile_no)){ echo '<li>'.$web_mobile_no.'</li>';}?>
										</ul>   
									</div>
								-->
                            </div>
                            <div class="rn-email rn-icon-content">
                                <div class="rn-icon">
                                    <i class="lnr lnr-envelope"></i>
                                </div>
                                <div class="rn-info">
                                    <ul>
                                        <?php if(!empty($web_site_email)){ echo '<li>'.$web_site_email.'</li>';}?>
                                    </ul>
                                </div>
                            </div>
                            <div class="rn-address rn-icon-content">
                                <div class="rn-icon">
                                    <i class="lnr lnr-map-marker"></i>
                                </div>
                                <div class="rn-info">
                                    <ul>
                                        <?php if(!empty($web_location_address)){ echo '<li>'.$web_location_address.'</li>';}?>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Topbar-->
        <!-- Menubar-->
        <div class="rn-menubar ">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-4">
                        <!-- Logo-->
                        <a class="brand-name" href="index.php">
                            <img class="img-fluid" src="<?php echo "uploads/$fileToUpload"?>" alt="Logo">
                        </a>
                    </div>
                    <div class="col-8">
                        <nav class="rn-navbar-container">
                            <!-- Navbar Toggle Button for Only Tablet and Phone-->
                            <button class="rn-navbar-toggler" id="rn-navbar-toggler">
                                <span class="rn-navbar-toggler-bar"></span>
                                <span class="rn-navbar-toggler-bar"></span>
                                <span class="rn-navbar-toggler-bar"></span>

                            </button>
                            <!-- Main Nav Menu-->
                            <ul class="rn-navbar">
                                <li class="active">
                                    <a href="index.php"><?php echo $home;?></a>
                                    <!--Home-->
                                </li>


                                <li>
                                    <a href="#"><?php echo $services;?>
                                        <i class="lnr lnr-chevron-down"></i>
                                    </a>
                                    <ul>
                                        <?php   $query	=	"SELECT * FROM category ";
													$rs	    	=	mysqli_query($conn,$query) or die(mysqli_error());
													
													while($row2562		    =	mysqli_fetch_array($rs))
													{
														
														if($row2562['cat_id']!=1)
														{
                                                           echo "<li><a href=".$row2562['link'].">".$row2562['cat_name']."</a></li>";
														}
													
													}?>
                                    </ul>
                                </li>





                                <li>
                                    <a href="pricing.php"><?php echo $pricing;?></a>
                                </li>
                                <li>
                                    <a href="about-us.php"><?php echo $about_us;?></a>
                                </li>
                                <li>
                                    <?php if($_SESSION['user_id']==""){?>
                                    <a href="login.php"><?php echo $login_register;?>

                                    </a>
                                    <?php } else {?>
                                <li>
                                    <a href="#"><?php echo $profile;?>

                                    </a>
                                    <ul>
                                        <li>
                                            <a href="<?php echo $_SESSION['name'];?>.php"><?php echo $profile;?></a>
                                        </li>

                                        <?php if($_SESSION['role_id']==2 || $_SESSION['role_id']==3 || $_SESSION['role_id']==4){?>
                                            <li> <a href="licences.php">Government ID/ Licence</a></li>
                                        <?php  }?>
                                        <?php if($_SESSION['role_id']!=''){?>

                                        <li> <a href="passangerph.php">Payment History</a></li>
                                        <li> <a href="settings.php">Update Profile</a></li>
                                        <li> <a href="passangercp.php">Change Password</a></li>

                                        <?php }?>
                                        
                                        <li>
                                            <a href="logout.php"><?php echo $logout;}?></a>
                                        </li>

                                    </ul>
                                </li>


                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Menubar-->

    </header>
    <!-- End Header-->