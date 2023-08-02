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
						$query			=	"select * from lox_cityname where id = $id  ";
						$rs		    	=	mysqli_query($conn,$query) or die(mysqli_error());
						$row		    =	mysqli_fetch_array($rs);
						$city_name			= 	$row['cityname'];
						
						

}
?>

<?php 


if (($_SERVER["REQUEST_METHOD"] == "POST") && ($_GET['id']!='')){
   
//Validation For vechicle Form
	$city_name=$city_nameErr='';
	
						$id 			= $_GET['id'];
						$query			=	"select * from lox_cityname where id = $id  ";
						$rs		    	=	mysqli_query($conn,$query) or die(mysqli_error());
						$row		    =	mysqli_fetch_array($rs);
						$city_name	= 	$_REQUEST['city_name'];
						
						
//FUNCTION FOR CHECKING TEXT INPUT  
  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
//VEHICLE_CATEGORY_OR_NAME	
  if (empty($_POST["city_name"])) {
    $city_nameErr = "City Name Is Required";
  } else {
    $city_name = test_input($_POST["city_name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$city_name)) {
   //   $city_nameErr = "City Name Contains letters and White Spaces";
    }
	if ((strlen($city_name) <4) || (strlen($city_name) > 30)){
	//	$city_nameErr = "City Name Must be greater than 3 and less than 30 Characters";	
		}
  }

  
  if(empty($city_nameErr)) {
  
			$query = "Update lox_cityname SET cityname='$city_name' where id=$id";
			$rs	   =  mysqli_query($conn,$query) or die(mysqli_error());
			header("location:functions.php?update_city=ok"); 
		 	
        } 
  
  
  
  
}
	?> 


<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Update City Name</strong>
                            </div>
                            <div class="card-body">
                                <form class="form-inline" method="POST" enctype="multipart/form-data"> 
									<table class="table table-bordered">
									<tr><td>City Name: <br><input   name="city_name" class="form-control" Placeholder="City Name" type="text" value="<?php echo $city_name;?>" /><?php echo '<p style="color:red">'.$city_nameErr.'</p>';?></td>
										<tr><td><input type="submit"  class="btn btn-success" value="Update City Name"/></td></tr>
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