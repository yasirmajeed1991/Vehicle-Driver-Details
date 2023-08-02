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

$query	=	"select * from lox_admin_user  ";
			$rs		 =	mysqli_query($conn,$query) or die(mysqli_error());
		$html = "";
		while($row		=	mysqli_fetch_array($rs))
		{
					$html	.=	'<tr style="font-size:12px">
								<td >'.$row['user_name'].'</td>
								<td >'.$row['email'].'</td>
								<td >'.$row['mobileno'].'</td>
								
								<td><a href="functions.php?admin_del='.$row['id'].'&&id='.$row['id'].'"><i class="fa fa-minus-square icon-white"></i></a> &nbsp<a  href="lox_update_user_admin.php?id='.$row['id'].'"><i class="fa fa-edit icon-white"></i></a></td>
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
									<strong class="card-title">Admin-User's List</strong>
								</div>
								<div class="card-body">
									<p align="right"><a  class="btn btn-success" href="lox_add_user_admin.php"><i class="fa fa-edit icon-white"></i>Add New Admin-User</a></p>   
										<table id="bootstrap-data-table-export" class="table table-sm table-bordered bootstrap-datatable datatable responsive">
												<thead>
												<tr>
        
													<th>Username</th>
													<th>Email</th>
													<th>Mobile No</th>
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