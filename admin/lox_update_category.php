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

						$id 			= $_GET['id'];
						$query			=	"select * from category where id = $id  ";
						$rs		    	=	mysqli_query($conn,$query) or die(mysqli_error());
						$row		    =	mysqli_fetch_array($rs);
						$cat_name			= 	$row['cat_name'];
						
						


?>

<?php 


if (($_SERVER["REQUEST_METHOD"] == "POST") && ($_GET['id']!='')){
   
//Validation For vechicle Form
	$cat_name=$cat_nameErr='';
	
						$id 			= $_GET['id'];
						$query			=	"select * from category where id = $id  ";
						$rs		    	=	mysqli_query($conn,$query) or die(mysqli_error());
						$row		    =	mysqli_fetch_array($rs);
						$cat_name	= 	$_REQUEST['cat_name'];
						
						
//FUNCTION FOR CHECKING TEXT INPUT  
  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
//VEHICLE_CATEGORY_OR_NAME	
  if (empty($_POST["cat_name"])) {
    $cat_nameErr = "Category Name Is Required";
  } 

  
  if(empty($cat_nameErr)) {
  
			$query = "Update category SET cat_name='".$cat_name."' where id=$id";
			$rs	   =  mysqli_query($conn,$query) or die(mysqli_error());
			header("location:functions.php?update_category=ok"); 
		 	
        } 
  
  
  
  
}
	?> 


<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Update Category Name</strong>
                            </div>
                            <div class="card-body">
                                <form  method="POST" enctype="multipart/form-data"> 
									<table class="table table-bordered">
									<tr><td>Category Name: </td><td><input   name="cat_name" class="form-control" Placeholder="Category Name" type="text" value="<?php echo $cat_name;?>" /><?php echo '<p style="color:red">'.$cat_nameErr.'</p>';?></td></tr>
										<tr><td><input type="submit"  class="btn btn-success" value="Update Category Name"/></td><td></td></tr>
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