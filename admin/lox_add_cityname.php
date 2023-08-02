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
	$city_name=$city_nameErr='';

	$city_name				= 	mysqli_real_escape_string($conn,($_REQUEST['city_name']));
	

//city_CATEGORY_OR_NAME	
  if (empty($_POST["city_name"])) {
    $city_nameErr = "City Name is Required";
  } 
	
//CHECKING FOR ERRORS IF THERE IS NOT ANY ERROR THAN THE FORM SHOULD BE SUBMITTED
if(empty($city_nameErr)) {
	//CHECKING FOR RECORD IF vechicle ALREADY EXISTED		
			$query			=	"select * from lox_cityname where cityname = '".$city_name."' ";
			$rs		    	=	mysqli_query($conn,$query) or die(mysqli_error());
			$row		    =	mysqli_fetch_array($rs);
			if($row>0){
				header("location:functions.php?exist_city=ok");
			}
			else{
			$query = "INSERT INTO lox_cityname (cityname) values('".$city_name."')";
			$rs=	mysqli_query($conn,$query) or die(mysqli_error());
			header("location:functions.php?add_city=ok");
			}
}
			
			
			
			
}
  

?>
<?php if($message_Err!=''){?>
<div align="center"  ><p><strong style="color:red; "><?php echo $message_Err?></strong></p> <br>			 </div>
	
	<?php }?>
	<?php if($message_success!=''){?>
	<div align="center"  ><p><strong style="color:green; "><?php echo $message_success?></strong></p> <br>	 </div>
	
	<?php }?>
		<div class="content mt-3">
					<div class="animated fadeIn">
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<strong class="card-title">Add New City Name</strong>
									</div>
									<div class="card-body">
										&nbsp;
										<form class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data"> 
										<table class="table table-bordered">
										
										
										<tr><td>City Name: <br><input   name="city_name" class="form-control" Placeholder="City Name" required="required" type="text" value="<?php echo $city_name;?>" maxlength="30"/><?php echo '<p style="color:red">'.$city_nameErr.'</p>';?></td>
										
											<tr>
											<td><input type="submit"  class="btn btn-success" value="Add City"/></td></tr>
										
										
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