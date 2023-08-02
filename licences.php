<?php  session_start();
    if(!isset($_SESSION['user_id']) && ($_SESSION['role_id']!=2 || $_SESSION['role_id']!=3 || $_SESSION['role_id']!=4))
   {
    header("location:login.php");
   }
   else
   {
	   	
			include "header.php";
			include "config.php";
			include "settime.php";
		
	
            $image='';    
			$user_id 		= $_SESSION['user_id'];

        // Checking the record of the licence if its there already
        $query = "Select role_id From users Where id=$user_id";
        $rs		    	=	mysqli_query($conn,$query) or die(mysqli_error());
        $role_result    =	mysqli_fetch_array($rs);
        if($role_result[0]==1 || $role_result[0]==5 || $role_result[0]==6 )
        {
            header('location:passanger.php');
            exit;
        }


        // Checking the record of the licence if its there already
            $query = "Select * From licences Where user_id=$user_id";
            $rs		    	=	mysqli_query($conn,$query) or die(mysqli_error());
			$fetch_result    =	mysqli_fetch_array($rs);
            if($fetch_result>0)
            {
                $image="licences/".rawurlencode($fetch_result['image']);
            }
            

		
// Check if the form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Check if file was uploaded without errors
    if(isset($_FILES["anyfile"]) && $_FILES["anyfile"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["anyfile"]["name"];
        $filetype = $_FILES["anyfile"]["type"];
        $filesize = $_FILES["anyfile"]["size"];
    
        // Validate file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
    
        // Validate file size - 10MB maximum
        $maxsize = 2 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is limited to 2 MB.");
    
        // Validate type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            if(file_exists("licences/" . $filename)){
                $image_uploadErr= $filename . " is already exists.";
            } else{
                $temp = explode(".", $_FILES["anyfile"]["name"]);
                $newfilename = round(microtime(true)) . '.' . end($temp);
                if(move_uploaded_file($_FILES["anyfile"]["tmp_name"], "licences/" . $newfilename)){
                    $sql="INSERT INTO licences(user_id,image) VALUES('$user_id','$newfilename')";
                    
                    mysqli_query($conn,$sql);
                    $_SESSION['message_success']='<div class="alert alert-success">Your Document has been uploaded successfully.</div>';
                    header('location:licences.php');
                    exit;  
                }else{
                    $image_uploadErr= "File is not uploaded";
                }
                
            } 
        } else{
            $image_uploadErr= "Error: There was a problem uploading your file. Please try again."; 
        }
    } else{
        $image_uploadErr= "Error: " . $_FILES["anyfile"]["error"];
    }
}
?>

<style>
.rn-section {
    padding: 30px 0 50px;
}

.rn-page-title {
    position: relative;
    padding-top: 140px;
    padding-bottom: 0px;
}

.login-button {
    padding-top: 10px;
}

.forget-link {
    padding-top: 10px;
    color: black;
}

a {
    color: #232425;
}
</style>
<!-- Page Title-->
<div class="rn-page-title">
    <div class="rn-pt-overlayer"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="rn-page-title-inner">
                    <h1><?php echo $licence_title;?></h1>
                    <?php if(empty($image)){?>
                    <p><?php echo $licence_content?></p>
                    <?php }?>
                    <?php if(!empty($image)){?>
                    <p><?php echo $licence_error?></p>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Page Title-->
<!-- Page Content-->
<section class="rn-section">
    <div class="container">


        <!-- Full Name-->
        <div class="row">
            <div class="col-md-4">

                <?php if(empty($image)){ ?>
                <img class="img-fluid" src="" alt="" srcset="licences/sample.jpeg 1x, licences/sample.jpeg 1x" />
                <?php }
                
                ?>




            </div>

            <div class="col-md-4">
                <?php include "msg_session.php";?>


                <?php if(!empty($image)){?>

                <img class="img-fluid" src="" alt="" srcset="<?php echo $image;?> 1x, <?php echo $image;?> 1x" />
                <?php } else{?>


                <!-- On User Type Different Forms Will be Shown To Customer !-->
                <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST" enctype="multipart/form-data">


                    <!-- Additional Fields required in usertype for PD LD CPD CPR CPL !-->

                    <div class="input-group">

                        <input type="file" name="anyfile" id="anyfile">
                        <?php if(!empty($image_uploadErr)){echo '<p style="color:red">'.$image_uploadErr.'</p>';}?>

                    </div>



                    <div class="input-group text-right login-button">
                        <input class="btn btn-success  btn-shadow" type="submit" value="Upload" name="register">
                    </div>
                </form>


            </div>
            <?php }?>
            <div class="col-md-4">
            </div>

        </div>

    </div>
</section>
<!-- End Page Content-->
<?php include "footer.php";}?>