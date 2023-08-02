<?php
error_reporting(0);
session_start();
    if(!isset($_SESSION['id']))
   {
    header("location:adminlogin.php");
   }
   else
   {

include 'config.php';
include 'header.php'; 
//SHOWING SYMBOL FOR PRICING
            $query					=	"select * from settings where id = 1  ";
            $rs11		    		=	mysqli_query($conn,$query) or die(mysqli_error());
            $row11		  			=	mysqli_fetch_array($rs11);
            $currencysymbol12       		= 	$row11['currency'];

						$id 							=	 $_GET['id'];
						$query							=	"select * from  lox_per_day_rate where id = $id  ";
						$rs		    					=	mysqli_query($conn,$query) or die(mysqli_error());
						$row		   					=	mysqli_fetch_array($rs);
						$lox_passanger_type				= 	$row['lox_passanger_type'];
						$lox_passanger_logistic_rate	=	$row['lox_passanger_logistic_rate'];
						$lox_passanger_logistic_time	=	$row['lox_passanger_logistic_time'];
						

if (($_SERVER["REQUEST_METHOD"] == "POST") && ($_GET['id']!='')){
	$lox_passanger_logistic_rate="";
	$lox_passanger_logistic_rateErr="";
						
						
						$query							=	"select * from lox_per_day_rate where id = $id  ";
						$rs		    					=	mysqli_query($conn,$query) or die(mysqli_error());
						$row		 				    =	mysqli_fetch_array($rs);
						$lox_passanger_type				= 	$_POST['lox_passanger_type'];
						$lox_passanger_logistic_rate	=	$_POST['lox_passanger_logistic_rate'];
						$lox_passanger_logistic_time	=	$_POST['lox_passanger_logistic_time'];
						


if(empty($lox_passanger_logistic_rateErr)){
        
		$query = "Update lox_per_day_rate SET lox_passanger_type='".mysqli_real_escape_string($conn,$lox_passanger_type)."',lox_passanger_logistic_rate='".mysqli_real_escape_string($conn,$lox_passanger_logistic_rate)."',lox_passanger_logistic_time='".mysqli_real_escape_string($conn,$lox_passanger_logistic_time)."' where id='$id'";
		$rs	   =  mysqli_query($conn,$query) or die(mysqli_error());
		header("location:functions.php?update_rate=ok");
        } 
	
}
?>
			<div class="content mt-3">
				<div class="animated fadeIn">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<strong class="card-title">Update Per Day Rate</strong>
								</div>
								<div class="card-body">
									<form   method="POST" enctype="multipart/form-data"> 
										<table class="table table-bordered">
									 
										<tr><td>Passanger Type:</td><td><select name="lox_passanger_type" class="form-control">
												
												
														<?php 
													$query			=	"select * from category ";
													$rs			 	=	mysqli_query($conn,$query) or die(mysqli_error());
													while($row		=	mysqli_fetch_array($rs))
													{
																	if ($row['cat_id'] == 1)
																	{
																		
																	}
																	else{
																		if($row['cat_id']==$lox_passanger_type)
																		{
																			$selected ='selected';
																		}
																		else
																		{
																			$selected ='';
																		}
																		echo '<option value="'.$row['id'].'" '.$selected.'>'.$row['cat_name'].'</option>';
																	}	
																	
													}
													
													?></td></tr>
										<tr><td>Price (<?php echo $currencysymbol12?>):</td><td> <input  name="lox_passanger_logistic_rate" type="number" class="form-control"  value="<?php echo $lox_passanger_logistic_rate; ?>"/><?php echo '<p style="color:red">'.$lox_passanger_logistic_rateErr.'</p>';?></td></tr> 
										<tr><td>Access Time (Hours):</td><td> <select name="lox_passanger_logistic_time" class="form-control">
												

														<?php 
													for($i=1;$i<=24;$i++)
													{
														 
														if($i==$lox_passanger_logistic_time)
														{
															$selected ='selected';
														}
														else
														{
															$selected ='';
														}

														echo '<option value="'.$i.'" '.$selected.'>'.$i.' Hour</option>';
													}
													
													?>
													

											</select></td></tr>
										
											</tr>
										 
										 <tr><td></td><td><input type="submit"  class="btn btn-success" value="Update"/> 
										</td>
										</tr>
									   </table>
								 
									
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> 

                
 
 <?php
 
    
    ?>   
   
    
    
<?php }

include 'footer.php';
?>