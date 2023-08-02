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

$query	=	"select * from lox_vehicle_category  ";
			$rs		 =	mysqli_query($conn,$query) or die(mysqli_error());
		$html = "";
		while($row		=	mysqli_fetch_array($rs))
		{
					$html	.=	'<tr style="font-size:12px">
								
								<td >'.$row['id'].'</td>
								<td >'.$row['vehicle_category'].'</td>
								
								<td><a  href="functions.php?vechicle_category='.$row['vehicle_category'].' && category_del='.$row['id'].'"><i class="fa fa-minus-square icon-white"></i></a> &nbsp  <a  href="lox_update_vehicle_category.php?id='.$row['id'].'"><i class="fa fa-edit icon-white"></i></a></td>
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
									<strong class="card-title">Vehicle Category List</strong>
								</div>
								<div class="card-body">
									<p align="right"><a  class="btn btn-success" href="lox_add_vehicle_category.php"><i class="fa fa-edit icon-white"></i>Add New Category</a> </p>   
										<table id="bootstrap-data-table-export" class="table table-sm table-bordered bootstrap-datatable datatable responsive">
											<thead>
											<tr>
												 <!--       <th>Id</th>
														<th>Full Name</th>
														<th>Registration Date</th>
														
													  --> 
														<th>Vehicle Id</th>
														<th>Vehicle Category</th>
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