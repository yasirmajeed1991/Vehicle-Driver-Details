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

$query	=	"SELECT users.id,users.date_created,users.name,users.email,users.username,category.cat_name,
				users.mobile,users.cityname from users INNER JOIN category ON users.role_id=category.cat_id
			 where status=1";
		$rs		 =	mysqli_query($conn,$query) or die(mysqli_error());
		$i=0;
		$html = "";
		while($row		=	mysqli_fetch_array($rs))
		{			$i=$i+1;
					$html	.=	'<tr style="font-size:12px">
								<td >'.$i.'</td>
								<td >'.$row['date_created'].'</td>
								<td >'.$row['name'].'</td>
								<td >'.$row['email'].'</td>
								<td >'.$row['username'].'</td>
								<td >'.$row['cat_name'].'</td>
								<td >'.$row['mobile'].'</td>
								<td >'.$row['cityname'].'</td>
								<td><a href="functions.php?user_inactive='.$row['id'].'"><i class="fa fa-minus-square icon-white"></i></a> &nbsp<a  href="lox_update_user.php?id='.$row['id'].'"><i class="fa fa-edit icon-white"></i></a></td>
								</tr>	  ';

		}
?>

<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
					    <div class="card" >
                            <div class="card-header">
                                <strong class="card-title">User's List</strong>
								</div>
                            <div class="card-body">
                                <p align="right"><a  class="btn btn-success" href="lox_add_user.php"><i class="fa fa-edit icon-white"></i>Add New User</a></p>   
									<table id="bootstrap-data-table-export" class="table table-sm table-bordered bootstrap-datatable datatable responsive">
											<thead>
												<tr>
													<th>Sr.No</th>
													<th>Date</th>
													<th>Name</th>
													<th>Email</th>
													<th>Username</th>
													<th>User Type</th>
													<th>Mobile</th>
													<th>Location</th>
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