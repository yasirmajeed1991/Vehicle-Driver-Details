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
	$faq_question = $faq_answer="";
	$faq_questionErr = $faq_answerErr="";
	$faq_question = mysqli_real_escape_string($conn,($_REQUEST['faq_question']));
    $faq_answer=mysqli_real_escape_string($conn,($_REQUEST['faq_answer'])); 
    
		
//faq_question	
  if (empty($_POST["faq_question"])) {
    $faq_questionErr = "This field is required";
  } else {
    $faq_question = test_input(mysqli_real_escape_string($conn,($_POST["faq_question"])));
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-'0-9 ]*$/",$faq_question)) {
      $faq_questionErr = "This Field Only Contains letters,numbers and whitespaces";
    }
	if ((strlen($faq_question)< 6) || (strlen($faq_question) > 2000)){
		$faq_questionErr = "This field Must be greater than 6 and less than 2000 Characters";	
		}
	
	  }
	 //faq_question	
  if (empty($_POST["faq_answer"])) {
    $faq_answerErr = "This field is required";
  } else {
    $faq_answer = test_input(mysqli_real_escape_string($conn,($_POST["faq_answer"])));
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-'0-9 ]*$/",$faq_answer)) {
      $faq_answerErr = "This Field Only Contains letters,numbers and whitespaces";
    }
	if ((strlen($faq_answer)< 6) || (strlen($faq_answer) > 2000)){
		$faq_answerErr = "Username Must be greater than 6 and less than 2000 Characters";	
		}
	  }
//CHECKING FOR ERRORS IF THERE IS NOT ANY ERROR THAN THE FORM SHOULD BE SUBMITTED
			if(empty($faq_questionErr) && empty($faq_answerErr)){
			//CHECKING FOR RECORD IF ALREADY EXISTED		
			$query			=	"select * from lox_faq where ((faq_question='$faq_question')  || (faq_answer='$faq_answer')) ";
			$rs		    	=	mysqli_query($conn,$query) or die(mysqli_error());
			$row		    =	mysqli_fetch_array($rs);
			if($row>0){
				header("location:functions.php?exist_faq=ok");
			}	
			else{	
					
			$query = "INSERT INTO lox_faq (faq_question,faq_answer) values('".$faq_question."','".$faq_answer."')";
			$rs=	mysqli_query($conn,$query) or die(mysqli_error());
			header("location:functions.php?add_faq=ok");
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
                                <strong class="card-title">Add New Faq</strong>
                            </div>
                            <div class="card-body">
                                &nbsp;
									<form class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data"> 
									<table class="table table-striped">
									<tr><td>Faq Question:</td><td><textarea   name="faq_question" required class="form-control"  required="required"  rows="4" cols="50" value="<?php echo $faq_question;?>"><?php echo $faq_question; ?> </textarea><?php echo '<p style="color:red">'.$faq_questionErr.'</p>';?>
									</td></tr>
								   <tr><td>Faq Answer:</td><td><textarea   name="faq_answer"  required class="form-control"  required="required"  rows="4" cols="50" value="<?php echo $faq_answer;?>"><?php echo $faq_answer; ?> </textarea><?php echo '<p style="color:red">'.$faq_answerErr.'</p>';?>
									</td></tr>
										
									 <tr><td></td><td><input type="submit"  class="btn btn-success" value="Add Faq"/> &nbsp;
									 
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