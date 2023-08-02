<?php
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
            
            
$serial_no = 0;
$query	=	"select lox_per_day_rate.id,lox_per_day_rate.lox_passanger_logistic_rate,lox_per_day_rate.lox_passanger_logistic_time,category.cat_name from  lox_per_day_rate inner join category ON lox_per_day_rate.lox_passanger_type = category.cat_id";
			$rs		 =	mysqli_query($conn,$query) or die(mysqli_error());
		$html = "";
		while($row		=	mysqli_fetch_array($rs))
		{
					$serial_no=$serial_no+1;
					$html	.=	'<tr style="font-size:12px">
								<td>'.$serial_no.'</td>
								<td >'.$row['cat_name'].'</td>
								<td >'.$row['lox_passanger_logistic_rate'].' '.$currencysymbol12.'</td>
								<td >'.$row['lox_passanger_logistic_time'].' Hour</td>
								
								<td><a  href="lox_update_per_day_rate.php?id='.$row['id'].'"><i class="fa fa-edit icon-white"></i></a>
								&nbsp; <a  href="functions.php?lox_rate_del='.$row['id'].'"><i class="fa fa-trash icon-white"></i></a>
								</td>
								</tr>	  ';
		}
?>




<?php if($_SESSION['error_msg']!=''){echo $_SESSION['error_msg']; $_SESSION['error_msg']='';}?>

			<div class="content mt-3">
				<div class="animated fadeIn">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<strong class="card-title">Time access pricing</strong>
								</div>
								<div class="card-body">
									<p align="right"><a  class="btn btn-success" href="lox_add_per_day_rate.php"><i class="glyphicon glyphicon-edit icon-white"></i>Add New Price</a></p> 
									<table id="bootstrap-data-table-export" class="table table-sm table-bordered bootstrap-datatable datatable responsive">
										<thead>
										<tr>
										
											<th>Serial ID</th>
											<th>User Type</th>
											<th>Rate</th>
											<th>Access Time (Hours)</th>
										   <th>Action</th>
										</tr>
										</thead>
								 
										 <?php echo $html;?>
									 
									  </table>
								 
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> 

 
<?php }

 include 'footer.php';

?>