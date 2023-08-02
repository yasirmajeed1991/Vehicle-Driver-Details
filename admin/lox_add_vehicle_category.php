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
//Validation For vechicle Form
	$vechicle_name=$vechicle_nameErr='';

	$vechicle_name				= 	$_REQUEST['vechicle_name'];
	

//VEHICLE_CATEGORY_OR_NAME	
  if (empty($_POST["vechicle_name"])) {
    $vechicle_nameErr = "vechicle Full Name is required";
  } else {
    $vechicle_name = test_input($_POST["vechicle_name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z]*$/",$vechicle_name)) {
      $vechicle_nameErr = "Vehicle Type Only Contains letters Without White Spaces";
    }
	if ((strlen($vechicle_name)< 3) || (strlen($vechicle_name) > 30)){
		$vechicle_nameErr = "vechicle Full Name Must be greater than 3 and less than 30 Characters";	
		}
  }
	
//CHECKING FOR ERRORS IF THERE IS NOT ANY ERROR THAN THE FORM SHOULD BE SUBMITTED
if(empty($vechicle_nameErr)) {
	//CHECKING FOR RECORD IF vechicle ALREADY EXISTED		
			$query			=	"select * from lox_vehicle_category where vehicle_category = '$vechicle_name' ";
			$rs		    	=	mysqli_query($conn,$query) or die(mysqli_error());
			$row		    =	mysqli_fetch_array($rs);
			if($row>0){
				header("location:functions.php?exist_vehicle_category=ok");
			}
			else{
						
			$query = "INSERT INTO lox_vehicle_category (vehicle_category) 
			values('".mysqli_real_escape_string($conn,$vechicle_name)."')";
			$rs=	mysqli_query($conn,$query) or die(mysqli_error());
				
			header("location:functions.php?add_vehicle_category=ok");
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
                                <strong class="card-title">Dashboard</strong>
                            </div>
                            <div class="card-body">
                              &nbsp;
								<form class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data"> 
									<table class="table table-bordered">
										<tr><td>Add Vehicle Type: <br><input   name="vechicle_name" class="form-control" Placeholder="Vehicle Category" required="required" type="text" value="<?php echo $vechicle_name;?>" maxlength="30"/><?php echo '<p style="color:red">'.$vechicle_nameErr.'</p>';?></td>
										<tr>
											<td><input type="submit"  class="btn btn-success" value="Add Category"/></td></tr>
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