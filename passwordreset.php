<?php  include "header.php";

include "config.php";
                            

							$link_id=mysqli_real_escape_string($conn,$_GET['link_id']);
                            
							if(empty($link_id))
									{
  										
   										
  											header('Location:login.php');
  										
  										
 									}        
                                  
                            if(!empty($link_id))
									{
  										
   										$select="select id from users where md5(id)='".mysqli_real_escape_string($conn,$link_id)."'" ;
  										$result = mysqli_query($conn,$select) or die(mysqli_error());
  										$row	= mysqli_fetch_array($result);
  										if($row==0)
  										{

  											header('Location:login.php');
  										}
  										
 									}        
                                  



	
                                    if(isset($_POST['submit-form']))
									{
									    
										$new_password = $_POST['new_password'];
										$confirm_password = $_POST['confirm_password'];
										
										$link_id = $_POST['link_id'];

										if(empty($new_password) || empty($confirm_password))
										{

											$new_passwordErr = "Password Must not be empty";

										}
										else
										{
    										if(strlen($new_password) <8 || strlen($confirm_password)<8)
    										{
    											$new_passwordErr  = "Password Must Not Be Less Than 8 Characters";
    										}
    										elseif($new_password != $confirm_password)
    										{
    											$new_passwordErr	= "New and Confirm password must be same";
    										}
                                            else
                                            {
                                                $new_password = md5($new_password);
                                            }
                                            
										}
										if(empty($new_passwordErr))
										{
										    
										        $query = "UPDATE users SET password='".mysqli_real_escape_string($conn,$new_password)."'
										         WHERE md5(id)='".mysqli_real_escape_string($conn,$link_id)."'";
    											mysqli_query($conn,$query) or die(mysqli_error());
    											$_SESSION['message_success'] ="<p class='alert alert-success'>Password Has Been Reset Successfully Please Login With Your Details</p>";
    											header('location:login.php');
											    
										    
											
										
										}

									}
									    
                            		if($_GET['link_id'])
									{
  										
  										$link_id=$_GET['link_id'];
   										$select="select id from users where md5(id)='".mysqli_real_escape_string($conn,$link_id)."'" ;
  										$result = mysqli_query($conn,$select) or die(mysqli_error());
  										$row	= mysqli_fetch_array($result);
  										$link_id = md5($row['id']);
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
							<h1><?php echo $reset_password;?></h1>
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
								
								<?php  if (!empty($new_passwordErr))
									{?>
									<div  style="text-align:center;color:red;" >
									<?php echo $new_passwordErr;?>
									</div>
									<?php } ?>	
								
						<!-- Full Name-->
						<div class="row" >
							<div class="col-md-4">
							</div>
							
							<div class="col-md-4">
							<form  class="input-group"   method="POST">
										
											<div class="input-group">
											    <label>New Password</label>
											<input type="password" name="new_password" placeholder="Enter New Password*" >
											
										</div>
										
										<div class="input-group">
										    <label>Confirm Password</label>
											<input type="password" name="confirm_password" placeholder="Enter Confirm Password*" >
											
										</div>
											<input type="hidden" name="link_id" value="<?php echo $link_id;?>">
											
											<div class="input-group text-right login-button">
												<input class="btn btn-success " name="submit-form" type="submit" value="Reset Password">
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
<?php include "footer.php";?>