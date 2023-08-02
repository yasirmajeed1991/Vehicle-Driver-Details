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
$serial_no=0;
$query	=	"select * from lox_cityname  ";
			$rs		 =	mysqli_query($conn,$query) or die(mysqli_error());
		$html = "";
		while($row		=	mysqli_fetch_array($rs))
		{			$serial_no=$serial_no+1;
					$html	.=	'<tr style="font-size:12px">
								<td >'.$serial_no.'</td>
								<td >'.$row['id'].'</td>
								<td >'.$row['cityname'].'</td>
								
								<td><a  href="functions.php?city_name='.$row['cityname'].' && city_del='.$row['id'].'"><i class="fa fa-minus-square icon-white"></i></a> &nbsp  <a  href="lox_update_cityname.php?id='.$row['id'].'"><i class="fa fa-edit icon-white"></i></a></td>
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
									<strong class="card-title">List of Cities</strong>
								</div>
								<div class="card-body">
									<p align="right"><a  class="btn btn-success" href="lox_add_cityname.php"><i class="fa fa-edit icon-white"></i>Add New City</a> </p>   
										<table id="bootstrap-data-table-export" class="table table-sm table-bordered bootstrap-datatable datatable responsive">
											<thead>
											<tr>
											<!--       <th>Id</th>
													<th>Full Name</th>
													<th>Registration Date</th>
											
											--> 
											<th>Serial</th>
											<th>City Id</th>
											<th>List of Cities</th>
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