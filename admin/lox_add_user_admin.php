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
//Validation For User Form
	$user_name = $user_password=$user_email=$user_mobileno=$message_success="";
	$user_nameErr = $user_passwordErr=$user_emailErr=$user_mobilenoErr=$message_Err="";
	$user_name = $_REQUEST['user_name'];
    $user_password=$_REQUEST['user_password']; 
    $user_email=$_REQUEST['user_email'];
	$user_mobileno=$_REQUEST['user_mobileno'];
		
//USERNAME	
  if (empty($_POST["user_name"])) {
    $user_nameErr = "User Name is required";
  } else {
    
	
	if (ctype_space($user_name)){
		$user_nameErr = "Please Use Username without spaces";	
		}
	  }
//PASSWORD 
if (empty($_POST["user_password"])) {
    $user_passwordErr = "Password is required";
  }
 //USEREMAIL
if (empty($_POST["user_email"])) {
    $user_emailErr = "Email is required";
  } else {
    $user_email = test_input($_POST["user_email"]);
    // check if e-mail address is well-formed
    if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
      $user_emailErr = "Invalid email format";
    }
  }
 
//USER MOBILE NO
  if (empty($_POST["user_mobileno"])) {
    $user_mobilenoErr = "Mobile no is required";
  } 


//CHECKING FOR ERRORS IF THERE IS NOT ANY ERROR THAN THE FORM SHOULD BE SUBMITTED
			if(empty($user_nameErr) && empty($user_passwordErr) && empty($user_emailErr) && empty($user_mobilenoErr) && empty($message_Err) ){
//CHECKING FOR RECORD IF USER ALREADY EXISTED		
			$query			=	"select * from lox_admin_user  where (user_name='$user_name' || email='$user_email') ";
			$rs		    	=	mysqli_query($conn,$query) or die(mysqli_error());
			$row		    =	mysqli_fetch_array($rs);
			if($row>0){
			header("location:functions.php?exist_admin=ok");
			}
			else{
			$user_password=$_REQUEST['user_password'];
			$query = "INSERT INTO lox_admin_user (user_name,password,email,mobileno) values('".mysqli_real_escape_string($conn,strtolower($user_name))."','".mysqli_real_escape_string($conn,$user_password)."','".mysqli_real_escape_string($conn,$user_email)."','".mysqli_real_escape_string($conn,$user_mobileno)."')";
			$rs=	mysqli_query($conn,$query) or die(mysqli_error());
				
			header("location:functions.php?add_admin=ok");
			}
			}
			
}

?>

<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Add New Admin-User</strong>
                            </div>
                            <div class="card-body">
                                <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data"> 
										<table class="table table-bordered">
										
										
										
										<tr><td>User Name:</td><td><input   name="user_name" class="form-control" required="required" type="text" value="<?php echo $user_name;?>" /><?php echo '<p style="color:red">'.$user_nameErr.'</p>';?></td></tr>
										<tr><td>Password:<td> <input  name="user_password" type="password" class="form-control" required="required" value="<?php echo $user_password;?>" /><?php echo '<p style="color:red">'.$user_passwordErr.'</p>';?></td></tr> 
										<tr><td>Email:<td> <input  name="user_email" type="email" class="form-control" required="required" value="<?php echo $user_email;?>" /><?php echo '<p style="color:red">'.$user_emailErr.'</p>';?></td></tr>
										
										<tr><td>Mobile No:<td> <input  name="user_mobileno" type="text" class="form-control" required="required" value="<?php echo $user_mobileno;?>" /><?php echo '<p style="color:red">'.$user_mobilenoErr.'</p>';?></td></tr>	
										
										 <tr><td></td><td><input type="submit"  class="btn btn-success" value="Add"/> &nbsp;
										 
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

               
    &nbsp;
	
    
	


<?php }


include 'footer.php';
?>