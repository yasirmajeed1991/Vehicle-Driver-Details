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
		if ((strlen($news_title) <8) || (strlen($news_title) > 100)){
		$news_titleErr = "This Field must be greater than 8 character and less than 100 ";	
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
//CAR_IMAGE_UPLOAD
$target_dir = "../uploads/news/";  //Where the file is going to be placed
$filename = rand(10,100000). basename($_FILES["fileToUpload"]["name"]);
$target_file = $target_dir . $filename;     //Path of the file to be uploaded
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
if ($_FILES["fileToUpload"]["size"] > 5000000) {
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
}



//CHECKING FOR ERRORS IF THERE IS NOT ANY ERROR THAN THE FORM SHOULD BE SUBMITTED
			if(empty($news_dateErr) && empty($news_titleErr) && empty($news_contentErr) && empty($image_uploadErr)){
			move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
			
			$query = "INSERT INTO lox_news (date,news_title,news_content,news_picture) values('".mysqli_real_escape_string($conn,$news_date)."','".mysqli_real_escape_string($conn,$news_title)."','".mysqli_real_escape_string($conn,$news_content)."','".mysqli_real_escape_string($conn,$filename)."')";
			$rs=	mysqli_query($conn,$query) or die(mysqli_error());
				
			header("location:functions.php?add_news=ok");
			
			}
			
}

?>

<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Add News</strong>
                            </div>
                            <div class="card-body">
                                &nbsp;
									<form class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data"> 
										<table class="table table-striped">
											<tr><td>Published Date:</td><td><input   name="news_date" class="form-control" required="required" type="date" value="<?php echo $news_date;?>" /><?php echo '<p style="color:red">'.$news_dateErr.'</p>';?></td></tr>
											<tr><td>News Title:<td> <input  name="news_title" type="text" class="form-control" placeholder="Title Must be Short" required="required" value="<?php echo $news_title;?>" maxlength="25"/><?php echo '<p style="color:red">'.$news_titleErr.'</p>';?></td></tr> 
											<tr><td>News Content:</td><td><textarea   name="news_content" class="form-control"  required="required"  rows="4" cols="50" value="<?php echo $news_content;?>"><?php echo $news_content; ?> </textarea><?php echo '<p style="color:red">'.$news_contentErr.'</p>';?>
											</td></tr>
											<tr><td>News Image:</td><td> <input type="file" required name="fileToUpload" id="fileToUpload"> <?php echo '<p style="color:red">'.$image_uploadErr.'</p>';?></td>
											</td></tr>    
											<tr><td></td><td><input type="submit"  class="btn btn-success" value="Add News"/> &nbsp;
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