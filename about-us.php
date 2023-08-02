<?php  include "header.php";?>

		<!-- Page Title-->
		<div class="rn-page-title">
			<div class="rn-pt-overlayer"></div>
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="rn-page-title-inner">
							<h1><?php echo $about_us?></h1>
							
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Page Title-->

		<!-- Our Vission-->
		<section class="rn-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">

						<!-- Section Title-->
						<div class="rn-section-title   ">
							<h2 class="rn-title"><?php echo $about_us_our_vision;?></h2>
							<span class="rn-title-bg"><?php echo $about_us_our_vision;?></span>
						</div>

					</div>
				</div>
				<div class="row mb-30">
					<div class="col-lg-3 col-sm-6">

						<!-- Feature with dot-->
						<div class="rn-dot-feature">
							<div class="rn-the-dot"></div>
							<div class="rn-dot-feature-info">
								<h3><?php echo $best_price_gurantee;?></h3>
								<p><?php echo $best_price_gurantee_content;?></p>
							</div>
						</div>
						<!-- End Feature with dot-->

					</div>
					<div class="col-lg-3 col-sm-6">

						<!-- Feature with dot-->
						<div class="rn-dot-feature">
							<div class="rn-the-dot"></div>
							<div class="rn-dot-feature-info">
								<h3><?php echo $reservation_anytime;?></h3>
								<p><?php echo $reservation_anytime_content;?></p>
							</div>
						</div>
						<!-- End Feature with dot-->

					</div>
					<div class="col-lg-3 col-sm-6">

						<!-- Feature with dot-->
						<div class="rn-dot-feature">
							<div class="rn-the-dot"></div>
							<div class="rn-dot-feature-info">
								<h3><?php echo $manual_payments;?></h3>
								<p><?php echo $manual_payments_content;?></p>
							</div>
						</div>
						<!-- End Feature with dot-->

					</div>
					<div class="col-lg-3 col-sm-6">

						<!-- Feature with dot-->
						<div class="rn-dot-feature">
							<div class="rn-the-dot"></div>
							<div class="rn-dot-feature-info">
								<h3><?php echo $customer_support;?></h3>
								<p><?php echo $customer_support_content;?></p>
							</div>
						</div>
						<!-- End Feature with dot-->

					</div>
				</div>
			</div>
		</section>
		<!-- End Our Vission-->

		<!-- About Us with Image-->
		<section class="rn-section rn-about-image-text">
			<div class="rn-section-overlayer"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-5 mb-30">
						<img class="img-fluid" src="assets/images/about-img.jpg" alt="" srcset="assets/images/about-img.jpg 1x, assets/images/about-img@2x.jpg 2x">
					</div>
					<div class="col-md-7 mb-30">
						<h2 class="rn-image-section-title">
							 <?php echo $with_passion;?>
						</h2>
						<p><?php echo $with_passion_content;?></p>
					</div>
				</div>
			</div>
		</section>
		<!-- End About Us with Image-->

		<!-- Our Team
		<section class="rn-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">

						
						<div class="rn-section-title   ">
							<h2 class="rn-title"><?php echo $our_team;?></h2>
							<span class="rn-title-bg"><?php echo $our_team;?></span>
						</div>

					</div>
				</div>
				<div class="row">
					<div class="col-md-4">

					
						<div class="rn-team-member">
							<div class="rn-team-member-img">
								<div class="rn-overlayer"></div>
								<img class="img-fluid" src="assets/images/team-member-1.jpg" alt="Team member" srcset="assets/images/team-member-1.jpg 1x, assets/images/team-member-1@2x.jpg 2x"/>
							</div>
							<div class="rn-team-member-info">
								<div class="rn-team-member-name">Crystal Spencer</div>
								<div class="rn-team-member-designation">Co-Founder &amp; CEO</div>
								
							</div>
						</div>
						

					</div>
					<div class="col-md-4">

					
						<div class="rn-team-member">
							<div class="rn-team-member-img">
								<div class="rn-overlayer"></div>
								<img class="img-fluid" src="assets/images/team-member-2.jpg" alt="Team member" srcset="assets/images/team-member-2.jpg 1x, assets/images/team-member-2@2x.jpg 2x"/>
							</div>
							<div class="rn-team-member-info">
								<div class="rn-team-member-name">Anthony Wallace</div>
								<div class="rn-team-member-designation">Co-Founder &amp; CTO</div>
								
							</div>
						</div>
					

					</div>
					<div class="col-md-4">

					
						<div class="rn-team-member">
							<div class="rn-team-member-img">
								<div class="rn-overlayer"></div>
								<img class="img-fluid" src="assets/images/team-member-3.jpg" alt="Team member" srcset="assets/images/team-member-3.jpg 1x, assets/images/team-member-3@2x.jpg 2x"/>
							</div>
							<div class="rn-team-member-info">
								<div class="rn-team-member-name">James Obrien</div>
								<div class="rn-team-member-designation">Lead Developer</div>
								
							</div>
						</div>
						

					</div>
				</div>
			</div>
		</section>
	-->

		<!-- Fun Fact-->
		<div class="rn-section rn-about-counter">
			<div class="rn-section-overlayer"></div>
			<div class="container">
				<div class="row">
					<?php echo $count_up;?>
				</div>
			</div>
		</div>
		<!-- End Fun Fact-->

		

		<?php include "footer.php";?>