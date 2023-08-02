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
//WHEN USER CLICK FROM web VIEW THE ID OF THE CLICKED USERNAME ALONG DATA WILL BE PASSED TO SHOW IN UPDATE FORM FIELDS
if($_SESSION['id']!='')
{
						$query					=	"select * from settings where id = 1  ";
						$rs		    			=	mysqli_query($conn,$query) or die(mysqli_error());
						$row		  			=	mysqli_fetch_array($rs);
						$web_site_title			= 	$row['title'];
						$web_site_email			=	$row['email'];
						$face_book_link			=	$row['facebook'];
						$twitter_link			=	$row['twitter'];
						$instagram_link			=	$row['instagram'];
						$web_location_address	=	$row['site_address'];
						$web_phone_no			=	$row['phone_no'];
						$web_mobile_no			=	$row['mobile_no'];
						$currency_symbol			=	$row['currency'];
						$fileToUpload			=	$row['logo'];
						$fileToUpload1       	=	$row['favicon'];
				
}
?>

<?php 


if(isset($_REQUEST['update_settings']))
{
   
                        //Validation For web Form
						$query					=	"select * from settings where id = 1  ";
						$rs		    			=	mysqli_query($conn,$query) or die(mysqli_error());
						$row		  			=	mysqli_fetch_array($rs);
						$file_not_uploaded		=	$row['logo'];
						$favicon        		=	$row['favicon'];
						$web_site_title			= 	$_REQUEST['title'];
						$web_site_email			=	$_REQUEST['email'];
						$face_book_link			=	$_REQUEST['facebook'];
						$twitter_link			=	$_REQUEST['twitter'];
						$instagram_link			=	$_REQUEST['instagram'];
						$web_location_address	=	$_REQUEST['site_address'];
						$web_phone_no			=	$_REQUEST['phone_no'];
						$web_mobile_no			=	$_REQUEST['mobile_no'];
						$fileToUpload			=	$_REQUEST['fileToUpload'];
						$currency_symbol		=	$_REQUEST['currency'];					
	
                        //CAR_IMAGE_UPLOAD_UPDATE
                        //CAR_IMAGE_UPLOAD
                    
                            $newfilename='';	//CHECKED FOR NEW FILE UPLOADED OR NOT
                            $newfilename=basename($_FILES["fileToUpload"]["name"]);
                            if(!empty($newfilename))
                            {
                                $target_dir = "../uploads/";  //Where the file is going to be placed
                                $fileToUpload = rand(10,100000). basename($_FILES["fileToUpload"]["name"]);
                                $target_file = $target_dir . $fileToUpload;     //Path of the file to be uploaded
                                $uploadOk = 1;
                                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                                
                                       $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                                      if($check !== false) 
                                      {
                                       echo  "File is an image - " . $check["mime"] . ".";
                                        $uploadOk = 1;
                                      } else 
                                      {
                                         $image_uploadErr= "File is not an image.";
                                        $uploadOk = 0;
                                      }
                                    // Check if file already exists
                                    if (file_exists($target_file)) 
                                    {
                                      $image_uploadErr= "Sorry, file already exists.";
                                      $uploadOk = 0;
                                    }
                                
                                    // Check file size
                                    if ($_FILES["fileToUpload"]["size"] > 500000) 
                                    {
                                      $image_uploadErr= "Sorry, your file is too large.";
                                      $uploadOk = 0;
                                    }
                                
                                    // Allow certain file formats
                                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                                    && $imageFileType != "gif" ) 
                                    {
                                      $image_uploadErr="Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                                      $uploadOk = 0;
                                    }
                                
                                    // Check if $uploadOk is set to 0 by an error
                                    if ($uploadOk == 0) 
                                    {
                                          $image_uploadErr= "Sorry, your file was not uploaded.";
                                        // if everything is ok, try to upload file
                                    } 
                                    else 
                                    {
                                         //NOTHING TO BE CHECKED ITS ADMIN WILL TO INCLUDE OR NOT INCLUDE CHECK FORM
                            	         if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
                            	         {
                            	    	    //echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                                	    	$imageUrl = $_DIR_.'../uploads/'.$file_not_uploaded;
                        		            //check if image exists
                                	    	if(file_exists($imageUrl))
                                	    	{
                                	    	    //delete the image
                                		        unlink($imageUrl);
                            	    	    }
                            		    }	
                                    }     
                            }	
                            else 
                            {
                            	
                            	    $fileToUpload = 	$file_not_uploaded;
                            	
                            }
                           
                            		
		$query = "update settings set title='".mysqli_real_escape_string($conn,$web_site_title)."',email='".mysqli_real_escape_string($conn,$web_site_email)."',facebook='".mysqli_real_escape_string($conn,$face_book_link)."',twitter='".mysqli_real_escape_string($conn,$twitter_link)."',instagram='".mysqli_real_escape_string($conn,$instagram_link)."',site_address='".mysqli_real_escape_string($conn,$web_location_address)."',phone_no='".mysqli_real_escape_string($conn,$web_phone_no)."',mobile_no='".mysqli_real_escape_string($conn,$web_mobile_no)."',logo='".mysqli_real_escape_string($conn,$fileToUpload)."',currency='".mysqli_real_escape_string($conn,$currency_symbol)."' 		 where id=1";
		$rs		    	=	mysqli_query($conn,$query) or die(mysqli_error());
	    header("location:functions.php?update_setting=ok"); 
}  
	    /*---------------------IMAGE UPDATING For Favicon------------------------------------------------------------*/
      if(isset($_REQUEST['change_favicon'])) 
      {
            $query          = "select * from settings where id = 1  ";
            $rs             = mysqli_query($conn,$query) or die(mysqli_error());
            $row            = mysqli_fetch_array($rs);
             $fileToUpload22      = $row['favicon'];
            // Set image placement folder
              $target_dir = "../uploads/";
              // Get file path
              $filename = rand(10,100000). basename($_FILES["fileToUpload1"]["name"]);
              $fileToUpload1 = $target_dir . $filename;     //Path of the file to be uploaded
              // Get file extension
              $imageExt = strtolower(pathinfo($fileToUpload1, PATHINFO_EXTENSION));
              // Allowed file types
              $allowd_file_ext = array("jpg", "jpeg", "png");
               if (!in_array($imageExt, $allowd_file_ext)) 
              {
                $fileToUploadErr1 = "Allowed file formats .jpg, .jpeg and .png.";
                          
              } 
              else if ($_FILES["fileToUpload1"]["size"] > 2097152) 
              {
                $fileToUploadErr1 =  "File is too large. File size should be less than 2 megabytes.";
              } 
               
              else 
              {
                move_uploaded_file($_FILES["fileToUpload1"]["tmp_name"], $fileToUpload1);
                $imageUrl = $fileToUpload22;
                    //check if image exists
                    if(file_exists($imageUrl))
                    {
                    //delete the image
                    unlink($imageUrl);
                    }
                    echo  $query = "update settings set favicon='$fileToUpload1' where id=1";
                     $rs         = mysqli_query($conn,$query) or die(mysqli_error());
                       header("location:functions.php?update_setting=ok");
              }

              
      }
     

	

	?> 
		<div class="content mt-3">
				<div class="animated fadeIn">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<strong class="card-title">Update Website Settings</strong>
								</div>
								<div class="card-body">
								<form  method="POST" enctype="multipart/form-data"> 
								
								<div class="form-group">
                                    <label for="exampleFormControlInput1">Site Title</label>
                                    <input   name="title" class="form-control" Placeholder="Site Title" type="text" value="<?php echo $web_site_title;?>" />
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Site Contact Email</label>
                                   <input Placeholder="Site Email" type="email" name="email" class="form-control"  type="email" value="<?php echo $web_site_email;?>" />
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Facebook Link</label>
                                    <input  Placeholder="Facebook Profile Link" name="facebook"  class="form-control" type="url" value="<?php echo $face_book_link;?>" />
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Twitter Link</label>
                                   <input  Placeholder="Twitter Profile Link" name="twitter" class="form-control" type="url" value="<?php echo $twitter_link;?>" />
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Instagram Link</label>
                                    <input   Placeholder="Instagram Profile Link" name="instagram" type="url" class="form-control"  value="<?php echo $instagram_link;?>" />
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Address Of Company</label>
                                    <input   Placeholder="Address Of Company" name="site_address" class="form-control"  type="text" value="<?php echo $web_location_address;?>" />
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Phone No.</label>
                                    <input   Placeholder="Phone No." name="phone_no" class="form-control"  type="text" value="<?php echo $web_phone_no;?>" />
                                </div>
                                 <div class="form-group">
                                    <label for="exampleFormControlInput1">Mobile No.</label>
                                    <input   Placeholder="Mobile No." name="mobile_no" class="form-control"  type="text" value="<?php echo $web_mobile_no;?>" />
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Currency Symbol</label>
                                    <input   Placeholder="Currency Symbol " name="currency" type="text" class="form-control"  value="<?php echo $currency_symbol;?>" />
                                </div>
								 <div class="form-inline">
                                    <label for="exampleFormControlInput1">Site Logo</label>
                                    <input type="file" name="fileToUpload"><img src="<?php echo '../uploads/'.$fileToUpload.'';?>" style="height:200px;width:200px;" /> <?php echo '<p style="color:red">'.$image_uploadErr.'</p>';?>
                                </div>
									<input type="submit" name="update_settings" class="btn btn-success" value="Update web"/>
								</form>
								<form  method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                      <label for="exampleFormControlFile1">Change Favicon</label>
                                     <input type="file" name="fileToUpload1"  ><img src="<?php echo $fileToUpload1;?>" style="height:150px;width:150px;" />
                                     <?php echo '<p style="color:red">'.$image_uploadErr1.'</p>';?>
                                    </div>
                                    <div class="form-group">
                                     <input type="submit"  class="btn btn-success" name="change_favicon" value="Change Favicon"/>
                                    </div>
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