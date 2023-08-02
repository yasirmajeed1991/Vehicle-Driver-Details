<footer class="rn-footer">
			<!-- Footer Widgets-->
			<div class="rn-footer-widgets">
				<div class="container">
					<div class="row">
						<div class="col-md-4">

							<!-- Widget Item-->
							<section class="rn-widget">
								<h2 class="rn-widget-title"><?php echo $about_us;?></h2>
								<div class="rn-widget-content">
									<a class="brand-name" href="index.php">
										<img src="assets/images/logo1.png" alt="Logo">
									</a>
									<p><?php echo $about_us_content1;?></p>
									<ul class="rn-widget-social">
										<li>
											<a href="<?php echo $face_book_link?>" target="_blank">
												<i class="fab fa-facebook-f"></i>
											</a>
										</li>
										<li>
											<a href="<?php echo $twitter_link?>" target="_blank">
												<i class="fab fa-twitter"></i>
											</a>
										</li>
										<li>
											<a href="<?php echo $instagram_link?>" target="_blank">
												<i class="fab fa-instagram"></i>
											</a>
										</li>
										
										</li>
									</ul>
								</div>
							</section>
							<!-- End Widget Item-->

						</div>
						<div class="col-md-5">

							<!-- Widget Item-->
							<section class="rn-widget">
								<h2 class="rn-widget-title">Quick Links</h2>
								<div class="rn-widget-content">
									<div class="row rn-quick-links">
										<div class="col-6">
											<ul>
												<li>
													<a href="about-us.php"><?php echo $about_us ?></a>
												</li>
												<li>
													<a href="contact-us.php"><?php echo $contact_us?></a>
												</li>
												<li>
													<a href="pricing.php"><?php echo $pricing?></a>
												</li>
												<li>
													<a href="disclaimer.php"><?php echo $disclaimer?></a>
												</li>
												<li>
											<a href="https://play.google.com/store/apps/details?id=com.loxlift" Target="_Blank">	<img src="assets/images/app.png" alt="payments" srcset="assets/images/app.png 1x, assets/images/app.png@2x ">
</a>
												</li>
											</ul>
										</div>
										<div class="col-6">
											<ul>
											<li>
													<a href="news.php"><?php echo $news_release?></a>
												</li>
												<li>
													<a href="faq.php"><?php echo $frequently_asked_question?></a>
												</li>
													
												<li>
													<a href="safety.php"><?php echo $safety ?></a>
												</li>
												
												
                                                <li>
													<a href="gps_tracking.php"><?php echo $gps_tracking ?></a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</section>
							<!-- End Widget Item-->

						</div>
						<div class="col-md-3">

							<!-- Widget Item-->
							<section class="rn-widget">
								<h2 class="rn-widget-title"><?php echo $contact_us?></h2>
								<div class="rn-widget-content">
									<div class="rn-icon-contents">
										<div class="rn-phone rn-icon-content">
										    <!--
											<div class="rn-icon">
												<i class="lnr lnr-phone"></i>
											</div>
											<div class="rn-info">
												<ul>
											<?php if(!empty($web_phone_no)){ echo '<li>'.$web_phone_no.'</li>';}?>
											<?php if(!empty($web_phone_no)){ echo '<li>'.$web_phone_no.'</li>';}?>
												</ul>
											</div> 
											-->
										</div>
										<div class="rn-email rn-icon-content">
											<div class="rn-icon">
												<i class="lnr lnr-envelope"></i>
											</div>
											<div class="rn-info">
												<ul>
													<?php if(!empty($web_site_email)){ echo '<li>'.$web_site_email.'</li>';}?>
									
												</ul>
											</div>
										</div>
										<div class="rn-address rn-icon-content">
											<div class="rn-icon">
												<i class="lnr lnr-map-marker"></i>
											</div>
											<div class="rn-info">
												<ul>
            										<?php if(!empty($web_location_address)){ echo '<li>'.$web_location_address.'</li>';}?>
											
												</ul>
											</div>
										</div>
									</div>
								</div>
							</section>
							<!-- End Widget Item-->

						</div>
					</div>
				</div>
			</div>
			<!-- End Footer Widgets-->

			<!-- Footer Copyright-->
			<div class="rn-footer-copyright">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-md-6">
							<p><?php echo $copy_right_footer?><br>
								<?php echo $about_us_copyright?></p>
						</div>
						<div class="col-md-6 text-right">
							<span class="rn-pyament-methods">
								<span><?php echo $we_accept_payment_method?></span>
								<img src="assets/images/payment_method_f1.png" alt="payments" srcset="assets/images/payment_method_f1.png 1x, assets/images/payment_method_f1.png@2x ">
							</span>
						</div>
					</div>
				</div>
			</div>
			<!-- End Footer Copyright-->

		</footer>
		<!-- End Site Footer-->

		<!--
		All JavaScripts Codes Loaded
		Ex: jquery, bootstrap, etc.
		-->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/libs/bootstrap/js/bootstrap.min.js"></script>
		<script src="assets/libs/flatpickr/flatpickr.min.js"></script>
		<script src="assets/js/starrr.min.js"></script>
		<script src="assets/js/jquery.magnific-popup.min.js"></script>
		<script src="assets/js/scripts.js"></script>

	<script src="admin/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="admin/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
     <script src="admin/assets/js/init-scripts/data-table/datatables-init.js"></script>
	</body>
</html>
<?php

 ob_end_flush();
if(!empty($_SESSION['user_id']))
{
	
if(time() - $_SESSION['timestamp'] > 500) 
        { //subtract new timestamp from the old one
              header("Location:logout.php"); //redirect to index.php
             
        }
        else 
        {
            $_SESSION['timestamp'] =  time();
        }

}
?>