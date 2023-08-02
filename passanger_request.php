<?php include "header.php";
include "timeago.php";
//SHOWING TIME REMAINING FOR THE PASSANGER FOR THE SPECIFIC SECTION
		
	//SHOWING RECORD OF USERS OR PASSANGERS IN NAV HIDDEN OR SHOW BAR
	$total=10;
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
		
		$query	=	"select * from lox_payments where (lox_user_id ='$universal_id' && lox_passanger_type =5  && lox_access_time_expiry=1)";
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
			<div class="rn-pt-overlayer">
			</div>
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="rn-page-title-inner">
							<h1><?php echo $customer_request ?></h1>
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
																<option value="">-Select your location to find nearby customer passenger requests-</option>
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
													<div class="rn-car-search-filter-item ">
														<button type="submit" class="btn   btn-sm btn-success form-control">Search </button>
													</div>
												</div>
						</form>			</div>		
					</div>
				</div>		
			</div>			<!-- End Car Search Filters-->
		</div>				



<div class="container">
  <div class="row">

<?php 						
				
				//The city must be selected before searching from database
					$city  = mysqli_real_escape_string($conn,$_GET['city']);
					
				if ($city!="" )
				{
					
					$query	=	"SELECT  * FROM users WHERE status=1 and role_id=5 and cityname='".$city."' ORDER BY date_updated DESC LIMIT $start,$total";
				}
				
				else
				{
					$query	= "SELECT  * FROM users WHERE status=1 and role_id=5 ORDER BY date_updated DESC LIMIT $start,$total";
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
						 				
						
						//Searching for record to see the user is logged and paid the amount and have full access to service providers detail-->	
							
								
?>


    <div class="col-md-6 col-xl-4">                       
      <div class="card">
        <div class="card-body">
          <div class="media align-items-center"><span style="background-color: white" class="avatar avatar-xl mr-3"><br></span>
            <div class="media-body overflow-hidden">
              <h5 class="card-text mb-0"><?php if($ok==1){echo  $row1['name'];}else{echo $dispnum = substr($row1['name'], 0, 4) . str_repeat("*", strlen($row1['name'])-2);}?></h5>
              <p class="card-text text-uppercase text-muted"><span><?php echo $row1['cityname']?></span> </p>
   
        
              <p class="card-text">
                 <?php if($ok==1){?>		<span><strong>Departure:</strong><?php echo $row1['dept_date']?></span><br>
											<span><strong>Email: </strong><?php echo $row1['email']; ?></span><br>
											<span><strong>Mobile: </strong><?php echo $row1['mobile']?></span><br>
											
										<?php }else{?>	
											<span><strong>Departure: </strong><?php echo $row1['dept_date']?></span>	<br>
											<span><strong>Email: </strong>
											<?php echo $dispnum = substr($row1['email'], 0, 4) . str_repeat("*", strlen($row1['email'])-2); ?></span><br>
											<span><strong>Mobile:</strong>
											<?php echo $dispnum = substr($row1['mobile'], 0, 2) . str_repeat("*", strlen($row1['mobile'])-2);?></span><br>
										<?php }?>
										<?php if($ok==0){?>
										<a class="btn btn-sm btn-shadow btn-success " href="pricing.php">Show Full Request Details</a>
										<?php }else{?>
											<a class="btn btn-sm btn-shadow btn-success " target="_blank" href="details.php?id=<?php echo md5($row1["id"]);?>&&section=<?php echo md5(5)?>">Show Full Request Details</a>
											<?php }?>
                
              
              </p>
                 </div>
          </div>
          <span style="font-size: 11px;font-weight: bold"><?php echo time_elapsed_string($row1['date_updated']);?></span>
        </div>
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
						 
						
			  </div>
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
					        if ($city!="" )
							{
								
								$slt	=	"SELECT  * FROM users INNER JOIN role ON role.user_id = users.id WHERE users.status=1 and role.role_id=5 and users.cityname='".$city."' ";
							}
							
							else
							{
								$slt	= "SELECT  * FROM users INNER JOIN role ON role.user_id = users.id WHERE users.status=1 and role.role_id=5  ";
							}  
								       
					        $rec=mysqli_query($conn,$slt);
					        $total1=mysqli_num_rows($rec);
					        $total_pages = ceil($total1 / $total);
					        for($i=1;$i<=$total_pages;$i++)
					        {?>
					           <li class="page-item "><a class="page-link <?php if($_GET["page"]==$i){ echo 'rn-active';  } ?>" href="<?php echo $_SERVER['PHP_SELF']?>?city=<?php if(!empty($city)){echo $city;}?>&&page=<?php echo $i;?>"><?php echo $i;?></a>
					                             </li>
					        <?php
					        }?>
					          
					            <li class="page-item <?php if($page==$total_pages){ echo 'disabled'; } ?>">
					          <a class="page-link" href="<?php if($page==$total_pages){ echo '#';} else {?><?php echo $_SERVER['PHP_SELF']?>?city=<?php if(!empty($city)){echo $city;}?>&&page=<?php echo $page+1; }?>" aria-label=">">
					          <span aria-hidden="true">></span>
					          </a>
					            </li>
					      </ul>
						</nav>
						</div> 
					</div>
</div>
	
		<!-- End Car Results-->

		<?php include "footer.php"?>