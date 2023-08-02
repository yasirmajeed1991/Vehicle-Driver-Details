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

$query	=	"select * from lox_faq  ";
			$rs		 =	mysqli_query($conn,$query) or die(mysqli_error());
		$html = "";
		while($row		=	mysqli_fetch_array($rs))
		{
					$html	.=	'<tr style="font-size:12px">
								<td >'.$row['id'].'</td>
								<td >'.$row['faq_question'].'</td>
								<td >'.$row['faq_answer'].'</td>
								<td><a  href="lox_update_faq.php?id='.$row['id'].'"><i class="fa fa-edit icon-white"></i></a> <a  href="functions.php?faq_del=active && id='.$row['id'].'"><i class="fa fa-minus-square"></i></a> </td>
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
									<strong class="card-title">Faq's List</strong>
								</div>
								<div class="card-body">
									<p align="right"><a  class="btn btn-success" href="lox_add_faq.php"><i class="fa fa-edit icon-white"></i>Add New Faq</a></p>   
 


								<table id="bootstrap-data-table-export" class="table table-sm table-bordered bootstrap-datatable datatable responsive">
										<thead>
											<tr>
											<th>Id</th>
											<th>Question</th>
											<th>Answer</th>
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