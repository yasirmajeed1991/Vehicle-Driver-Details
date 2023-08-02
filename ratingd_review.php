<?php include "header.php";

//SHOWING TIME REMAINING FOR THE PASSANGER FOR THE SPECIFIC SECTION
				
				$rating_search = $_GET['rating_search'];
				
				if ($rating_search!='')
				{
					$query = "select * from users where md5(id) = ".$rating_search."";
					$rs1 = mysqli_query($conn,$query) or die(mysqli_error());
					if (mysqli_num_rows($rs1)==0)
					{
					$msg = "No record found according to your search! please go back and Find another";
					}	
					else
					{
						$row1	= mysqli_fetch_array($rs1);
						$driver_match=$row1['id'];
						$driver_username=$row1['username'];
						$driver_name=$row1['name'];
						//COUNTING THE TOTAL RIDES OF THE DRIVER		
								$count	= "SELECT COUNT(id) FROM  lox_customer_feedback  
								WHERE (md5(user_id) = ".$rating_search.")"; 
								$count = mysqli_query($conn,$count) or die(mysqli_error());
								$count= mysqli_fetch_array($count);
								$count = $count[0];
						//CALCULATING RATING NUMBER ON THE BASIS OF THEIR RIDES		
							$rating_no=0;
							$rating_total=0;
						//RATING STARS COUNTED	
								$query54	= "SELECT * FROM  lox_customer_feedback  
								WHERE (user_id = $driver_match )"; 
								$result12 = mysqli_query($conn,$query54) or die(mysqli_error());
								while ($row234= mysqli_fetch_array($result12))
								{
							 		
									$individual_rated='';
									$rating_no= $row234['stars'];
									$commentatorr= $row234['comment_by_id'];
									$rating_total = $rating_total + $rating_no;
									$review_date_published=$row234['date_created'];
									$passanger_username=$row234['user_id'];


									//fetching the name of the commentator who given the comment
									$query = "select users.name as username,category.cat_name FROM lox_customer_feedback INNER JOIN users ON lox_customer_feedback.comment_by_id = users.id INNER JOIN category ON lox_customer_feedback.commentor_type = category.cat_id WHERE lox_customer_feedback.comment_by_id ='".$commentatorr."' ";
									$rs29 = mysqli_query($conn,$query) or die(mysqli_error());
									$resulted_array = mysqli_fetch_array($rs29);


									$review_comment=$row234['comment'];
									if($row234['stars']==1)
									{
										$individual_rated .='
										<span class="fa fa-star checked"></span>
						  				<span class="fa fa-star unchecked"></span> 
									  	<span class="fa fa-star unchecked"></span>
									  	<span class="fa fa-star unchecked"></span> 
									  	<span class="fa fa-star unchecked"></span>
										';

									}
									if($row234['stars']==2)
									{
										$individual_rated .='
										<span class="fa fa-star checked"></span>
						  				<span class="fa fa-star checked"></span> 
									  	<span class="fa fa-star unchecked"></span>
									  	<span class="fa fa-star unchecked"></span> 
									  	<span class="fa fa-star unchecked"></span>
										';

									}
									if($row234['stars']==3)
									{
										$individual_rated .='
										<span class="fa fa-star checked"></span>
						  				<span class="fa fa-star checked"></span> 
									  	<span class="fa fa-star checked"></span>
									  	<span class="fa fa-star unchecked"></span> 
									  	<span class="fa fa-star unchecked"></span>
										';

									}
									if($row234['stars']==4)
									{
										$individual_rated .='
										<span class="fa fa-star checked"></span>
						  				<span class="fa fa-star checked"></span> 
									  	<span class="fa fa-star checked"></span>
									  	<span class="fa fa-star checked"></span> 
									  	<span class="fa fa-star unchecked"></span>
										';

									}
									if($row234['stars']==5)
									{
										$individual_rated .='
										<span class="fa fa-star checked"></span>
						  				<span class="fa fa-star checked"></span> 
									  	<span class="fa fa-star checked"></span>
									  	<span class="fa fa-star checked"></span> 
									  	<span class="fa fa-star checked"></span>
										';

									}

									$rating_view .='
									<div class="col-md-3">
										<div class="rn-car-search-item">
											<div class="rn-car-search-item-info">
												<p style="font-size: 12px;">'.$review_date_published.'</p>
												<h6 >'.$resulted_array['username'].' <p style="font-size: 12px;">('.$resulted_array['cat_name'].')</p></h6>
												
												<p>
													<span>'.$individual_rated.'</span><br>
													<span><strong>Comment:</strong><br> '.$review_comment.' </span>
												</p>
											</div>
										</div>
									</div>
									';



								}
					}	    
						
				}				
				if (!empty($msg))
				{
					$msg_error= 	'<div class="alert-danger" role="alert"> '.$msg.'   </div>';
				}
				else
				{		
					
								$average_rating = $rating_total / $count;
								$average_rating = number_format($average_rating, 1);
						$rating_total;
					 	$count;	
							$average_ratingstars='';
							if($average_rating>0 AND $average_rating<=1)
							{
								$average_ratingstars .='
								<span class="fa fa-star checked"></span>
				  				<span class="fa fa-star unchecked"></span> 
							  	<span class="fa fa-star unchecked"></span>
							  	<span class="fa fa-star unchecked"></span> 
							  	<span class="fa fa-star unchecked"></span>
								';

							}
							if($average_rating>1 AND $average_rating<=2)							
							{
								$average_ratingstars .='
								<span class="fa fa-star checked"></span>
				  				<span class="fa fa-star checked"></span> 
							  	<span class="fa fa-star unchecked"></span>
							  	<span class="fa fa-star unchecked"></span> 
							  	<span class="fa fa-star unchecked"></span>
								';

							}
							if($average_rating>2 AND $average_rating<=3)
							{
								$average_ratingstars .='
								<span class="fa fa-star checked"></span>
				  				<span class="fa fa-star checked"></span> 
							  	<span class="fa fa-star checked"></span>
							  	<span class="fa fa-star unchecked"></span> 
							  	<span class="fa fa-star unchecked"></span>
								';

							}
							if($average_rating>3 AND $average_rating<=4)
							{
								$average_ratingstars .='
								<span class="fa fa-star checked"></span>
				  				<span class="fa fa-star checked"></span> 
							  	<span class="fa fa-star checked"></span>
							  	<span class="fa fa-star checked"></span> 
							  	<span class="fa fa-star unchecked"></span>
								';

							}
							if($average_rating>4 AND $average_rating<=5)
							{
								$average_ratingstars .='
								<span class="fa fa-star checked"></span>
				  				<span class="fa fa-star checked"></span> 
							  	<span class="fa fa-star checked"></span>
							  	<span class="fa fa-star checked"></span> 
							  	<span class="fa fa-star checked"></span>
								';

							}

				//Who is going to submit a feedback
				if(empty($universal_id))
				{
					$logged_link = '<a class="btn btn-sm btn-shadow btn-success" href="login.php">Submit Your Feedback</a>';
				}
				else
				{
					$logged_link = '<a class="btn btn-sm btn-shadow btn-success" href="rating.php?link='.md5($driver_match).'&&put_feedback='.md5($individual_rated).'">Submit Your Feedback</a>';
					
				}			

				$top_section= '<p style="text-align:center">
				<span>
					<strong> '.$driver_name.'</strong>
				</span><br>	
				<span>
					<strong>Total Rides</strong> ('.$count.')
				</span><br>
				<span>
					 '.$average_ratingstars.' ('.$average_rating.'/5)
				</span><br>
				'.$logged_link .'
				</p>';
				$rating_view_full= $rating_view;	
				}

					
?>
<style>
	
.rn-page-title {
    position: relative;
    padding-top: 140px;
    padding-bottom: 0px;
}
.expiry_msg{
	color: white;
}
.checked{
	color:#37a000;
}
.unchecked{
	color: #f1f2f4;
}
</style>
		<!-- Page Title-->
		
		<!-- End Page Title-->
		
			<div class="rn-page-title">
			<div class="rn-pt-overlayer"></div>
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="rn-page-title-inner">
							<h1><?php echo $users_reviews?></h1>
							<?php echo $top_section?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Car Search Form-->
       	<!-- Car Results-->
		<div class="rn-section rn-car-search-results">
			<div class="container">
				<div class="row">
					
						<?php echo $rating_view_full?>
						<!-- Car Search Filters-->
							<?php echo $msg_error?>			
						<!-- End Car Search Filters-->
						


						<!-- Load More Cars
						<div class="text-center">
							<a class="btn btn-lg btn-outline-light mb-40" href="#">Load More</a>
						</div>-->
					
				</div>
			</div>
		</div>
		<!-- End Car Results-->

		<?php include "footer.php"?>