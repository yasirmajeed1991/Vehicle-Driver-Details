<?php include "header.php";?>
		<!-- End Header-->

		<!-- Slider-->
		<div class="rn-carousel carousel slide" id="carouselExampleControls" data-ride="carousel">
			<div class="carousel-inner">

				<!-- Slider Item 1-->
				<div class="carousel-item beactive">
					<div class="carousel-caption">
						<h2 class="rn-fade-bottom mb-25"><?php echo $slider_1_content_1st_line?></h2>
						<p class="rn-fade-bottom rn-caption-item-2 mb-35"><?php echo $slider_1_content_2nd_line?></p>
						<a class="btn btn-main btn-lg rn-fade-bottom rn-caption-item-3" href="passanger_driver.php"><?php echo $slider_1_content_3rd_line?></a>
					</div>
					<div class="rn-slider-overlayer"></div>
					<img class="d-block w-100" src="assets/images/slide5.jpg" alt="slide">
				</div>

				<!-- Slider Item 2-->
				<div class="carousel-item">
					<div class="carousel-caption">
						<h2 class="rn-fade-bottom mb-25"><?php echo $slider_2_content_1st_line?></h2>
						<p class="rn-fade-bottom rn-caption-item-2 mb-35"><?php echo $slider_2_content_2nd_line?></p>
						<a class="btn btn-main btn-lg rn-fade-bottom rn-caption-item-3" href="logistics_driver.php"><?php echo $slider_2_content_3rd_line?></a>
					</div>
					<div class="rn-slider-overlayer"></div>
					<img class="d-block w-100" src="assets/images/slide3.jpg" alt="slide">
				</div>

				<!-- Slider Item 3-->
				<div class="carousel-item">
					<div class="carousel-caption">
						<h2 class="rn-fade-bottom mb-25"><?php echo $slider_3_content_1st_line?></h2>
						<p class="rn-fade-bottom rn-caption-item-2 mb-35"><?php echo $slider_3_content_2nd_line?></p>
						<a class="btn btn-main btn-lg rn-fade-bottom rn-caption-item-3" href="pricing.php"><?php echo $slider_3_content_3rd_line?></a>
					</div>
					<div class="rn-slider-overlayer"></div>
					<img class="d-block w-100" src="assets/images/slide4.jpg" alt="slide">
				</div>

			</div>
			<!-- Slider Controls -->
			<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
				<span class="lnr lnr-chevron-left" aria-hidden="true"></span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
				<span class="lnr lnr-chevron-right" aria-hidden="true"></span>
			</a>
		</div>
		<!-- End slider-->

		

		<!-- Why People Like Us Section-->
		<section class="rn-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">

						<!-- Section Title-->
						<div class="rn-section-title   ">
							<h2 class="rn-title"><?php echo $why_people_like_us?></h2>
							<p><?php echo $answer_people_like_us?></p>
							<span class="rn-title-bg"><?php echo $why_loxlift?></span>
						</div>

					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 col-md-6">

						<!-- Feature with dot-->
						<div class="rn-dot-feature">
							<div class="rn-the-dot"></div>
							<div class="rn-dot-feature-info">
								<h3><?php echo $best_price_gurantee?></h3>
								<p><?php echo $best_price_gurantee_content?></p>
							</div>
						</div>
						<!-- End Feature with dot-->

					</div>
					<div class="col-lg-3 col-md-6">

						<!-- Feature with dot-->
						<div class="rn-dot-feature">
							<div class="rn-the-dot"></div>
							<div class="rn-dot-feature-info">
								<h3><?php echo $rider_contact_list?></h3>
								<p><?php echo $rider_contact_list_content?></p>
							</div>
						</div>
						<!-- End Feature with dot-->

					</div>
					<div class="col-lg-3 col-md-6">

						<!-- Feature with dot-->
						<div class="rn-dot-feature">
							<div class="rn-the-dot"></div>
							<div class="rn-dot-feature-info">
								<h3><?php echo $transporter_contact_list?></h3>
								<p><?php echo $transporter_contact_list_content?></p>
							</div>
						</div>
						<!-- End Feature with dot-->

					</div>
					<div class="col-lg-3 col-md-6">

						<!-- Feature with dot-->
						<div class="rn-dot-feature">
							<div class="rn-the-dot"></div>
							<div class="rn-dot-feature-info">
								<h3><?php echo $reservation_anytime?></h3>
								<p><?php echo $reservation_anytime_content?></p>
							</div>
						</div>
						<!-- End Feature with dot-->

					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 col-md-6">

						<!-- Feature with dot-->
						<div class="rn-dot-feature">
							<div class="rn-the-dot"></div>
							<div class="rn-dot-feature-info">
								<h3><?php echo $personal_driver?></h3>
								<p><?php echo $personal_driver_content?></p>
							</div>
						</div>
						<!-- End Feature with dot-->

					</div>
					<div class="col-lg-3 col-md-6">

						<!-- Feature with dot-->
						<div class="rn-dot-feature">
							<div class="rn-the-dot"></div>
							<div class="rn-dot-feature-info">
								<h3><?php echo $deal_directly?></h3>
								<p><?php echo $deal_directly_content?></p>
							</div>
						</div>
						<!-- End Feature with dot-->

					</div>
					<div class="col-lg-3 col-md-6">

						<!-- Feature with dot-->
						<div class="rn-dot-feature">
							<div class="rn-the-dot"></div>
							<div class="rn-dot-feature-info">
								<h3><?php echo $manual_payments?></h3>
								<p><?php echo $manual_payments_content?></p>
							</div>
						</div>
						<!-- End Feature with dot-->

					</div>
					<div class="col-lg-3 col-md-6">

						<!-- Feature with dot-->
						<div class="rn-dot-feature">
							<div class="rn-the-dot"></div>
							<div class="rn-dot-feature-info">
								<h3><?php echo $customer_support?></h3>
								<p><?php echo $customer_support_content?></p>
							</div>
						</div>
						<!-- End Feature with dot-->

					</div>
				</div>
			</div>
		</section>
		<!-- End Why People Like Us Section-->

		<!-- Testimonials & Fun Fact-->
		<section class="rn-section rn-fun-fact">
			<div class="rn-section-overlayer"></div>
			<div class="container">
				<div class="row">
					<div class="col-lg-6">

						<!-- Section Title-->
						<div class="rn-section-title rn-title-pos-left rn-title-bg-color-white-10 rn-title-color-white">
							<h2 class="rn-title"><?php echo $feedback_of_client?></h2>
							<span class="rn-title-bg"><?php echo $feedback_of_client?></span>
						</div>

						<!-- Testimonials-->
						<div class="rn-testimonials rn-testimonials2">
							<div class="rn-testimonials-carousel carousel slide" id="rn-testimonials" data-ride="carousel">
								<div class="carousel-inner">

									<!-- Testimonial -->
									<?php echo $feedback_clients;?>
								</div>
								<!-- Testimonials Slider Controls-->
								<ol class="carousel-indicators">
									<li class="active" data-target="#rn-testimonials" data-slide-to="0"></li>
									<li data-target="#rn-testimonials" data-slide-to="1"></li>
									<li data-target="#rn-testimonials" data-slide-to="2"></li>
									<li data-target="#rn-testimonials" data-slide-to="3"></li>
									<li data-target="#rn-testimonials" data-slide-to="4"></li>
									
								</ol>
							</div>
						</div>
						<!-- End Testimonials-->

					</div>
					<div class="col-lg-6">
						<div class="row">
							<?php echo $count_up;?>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Testimonials & Fun Fact-->

		<!-- Recent New/Posts-->
		<section class="rn-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">

						<!-- Section Title-->
						<div class="rn-section-title   ">
							<h2 class="rn-title"><?php echo $news_updates?></h2>
							<p><?php echo $news_updates_content?></p>
							<span class="rn-title-bg"><?php echo $news_updates?></span>
						</div>

					</div>
				</div>
				<div class="row rn-post-list">
				<!-- Blog Post Item (Small Size)-->
					<?php echo $news_section;?>
						<!-- End Blog Post Item (Small Size)-->
					
				</div>
			</div>
		</section>
		<!-- End Recent New/Posts-->

		<!-- Site Footer-->
		<?php include "footer.php";?>