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
						$query			=	"select * from lox_news where id = $id  ";
						$rs		    	=	mysqli_query($conn,$query) or die(mysqli_error());
						$row		    =	mysqli_fetch_array($rs);
						$news_title		=	$row['news_title'];
						$news_content	=	$row['news_content'];
						$news_picture	=	$row['news_picture'];
						
}
if (($_SERVER["REQUEST_METHOD"] == "POST") && ($_GET['id']!='')){
	$news_title=$news_content="";
	$news_titleErr=$news_contentErr='';
						$id 			= 	$_GET['id'];
						$query			=	"select * from lox_news where id = $id  ";
						$rs		    	=	mysqli_query($conn,$query) or die(mysqli_error());
						$row		    =	mysqli_fetch_array($rs);
						$news_title		=	$_REQUEST['news_title'];
						$news_content	=	$_REQUEST['news_content'];
						$news_picture	=	$_REQUEST['news_picture'];
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
	$news_date = $news_title=$news_content="";
	$news_dateErr=$news_titleErr=$news_contentErr='';
	$news_date = $_REQUEST['news_date'];
    $news_title=$_REQUEST['news_title']; 
    $news_content=$_REQUEST['news_content'];
		
//NEWS_DATE	
  if (empty($_POST["news_date"])) {
    $news_dateErr = "This field is required";
  } else {
    $news_date = test_input($_POST["news_date"]);
    if ((strlen($news_date)< 6) || (strlen($news_date) > 35)){
		$news_dateErr = "This field must be greater than 6 and less than 35 Characters";	
		}
	if (ctype_space($news_date)){
		$news_dateErr = "This field must without spaces";	
		}
	  }
//news_title 
if (empty($_POST["news_title"])) {
    $news_titleErr = "This field is required";
  } else {
		if ((strlen($news_title) <8) || (strlen($news_title) > 60)){
		$news_titleErr = "This Field must be greater than 8 character and less than 60 ";	
		}
	  }
//news_content
if (empty($_POST["news_content"])) {
    $news_contentErr = "This Field is required";
  } else {
		if ((strlen($news_content) <8) || (strlen($news_content) > 1000)){
		$news_contentErr = "This Field must be greater than 8 character and less than 35 ";	
		}
	  }	  
//NEWS_IMAGE_UPLOAD_UPDATE
//NEWS_IMAGE_UPLOAD
$newfilename='';	//CHECKED FOR NEW FILE UPLOADED OR NOT
$newfilename=basename($_FILES["fileToUpload"]["name"]);
if(!empty($newfilename)){
$target_dir = "../uploads/news/";  //Where the file is going to be placed
$news_picture = rand(10,100000). basename($_FILES["fileToUpload"]["name"]);
$target_file = $target_dir . $news_picture;     //Path of the file to be uploaded
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
   echo  "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
     $image_uploadErr= "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  $image_uploadErr= "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  $image_uploadErr= "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  $image_uploadErr="Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  $image_uploadErr= "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
if ($uploadOk == 1){
	$uploadOk == 2;
}	

}     
}	
else {
	
	$news_picture = $news_picture;
	
}
//CHECKING FOR ERRORS IF THERE IS NO ERROR THAN THE FORM SHOULD BE SUBMITTED

if(empty($news_titleErr) && empty($news_contentErr) &&  empty($image_uploadErr)){
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		//			echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
			$imageUrl = $_DIR_.'uploads/news/'.$row['car_picture'];
			//check if image exists
		if(file_exists($imageUrl)){
		//delete the image
		unlink($imageUrl);
		}
		}
		$query = "update lox_news set news_title='".mysqli_real_escape_string($conn,$news_title)."',news_content='".mysqli_real_escape_string($conn,$news_content)."',news_picture='".mysqli_real_escape_string($conn,$news_picture)."' where id='$id'";
		$rs		    	=	mysqli_query($conn,$query) or die(mysqli_error());
		header("location:functions.php?update_news=ok"); 
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
									<strong class="card-title">Update News</strong>
								</div>
								<div class="card-body">
									  <form class="form-inline"  method="POST" enctype="multipart/form-data"> 
											<table class="table table-striped">
											<tr><td>News Title:<td> <input  name="news_title" type="text" class="form-control" placeholder="Title Must be Short" required="required" value="<?php echo $news_title;?>" maxlength="25"/><?php echo '<p style="color:red">'.$news_titleErr.'</p>';?></td></tr> 
											<tr><td>News Content:</td><td><textarea   name="news_content" class="form-control"  required="required"  rows="4" cols="50" value="<?php echo $news_content;?>"><?php echo $news_content; ?> </textarea><?php echo '<p style="color:red">'.$news_contentErr.'</p>';?>
											</td></tr>
											<tr><td>News Image:</td><td> <input type="file" required name="fileToUpload" id="fileToUpload" ><img src="<?php echo '../uploads/news/'.$news_picture.'';?>" style="height:200px;width:400px;" /> <?php echo '<p style="color:red">'.$image_uploadErr.'</p>';?></td>
											</td></tr>    
											 
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