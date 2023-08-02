<?php  session_start();
    if(!isset($_SESSION['user_id']) )
   {
    header("location:login.php");
   }
   else
   {
	   	$service_type = $_GET['service_id'];

	   	// if(empty($service_type))
	   	// {
		   // 	header("location:login.php");	
	   	// }

	   	if($_SESSION['name']!="passanger")
		{
			header("location:login.php");
		}
		else
		{	
			include "header.php";
			include "config.php";

    //SHOWING RECORD OF USERS OR PASSANGERS IN NAV HIDDEN OR SHOW BAR
    $universal_id = $_SESSION['user_id'];
    $service_type = $_GET['service_id'];
    if ($_SESSION['name']=="passanger") 
    {   
       //Fetching data on the basis of selection to put payment record in a lox_payments table
            $query ="select * from lox_per_day_rate where md5(id)='$service_type' ";
            $rs = mysqli_query($conn,$query) or die(mysqli_error());
            $payment = mysqli_fetch_object($rs);
       //Fetching data on the basis of selection to put payment record in a lox_payments table
            $query ="select * from users where id='$universal_id' ";
            $rs = mysqli_query($conn,$query) or die(mysqli_error());
            $users = mysqli_fetch_object($rs);


       $query ="select * from lox_payments where ((lox_user_id='$universal_id') && (lox_access_time_expiry=1) && (lox_passanger_type='$payment->lox_passanger_type'))";
            $rs = mysqli_query($conn,$query) or die(mysqli_error());
            $user_have_access = mysqli_fetch_array($rs);
            if($user_have_access>0)
            {
            
                $_SESSION['message_success'] = "<p class='alert alert-danger'>User already have access to the specified section you can't access to same section before time expiry.</p>";
                header('location:pricing.php');
                exit;
            }    

    }        





    
		
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
.login-button{
	padding-top:10px;
	}
.forget-link{
	padding-top:10px;
	color:black;
	}	
	.nav-pills .nav-link.active, .nav-pills .show>.nav-link {
    color: #fff;
    background-color: #00D231;
}
	.nav-link{
		color:black;
	}
.verify_mail{
	color:red;
	}
.verified-id{
	color:#00D231;
	}
.a hover{
	color:red;
	}	
.data_rows_color {
	
	font-size:15px;
	font-weight: 430;
}
.data_rows_color1 {
	font-size:14px;
	
}

    .error{
        outline: 1px solid red;
    }    

</style>
		<!-- Page Title-->
		<div class="rn-page-title">
			<div class="rn-pt-overlayer"></div>
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="rn-page-title-inner">
							<h1>Making Payment Via TNM Mobile Account</h1>
							
						</div>
					</div>
				</div>
			</div>
		</div>
		
						
						
		<section class="rn-section">
			<div class="container">
				
					
						
					 
						
						
						<div class="row">
							<div class="col-md-3">
							</div>
							<div class="col">
								 <?php include "msg_session.php";?>


								 <!-- Image loader -->
									<div id='loader' style='display: none;' align="center">
									  <img src='uploads/loading1.gif' width='50px' height='50px'>
									 <p class='alert alert-info'><strong>Do Not refresh the page!</strong> <br>
									 	A Flash message has been sent on your mobile please complete the transaction!
									 </p>
									</div>
									<!-- Image loader -->

									<div class='response' ></div>

	
								
								<?php if(!empty($user_passwordErr)){echo '<p class="msg_err">'.$user_passwordErr.'</p>';}?>					
									<form method="POST" id="myform"  class="form-group" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
									<table class="table table-bordered ">
								


								<tr><td class="data_rows_color">

								<p class='alert alert-info'><strong>INFO:</strong><br><br>
								<span style="font-size:13px;">Step 1: Please enter TNM Mobile Account Number start with 265.<br>
									Step 2: Click on proceed payment Button for payment, a Flash message will be sent on your phone screen to complete the transaction.
								</span>	

								</p>	

								</td></tr>
								<tr>
									<td> <input  name="tnm_account" id="tnm_account" autocomplete="off" placeholder="Enter TNM Mobile Number Start with 265" type="text" required value=""/>
								<?php if(!empty($tnm_accountErr)){echo '<p class="msg_err">'.$tnm_accountErr.'</p>';}?>
							</td></tr>

								<input type="hidden" id="amount" name="amount" value="<?php echo $payment->lox_passanger_logistic_rate?>">
								<input type="hidden" id="receiver_type" name="receiver_type" value="4">
								<input type="hidden" id="tran_id" name="tran_id" value="<?php mt_srand(mktime());echo(mt_rand());?>">
								<input type="hidden" id="receiver_identifier" name="receiver_identifier" value="601794">
								<input type="hidden" id="service_type" name="service_type" value="<?php echo $service_type;?>">
								<input type="hidden" id="remark" name="remark" value="TNM Payment">
								<input type="hidden" id="type" name="type" value="<?php echo $payment->lox_passanger_type;?>">
								<input type="hidden" id="access_time" name="access_time" value="<?php echo $payment->lox_passanger_logistic_time ?>">
							
							<br>

								 <tr><td><input id='but_search' class="btn btn-success" value="Proceed Payment"/> 
								</td>
								</tr>
							   </table>
							 	</form>				
													
												
								  </div>
										 
								<div class="col-md-3">
							</div>
											  
											  
													  
											  
											  </div>
								  
								</div>
							  </div>
							</div>
							
							
							
		</section><div style="height:100px;"></div>
		<!-- End Page Content-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type='text/javascript'>

$(document).ready(function(){
 
 $("#but_search").click(function(){
  var tnm_account 	= $('#tnm_account').val();
  var amount 		= $('#amount').val();
  var receiver_type = $('#receiver_type').val();
  var receiver_identifier = $('#receiver_identifier').val();
  var tran_id 		= $('#tran_id').val();
  var remark 		= $('#remark').val();
  var type 			= $('#type').val();
  var access_time 	= $('#access_time').val();
  var service_type 	= $('#service_type').val();
  $.ajax({
   url: 'payment_confirmation.php',
   type: 'post',
   
   data: {tnm_account:tnm_account,amount:amount,receiver_type:receiver_type,receiver_identifier:receiver_identifier,tran_id:tran_id,remark:remark,type:type,access_time:access_time,service_type:service_type},
   beforeSend: function(){
    /* Show image container */
    $("#loader").show();
 $("#myform").hide();
   },
   success: function(response){
    $('.response').empty();
    $('.response').append(response);
   $("#myform").show();
   },
   complete:function(data){
    /* Hide image container */
    $("#loader").hide();

   }
   
   
  });
 
 });
});

$(document).ready(function(){
  /* Hide response on click event */
   $("#but_search").click(function(){
    $("#error").hide();
  });

  
});


</script>








   <?php include "footer.php";}}

?>