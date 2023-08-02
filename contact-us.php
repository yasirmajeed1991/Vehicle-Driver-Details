<?php 
include "header.php";
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
	if ((strlen($full_name)< 1) || (strlen($full_name) > 30)){
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
	if ((strlen($your_message)< 1) || (strlen($your_message) > 2000)){
	//	$your_messageErr = "This Field Must be greater than 20 and less than 2000 Characters";	
		}
  }
 //CHECKING FOR CAPTCHA WORKING 
   if (empty($_POST["captcha_no"])) {
    $captcha_noErr = "This Field is Required";
  } else {
    if ((strlen($captcha_no)< 2) || (strlen($captcha_no) > 6)){
	//	$captcha_noErr = "This Field Must be greater than 2 and less than 6 Characters";	
		}
	if(!is_numeric($captcha_no))
		{
		$captcha_noErr ="This field must be numeric";
		}
	if ($captcha_no != $captcha_verify){
		$captcha_noErr = "Your answer is incorrect";	
		}	
  } 
$contact_us_form_email_submission="
<html>
			<head>
				<title>$web_site_title</title>
			</head>
			<body>
						<p>Dear <strong>Admin!</strong></p>
			 			 <strong> <p>You Got A New Query Please Respond..</p></strong><br>
						<p><strong>Query Details!!</strong></p></br>
						 <table>
								<tr><td>Full Name:</td><td>".$full_name."</td></tr>
								<tr><td>Email Address:</td><td>".$email."</td></tr>
								<tr><td>Message/Query:</td><td>".$your_message."</td></tr>
						 </table>
						 <p><strong>Regards</strong>,<br/>
						<strong>".$full_name."</strong>,<br/>
						<strong>www.LoxLift.com</strong></p>
			</body>
</html>";  
//CHECKING FOR ERRORS IF THERE IS NOT ANY ERROR THAN EMAIL MUST BE SENT
if(empty($full_nameErr) && empty($emailErr) && empty($your_messageErr) && empty($captcha_noErr)) {
		//send the email to site admin
            $to			=	$web_site_email;
            $subject	=	$email_subject_contact_form;
            $from 		= 	$admin_from_email;
            $message 	= 	$contact_us_form_email_submission;
         // message lines should not exceed 70 characters (PHP rule), so wrap it
		// To send HTML mail, the Content-type header must be set
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			// Additional headers
			$headers .= 'From: LoxLift.Com <'.$from.'>' . "\r\n";
		// send mail
			mail($to,$subject,$message,$headers);
			header("location:contact-us.php?submit=success");
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
				
				<div class="row">
					<div class="col-lg-6">

						<!--  Success Message -->
						<?php if($_GET['submit']!="success"){?>
						
						
						<!-- Contact Form-->
						<h2 class="rn-simple-title"><?php echo $send_message;?></h2>
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
											$number1= rand(5,10);
											$number2= rand(10,5);
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
						<?php } else {?>
						<p class="ll-submit-success">Your message has been sent succesfully and you will get reply as soon as possible!</p>
						<?php }?>
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
				<div class="row mb-90">
					<div class="col-lg-12">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7130044.282166208!2d30.036918917419747!3d-11.636508430020786!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1921d31ffc299805%3A0x4b7eb9f20a03ff9!2sLilongwe%2C%20Malawi!5e0!3m2!1sen!2s!4v1624643105798!5m2!1sen!2s" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
					</div>
				</div>
			</div>
		</section>
		<!-- End Page Content-->

	<?php include "footer.php";?>	