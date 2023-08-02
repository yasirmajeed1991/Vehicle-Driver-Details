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
						$query			=	"select * from lox_admin_user where id = $id  ";
						$rs		    	=	mysqli_query($conn,$query) or die(mysqli_error());
						$row		    =	mysqli_fetch_array($rs);
						$user_name		= 	$row['user_name'];
						$user_password	=	$row['password'];
						$user_email		=	$row['email'];
						$user_mobileno	=	$row['mobileno'];
}
if (($_SERVER["REQUEST_METHOD"] == "POST") && ($_GET['id']!='')){
	 $user_password=$user_mobileno=$message_success="";
	$user_passwordErr=$user_mobilenoErr=$message_Err="";
						
						$id 			= 	$_GET['id'];
						$query			=	"select * from lox_admin_user where id =$id  ";
						$rs		    	=	mysqli_query($conn,$query) or die(mysqli_error());
						$row		    =	mysqli_fetch_array($rs);
						$user_name		= 	$row['user_name'];
						$user_password	=	$_REQUEST['user_password'];
						$user_email		=	$row['email'];
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
	//	$user_passwordErr = "Password must be greater than 8 character and less than 20 ";	
		}
	  }

 
//USER MOBILE NO
  if (empty($_POST["user_mobileno"])) {
    $user_mobilenoErr = "Gender is required";
  } else {
		$user_mobileno = test_input($_POST["user_mobileno"]);
    	if ((strlen($user_mobileno) > 11) || (strlen($user_mobileno) < 11)){
		$user_mobilenoErr = "Mobile Number Must be 11 Character";	
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
if(empty($user_passwordErr) && empty($user_mobilenoErr) && empty($message_Err) ){
        
		echo	$query = "update lox_admin_user set password='".mysqli_real_escape_string($conn,strtolower($user_password))."',mobileno='".mysqli_real_escape_string($conn,$user_mobileno)."' where id='$id'";
		$rs		    	=	mysqli_query($conn,$query) or die(mysqli_error());
		header("location:functions.php?update_adminn=ok");
        } 
	

}
?>
			<div class="content mt-3">
				<div class="animated fadeIn">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<strong class="card-title">Update Admin-UserUser Account</strong>
								</div>
								<div class="card-body">
								 <form   method="POST" enctype="multipart/form-data"> 
										<table class="table table-bordered">
									 
										<tr><td>User Name:</td><td><input   name="user_name" class="form-control" required="required" disabled type="text" value="<?php echo $user_name; ?>" size="20"/></td></tr>
										<tr><td>Password:<td> <input  name="user_password" type="password" class="form-control"  value="<?php echo $user_password; ?>"/></td><?php echo '<p style="color:red">'.$user_passwordErr.'</p>';?></tr> 
										<tr><td>Email:<td> <input  name="user_email" type="email" class="form-control" disabled value="<?php echo $user_email; ?>" size="30"/></td></tr>
										<tr><td>Mobile No:<td> <input  name="user_mobileno" type="text" class="form-control" required="required" value="<?php echo $user_mobileno ?>"  maxlength = "11"/><?php echo '<p style="color:red">'.$user_mobilenoErr.'</p>';?></td></tr>	
										<tr><td></td><td><input type="submit"  class="btn btn-success" value="Update"/> 
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