<?php  session_start();
    if(!isset($_SESSION['user_id']))
   {
    header("location:login.php");
   }
   else
   {
	   		include "header.php";
			include "config.php";
			$user_id_rated = $_GET['link'];
			$put_feedback = $_GET['put_feedback'];
		//fetching users detail regarding its type
		$query54	= "SELECT *  FROM role WHERE md5(user_id)='".mysqli_real_escape_string($conn,$user_id_rated)."'"; 
		$result12 = mysqli_query($conn,$query54) or die(mysqli_error());
		$row234= mysqli_fetch_array($result12);
		$commentor_role = $row234['role_id'];
		$user_id_rated = $row234['user_id'];
	//SHOWING RECORD OF USERS OR PASSANGERS IN NAV HIDDEN OR SHOW BAR
			if($user_id_rated!='' && $put_feedback!='')
			{	
				
				
				
				if($_SERVER["REQUEST_METHOD"] == "POST")
				{					

						
						
						$rating	=	$_POST['rating'];
						$comment	=	$_POST['comment'];

						$query	= "SELECT *  FROM lox_customer_feedback WHERE comment_by_id='".$universal_id."' && user_id='".$user_id_rated."'"; 
						$rs = mysqli_query($conn,$query) or die(mysqli_error());
						$row= mysqli_fetch_array($rs);			
					if($row>0)
					{
						header("location:functions.php?feedback_existed=ok");
					}
					else
					{


						if(empty($rating))
						{
							$ratingErr = "This is required";
						}
						if(empty($comment))
						{
							$commentErr = "This is required";
						}
										
						if(empty($commentErr) && empty($ratingErr) ) 
						{
		                
						$query = "INSERT INTO lox_customer_feedback (user_id,stars,comment,comment_by_id,commentor_type) 
						VALUES ('".mysqli_real_escape_string($conn,$user_id_rated)."','".mysqli_real_escape_string($conn,$rating)."','".mysqli_real_escape_string($conn,$comment)."','".mysqli_real_escape_string($conn,$universal_id)."','".mysqli_real_escape_string($conn,$commentor_role)."' 
						)";
						$rs		 	=	mysqli_query($conn,$query) or die(mysqli_error());
						header("location:functions.php?feedback_inserted=ok");
						}	
							
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
							.checked{
								color:#37a000;
							}
							.unchecked{
								color: #f1f2f4;
							}
							</style>
						<!-- Page Title-->
						<div class="rn-page-title">
							<div class="rn-pt-overlayer"></div>
							<div class="container">
								<div class="row">
									<div class="col-lg-12">
										<div class="rn-page-title-inner">
											<h1><?php echo $rate_your_expierence;?></h1>
											
										</div>
									</div>
								</div>
							</div>
						</div>
							
										
										
						<section class="rn-section">
							<div class="container">
											<div class="row">
											  <div class="col-3">
												 
											  </div>
											  	<div class="col-6">
											  		<?php include "msg_session.php";?>
													<form   method="POST" class="form-group" > 
														<p>Please Share Your Overall Expierence  With The Service Provider:</p>
													<div >	
													  <input type="radio" id="1" name="rating" value="1" required>
														 Bad <label for="1" style="padding-left:50px">
														  	<span class="fa fa-star checked"></span>
														  	<span class="fa fa-star unchecked"></span> 
														  	<span class="fa fa-star unchecked"></span>
														  	<span class="fa fa-star unchecked"></span> 
														  	<span class="fa fa-star unchecked"></span> 
														  </label> <br>
														  
														  <input type="radio" id="2" name="rating" value="2">
														Fair  <label for="2" style="padding-left:53px">
														  	<span class="fa fa-star checked"></span>
														  	<span class="fa fa-star checked"></span> 
														  	<span class="fa fa-star unchecked"></span>
														  	<span class="fa fa-star unchecked"></span> 
														  	<span class="fa fa-star unchecked"></span> 
														  </label> <br>
														  
														  <input type="radio" id="3" name="rating" value="3">
														 Good <label for="3" style="padding-left:41px">
														  	<span class="fa fa-star checked"></span>
														  	<span class="fa fa-star checked"></span> 
														  	<span class="fa fa-star checked"></span>
														  	<span class="fa fa-star unchecked"></span> 
														  	<span class="fa fa-star unchecked"></span> 
														  </label> <br>
														  
														  <input type="radio" id="4" name="rating" value="4">
														Very Good  <label for="4" style="padding-left:10px">
														  	<span class="fa fa-star checked"></span>
														  	<span class="fa fa-star checked"></span> 
														  	<span class="fa fa-star checked"></span>
														  	<span class="fa fa-star checked"></span> 
														  	<span class="fa fa-star unchecked"></span> 
														  </label> <br>
														  
														  <input type="radio" id="5" name="rating" value="5">
														Excellent  <label for="5" style="padding-left:18px">
														  	<span class="fa fa-star checked"></span>
														  	<span class="fa fa-star checked"></span> 
														  	<span class="fa fa-star checked"></span>
														  	<span class="fa fa-star checked"></span> 
														  	<span class="fa fa-star checked"></span> 
														  </label> <br>
														  <div style="padding-top: 20px">
														  <textarea cols="4" name="comment" required></textarea>
														 	</div>
														 </div>
														<div style="padding-top: 20px"> 
														  <button type="submit" name="rated"  value="Submit Feedback" class="btn btn-success">Submit Feedback
														</div>  
													</form>				
												</div>
												<div class="col-3">
												 
											  </div>
											 </div>
							</div>
											  </div>
											</div>
											
											
											
											
											
											
											
											
											
											
											
											
											
											
						</section><div style="height:100px;"></div>
						<!-- End Page Content-->
   <?php include "footer.php";}
   
?>