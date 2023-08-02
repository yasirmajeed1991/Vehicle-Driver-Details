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
//FUNCTION FOR CHECKING TEXT INPUT  
  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
//POSTED RECORD
//VALIDATION OF PAYMENT MANUALLY FORM
	$passanger_name=$passanger_type=$payment_status=$payment_method=$access_time=$comment_section="";
	$passanger_nameErr=$passanger_typeErr=$payment_statusErr=$payment_methodErr=$access_timeErr=$comment_sectionErr="";
	
	$passanger_name				= 	$_REQUEST['passanger_name'];
	$passanger_type				=	$_REQUEST['passanger_type'];
	$payment_status				=	$_REQUEST['payment_status'];
	$payment_method				=	$_REQUEST['payment_method'];
	$access_time				=	$_REQUEST['access_time'];
	$comment_section			=	$_REQUEST['comment_section'];
//PASSANGER_NAME	
  if (empty($_POST["passanger_name"])) {
    $passanger_nameErr = "This is required";
  } 
//passanger_type
if (empty($_POST["passanger_type"])) {
    $passanger_typeErr = "Field is required";
  } 
 //PAYMENT_STATUS
  if (empty($_POST["payment_status"])) {
    $payment_statusErr = "This field is required";
  } 
  //PAYMENT_METHOD
  if (empty($_POST["payment_method"])) {
    $payment_methodErr = "This field is required";
  } 

  //Access Time

  if (empty($_POST["access_time"])) {
    $access_timeErr = "This field is required";
  } 

//CHECKING FOR ERRORS IF THERE IS NOT ANY ERROR THAN THE FORM SHOULD BE SUBMITTED
if(empty($passanger_nameErr) && empty($passanger_typeErr) && empty($payment_statusErr) && empty($payment_methodErr) && empty($access_timeErr)) {
			
			//Fetching data on the basis of selection to put payment record in a lox_payments table
			$query ="select * from lox_per_day_rate where id='$access_time' ";
			$rs = mysqli_query($conn,$query) or die(mysqli_error());
			$payment = mysqli_fetch_array($rs);
			$section_rate = $payment['lox_passanger_logistic_rate'];
			$access_time = $payment['lox_passanger_logistic_time'];


			$query ="select * from lox_payments where ((lox_user_id='$passanger_name') && (lox_access_time_expiry=1) && (lox_passanger_type='$passanger_type'))";
			$rs = mysqli_query($conn,$query) or die(mysqli_error());
			$user_have_access = mysqli_fetch_array($rs);
			if($user_have_access>0)
			{
			
				$message_Err = "<p class='alert alert-danger'>User already have access to the specified section you cannot give access to same section before expiry</p>";
			}
			else{
			$current_date_time  = date('y-m-d H:i:s'); //ADDING CURRENT TIME OF THE SYSTEM WHEN ADMIN MAKES A MANUAL PAYMENT FOR A CONCERNED PASSANGER
			$transaction_id = mt_rand();//CREATING A RANDMON TRANSACTION ID TO STORE IT IN THE PAYMENT PER DAY TABLE FOR RECORD
			$lox_access_time_expiry = "1";
			$query = "INSERT INTO lox_payments (lox_payment_date,lox_user_id,lox_passanger_type,lox_payment_amount,lox_payment_status,lox_transaction_id,lox_payment_method,lox_access_time_expiry,lox_comments,access_time) 
			values('".mysqli_real_escape_string($conn,$current_date_time)."','".mysqli_real_escape_string($conn,$passanger_name)."','".mysqli_real_escape_string($conn,$passanger_type)."','".mysqli_real_escape_string($conn,$section_rate )."','".mysqli_real_escape_string($conn,$payment_status)."','".mysqli_real_escape_string($conn,$transaction_id)."','".mysqli_real_escape_string($conn,$payment_method)."','".mysqli_real_escape_string($conn,$lox_access_time_expiry)."','".mysqli_real_escape_string($conn,$comment_section)."','".mysqli_real_escape_string($conn,$access_time)."')";
			$rs=	mysqli_query($conn,$query) or die(mysqli_error());
			header("location:functions.php?payment_success=ok");
			}
			}
			}
  
?>

<div class="content mt-3">
	<?php if($message_Err!=''){?>
<div align="center"  ><?php echo $message_Err?></div>
	
	<?php }?>
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Allowing Access To user for a Time Being</strong>
                            </div>
                            <div class="card-body">
                                &nbsp;
	
      
								<form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data"> 
									<table class="table table-bordered">
											<tr><td>User:</td><td>
											<select name="passanger_name" class="form-control" >
												<option value="">Select User Name</option>
												<?php 
												$query	=	"select * from  users ";
												$rs		 =	mysqli_query($conn,$query) or die(mysqli_error());
												while($row		=	mysqli_fetch_array($rs))
												{
																if ($passanger_name == $row['username']){
																	$selected	= 'Selected';
																	
																}
																else{
																	$selected = '';
																}
																	
													echo		'<option value="'.$row['id'].'" '.$selected.'>'.$row['username'].'</option>';
												}
												
											?>
												 </select> <?php echo '<p style="color:red">'.$passanger_nameErr.'</p>';?>
											</td></tr>
											<tr>
											<td>Access to Section:</td><td> 
												
												
													<select name="passanger_type"  class="form-control" id="category-dropdown">
														<option value="">Please select section</option>
														<?php 
													$query			=	"select * from category ";
													$rs			 	=	mysqli_query($conn,$query) or die(mysqli_error());
													while($row		=	mysqli_fetch_array($rs))
													{
																	if($row['cat_id']==1)
																	{

																	}
																	else
																	{
																		echo '<option value="'.$row['cat_id'].'" >'.$row['cat_name'].'</option>';
																	}
													}				

													?>
													</select>


												 <?php echo '<p style="color:red">'.$passanger_typeErr.'</p>';?>
												</td></tr>
												<tr>
												<td>Access Time:</td><td><select class="form-control" name="access_time" id="sub-category-dropdown">
													</select>
												</td>
											</tr>

											<tr>
											<td>Select Payment Status:</td>
											<td>
												<select name="payment_status" class="form-control">
												<option value="">Select Payment Status</option>
												<option value="1" <?php if ($payment_status=='Completed') echo 'selected';?>>Completed</option>
												</select> <?php echo '<p style="color:red">'.$payment_statusErr.'</p>';?>
											</td>
											</tr>	
											<tr>
												<td>Payment Method:</td><td><select name="payment_method" class="form-control">
												<option value="">Select Payment Method</option>
												<option value="TNM" <?php if ($payment_method=='TNM') echo 'selected';?>>TNM</option>
												<option value="Airtel" <?php if ($payment_method=='Airtel') echo 'selected';?>>Airtel</option>
												</select>
												</td>
											</tr>
											
											<tr>

											<td>Comment/Description <br> About Payment:</td><td> 
											<textarea   name="comment_section" placeholder="Please write description of the payment how user had paid" class="form-control"  required="required"  rows="4" cols="50" value="<?php echo $comment_section;?>"><?php echo $comment_section; ?> </textarea><?php echo '<p style="color:red">'.$comment_sectionErr.'</p>';?>
											</td></tr>
											<tr><td><td><input type="submit"  class="btn btn-success" value="Allow Access Manually"/></td></td></tr>
									</table>
							   </form> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 

 
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>

$(document).ready(function() {
$('#category-dropdown').on('change', function() {
var category_id = this.value;
$.ajax({
url: "category_subcategory.php",
type: "POST",
data: {
category_id: category_id
},
cache: false,
success: function(result){
$("#sub-category-dropdown").html(result);
}
});
});
});
</script>


<?php }


include 'footer.php';
?>