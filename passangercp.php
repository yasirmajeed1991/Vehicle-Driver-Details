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
	$user_password=$user_password_c="";
	$user_passwordErr=$user_password_cErr="";
	if ($_SESSION['name']=="passanger") 
	{	
		$query	=	"select * from users where id=$universal_id";
		$rs		 =	mysqli_query($conn,$query) or die(mysqli_error());
		$passanger_result= mysqli_fetch_array($rs);
		$passanger_real_pass =	$passanger_result['password'];  
												
												 
			
	} 		
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{					

						
						$user_password		=	$_REQUEST['user_password'];
						$user_password_c	=	$_REQUEST['user_password_c'];	
						$user_password_c_c	=	$_REQUEST['user_password_c_c'];
						
						

				//PASSWORD 
				if (empty($user_password) || empty($user_password_c) || empty($user_password_c_c)  ) 
				{
					$general_Err = "All field are mandatory!";
				} 
				else 
				{
						
						if($passanger_real_pass != md5($_REQUEST['user_password']))
						{

							$wrong_real_passErr = "Old Password is Wrong!";
						}

						if($user_password_c != $user_password_c_c)
						{

							$user_password_c_cErr = "New password and confirm password must be same";
						}

						if ((strlen($user_password_c) <8) || (strlen($user_password_c) > 100))
						{
						$user_passwordErr = "Password must be greater than 8 character and less than 100 ";	
						}
				}
					  
					
				if(empty($user_passwordErr) && empty($wrong_real_passErr) && empty($user_password_c_cErr) && empty($general_Err) ) {
                $user_password=md5($user_password_c);
				$query = "Update users SET password='".mysqli_real_escape_string($conn,$user_password)."' where id='$universal_id'";
				$rs		    	=	mysqli_query($conn,$query) or die(mysqli_error());
				header("location:functions.php?pcp=ok");
				
				}	
							
					
					
	
	
	
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
.login-button{
	padding-top:10px;
	}
.forget-link{
	padding-top:10px;
	color:black;
	}	
	.nav-pills .nav-link.active, .nav-pills .show>.nav-link {
    color: #fff;
    background-color: #00D231;
}
	.nav-link{
		color:black;
	}
.verify_mail{
	color:red;
	}
.verified-id{
	color:#00D231;
	}
.a hover{
	color:red;
	}	
.data_rows_color {
	
	font-size:15px;
	font-weight: 430;
}
.data_rows_color1 {
	font-size:14px;
	
}
</style>
		<!-- Page Title-->
		<div class="rn-page-title">
			<div class="rn-pt-overlayer"></div>
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="rn-page-title-inner">
							<h1>Change Password</h1>
							
						</div>
					</div>
				</div>
			</div>
		</div>
		
						
						
		<section class="rn-section">
			<div class="container">
				
					
						
					 
						
						
							<div class="row">
							<div class="col-md-3">
							</div>
							  <div class="col">
								 <?php include "msg_session.php";?>



								<?php if(!empty($general_Err)){echo '<p class="msg_err">'.$general_Err.'</p>';}?>
								
								
								<?php if(!empty($user_passwordErr)){echo '<p class="msg_err">'.$user_passwordErr.'</p>';}?>					
									<form   method="POST" class="form-group" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
									<table class="table table-bordered tbl_data_size">
								
								<tr><td class="data_rows_color">Old Password: <input  name="user_password" autocomplete="off" placeholder="Enter your old password" type="password" value=""/>
								<?php if(!empty($wrong_real_passErr)){echo '<p class="msg_err">'.$wrong_real_passErr.'</p>';}?>
									
								<tr><td class="data_rows_color">New Password: <input  name="user_password_c" autocomplete="off" placeholder="Enter your new password" type="password" value=""/>
								

								<tr><td class="data_rows_color">Confirm New Password: <input  name="user_password_c_c" autocomplete="off" placeholder="Enter confirm password" type="password" value=""/>
								<?php if(!empty($user_password_c_cErr)){echo '<p class="msg_err">'.$user_password_c_cErr.'</p>';}?>


	

								 <tr><td><input type="submit"  class="btn btn-success" value="Change Password"/> 
								</td>
								</tr>
							   </table>
							 
								
						</form>				
													
													
								  </div>
										 
								<div class="col-md-3">
							</div>
											  
											  
											  
											  
											  
											  
											  
											  
											  
											  </div>
								  
								</div>
							  </div>
							</div>
							
							
							
							
							
							
							
							
							
							
							
							
							
							
		</section><div style="height:100px;"></div>
		<!-- End Page Content-->
   <?php include "footer.php";}}

?>