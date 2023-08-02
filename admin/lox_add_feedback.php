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
	$user_name = $company_name=$comment_section="";
	$user_nameErr=$company_nameErr=$comment_sectionErr='';
	$user_name = $_REQUEST['user_name'];
    $company_name=$_REQUEST['company_name']; 
    $comment_section=$_REQUEST['comment_section'];
		
//USERNAME	
  if (empty($_POST["user_name"])) {
    $user_nameErr = "User Name is required";
  } else {
    $user_name = test_input($_POST["user_name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-'0-9 ]*$/",$user_name)) {
      $user_nameErr = "This Field Only Contains letters,numbers and whitespaces";
    }
	if ((strlen($user_name)< 6) || (strlen($user_name) > 35)){
		$user_nameErr = "Username Must be greater than 6 and less than 35 Characters";	
		}
	if (ctype_space($user_name)){
		$user_nameErr = "Please Use Username without spaces";	
		}
	  }
//COMPANY_NAME 
if (empty($_POST["company_name"])) {
    $company_nameErr = "This field is required";
  } else {
		if ((strlen($company_name) <8) || (strlen($company_name) > 35)){
		$company_nameErr = "This Field must be greater than 8 character and less than 35 ";	
		}
	  }
//COMMENT_SECTION
if (empty($_POST["comment_section"])) {
    $comment_sectionErr = "This Field is required";
  } else {
		if ((strlen($comment_section) <8) || (strlen($comment_section) > 1000)){
		$comment_sectionErr = "This Field must be greater than 8 character and less than 35 ";	
		}
	  }	  

//CHECKING FOR ERRORS IF THERE IS NOT ANY ERROR THAN THE FORM SHOULD BE SUBMITTED
			if(empty($user_nameErr) && empty($company_nameErr) && empty($comment_sectionErr)){
			$query = "INSERT INTO lox_feedback (username,company,content,status) values('".$user_name."','".$company_name."','".$comment_section."','Active')";
			$rs=	mysqli_query($conn,$query) or die(mysqli_error());
			header("location:functions.php?add_feedback=ok");
			
			}
			
}

?>
<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Add New Feedback</strong>
                            </div>
                            <div class="card-body">
                               &nbsp;
	
    
									<form class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data"> 
									<table class="table table-striped">
									
									
									
									<tr><td>Name:</td><td><input   name="user_name" class="form-control" required="required" type="text" value="<?php echo $user_name;?>" maxlength="15"/><?php echo '<p style="color:red">'.$user_nameErr.'</p>';?></td></tr>
									<tr><td>Designation <br>Company Name:<td> <input  name="company_name" type="text" class="form-control" placeholder="CEO, Example Inc" required="required" value="<?php echo $company_name;?>" maxlength="25"/><?php echo '<p style="color:red">'.$company_nameErr.'</p>';?></td></tr> 
									<tr><td>Feedback Content:</td><td><textarea   name="comment_section" class="form-control"  required="required"  rows="4" cols="50" value="<?php echo $comment_section;?>"><?php echo $comment_section; ?> </textarea><?php echo '<p style="color:red">'.$comment_sectionErr.'</p>';?>
									</td></tr>
										
									 <tr><td></td><td><input type="submit"  class="btn btn-success" value="Add Feedback"/> &nbsp;
									 
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

               
 
    
   


<?php }


include 'footer.php';
?>