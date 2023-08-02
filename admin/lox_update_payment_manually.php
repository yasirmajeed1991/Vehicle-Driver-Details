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
//WHEN USER CLICK FROM USER VIEW THE ID OF THE CLICKED USERNAME ALONG DATA WILL BE PASSED TO SHOW IN UPDATE FORM FIELDS
if(($_GET['id']!='') && ($_SERVER["REQUEST_METHOD"] != "POST")){
						$id = $_GET['id'];
						$query			=	"select * from lox_passanger where id = $id  ";
						$rs		    	=	mysqli_query($conn,$query) or die(mysqli_error());
						$row		    =	mysqli_fetch_array($rs);
						$user_name		= 	$row['username'];
						$user_password	=	$row['password'];
						$user_email		=	$row['email'];
						$user_gender	=	$row['gender'];	
						$user_cityname	=	$row['user_cityname'];
						$user_mobileno	=	$row['mobile'];
}
if (($_SERVER["REQUEST_METHOD"] == "POST") && ($_GET['id']!='')){
	$user_name = $user_password=$user_email=$user_gender=$user_cityname=$user_mobileno=$message_success="";
	$user_nameErr = $user_passwordErr=$user_emailErr=$user_genderErr=$user_citynameErr=$user_mobilenoErr=$message_Err="";
						
						$id 			= $_GET['id'];
						$query			=	"select * from lox_passanger where id = $id  ";
						$rs		    	=	mysqli_query($conn,$query) or die(mysqli_error());
						$row		    =	mysqli_fetch_array($rs);
						$user_name		= 	$row['username'];
						$user_password	=	$_REQUEST['user_password'];
						$user_email		=	$row['email'];
						$user_gender	=	$_REQUEST['user_gender'];	
						$user_cityname	=	$_REQUEST['user_cityname'];
						$user_mobileno	=	$_REQUEST['user_mobileno'];


//POSTED RECORD
//FUNCTION FOR CHECKING TEXT INPUT  
  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
//PASSWORD 
if (empty($user_password)) {
    $user_passwordErr = "Password is required";
  } else {
		if ((strlen($user_password) <8) || (strlen($user_password) > 20)){
		$user_passwordErr = "Password must be greater than 8 character and less than 20 ";	
		}
	  }

 //GENDER
  if (empty($user_gender)) {
    $user_genderErr = "Gender is required";
  } else {
    $user_gender = test_input($_POST["user_gender"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$user_gender)) {
      $user_genderErr = "Only letters and white space allowed";
    }
	if ((strlen($user_gender) < 3) || (strlen($user_gender) > 7) ){
		$user_genderErr = "Gender Must be in range of 3 to 7 Character";	
		}
	if (ctype_space($user_gender)){
		$user_genderErr = "Gender Must be without spaces";	
		}
  }
//PREFFERED_CITY
  if (empty($_POST["user_cityname"])) {
    $user_citynameErr = "City Is Required";
  } else {
    $user_cityname = test_input($_POST["user_cityname"]);
    	if ((strlen($user_cityname) < 4) || (strlen($user_cityname) > 40)){
		$user_citynameErr = "City Name Must be in range of 4 to 40 character ";	
		}
	if (ctype_space($user_cityname)){
		$user_citynameErr = "City Must Be From City Name";	
		}
  }
//USER MOBILE NO
  if (empty($_POST["user_mobileno"])) {
    $user_mobilenoErr = "Gender is required";
  } else {
		$user_mobileno = test_input($_POST["user_mobileno"]);
    	if ((strlen($user_mobileno) > 12) || (strlen($user_mobileno) < 12)){
		$user_mobilenoErr = "Mobile Number Must be 12 Character";	
		}
	if (ctype_space($user_mobileno)){
		$user_mobilenoErr = "Mobile No always used without spaces";	
		}
	if (ctype_digit($user_mobileno)){
		$user_mobileno = $user_mobileno;	
		}
	else{
		$user_mobilenoErr="Mobile No. must be only digits";
		
	}	
  }
	
//CHECKING FOR ERRORS IF THERE IS NO ERROR THAN THE FORM SHOULD BE SUBMITTED
if(empty($user_nameErr) && empty($user_passwordErr) && empty($user_emailErr) && empty($user_genderErr) && empty($user_citynameErr) && empty($user_mobilenoErr) && empty($message_Err) ){
        
		$query = "Update lox_passanger SET password='".mysqli_real_escape_string($conn,$user_password)."',gender='".mysqli_real_escape_string($conn,$user_gender)."',cityname='".mysqli_real_escape_string($conn,$user_cityname)."',mobile='".mysqli_real_escape_string($conn,$user_mobileno)."' where id='$id'";
		$rs		    	=	mysqli_query($conn,$query) or die(mysqli_error());
				
        echo '<div align="center"  ><p><strong style="color:green; ">User Has Been Updated Successfully!</strong></p> <br>		
		 </div>'; 
        } 
	

}
?>
			<div class="content mt-3">
				<div class="animated fadeIn">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<strong class="card-title">Update User Account</strong>
								</div>
								<div class="card-body">
									<form class="form-inline"  method="POST" enctype="multipart/form-data"> 
											<table class="table table-striped">
										 
											<tr><td>User Name:</td><td><input   name="user_name" class="form-control" required="required" disabled type="text" value="<?php echo $user_name; ?>" /></td></tr>
											<tr><td>Password:<td> <input  name="user_password" type="password" class="form-control"  value="<?php echo $user_password; ?>"/></td></tr> 
											<tr><td>Email:<td> <input  name="user_email" type="email" class="form-control" disabled value="<?php echo $user_email; ?>" /></td></tr>
											
											<tr><td>Gender:<td><label class="radio-inline"><input type="radio" name="user_gender" value="Male" <?php if($user_gender=="Male") echo 'checked' ?>>Male</label>
															<label class="radio-inline"><input type="radio" name="user_gender" value="Female" <?php if($user_gender=="Female") echo 'checked' ?>>Female</label></td></tr>
											<tr><td>Passanger City:<td> <select name="user_cityname" class="form-control" >
												<option value="">-Select-</option>
												<?php 
												$query	=	"select * from lox_cityname ";
												$rs		 =	mysqli_query($conn,$query) or die(mysqli_error());
												while($row		=	mysqli_fetch_array($rs))
												{
																if ($row['cityname']== $user_cityname ){
																	$selected	= 'Selected';
															}
																else{
																	$selected = '';
																}	
													echo		'<option value="'.$row['cityname'].'" '.$selected.'>'.$row['cityname'].'</option>';
												}
												
											?>
												 </select> <?php echo '<p style="color:red">'.$user_citynameErr.'</p>';?></td>
												
												
												
												
												
												
												
												</tr>
											<tr><td>Mobile No:<td> <input  name="user_mobileno" type="text" class="form-control" required="required" value="<?php echo $user_mobileno ?>"  maxlength = "11"/></td></tr>	
											
											 <tr><td></td><td><input type="submit"  class="btn btn-info" value="Update"/> 
											</td>
											</tr>
										   </table>
								 
									
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> 

                
 <?php
 
    
    ?>   
   
    
    
<?php }

include 'footer.php';
?>