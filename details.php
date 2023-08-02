<?php  session_start();
    if(!isset($_SESSION['user_id']))
   {
    header("location:login.php");
   }
   else
   {
	   		include "header.php";
		include "config.php";
   		$user_detail_id = mysqli_real_escape_string($conn,$_GET['id']);
   		$section = mysqli_real_escape_string($conn,$_GET['section']);

	   	if($_SESSION['name']!="passanger" || $user_detail_id=="" || $section=="")
		{
		header("location:login.php");
		}
		else
		{

	
		
		//Checking if use had made any payment if not than there is no access for him
		$query	=	"select * from lox_payments where lox_user_id='".$universal_id."' && md5(lox_passanger_type)='".$section."' && lox_access_time_expiry=1";
		$rs		 =	mysqli_query($conn,$query) or die(mysqli_error());
		$exist= mysqli_num_rows($rs);
		if($exist==0)
		{
			header("location:login.php");
		

		}

		else
		{
	//SHOWING RECORD OF USERS OR PASSANGERS IN NAV HIDDEN OR SHOW BAR

		

	$universal_id = $user_detail_id;
	
	
	if ($_SESSION['name']=="passanger") 
	{	
		//Getting All Record of a User
		$query	=	"select * from users where md5(id)='".$universal_id."'";
		$rs		 =	mysqli_query($conn,$query) or die(mysqli_error());
		$user_result= mysqli_fetch_array($rs);

		//Getting role of a user
		$query	=	"SELECT *
						FROM users
						INNER JOIN category ON users.role_id = category.cat_id
                        where md5(users.id)='".$universal_id."'";
		$rs		 =	mysqli_query($conn,$query) or die(mysqli_error());
		$role_result= mysqli_fetch_array($rs);
		$user_type = $role_result['role_id'];	
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
							<h1><?php echo $details;?></h1>
							
						</div>
					</div>
				</div>
			</div>
		</div>
		
						
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
  <p>Your Request For: <strong><?php echo $role_result['cat_name'];?></strong></p>
  

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
   <?php include "footer.php";}}}

?>