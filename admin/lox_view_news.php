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

		$query	=	"select * from lox_news ORDER BY id DESC ";
			$rs		 =	mysqli_query($conn,$query) or die(mysqli_error());
		$html = "";
		while($row		=	mysqli_fetch_array($rs))
		{
					$html	.=	'<tr style="font-size:12px">
								<td >'.$row['id'].'</td>
								<td >'.$row['date'].'</td>
								<td >'.$row['news_title'].'</td>
								<td >'.$row['news_content'].'</td>
								<td><img src="../uploads/news/'.$row['news_picture'].'" alt="No Image" width="60" height="70"></td>
								<td><a  href="lox_update_news.php?id='.$row['id'].'"><i class="fa fa-edit icon-white"></i></a> <a  href="functions.php?news_del=del && id='.$row['id'].'"><i class="fa fa-remove"></i></a> </td>
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
												<th>Date</th>
												<th>News Title</th>
												<th>Content</th>
												<th>Image</th>
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