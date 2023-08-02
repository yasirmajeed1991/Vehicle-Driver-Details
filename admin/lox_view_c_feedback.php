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

$query	=	"SELECT lox_customer_feedback.id,lox_customer_feedback.comment,lox_customer_feedback.date_created,users.username,lox_customer_feedback.stars,lox_customer_feedback.comment_by_id as commentor,category.cat_name FROM users INNER JOIN lox_customer_feedback ON lox_customer_feedback.user_id = users.id
INNER JOIN category ON category.cat_id=lox_customer_feedback.commentor_type ";
			$rs		 =	mysqli_query($conn,$query) or die(mysqli_error());
		$html = "";
		$i=0;
		while($row		=	mysqli_fetch_array($rs))
		{
			$user_id = $row['commentor'];
		$query1	=	"SELECT username FROM users where id= '".$user_id."' ";
			$rs1		 =	mysqli_query($conn,$query1) or die(mysqli_error());
			$commentor = mysqli_fetch_array($rs1);


					$i=$i+1;
					$html	.=	'<tr style="font-size:12px">
								<td >'.$i.'</td>
								<td >'.$row['username'].'</td>
								<td >'.$row['date_created'].'</td>
								
								<td >'.$row['stars'].'</td>
								
								<td >'.$commentor['username'].'</td>
								<td >'.$row['cat_name'].'</td>
								<td >'.$row['comment'].'</td>
								<td><a  href="functions.php?feedback_user_del=ok && id='.$row['id'].'"><i class="fa fa-minus-square"></i></a> </td>
								</tr>	  ';
		}
?>



			<div class="content mt-3">
				<div class="animated fadeIn">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<strong class="card-title">Users Feedback</strong>
								</div>
								<div class="card-body">
									  
										<table id="bootstrap-data-table-export" class="table table-sm table-bordered bootstrap-datatable datatable responsive">
											<thead>
											<tr>
												<th>Sr.</th>
												<th>Comment On</th>
												<th>Date</th>
												<th>Stars</th>
												<th>Comment By</th>
												<th>Commentor Type</th>
												<th>Comment</th>
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