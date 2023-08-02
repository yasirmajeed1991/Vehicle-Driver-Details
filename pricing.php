<?php include "header.php";

?>

<link rel="stylesheet" href="assets/css/pricing.css">
<style type="text/css">
	.rn-page-title {
    position: relative;
    padding-top: 130px;
    padding-bottom: 0px;
}
.rn-section {
    padding: 0px 0 50px;
}
.ex1 {
  padding-bottom: 50px !important;
}
#generic_price_table .generic_content .generic_head_price .generic_head_content .head{
padding-top: 10px;
position: relative;
z-index: 1;
}
</style>
		<!-- Page Title-->
		<div class="rn-page-title">
			<div class="rn-pt-overlayer"></div>
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="rn-page-title-inner">
							<h1><?php echo $pricing;?></h1>
							<p><?php echo $pricing_content;?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Page Title-->

		<!-- Page Content-->
		<div class="rn-section">
			<div class="container ">
				<div class="row">
					<div class="col-lg-12">
						<div id="generic_price_table">   
							<section>
						        <div class="container">
						            <?php include "msg_session.php";?>
						            <div class="row  justify-content-md-center ">
						            	<?php echo $pricing_section?>
						            </div>
						        </div>
							</section>             
			 			</div>	
					</div>
				</div>
			</div>
		</div>
		<!-- End Page Content-->

		<?php include "footer.php";?>
			