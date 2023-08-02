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

		$query	=	"select * from licences  ";
			$rs		 =	mysqli_query($conn,$query) or die(mysqli_error());
		$html = "";
		while($row		=	mysqli_fetch_array($rs))
		{
					$html	.=	'<tr style="font-size:12px">
								<td >'.$row['id'].'</td>
								<td ><a href="lox_update_user.php?id='.$row['user_id'].'" target="_blank">'.$row['user_id'].'</a></td>
								<td><img src="../licences/'.$row['image'].'" alt="No Image" width="60" height="70"></td>
								<td><a  href="functions.php?licence=del && id='.$row['id'].'"><i class="fa fa-remove"></i></a> </td>
								</tr>	  ';
		}
?>



			<div class="content mt-3">
				<div class="animated fadeIn">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<strong class="card-title">New's List</strong>
								</div>
								<div class="card-body">
									 <p align="right"><a  class="btn btn-success" href="lox_add_news.php"><i class="fa fa-edit icon-white"></i>Add News</a></p>   
										<table id="bootstrap-data-table-export" class="table table-sm table-bordered bootstrap-datatable datatable responsive">
											<thead>
											<tr>
												<th>Id</th>
												<th>User ID</th>
												<th>Licence</th>
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