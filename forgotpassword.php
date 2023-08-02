<?php  include "header.php";
if($_SESSION['user_id']!='') 
    { 
        header("location:index.php");
    }
else{
include "config.php";
	
	
	$user_email_l_form = "";
	$user_email_l_formErr = $user_type_l_formErr=$message_Err=$message_success=  "";
	

	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		$user_email_l_form		=	mysqli_real_escape_string($conn,$_REQUEST['user_email_l_form']);
		
				
		//FUNCTION FOR CHECKING TEXT INPUT  
			function test_input($data)
			{
				  $data = trim($data);
				  $data = stripslashes($data);
				  $data = htmlspecialchars($data);
				  return $data;
			}
		//USEREMAIL
		if (empty($_POST["user_email_l_form"])) 
		{
			$user_email_l_formErr = "Email is required";
		}
		else
		{
			$user_email_l_form = test_input($_POST["user_email_l_form"]);
			// check if e-mail address is well-formed
			if (!filter_var($user_email_l_form, FILTER_VALIDATE_EMAIL))
			{
				$user_email_l_formErr = "Invalid email format";
			}
		}
		
		


			//CHECKING FOR ERRORS IF THERE IS NOT ANY ERROR THAN THE FORM SHOULD BE SUBMITTED
			if(empty($user_email_l_formErr))  
			{
				
							//CHECKING FOR RECORD IF USER  EXISTED		
					$query			=	"select * from users where (email='".mysqli_real_escape_string($conn,$user_email_l_form)."') ";
					$rs		    	=	mysqli_query($conn,$query) or die(mysqli_error());
					$row		    =	mysqli_fetch_array($rs);
					if($row>0)
					{
					    $email  = md5($row['email']);
					    $id  = md5($row['id']);	
						$password           = md5($row['password']);										
						$link = "http://loxlift.com/passwordreset.php?link=".$email."&&reset=".$password."&&link_id=".$id."";
								$to = $user_email_l_form;
								$subject = "Password Reset From Loxlift.com";
								$message = '<html>
												<head>
														<title>Password Reset</title>
												</head>
												<body>
														<p>Password Recovery From Loxlift</p>
														<p>Please Click The below Link to Reset Your Password!</p>
														'.$link.'
												</body>
											</html>
								';
								// Always set content-type when sending HTML email
								$headers = "MIME-Version: 1.0" . "\r\n";
								$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
								// More headers
								$headers .= 'From: <do-not-reply@loxlift.com>' . "\r\n";
								mail($to,$subject,$message,$headers);
								header ("location:functions.php?email=sent"); 
								
					}
						
					else
					{
						header ("location:functions.php?email-sent=error");
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

			a {
    color: #232425;
}
		
</style>
		<!-- Page Title-->
		<div class="rn-page-title">
			<div class="rn-pt-overlayer"></div>
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="rn-page-title-inner">
							<h1><?php echo $foreget_login_password;?></h1>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Page Title-->
		<!-- Page Content-->
		<section class="rn-section">
			<div class="container">
						<!-- Error Success Message -->
								
						<!-- Full Name-->
						<div class="row" >
							<div class="col-md-4">
							</div>
							
							<div class="col-md-4">
								<?php include "msg_session.php";?>
							<form  class="input-group" action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
										
											<div class="input-group">
												<label><?php echo $user_email_login_form;?></label>
												<input type="email" name="user_email_l_form" value="" placeholder="Enter your recovery email" required>
												<?php echo '<p style="color:red">'.$user_email_l_formErr.'</p>';?>
											</div>
											
											
											<div class="input-group text-right login-button">
												<input class="btn btn-success "  type="submit" value="<?php echo $submit?>">
											</div>
											<div class="input-group forget-link">
												<a href="login.php"><?php echo $login?></a>
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