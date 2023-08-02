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

$query	=	"select * from lox_feedback  ";
			$rs		 =	mysqli_query($conn,$query) or die(mysqli_error());
		$html = "";
		while($row		=	mysqli_fetch_array($rs))
		{
					$html	.=	'<tr style="font-size:12px">
								<td >'.$row['id'].'</td>
								<td >'.$row['username'].'</td>
								<td >'.$row['company'].'</td>
								<td >'.$row['content'].'</td>
								<td >'.$row['status'].'</td>
								<td><a  href="lox_update_feedback.php?id='.$row['id'].'"><i class="fa fa-edit icon-white"></i></a> <a  href="functions.php?feedback_del=active && id='.$row['id'].'"><i class="fa fa-minus-square"></i></a> </td>
								</tr>	  ';
		}
?>



			<div class="content mt-3">
				<div class="animated fadeIn">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<strong class="card-title">Feedback</strong>
								</div>
								<div class="card-body">
									<p align="right"><a  class="btn btn-success" href="lox_add_feedback.php"><i class="fa fa-edit icon-white"></i>Add New Feedback</a></p>   
										<table id="bootstrap-data-table-export" class="table table-sm table-bordered bootstrap-datatable datatable responsive">
											<thead>
											<tr>
												<th>Id</th>
												<th>Name</th>
												<th>Company</th>
												<th>Content</th>
												<th>Status</th>
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

<?php if($_SESSION['error_msg']!=''){echo $_SESSION['error_msg']; $_SESSION['error_msg']='';}?>



 
 
 
 
 
 
<?php }

 include 'footer.php';

?>