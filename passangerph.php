<?php  session_start();
    if(!isset($_SESSION['user_id']))
   {
    header("location:login.php");
   }
   else
   {
	   	
		include "header.php";
		
	
	
?>
<style>
.rn-section {
  padding: 30px 0 50px;
}
.rn-page-title {
    position: relative;
    padding-top: 140px;
    padding-bottom: 0px;
}

</style>

		<!-- Page Title-->
		<div class="rn-page-title">
			<div class="rn-pt-overlayer"></div>
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="rn-page-title-inner">
							<h1><?php echo $payment_history;?></h1>
							
						</div>
					</div>
				</div>
			</div>
		</div>
			<section class="rn-section">
			<div class="container">
					<div class="row">
						
						<div class="col-12 table-responsive">
							<?php include "msg_session.php";?>
							<table id="bootstrap-data-table-export" class="table table-sm table-bordered bootstrap-datatable datatable responsive">
												<thead>
												<tr>
													<th>Sr.No</th>
													<th>Date & Time</th>
													
													<th>Category</th>
													<th>Amount</th>
													<th>Trx Id</th>
													<th>Payment Method</th>
													<th>Status</th>
													<th>Access Time</th>
													<th>Time Utilize</th>
													<th>Payment Comment</th>
													
												</tr>
												</thead>
								 
										 <?php echo $payment_history_result;?>
									 
									  </table>
						</div>
					</div>
			</div>
		</section>					
							
						
		<div style="height:100px;"></div>
		<!-- End Page Content-->
   <?php include "footer.php";}

?>