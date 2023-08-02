<?php include "header.php";
include "settime.php";
//SHOWING TIME REMAINING FOR THE PASSANGER FOR THE SPECIFIC SECTION
		
	//SHOWING RECORD OF USERS OR PASSANGERS IN NAV HIDDEN OR SHOW BAR
	$total=30;
  if (isset($_GET["page"]))
  {
    $page  = $_GET["page"];
  }
  else
  {
    $page=1;
  }
  $start = ($page-1) * $total;
	if (!empty($_SESSION['user_id'])) 
	{	
		
		$query	=	"select * from lox_payments where (lox_user_id ='$universal_id' && lox_passanger_type =2  && lox_access_time_expiry=1)";
		$rs		 =	mysqli_query($conn,$query) or die(mysqli_error());
		$row		=	mysqli_fetch_array($rs);
		$payment_date = $row['lox_payment_date'];	
		$row_id		  = $row['id'];	
		$current_date =  date('y-m-d H:i:s');
		$old_date  = date($payment_date);
		$time1 = new DateTime($old_date);
		$time2 = new DateTime($current_time);
		$timediff = $time1->diff($time2);
		$time_expire =$timediff->format('%h hour %i minute %s second');
		$time_extend = $timediff->d;
		if (($time_extend>0) && ($row['lox_access_time_expiry'])==1)
		{
			$query = "update lox_payments set lox_access_time_expiry='0' where id=$row_id";
			mysqli_query($conn,$query) or die(mysqli_error());
		}
		else 
		{
			
			if($row['lox_access_time_expiry']==1)
			{				
				$ok = 1;
				$expire_message	= 'Access Time '.$row['access_time'].' Hours';
				$time_expire= 'Time utilized ' . $timediff->format('%h hour %i minute %s second');
				
			}
			else
			{
				$ok=0;
				$expire_message	= '';
				$time_expire	=	'';
			}	
		}	
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
.avatar.avatar-xl {
    width: 5rem;
    height: 5rem;
}
.avatar {
    width: 2rem;
    height: 2rem;
    line-height: 2rem;
    border-radius: 50%;
    display: inline-block;
    background: #ced4da no-repeat center/cover;
    position: relative;
    text-align: center;
    color: #868e96;
    font-weight: 600;
    vertical-align: bottom;
}
.card {
    background-color: #fff;
    border: 0 solid #eee;
    border-radius: 0;
}
.card {
    margin-bottom: 30px;
    -webkit-box-shadow: 2px 2px 2px rgba(0,0,0,0.1), -1px 0 2px rgba(0,0,0,0.05);
    box-shadow: 2px 2px 2px rgba(0,0,0,0.1), -1px 0 2px rgba(0,0,0,0.05);
}
.card-body {
    padding: 1.25rem;
}
.tile-link {
    position: absolute;
    cursor: pointer;
    width: 100%;
    height: 100%;
    left: 0;
    top: 0;
    z-index: 30;
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
							<h1><?php echo $driver_rider_search?></h1>
							<h4 class="expiry_msg"><?php echo $expire_message?></h4>
							<h5 class="expiry_msg"><?php echo $time_expire?></h5>
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
					<div class="col-lg-12">
						<form method="get">
						<!-- Car Search Filters-->
										<div class="row">

												<div class="col-sm-6">
													<div class="form-group">
														<select name="city" class="form-control" >
																<option value="">-Select your location to find nearby passenger drivers-</option>
																<?php 	$selected_city	= mysqli_real_escape_string($conn,$_GET['city']);
																$query	=	"select * from lox_cityname ";
																$rs3		 =	mysqli_query($conn,$query) or die(mysqli_error());
																while($row		=	mysqli_fetch_array($rs3))
																{
																	
																	if($row['cityname']==$selected_city)
																	{
																		$selected	= 'selected';
																	}
																	else
																	{
																		$selected	=	'';
																	}	
																				
																	echo		'<option value="'.$row['cityname'].'" '.$selected.'>'.$row['cityname'].'</option>';
																}
																
															?>
		 												</select>
													</div>
												</div>	
												
												<div class="col-sm-3">	
												<div class="form-group">
													<select name="type" class="form-control" >
																<option value="">-Vehicle Type-</option>
																<?php 	$vehicle_category	= mysqli_real_escape_string($conn,$_GET['type']);
																$query	=	"select * from lox_vehicle_category ";
																$rs4		 =	mysqli_query($conn,$query) or die(mysqli_error());
																while($row		=	mysqli_fetch_array($rs4))
																{
																	if($row['vehicle_category']==$vehicle_category)
																	{
																		$selected	= 'selected';
																	}
																	else
																	{
																		$selected	=	'';
																	}	
																						
																	echo		'<option value="'.$row['vehicle_category'].'" '.$selected.'>'.$row['vehicle_category'].'</option>';
																}
																
															?>
		 												</select>
                                                </div>
												</div>


												<div class="col-sm-3 ">	
												<div class="form-group">
													<div class="rn-car-search-filter-item">
														<button type="submit" class="btn   btn-sm btn-success form-control">Search </button>
													</div>
												</div>	
												</div>

						</form>			</div>		

						<!-- End Car Search Filters-->
						

<?php 						
				
				//The city must be selected before searching from database
					$city  = mysqli_real_escape_string($conn,$_GET['city']);
					$type 	=	mysqli_real_escape_string($conn,$_GET['type']);
				if ($city!=""  && $type=="")
				{
					
					$query	=	"SELECT  * FROM users WHERE status=1 and role_id=2 and cityname='".$city."' ORDER BY RAND() LIMIT $start,$total";
				}
				elseif ($type!="" && $city=="" )
				{
					
					$query	=	"SELECT  * FROM users WHERE status=1 and role_id=2 and vehcile_type = '".$type."' ORDER BY RAND() LIMIT $start,$total";
				}
				elseif ($type!="" && $city!="" )
				{
					
					$query	=	"SELECT  * FROM users WHERE status=1 and role_id=2 and vehcile_type = '".$type."' and cityname='".$city."'  ORDER BY RAND() LIMIT $start,$total";
				}
				else
				{
					$query	= "SELECT  * FROM users WHERE status=1 and role_id=2  ORDER BY RAND() LIMIT $start,$total";
				}


				//STORING A VALUE TO CHECK WHEATHER USER IS ACCESSING DIRECTLY OR LOCATION WISE
				$rs1		 =	mysqli_query($conn,$query) or die(mysqli_error());
				if (mysqli_num_rows($rs1)==0)
				{
					$msg 	= "No record found according to your search! please find another location";
				}	
				else 
				{
					
					
					while($row1		=	mysqli_fetch_array($rs1))
					{
						 				
						$user_record = $row1['id'];
						
						//COUNTING THE TOTAL RIDES OF THE DRIVER		
								$count	= "SELECT COUNT(id) FROM  lox_customer_feedback  
								WHERE (user_id = ".$user_record.")"; 
								$count = mysqli_query($conn,$count) or die(mysqli_error());
								$count= mysqli_fetch_array($count);
								$count = $count[0];
						//CALCULATING RATING NUMBER ON THE BASIS OF THEIR RIDES		
							$rating_no=0;
							$rating_total=0;
						//RATING STARS COUNTED	
								$query54	= "SELECT * FROM  lox_customer_feedback  
								WHERE (user_id = $user_record )"; 
								$result12 = mysqli_query($conn,$query54) or die(mysqli_error());
								while ($row234= mysqli_fetch_array($result12))
								{
							 		
									
									$rating_no= $row234['stars'];
									$rating_total = $rating_total + $rating_no;
									
								}
								if($count==0)
								{
									
								}
								else
								{
									$average_rating_no = $rating_total/$count;
								}
								
								$average_ratingstars='';
							if($average_rating_no==0 )
							{
								$average_ratingstars .='
								<span class="fa fa-star unchecked"></span>
				  				<span class="fa fa-star unchecked"></span> 
							  	<span class="fa fa-star unchecked"></span>
							  	<span class="fa fa-star unchecked"></span> 
							  	<span class="fa fa-star unchecked"></span>
								';

							}	
								if($average_rating_no>0 AND $average_rating_no<=1)
							{
								$average_ratingstars .='
								<span class="fa fa-star checked"></span>
				  				<span class="fa fa-star unchecked"></span> 
							  	<span class="fa fa-star unchecked"></span>
							  	<span class="fa fa-star unchecked"></span> 
							  	<span class="fa fa-star unchecked"></span>
								';

							}
							if($average_rating_no>1 AND $average_rating_no<=2)							
							{
								$average_ratingstars .='
								<span class="fa fa-star checked"></span>
				  				<span class="fa fa-star checked"></span> 
							  	<span class="fa fa-star unchecked"></span>
							  	<span class="fa fa-star unchecked"></span> 
							  	<span class="fa fa-star unchecked"></span>
								';

							}
							if($average_rating_no>2 AND $average_rating_no<=3)
							{
								$average_ratingstars .='
								<span class="fa fa-star checked"></span>
				  				<span class="fa fa-star checked"></span> 
							  	<span class="fa fa-star checked"></span>
							  	<span class="fa fa-star unchecked"></span> 
							  	<span class="fa fa-star unchecked"></span>
								';

							}
							if($average_rating_no>3 AND $average_rating_no<=4)
							{
								$average_ratingstars .='
								<span class="fa fa-star checked"></span>
				  				<span class="fa fa-star checked"></span> 
							  	<span class="fa fa-star checked"></span>
							  	<span class="fa fa-star checked"></span> 
							  	<span class="fa fa-star unchecked"></span>
								';

							}
							if($average_rating_no>4 AND $average_rating_no<=5)
							{
								$average_ratingstars .='
								<span class="fa fa-star checked"></span>
				  				<span class="fa fa-star checked"></span> 
							  	<span class="fa fa-star checked"></span>
							  	<span class="fa fa-star checked"></span> 
							  	<span class="fa fa-star checked"></span>
								';

							}

						//Searching for record to see the user is logged and paid the amount and have full access to service providers detail-->	
							
								
?>								<!-- Car Search Item-->
								<div class="rn-car-search-item">
									
									<div class="rn-car-search-item-info">
										<h2 class="rn-car-search-item-title">
<a href="#"><?php if($ok==1){echo  $row1['name'];}else{echo $dispnum = substr($row1['name'], 0, 4) . str_repeat("*", strlen($row1['name'])-2);}?></a>
										</h2>
										<p>	
											
										<?php if($ok==1){?>
											<span><strong>Email:</strong><?php echo $row1['email']; ?></span><br>
											<span><strong>Mobile:</strong><?php echo $row1['mobile']?></span><br>
											
										<?php }else{?>	
											<span><strong>Email:</strong>
											<?php echo $dispnum = substr($row1['email'], 0, 4) . str_repeat("*", strlen($row1['email'])-2); ?></span><br>
											<span><strong>Mobile:</strong>
											<?php echo $dispnum = substr($row1['mobile'], 0, 2) . str_repeat("*", strlen($row1['mobile'])-2);?></span><br>
										<?php }?>	
											<span><strong>City:</strong><?php echo $row1['cityname']?></span><br>
											


										</p>
									</div>
									<div class="rn-car-search-item-pricing">
										<p> Total Rides:(<?php echo $count ?>)<br>
										Ratings:<?php echo $average_ratingstars?><br>
										<a href="ratingd_review.php?rating_search='<?php echo md5($row1['id'])?>'">Reviews/Comments</a><br>
										<?php if($ok==0){?>
										<a class="btn btn-sm btn-shadow btn-success" href="pricing.php">Show Full Contact Details</a>
										<?php }else{?>
											<a class="btn btn-sm btn-shadow btn-success" href="details.php?id=<?php echo md5($row1["id"]);?>&&section=<?php echo md5(2)?>">Show Full Contact Details</a>
											<?php }?>

										</p>									

									</div>
									
								</div>
							
<?php						
					}	
		
				}

				if (!empty($msg))
				{
					echo 	'<div class="alert-danger" role="alert"> '.$msg.'   </div>';
				}

?>
				<div class="row">
					<div class="col-lg-12">		 
						
							
							 <nav aria-label="..." class="rn-pagination rn-pagination-center">
							<ul >
					          <li class="page-item <?php if($page==1){ echo 'disabled';} ?>">
					          <a class="page-link" href="<?php if($page==1){ echo '#';} else {?><?php echo $_SERVER['PHP_SELF']?>?page=<?php echo $page-1; }?>" aria-label="<">
					          <span aria-hidden="true"><</span>
					          </a>
					           </li>
					            <?php
					        if ($city!=""  && $type=="")
				{
					
					$slt	=	"SELECT  * FROM users INNER JOIN role ON role.user_id = users.id WHERE users.status=1 and role.role_id=2 and users.cityname='".$city."' ";
				}
				elseif ($type!="" && $city=="" )
				{
					
					$slt	=	"SELECT  * FROM users INNER JOIN role ON role.user_id = users.id WHERE users.status=1 and role.role_id=2 and users.vehcile_type = '".$type."' ";
				}
				elseif ($type!="" && $city!="" )
				{
					
					$slt	=	"SELECT  * FROM users INNER JOIN role ON role.user_id = users.id WHERE users.status=1 and role.role_id=2 and users.vehcile_type = '".$type."' and users.cityname='".$city."' ";
				}
				else
				{
					$slt	= "SELECT  * FROM users INNER JOIN role ON role.user_id = users.id WHERE users.status=1 and role.role_id=2 ";
				}    
					       
					        $rec=mysqli_query($conn,$slt);
					        $total1=mysqli_num_rows($rec);
					        $total_pages = ceil($total1 / $total);
					        for($i=1;$i<=$total_pages;$i++)
					        {?>
					           <li class="page-item "><a class="page-link <?php if($_GET["page"]==$i){ echo 'rn-active';  } ?>" href="<?php echo $_SERVER['PHP_SELF']?>?city=<?php if(!empty($city)){echo $city;}?>&&type=<?php if(!empty($type)){echo $type;}?>&&page=<?php echo $i;?>"><?php echo $i;?></a>
					                             </li>
					        <?php
					        }?>
					          
					            <li class="page-item <?php if($page==$total_pages){ echo 'disabled'; } ?>">
					          <a class="page-link" href="<?php if($page==$total_pages){ echo '#';} else {?><?php echo $_SERVER['PHP_SELF']?>?city=<?php if(!empty($city)){echo $city;}?>&&type=<?php if(!empty($type)){echo $type;}?>&&page=<?php echo $page+1; }?>" aria-label=">">
					          <span aria-hidden="true">></span>
					          </a>
					            </li>
					      </ul>
						</nav>
					      
	</div> 
						</div> 
					</div>
				</div>
			</div>
		</div>
		<!-- End Car Results-->

		<?php include "footer.php"?>