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

            $lox_passanger_logistic_rate="";
						$lox_passanger_logistic_rateErr="";
            $lox_passanger_type						= 	$_POST['lox_passanger_type'];
						$lox_passanger_logistic_rate	=		$_POST['lox_passanger_logistic_rate'];
						$lox_passanger_logistic_time	=		$_POST['lox_passanger_logistic_time'];

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	
						
					
						$query							=	"select * from lox_per_day_rate where (lox_passanger_type='$lox_passanger_type' && lox_passanger_logistic_rate='$lox_passanger_logistic_rate' && lox_passanger_logistic_time='$lox_passanger_logistic_time')";
						$rs		    					=	mysqli_query($conn,$query) or die(mysqli_error());
						$row		 				    =	mysqli_fetch_array($rs);
						if($row>0)
						{
							$err_msg = '<p style="color:red" class="alert alert-danger">You cannot add multi entries of same values</p>';
						}
      			else
      			{
				echo			$query = "INSERT INTO lox_per_day_rate (lox_passanger_type,lox_passanger_logistic_rate,lox_passanger_logistic_time)  VALUES 
							('".mysqli_real_escape_string($conn,$lox_passanger_type)."','".mysqli_real_escape_string($conn,$lox_passanger_logistic_rate)."','".mysqli_real_escape_string($conn,$lox_passanger_logistic_time)."')";
							$rs	   =  mysqli_query($conn,$query) or die(mysqli_error());
							header("location:functions.php?add_rate=ok");
        		}
        } 

	

?>
			<div class="content mt-3">
				<div class="animated fadeIn">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<strong class="card-title">Add new price for accessing any user type</strong>
								</div>
								<div class="card-body">
									<?php echo $err_msg;?>
									<form   method="POST" enctype="multipart/form-data"> 
										<table class="table  table-bordered">
									 
										<tr><td>User Type:</td><td>

										<select name="lox_passanger_type" class="form-control">
												
												
														<?php 
													$query			=	"select * from category ";
													$rs			 	=	mysqli_query($conn,$query) or die(mysqli_error());
													while($row		=	mysqli_fetch_array($rs))
													{
																	if ($row['cat_id'] == 1)
																	{
																		
																	}
																	else{
																		echo '<option value="'.$row['id'].'" '.$selected.'>'.$row['cat_name'].'</option>';
																	}	
																	
													}
													
													?>
													

											</select></td></tr>
										<tr><td>Price (<?php echo $currencysymbol12?>):</td><td> <input  name="lox_passanger_logistic_rate" type="number" class="form-control"  value="<?php echo $lox_passanger_logistic_rate; required ?>"/><?php echo '<p style="color:red">'.$lox_passanger_logistic_rateErr.'</p>';?></td></tr> 
										<tr><td>Access Time (Hours):</td><td> 
											
											<select name="lox_passanger_logistic_time" class="form-control">
												

														<?php 
													for($i=1;$i<=24;$i++){
																	echo '<option value="'.$i.'" '.$selected.'>'.$i.' Hour</option>';
													}
													
													?>
													

											</select>

										</td></tr>
										
											</tr>
										 
										 <tr><td></td><td><input type="submit"  class="btn btn-success" value="add"/> 
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