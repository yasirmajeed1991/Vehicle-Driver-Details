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
//WHEN USER CLICK FROM vechicle VIEW THE ID OF THE CLICKED USERNAME ALONG DATA WILL BE PASSED TO SHOW IN UPDATE FORM FIELDS
if(($_GET['id']!='') && ($_SERVER["REQUEST_METHOD"] != "POST")){
						$id 			= $_GET['id'];
						$query			=	"select * from lox_vehicle_category where id = $id  ";
						$rs		    	=	mysqli_query($conn,$query) or die(mysqli_error());
						$row		    =	mysqli_fetch_array($rs);
						$vehicle_name			= 	$row['vehicle_category'];
						
						

}
?>

<?php 


if (($_SERVER["REQUEST_METHOD"] == "POST") && ($_GET['id']!='')){
   
//Validation For vechicle Form
	$vehicle_name=$vehicle_nameErr='';
	
						$id 			= $_GET['id'];
						$query			=	"select * from lox_vehicle_category where id = $id  ";
						$rs		    	=	mysqli_query($conn,$query) or die(mysqli_error());
						$row		    =	mysqli_fetch_array($rs);
						$vehicle_name	= 	$_REQUEST['vehicle_name'];
						
						
//FUNCTION FOR CHECKING TEXT INPUT  
  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
//VEHICLE_CATEGORY_OR_NAME	
  if (empty($_POST["vehicle_name"])) {
    $vehicle_nameErr = "Category Type Is Required";
  } else {
    $vehicle_name = test_input($_POST["vehicle_name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-']*$/",$vehicle_name)) {
  //    $vehicle_nameErr = "Category Type Only Contains letters Without White Spaces";
    }
	if ((strlen($vehicle_name) <4) || (strlen($vehicle_name) > 30)){
	//	$vehicle_nameErr = "Category Must be greater than 3 and less than 30 Characters";	
		}
  }

  
  if(empty($vehicle_nameErr)) {
  
			$query = "Update lox_vehicle_category SET vehicle_category='".mysqli_real_escape_string($conn,$vehicle_name)."' where id=$id";
			$rs	   =  mysqli_query($conn,$query) or die(mysqli_error());
	      header("location:functions.php?update_vehicle_category=ok"); 
		 	
        } 
  
  
  
  
}
	?> 


			<div class="content mt-3">
				<div class="animated fadeIn">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<strong class="card-title">Update Vehicle Category</strong>
								</div>
								<div class="card-body">
									<form class="form-inline" method="POST" enctype="multipart/form-data"> 
										<table class="table table-bordered">
										<tr><td>Vehicle Category: <br><input   name="vehicle_name" class="form-control" Placeholder="Category Name" type="text" value="<?php echo $vehicle_name;?>" /><?php echo '<p style="color:red">'.$vehicle_nameErr.'</p>';?></td>
											<tr><td><input type="submit"  class="btn btn-success" value="Update Category"/></td></tr>
										</table>
									 </form>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div> 

                

	
	
	
	
	
	
	
   <?php  }

include 'footer.php';
?>