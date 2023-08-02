<?php  include "header.php";

if($_SESSION['user_id']!='') 
    { 
        header("location:index.php");
    }
else{
include "config.php";
	$user_email_l_form = $user_password_l_form="";
	$user_email_l_formErr = $user_password_l_formErr=$message_Err=$message_success=  "";
	 
	 
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
	
		$user_email_l_form		=	$_REQUEST['user_email_l_form'];
		$user_password_l_form 	=	$_REQUEST['user_password_l_form'];
		
			
		
		//USEREMAIL
		if (empty($_POST["user_email_l_form"])) 
		{
			$user_email_l_formErr = "Email is required";
		}
		else
		{
			
			// check if e-mail address is well-formed
			if (!filter_var($user_email_l_form, FILTER_VALIDATE_EMAIL))
			{
				$user_email_l_formErr = "Invalid email format";
			}
		}
  
		//PASSWORD 
		if (empty($_POST["user_password_l_form"])) 
		{
			$user_password_l_formErr = "Password is required";
		} 
		else 
		{
				if ((strlen($user_password_l_form) <8) || (strlen($user_password_l_form) > 100))
				{
					$user_password_l_formErr = "Password must be greater than 8 character and less than 100 ";	
				}
		}
		


			//CHECKING FOR ERRORS IF THERE IS NOT ANY ERROR THAN THE FORM SHOULD BE SUBMITTED
			if(empty($user_email_l_formErr) && empty($user_password_l_formErr) )
			{
					
						//CHECKING FOR RECORD IF USER  EXISTED	
						$user_password_l_form=md5($user_password_l_form);	
						$query			=	"SELECT * From users
						WHERE (email='".mysqli_real_escape_string($conn,$user_email_l_form)."' && password='".mysqli_real_escape_string($conn,$user_password_l_form)."' && status=1)"; 
						$rs		    	=	mysqli_query($conn,$query) or die(mysqli_error());
						$row		    =	mysqli_fetch_array($rs);
						
					if($row>0)
					{
						$_SESSION['timestamp']	    = time(); //set new timestamp
						$_SESSION['user_id']		=	$row['id'];
						$_SESSION['name']			= 	"passanger";
						$_SESSION['role_id']		= 	$row['role_id'];
						
						header("location:passanger.php");
					}
					else
					{
						header("location:functions.php?invalid_login_details=ok");
						
					}
				
				
				
				
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

</style>
		<!-- Page Title-->
		<div class="rn-page-title">
			<div class="rn-pt-overlayer"></div>
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="rn-page-title-inner">
							<h1><?php echo $login;?></h1>
							<p><?php echo $login_page_title_content?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<style type="text/css">
			a {
    color: #232425;
}
		</style>
		<!-- End Page Title-->
		<!-- Page Content-->
		<section class="rn-section">
			<div class="container">
						<!-- Error Success Message -->
								<?php if($message_Err!='')
								{?>
										<div class="alert alert-danger" style="text-align:center" role="alert">
											<?php echo $message_Err?>
										</div>
								<?php }?>
								
								
						<!-- Full Name-->
						<div class="row" >
							<div class="col-md-4">
							</div>
							
							<div class="col-md-4">
								<?php include "msg_session.php";?>
							<form  class="input-group" action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
										
											<div class="input-group">
												<label><?php echo $user_email_login_form;?></label>
												<input type="email" name="user_email_l_form" value="<?php echo $user_email_l_form?>"  required>
												<?php echo '<p style="color:red">'.$user_email_l_formErr.'</p>';?>
											</div>
											<div class="input-group">
												<label><?php echo $user_password_login_form;?></label>
												<input type="password" name="user_password_l_form" value="<?php echo $user_password_l_form?>" required >
												<?php echo '<p style="color:red">'.$user_password_l_formErr.'</p>';?>
											</div>
											<!-- End Country-->
											<div class="input-group text-right login-button">
												<input class="btn btn-success "  type="submit" value="<?php echo $login?>">
											</div>
											<div class="input-group forget-link" style="color:black;">
												<a href="forgotpassword.php" ><?php echo $foreget_login_password?></a>
											</div>
											<div class="input-group login-button">
												<a href="register.php"><?php echo $register_login_form?></a>
											</div>
											
							</div>
							</form>
							<div class="col-md-4">
							</div>
							<!-- End Checkout Form-->
						</div>
				
			</div>
		</section>
		<!-- End Page Content-->
<?php include "footer.php";}?>