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
						$query			=	"select * from lox_feedback where id = $id  ";
						$rs		    	=	mysqli_query($conn,$query) or die(mysqli_error());
						$row		    =	mysqli_fetch_array($rs);
						$user_name		= 	$row['username'];
						$company_name	=	$row['company'];
						$comment_section=	$row['content'];
						$feedback_status=	$row['status'];
						
}
if (($_SERVER["REQUEST_METHOD"] == "POST") && ($_GET['id']!='')){
	$user_name = $company_name=$comment_section="";
	$user_nameErr=$company_nameErr=$comment_sectionErr='';
						
						$id 			= 	$_GET['id'];
						$query			=	"select * from lox_feedback where id = $id  ";
						$rs		    	=	mysqli_query($conn,$query) or die(mysqli_error());
						$row		    =	mysqli_fetch_array($rs);
						$user_name		= 	$row['username'];
						$company_name	=	$row['company'];
						$comment_section=	$row['content'];	
						$feedback_status=	$_REQUEST['feedback_status'];
						


//FEEDBACK_STATUS 
if (empty($_POST["feedback_status"])) {
    $feedback_statusErr = "This field is required";
  } else {
		if ((strlen($feedback_status) <5) || (strlen($feedback_status) > 15)){
		$feedback_statusErr = "This Field must be greater than 5 character and less than 15 ";	
		}
	  }
if($feedback_status=="Active"){
	$msg = '<div align="center"  ><p><strong style="color:green; ">Feedback Is Live Now and is activated Successfully!</strong></p> <br>		
		 </div>';
}
if($feedback_status=="Inactive"){
	$msg = '<div align="center"  ><p><strong style="color:red; ">Feedback Has Been Deactivated Successfully and Removed From Front End!</strong></p> <br>		
		 </div>';
}
//CHECKING FOR ERRORS IF THERE IS NO ERROR THAN THE FORM SHOULD BE SUBMITTED
if(empty($feedback_statusErr)){
        
		$query = "update lox_feedback set status='".mysqli_real_escape_string($conn,$feedback_status)."' where id='$id'";
		$rs		    	=	mysqli_query($conn,$query) or die(mysqli_error());
		header("location:functions.php?update_feedback=ok");
        } 
	
}

?>
<div class="content mt-3">
				<div class="animated fadeIn">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<strong class="card-title">Update Feedback</strong>
								</div>
								<div class="card-body">
									<form class="form-inline"  method="POST" enctype="multipart/form-data"> 
											<table class="table table-striped">
										 
											<tr><td>Name:</td><td><input   name="user_name" class="form-control" required="required" type="text" value="<?php echo $user_name;?>" maxlength="15"/><?php echo '<p style="color:red">'.$user_nameErr.'</p>';?></td></tr>
											<tr><td>Designation <br>Company Name:<td> <input  name="company_name" type="text" class="form-control" placeholder="CEO, Example Inc" required="required" value="<?php echo $company_name;?>" /><?php echo '<p style="color:red">'.$company_nameErr.'</p>';?></td></tr> 
											<tr><td>Feedback Content:</td><td><textarea   name="comment_section" class="form-control"  required="required"  rows="4" cols="50" value="<?php echo $comment_section;?>"><?php echo $comment_section; ?> </textarea><?php echo '<p style="color:red">'.$comment_sectionErr.'</p>';?>
											</td></tr>
											
											<td>Feedback Status:<td> <select name="feedback_status" class="form-control" >
												
												<option value="Active" <?php if ($feedback_status=='Active') echo 'selected';?>>Active</option>
												<option value="Inactive" <?php if ($feedback_status=='Inactive') echo 'selected';?>>Inactive</option>
												 </select> <?php echo '<p style="color:red">'.$feedback_statusErr.'</p>';?></td>
											
											
											
											
											</tr>	
											 
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