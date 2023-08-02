<?php include "header.php";?>

		<!-- Page Title-->
		<div class="rn-page-title">
			<div class="rn-pt-overlayer"></div>
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="rn-page-title-inner">
							<h1><?php echo $frequently_asked_question?></h1>
							<p><?php echo $frequently_asked_question_content?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Page Title-->

		<!-- Page Content-->
		<section class="rn-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">

						<!-- FAQ Item-->
						<?php echo $faq_section;?>
						<!-- End FAQ Item-->


					</div>
					<div class="col-lg-4">

						<!-- Sidebar-->
						<aside class="rn-widget-area" id="secondary">

							<!-- Widget Item-->
							<section class="rn-widget">
								<div class="rn-widget-content">
									<div class="rn-support-widget">
										<i class="far fa-life-ring"></i>
										<h2 class="rn-support-widget-title"><?php echo $do_you_support?></h2>
										<p><?php echo $agents_available?></p>
										<div class="rn-phone-number"><?php echo $web_phone_no?></div>
										<div class="rn-phone-number"><?php echo $web_mobile_no?></div>
									</div>
								</div>
							</section>
							<!-- End Widget Item-->

						</aside>
						<!-- End Sidebar-->

					</div>
				</div>
			</div>
		</section>
		<!-- End Page Content-->

		<?php include "footer.php"?>