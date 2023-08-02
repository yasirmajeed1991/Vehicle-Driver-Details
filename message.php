<?php include "header.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$full_name=$email=$your_message=$message_success=$captcha_no='';
$full_nameErr=$emailErr=$your_messageErr=$captcha_noErr='';
//SENDING EMAIL TO ADMIN WHEN ANY PERSON CONTACT VIA EMAIL
	$full_name					= 	$_REQUEST['full_name'];
	$email						= 	$_REQUEST['email'];
	$your_message				= 	$_REQUEST['your_message'];
	$captcha_no					= 	$_REQUEST['captcha_no'];
	$captcha_verify				= 	$_REQUEST['captcha_verify'];
//FUNCTION FOR CHECKING TEXT INPUT  
  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
//FULL NAME CHECKS
  if (empty($_POST["full_name"])) {
    $full_nameErr = "This Field is Required";
  } else {
    $full_name = test_input($_POST["full_name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$full_name)) {
      $full_nameErr = "This Field Only Contains Letters and White Spaces";
    }
	if ((strlen($full_name)< 4) || (strlen($full_name) > 30)){
		$full_nameErr = "This Field Must be greater than 4 and less than 30 Characters";	
		}
  }
//EMAIL
if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
//MESSAGE AREA CHECKS
  if (empty($_POST["your_message"])) {
    $your_messageErr = "This Field is Required";
  } else {
    $your_message = test_input($_POST["your_message"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$your_message)) {
      $your_messageErr = "This Field Only Contains Letters and White Spaces";
    }
	if ((strlen($your_message)< 20) || (strlen($your_message) > 2000)){
		$your_messageErr = "This Field Must be greater than 20 and less than 2000 Characters";	
		}
  }
 //CHECKING FOR CAPTCHA WORKING 
   if (empty($_POST["captcha_no"])) {
    $captcha_noErr = "This Field is Required";
  } else {
    if ((strlen($captcha_no)< 2) || (strlen($captcha_no) > 6)){
		$captcha_noErr = "This Field Must be greater than 2 and less than 6 Characters";	
		}
	if(!is_numeric($captcha_no))
		{
		$captcha_noErr ="This field must be numeric";
		}
	if ($captcha_no != $captcha_verify){
		$captcha_noErr = "Your answer is incorrect";	
		}	
  } 
  
//CHECKING FOR ERRORS IF THERE IS NOT ANY ERROR THAN EMAIL MUST BE SENT
if(empty($full_nameErr) && empty($emailErr) && empty($your_messageErr) && empty($captcha_noErr)) {
				header('location: contact-us.php?id=success');
}
}

?>
<style>

</style>
		<!-- Page Title-->
		<div class="rn-page-title">
			<div class="rn-pt-overlayer"></div>
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="rn-page-title-inner">
							<h1><?php echo $contact_us;?></h1><br>
							
							
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Page Title-->

		<!-- Page Content-->
		<section class="rn-section">
			<div class="container">
				<div class="row mb-90">
					<div class="col-lg-12">
						<!-- Google Map-->
						<div class="rn-google-map" id="rn-google-map"></div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">

						<!-- Contact Form-->
						<h2 class="rn-simple-title"><?php echo $send_message;?></h2>
						<p class="ll-submit-success"><?php if(!empty($_GET['id'])){ echo "Your message has been sent succesfully and you will get reply as soon as possible!";}?></p>
						<div class="rn-contact-form">
							<form action="contact-us.php" method="post">
								<div class="row mb-30">
									<div class="col-6">
										<div class="rn-icon-input">
											<i class="far fa-user"></i>
											<input type="text" name="full_name" value="<?php echo $full_name;?>" placeholder="Full name" required><br>
											<?php echo '<p class="ll-submit-error">'.$full_nameErr.'</p>';?>
										</div>
									</div>
									<div class="col-6">
										<div class="rn-icon-input">
											<i class="far fa-envelope"></i>
											<input name="email" type="email" placeholder="Your Email" value="<?php echo $email;?>" required><br>
											<?php echo '<p class="ll-submit-error">'.$emailErr.'</p>';?>
										</div>
									</div>
								</div>
								<div class="rn-icon-input rn-icon-top mb-30">
									<i class="far fa-comment"></i>
									<textarea placeholder="Your Message" rows="5" name="your_message" required value="<?php echo $your_message;?>"><?php echo $your_message;?></textarea><br>
									<?php echo '<p class="ll-submit-error">'.$your_messageErr.'</p>';?>
								</div>
								<div class="input">
											<p class="ll-font-of-body">Please Answer:   <?php 
											$number1= rand(05,30);
											$number2= rand(30,20);
											$captcha_no1= $number1+$number2;
											echo "".$number1." + ".$number2." = ?";											
											
											
											?></p>
											<input type="number" name="captcha_no" value="<?php echo $captcha_no?>" placeholder="Type Answer" required><br>
											<?php echo '<p class="ll-submit-error">'.$captcha_noErr.'</p>';?>
										</div>
										<input type="hidden" value="<?php echo $captcha_no1?>" name="captcha_verify">
								<div class="text-right">
									<input class="btn btn-main btn-lg btn-shadow" type="submit" value="<?php echo $send_message;?>">
									
								</div>
							</form>
						</div>
						<!-- End Contact Form-->

					</div>
					<div class="col-lg-6">
						<div class="row">
							<div class="col-12">
								<h2 class="rn-simple-title"><?php echo $contact_us;?></h2>
							</div>
							<div class="col-sm-6">

								<!-- Contact Info Item-->
								<div class="rn-contact-info">
									<div class="rn-info-icon">
										<i class="lnr lnr-map-marker"></i>
									</div>
									<div class="rn-info-content">
										<h2 class="rn-contact-title"><?php echo $head_office;?></h2>
										<address><?php echo $web_location_address;?><br>
											
										</address>
									</div>
									
								</div>
								<!-- End Contact Info Item-->

							</div>
							<div class="col-sm-6">

								

							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Page Content-->

	<?php include "footer.php";?>	