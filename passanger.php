<?php  session_start();
    if(!isset($_SESSION['user_id']))
   {
    header("location:login.php");
   }
   else
   {
	   	if($_SESSION['name']!="passanger")
		{
		header("location:login.php");
		}
		else
		{	
		include "header.php";
		include "config.php";
	//SHOWING RECORD OF USERS OR PASSANGERS IN NAV HIDDEN OR SHOW BAR
	$universal_id = $_SESSION['user_id'];
	$user_type = $_SESSION['role_id'];
	
	if ($_SESSION['name']=="passanger") 
	{	
		//Getting All Record of a User
		$query	=	"select * from users where id=$universal_id";
		$rs		 =	mysqli_query($conn,$query) or die(mysqli_error());
		$user_result= mysqli_fetch_array($rs);

		//Getting role of a user
		$query	=	"SELECT category.cat_name as user_category,users.role_id as user_role
						FROM users
						INNER JOIN category ON users.role_id = category.cat_id
                        where users.id=$universal_id";
		$rs		 =	mysqli_query($conn,$query) or die(mysqli_error());
		$role_result= mysqli_fetch_array($rs);
		$user_type = $role_result['user_role'];	
	}
	
	
?>
<style>
.rn-section {
  padding: 30px 0 50px;
}
.rn-page-title {
    position: relative;
    padding-top: 140px;
    padding-bottom: 0px;
}
.data_rows_color{
	font-weight: bolder;
}
.data_rows_color1{
	font-size: 14px;
}
</style>
		<!-- Page Title-->
		<div class="rn-page-title">
			<div class="rn-pt-overlayer"></div>
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="rn-page-title-inner">
							<h1><?php echo $profile;?></h1>
							
						</div>
					</div>
				</div>
			</div>
		</div>
		
				<?php  
				if($_SESSION['user_id']!='')
				{

					$id = $_SESSION['user_id'];
					include "passanger_message.php";
				}
				?>	
				

						
		<section class="rn-section">
						<div class="container">
							<div class="row ">
							 	<div class="col-md-3">
							 		<?php if($user_type!=1 ){ if(empty($user_result['picture'])){?>
								<img class="img-fluid" src="" alt="" srcset="uploads/no_img.jpg 1x, uploads/no_img.jpg 1x"/>
								<?php }else{?>

									<img class="img-fluid" src="" alt="" srcset="<?php echo 'uploads/'.$user_result['picture'].'';?> 1x, <?php echo 'uploads/'.$user_result['picture'].'';?> 1x"/>

								<?php }}?>
							</div>
							  	<div class="col-md-6">
							  		<?php include "msg_session.php";

							  		
							  		
							  		?>
							  		<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Welcome!</h4>
  <p>Your Profile Current Status: <strong><?php echo $role_result['user_category'];?></strong></p>
  

</div>
								   	<table class="table  table-bordered">
								   		
										<tr><td class="data_rows_color">Username:</td><td class="data_rows_color1"><?php echo $user_result['username']?></td></tr>
										<tr><td class="data_rows_color">Full Name:</td><td class="data_rows_color1"><?php echo $user_result['name']?></td></tr>
										<tr><td class="data_rows_color">Phone Number:</td><td class="data_rows_color1"><?php echo $user_result['mobile']?></td></tr>
										<tr><td class="data_rows_color">Email:</td><td class="data_rows_color1"><?php echo $user_result['email']?></td></tr>
										<tr><td class="data_rows_color">Location:</td><td class="data_rows_color1"><?php echo $user_result['cityname']?></td></tr>

										<?php if($user_type==1 || $user_type==''){?>
										<tr><td class="data_rows_color">Home Address:</td><td class="data_rows_color1"><?php echo $user_result['address']?></td></tr>
										<?php }?>

										<tr><td class="data_rows_color">Age:</td><td class="data_rows_color1"><?php echo $user_result['age']?></td></tr>
										<tr><td class="data_rows_color">Sex:</td><td class="data_rows_color1"><?php echo $user_result['gender']?></td></tr>

										<?php if($user_type==1 || $user_type==''){?>
										
										<tr><td class="data_rows_color">Profession/Career:</td><td class="data_rows_color1"><?php echo $user_result['profession']?></td></tr>
										<tr><td class="data_rows_color">Annual Income:</td><td class="data_rows_color1"><?php echo number_format($user_result['income'])?> MK</td></tr>
										<tr><td class="data_rows_color">Will you be using Lox Lift primarily for business or leisure?:</td><td class="data_rows_color1"><?php echo $user_result['lox_use']?></td></tr>
										<?php }?>

										<?php if($user_type==2 || $user_type==3 || $user_type==4 || $user_type==5 || $user_type==6){?>

											<tr><td class="data_rows_color">National I.D. or Passport Number:</td><td class="data_rows_color1"><?php echo $user_result['id_pn']?></td></tr>
										
										<?php }?>

										<?php if($user_type==2 || $user_type==3 || $user_type==4 ){?>

											<tr><td class="data_rows_color">Driver's License Number:</td><td class="data_rows_color1"><?php echo $user_result['driver_ln']?></td></tr>
										<?php }?>

										<?php if($user_type==2  || $user_type==4 ){?>

											<tr><td class="data_rows_color">Vehicle Type:</td><td class="data_rows_color1"><?php echo $user_result['vehcile_type']?></td></tr>
										<?php }?>

										<?php if($user_type==4  || $user_type==5 ){?>

											<tr><td class="data_rows_color">Departure Date:</td><td class="data_rows_color1"><?php echo $user_result['dept_date']?></td></tr>
											<tr><td class="data_rows_color">Departure Time:</td><td class="data_rows_color1"><?php echo $user_result['dept_time']?></td></tr>
											<tr><td class="data_rows_color">Destination:</td><td class="data_rows_color1"><?php echo $user_result['destination']?></td></tr>

										<?php }?>

										<?php if($user_type==4){?>
											<tr><td class="data_rows_color">Route Via:</td><td class="data_rows_color1"><?php echo $user_result['route_via']?></td></tr>
											<tr><td class="data_rows_color">Stage:</td><td class="data_rows_color1"><?php echo $user_result['stage']?></td></tr>
											<tr><td class="data_rows_color">Number of Spaces Available:</td><td class="data_rows_color1"><?php echo $user_result['space_available']?></td></tr>
											<tr><td class="data_rows_color">License Plate No:</td><td class="data_rows_color1"><?php echo $user_result['license_plate_no']?></td></tr>
											
										<?php }?>



										
										<?php if($user_type==6){?>

											<tr><td class="data_rows_color">Load Description:</td><td class="data_rows_color1"><?php echo $user_result['load_desc']?></td></tr>
											<tr><td class="data_rows_color">Pickup Date:</td><td class="data_rows_color1"><?php echo $user_result['pickup_date']?></td></tr>
											<tr><td class="data_rows_color">Pickup Time:</td><td class="data_rows_color1"><?php echo $user_result['pickup_time']?></td></tr>
											<tr><td class="data_rows_color">Delivery Date:</td><td class="data_rows_color1"><?php echo $user_result['deliver_date']?></td></tr>
											<tr><td class="data_rows_color">Delivery Time:</td><td class="data_rows_color1"><?php echo $user_result['delivery_time']?></td></tr>
											<tr><td class="data_rows_color">Delivery Destination:</td><td class="data_rows_color1"><?php echo $user_result['delivery_time']?></td></tr>




										<?php }?>


									</table>
									

										
										

								</div>
								<div class="col-md-3">
							</div>
							</div>
						</div>
							
							
		</section><div style="height:100px;"></div>
		<!-- End Page Content-->
   <?php include "footer.php";}}
if(time() - $_SESSION['timestamp'] > 1500) 
		{ //subtract new timestamp from the old one
			   unset($_SESSION['user_id'], $_SESSION['name'], $_SESSION['timestamp']);
			   header("Location:index.php"); //redirect to index.php
			   exit;
		}
		else 
		{
			$_SESSION['timestamp'] =  time();
		}

?>