<?php  session_start();
    if(!isset($_SESSION['user_id']))
   {
    header("location:login.php");
   }
   else
   {
	   	if($_SESSION['name']!="passanger")
		{
		header("location:login.php");
		}
		else
		{	
			include "header.php";
			include "config.php";
			include "settime.php";
		//Public Variable declartion for Passanger Registration
				$name=$mobile=$email=$cityname=$address=$age=$gender=$profession=$income=$lox_use=$user_type=$id_pn=$driver_ln=$vehcile_type=$dept_date=$dept_time=$destination=$route_via=$stage=$space_available=$license_plate_no=$load_desc=$pickup_date=$pickup_time=$deliver_date=$delivery_time=$delivery_desitnation='';	
				 			
				$nameErr=$mobileErr=$emailErr=$citynameErr=$addressErr=$ageErr=$genderErr=$professionErr=$incomeErr=$lox_useErr=$id_pnErr=$driver_lnErr=$vehcile_typeErr=$dept_dateErr=$dept_timeErr=$destinationErr=$route_viaErr=$stageErr=$space_availableErr=$license_plate_noErr=$load_descErr=$pickup_dateErr=$pickup_timeErr=$deliver_dateErr=$delivery_timeErr=$delivery_desitnationErr='';				
								

			$user_id 		= $_SESSION['user_id'];
			$query 			= "SELECT * FROM users WHERE id=$user_id";
			$rs		    	=	mysqli_query($conn,$query) or die(mysqli_error());
			$user_result    =	mysqli_fetch_array($rs);		
		
			//Passanger
			$user_type 			=   $user_result['role_id'];
			$name 				=	$user_result['name'];
			$mobile 			=	$user_result['mobile'];
			$cityname 			=	$user_result['cityname'];
			$age 				=	$user_result['age'];
			$gender 			=	$user_result['gender'];
			$address 			=	$user_result['address'];    	//not in other sections,
			$profession 		=	$user_result['profession']; 	//not in other sections,
			$income 			=	$user_result['income']; 		//not in other sections,
			$lox_use 			=	$user_result['lox_use']; 		//not in other sections,
			
			$picture 			=	$user_result['picture']; 
			$id_pn              =   $user_result['id_pn'];
			$driver_ln 			=   $user_result['driver_ln'];
 			$vehcile_type 		=   $user_result['vehcile_type'];	
			$dept_date 			=   $user_result['dept_date'];
			$dept_time 			=   $user_result['dept_time'];
			$destination 		=   $user_result['destination'];
			$route_via 			=   $user_result['route_via'];
			$stage 				=   $user_result['stage'];
			$space_available 	=   $user_result['space_available'];
			$license_plate_no 	=   $user_result['license_plate_no'];
			$load_desc 			=   $user_result['load_desc'];	
			$pickup_date 		=   $user_result['pickup_date'];
			$pickup_time 		=   $user_result['pickup_time'];
			$deliver_date 		=   $user_result['deliver_date'];
			$delivery_time 		=   $user_result['delivery_time'];
			$delivery_desitnation 	=   $user_result['delivery_desitnation'];
			$old_date_updated 	=   $user_result['date_updated'];
			$old_user_type 			= $user_result['role_id'];


				if (isset($_POST['user_type']))
				{
					$user_type = $_POST['user_type'];
				}
				


				if (isset($_POST['register'])) 
				{

					$name 				=	$_POST['name'];
					$mobile 			=	$_POST['mobile'];
					$cityname 			=	$_POST['cityname'];
					$age 				=	$_POST['age'];
					$gender 			=	$_POST['gender'];
					$address 			=	$_POST['address'];    	
					$profession 		=	$_POST['profession']; 	
					$income 			=	$_POST['income']; 		
					$lox_use 			=	$_POST['lox_use']; 		
					$user_type 			=	$_POST['user_type'];
					$id_pn              =   $_POST['id_pn'];
					$driver_ln 			=   $_POST['driver_ln'];
		 			$vehcile_type 		=   $_POST['vehcile_type'];	
					$dept_date 			=   $_POST['dept_date'];
					$dept_time 			=   $_POST['dept_time'];
					$destination 		=   $_POST['destination'];
					$route_via 			=   $_POST['route_via'];
					$stage 				=   $_POST['stage'];
					$space_available 	=   $_POST['space_available'];
					$license_plate_no 	=   $_POST['license_plate_no'];
					$load_desc 			=   $_POST['load_desc'];	
					$pickup_date 		=   $_POST['pickup_date'];
					$pickup_time 		=   $_POST['pickup_time'];
					$deliver_date 		=   $_POST['deliver_date'];
					$delivery_time 		=   $_POST['delivery_time'];
					$delivery_desitnation 	=   $_POST['delivery_desitnation'];

					
					if(empty($name))
					{
						$nameErr="This is required";
					}
					else
					{
							if(strlen($name)<3 )
						{
							$nameErr = "This field must contain greater than 3 characters";
						}
					}
					if(empty($mobile))
					{
						$mobileErr="This is required";
					}
					else
					{
						if(!ctype_digit($mobile))
						{
							$mobileErr ="No must be without spaces";
						}
						if(strlen($mobile)>12 && strlen($mobile)<12)
						{
							$mobileErr ="Mobile no must be of 12 characters";
						}
					}
					
					if(empty($cityname))
					{
						$citynameErr="This is required";
					}
					

					if(empty($age))
					{
						$ageErr="This is required";
					}
					
					if(empty($gender))
					{
						$genderErr="This is required";
					}
					
					if($user_type==1)
					{
						if(empty($profession))
						{
							$professionErr="This is required";
						}
						
						
						if(empty($income))
						{
							$incomeErr="This is required";
						}
						
						
						if(empty($lox_use))
						{
							$lox_useErr="This is required";
						}
						
						if(empty($address))
						{
							$addressErr="This is required";
						}
						else
						{
							if(strlen($address)<5)
							{
								$addressErr ="This field must contain greater than 5 characters";
							}
						}
					}
					if($user_type==2 || $user_type==3 || $user_type==4 || $user_type==5 || $user_type==6)
					{
						//CAR_IMAGE_UPLOAD
						
						
							$target_dir = "uploads/";  //Where the file is going to be placed
							$temp = explode(".", $_FILES["fileToUpload"]["name"]);
				            $filename = round(microtime(true)) . '.' . end($temp);
							$target_file = $target_dir . $filename;     //Path of the file to be uploaded
							$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
							$check = $_FILES["fileToUpload"]["tmp_name"];
							if($check === TRUE) 
							{
							   $image_uploadErr= "File is not an image.";
							   
							} 
							// Check file size
							if ($_FILES["fileToUpload"]["size"] > 5000000) 
							{
							  $image_uploadErr= "Sorry, your file is too large.";
							}
							// Allow certain file formats
							if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
							&& $imageFileType != "gif" ) 
							{
							  $image_uploadErr="Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
							}
						
							
							
						
						if(empty($id_pn ))
						{
							$id_pnErr ="This is required";
						}

					}

					if($user_type==2 || $user_type==3 || $user_type==4 )
					{
						if(empty($driver_ln))
						{
							$driver_lnErr = "This is required";
						}
						if(strlen($driver_ln)<3)
						{
							$driver_lnErr = "This field must be greated than 3 characters";
						}
					}

					if($user_type==2  || $user_type==4 )
					{
						if(empty($vehcile_type))
						{
							$vehcile_typeErr = "This is required";
						}
					}

					if($user_type==4  || $user_type==5 )
					{
						if(empty($dept_date))
						{
							$dept_dateErr = "This is required";
						}
						if(empty($dept_time))
						{
							$dept_timeErr = "This is required";
						}
						if(empty($destination))
						{
							$destinationErr = "This is required";
						}
						
					}

					if($user_type==4)
					{
						if(empty($route_via))
						{
							$route_viaErr = "This is required";
						}
						if(empty($stage))
						{
							$stageErr = "This is required";
						}
						if(empty($space_available))
						{
							$space_availableErr = "This is required";
						}
						if(empty($license_plate_no))
						{
							$license_plate_noErr = "This is required";
						}
						

					}

					if($user_type==6)
					{
						if(empty($load_desc))
						{
							$load_descErr = "This is required";
						}
						if(empty($pickup_date))
						{
							$pickup_dateErr = "This is required";
						}
						if(empty($pickup_time))
						{
							$pickup_timeErr = "This is required";
						}
						if(empty($deliver_date))
						{
							$deliver_dateErr = "This is required";
						}
						if(empty($delivery_time))
						{
							$delivery_timeErr = "This is required";
						}
						if(empty($delivery_desitnation))
						{
							$delivery_desitnationErr = "This is required";
						}
					}

					if(empty($nameErr) && empty($mobileErr) && empty($emailErr) && empty($citynameErr) && empty($addressErr) && empty($ageErr) && empty($genderErr) && empty($professionErr) && empty($incomeErr) && empty($lox_useErr) && empty($id_pnErr) && empty($driver_lnErr) && empty($vehcile_typeErr) && empty($dept_dateErr) && empty($dept_timeErr) && empty($destinationErr) && empty($route_viaErr) && empty($stageErr) && empty($space_availableErr) && empty($license_plate_noErr) && empty($load_descErr) && empty($pickup_dateErr) && empty($pickup_timeErr) && empty($deliver_dateErr) && empty($delivery_timeErr) && empty($delivery_desitnationErr))
					{
						

						if($old_user_type!=$user_type)
						{
							$date_updated = $time->format('Y-m-d H:i:s');
						}
						else
						{
							$date_updated = $old_date_updated ;
						}	


					 
						$password=md5(mysqli_real_escape_string($conn,$password));
						if($user_type==1)
						{
							 
							$query = " UPDATE users SET role_id='".mysqli_real_escape_string($conn,$user_type)."',name='".mysqli_real_escape_string($conn,$name)."', mobile='".mysqli_real_escape_string($conn,$mobile)."',  cityname='".mysqli_real_escape_string($conn,$cityname)."', address='".mysqli_real_escape_string($conn,$address)."', age='".mysqli_real_escape_string($conn,$age)."', gender='".mysqli_real_escape_string($conn,$gender)."', profession='".mysqli_real_escape_string($conn,$profession)."', income='".mysqli_real_escape_string($conn,$income)."', lox_use='".mysqli_real_escape_string($conn,$lox_use)."' 
							WHERE id=$user_id";
							 $rs=	mysqli_query($conn,$query) or die(mysqli_error());

							  $_SESSION['role_id']=$user_type;
								 header("location:functions.php?profile_updated=ok");


									}


						}
						if($user_type==2)
						{
							
							if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
							{
								//echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
								$imageUrl = 'uploads/'.$user_result['picture'];
								//check if image exists
								if(file_exists($imageUrl))
								{
									//delete the image
									unlink($imageUrl);
								}
							}
							else
							{
								$filename = $user_result['picture'];
							}	

					 		$query = " UPDATE users SET  role_id='".mysqli_real_escape_string($conn,$user_type)."',name='".mysqli_real_escape_string($conn,$name)."', mobile='".mysqli_real_escape_string($conn,$mobile)."', cityname='".mysqli_real_escape_string($conn,$cityname)."',  age='".mysqli_real_escape_string($conn,$age)."', gender='".mysqli_real_escape_string($conn,$gender)."',picture='".mysqli_real_escape_string($conn,$filename)."', id_pn='".mysqli_real_escape_string($conn,$id_pn)."', driver_ln='".mysqli_real_escape_string($conn,$driver_ln)."', vehcile_type='".mysqli_real_escape_string($conn,$vehcile_type)."' ,date_updated='".$date_updated."'

							 WHERE id=$user_id";
							 $rs=	mysqli_query($conn,$query) or die(mysqli_error());

							 $_SESSION['role_id']=$user_type;
							 header("location:functions.php?profile_updated=ok");
						}

						if($user_type==3)
						{
						
							if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
							{
								//echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
								$imageUrl = 'uploads/'.$user_result['picture'];
								//check if image exists
								if(file_exists($imageUrl))
								{
									//delete the image
									unlink($imageUrl);
								}
							}
							else
							{
								$filename = $user_result['picture'];
							}
							$query = " UPDATE users SET  role_id='".mysqli_real_escape_string($conn,$user_type)."',name='".mysqli_real_escape_string($conn,$name)."', mobile='".mysqli_real_escape_string($conn,$mobile)."',  cityname='".mysqli_real_escape_string($conn,$cityname)."', age='".mysqli_real_escape_string($conn,$age)."', gender='".mysqli_real_escape_string($conn,$gender)."', picture='".mysqli_real_escape_string($conn,$filename)."', id_pn='".mysqli_real_escape_string($conn,$id_pn)."', driver_ln='".mysqli_real_escape_string($conn,$driver_ln)."' ,date_updated='".$date_updated."' WHERE id=$user_id";
							 $rs=	mysqli_query($conn,$query) or die(mysqli_error());

							  $_SESSION['role_id']=$user_type;
								 header("location:functions.php?profile_updated=ok");
						}
						
						if($user_type==4)
						{
							if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
							{
								//echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
								$imageUrl = 'uploads/'.$user_result['picture'];
								//check if image exists
								if(file_exists($imageUrl))
								{
									//delete the image
									unlink($imageUrl);
								}
							}
							else
							{
								$filename = $user_result['picture'];
							}
							$query = " UPDATE users SET  role_id='".mysqli_real_escape_string($conn,$user_type)."',name='".mysqli_real_escape_string($conn,$name)."', mobile='".mysqli_real_escape_string($conn,$mobile)."',  cityname='".mysqli_real_escape_string($conn,$cityname)."', age='".mysqli_real_escape_string($conn,$age)."', gender='".mysqli_real_escape_string($conn,$gender)."', picture='".mysqli_real_escape_string($conn,$filename)."',id_pn='".mysqli_real_escape_string($conn,$id_pn)."', driver_ln='".mysqli_real_escape_string($conn,$driver_ln)."', vehcile_type='".mysqli_real_escape_string($conn,$vehcile_type)."', dept_date='".mysqli_real_escape_string($conn,$dept_date)."', dept_time='".mysqli_real_escape_string($conn,$dept_time)."', destination='".mysqli_real_escape_string($conn,$destination)."', route_via='".mysqli_real_escape_string($conn,$route_via)."', stage='".mysqli_real_escape_string($conn,$stage)."', space_available='".mysqli_real_escape_string($conn,$space_available)."', license_plate_no='".mysqli_real_escape_string($conn,$license_plate_no)."' ,date_updated='".$date_updated."' WHERE id=$user_id";
							 $rs=	mysqli_query($conn,$query) or die(mysqli_error());

							  $_SESSION['role_id']=$user_type;
								 header("location:functions.php?profile_updated=ok");


						}	

						if($user_type==5)
						{
							if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
							{
								//echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
								$imageUrl = 'uploads/'.$user_result['picture'];
								//check if image exists
								if(file_exists($imageUrl))
								{
									//delete the image
									unlink($imageUrl);
								}
							}
							else
							{
								$filename = $user_result['picture'];
							}
							$query = " UPDATE users SET  role_id='".mysqli_real_escape_string($conn,$user_type)."',name='".mysqli_real_escape_string($conn,$name)."', mobile='".mysqli_real_escape_string($conn,$mobile)."',  cityname='".mysqli_real_escape_string($conn,$cityname)."', age='".mysqli_real_escape_string($conn,$age)."', gender='".mysqli_real_escape_string($conn,$gender)."', picture='".mysqli_real_escape_string($conn,$filename)."',id_pn='".mysqli_real_escape_string($conn,$id_pn)."', driver_ln='".mysqli_real_escape_string($conn,$driver_ln)."', vehcile_type='".mysqli_real_escape_string($conn,$vehcile_type)."', dept_date='".mysqli_real_escape_string($conn,$dept_date)."', dept_time='".mysqli_real_escape_string($conn,$dept_time)."', destination='".mysqli_real_escape_string($conn,$destination)."' ,date_updated='".$date_updated."' WHERE id=$user_id";
							 $rs=	mysqli_query($conn,$query) or die(mysqli_error());

							  $_SESSION['role_id']=$user_type;
								 header("location:functions.php?profile_updated=ok");

						}

						if($user_type==6)
						{
							if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
							{
								//echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
								$imageUrl = 'uploads/'.$user_result['picture'];
								//check if image exists
								if(file_exists($imageUrl))
								{
									//delete the image
									unlink($imageUrl);
								}
							}
							else
							{
								$filename = $user_result['picture'];
							}
							$query = " UPDATE users SET  role_id='".mysqli_real_escape_string($conn,$user_type)."',name='".mysqli_real_escape_string($conn,$name)."', mobile='".mysqli_real_escape_string($conn,$mobile)."',  cityname='".mysqli_real_escape_string($conn,$cityname)."', age='".mysqli_real_escape_string($conn,$age)."', gender='".mysqli_real_escape_string($conn,$gender)."', picture='".mysqli_real_escape_string($conn,$filename)."',id_pn='".mysqli_real_escape_string($conn,$id_pn)."', driver_ln='".mysqli_real_escape_string($conn,$driver_ln)."', vehcile_type='".mysqli_real_escape_string($conn,$vehcile_type)."',load_desc='".mysqli_real_escape_string($conn,$load_desc)."', pickup_date='".mysqli_real_escape_string($conn,$pickup_date)."', pickup_time='".mysqli_real_escape_string($conn,$pickup_time)."', deliver_date='".mysqli_real_escape_string($conn,$deliver_date)."', delivery_time='".mysqli_real_escape_string($conn,$delivery_time)."', delivery_desitnation='".mysqli_real_escape_string($conn,$delivery_desitnation)."' ,date_updated='".$date_updated."' WHERE id=$user_id";
								 $rs=	mysqli_query($conn,$query) or die(mysqli_error());

								 $_SESSION['role_id']=$user_type;
								 header("location:functions.php?profile_updated=ok");

						}

			

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
                    <h1><?php echo $update_profile;?></h1>
                    <p><?php echo $update_profile_para?></p>
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

                <?php if($user_type!=1 ){ if(empty($picture)){?>
                <img class="img-fluid" src="" alt="" srcset="uploads/no_img.jpg 1x, uploads/no_img.jpg 1x" />
                <?php }else{?>

                <img class="img-fluid" src="" alt=""
                    srcset="<?php echo 'uploads/'.$picture.'';?> 1x, <?php echo 'uploads/'.$picture.'';?> 1x" />

                <?php }}?>
            </div>

            <div class="col-md-4">
                <?php include "msg_session.php";?>
                <!-- On User Type Different Forms Will be Shown To Customer !-->
                <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
                    <div class="input-group">
                        <label><?php echo $switch_profile_cateogry;?></label>
                        <select name="user_type" onchange="this.form.submit()">
                            <?php 
													$query			=	"select * from category ";
													$rs			 	=	mysqli_query($conn,$query) or die(mysqli_error());
													while($row		=	mysqli_fetch_array($rs))
													{
																	

																	if ($row['cat_id'] == $user_type)
																	{
																		$selected	= 'Selected';
																	}
																	
																	else
																	{
																		$selected	= '';
																	}	
																	echo '<option value="'.$row['id'].'" '.$selected.'>'.$row['cat_name'].'</option>';
													}
													
													?>
                        </select>

                    </div>
                </form>

                <!-- If user type is Passenger Rider/Logistics Customer !-->

                <form class="input-group" action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST"
                    enctype="multipart/form-data">




                    <div class="input-group">
                        <label>Full Name</label>
                        <input type="text" name="name" required value="<?php echo $name?>">
                        <?php echo '<p style="color:red">'.$nameErr.'</p>';?>
                    </div>

                    <div class="input-group">
                        <label>Mobile</label>
                        <input type="text" name="mobile" required value="<?php echo $mobile?>">
                        <?php echo '<p style="color:red">'.$mobileErr.'</p>';?>
                    </div>


                    <div class="input-group">
                        <label>Age</label>
                        <select name="age">
                            <?php 
													for($i=18; $i<=100; $i++)
													{
														if($age==$i)
														{
															$selected = 'Selected';
														}
														else{
																		$selected = '';
																	}
														echo "<option value='".$i."' ".$selected.">$i</option>";
													}

													?>

                        </select>

                        <?php echo '<p style="color:red">'.$ageErr.'</p>';?>
                    </div>

                    <input type="hidden" name="user_type" value="<?php echo $user_type;?>">

                    <div class="input-group">
                        <label>Sex</label>
                        <select name="gender">
                            <option value="male" <?php if($gender=="male"){echo "selected";}?>>Male</option>
                            <option value="female" <?php if($gender=="female"){echo "selected";}?>>Female</option>
                            <option value="transgender" <?php if($gender=="transgender"){echo "selected";}?>>Transgender
                            </option>
                        </select>



                        <?php echo '<p style="color:red">'.$genderErr.'</p>';?>
                    </div>

                    <div class="input-group">
                        <label><?php echo $location;?></label>
                        <select name="cityname">
                            <option value='' style="align:center;">Select <?php echo $location?></option>
                            <?php 
													$query			=	"select * from lox_cityname ";
													$rs			 	=	mysqli_query($conn,$query) or die(mysqli_error());
													while($row		=	mysqli_fetch_array($rs))
													{
																	if ($row['cityname'] == $cityname)
																	{
																		$selected	= 'Selected';
																	}
																	else{
																		$selected = '';
																	}	
																	echo '<option value="'.$row['cityname'].'" '.$selected.'>'.$row['cityname'].'</option>';
													}
													
													?>
                        </select> <?php echo '<p style="color:red">'.$citynameErr.'</p>';?>
                    </div>

                    <!-- Additional Fields required in usertype for passanger rider/passanger logistic !-->
                    <?php if($user_type==1 || $user_type==''){?>

                    <div class="input-group">
                        <label>Address</label>
                        <input type="text" name="address" required value="<?php echo $address?>">
                        <?php echo '<p style="color:red">'.$addressErr.'</p>';?>
                    </div>

                    <div class="input-group">
                        <label>Profession/Career</label>
                        <input type="text" name="profession" required value="<?php echo $profession?>">
                        <?php echo '<p style="color:red">'.$professionErr.'</p>';?>
                    </div>

                    <div class="input-group">
                        <label>Annual Income</label>
                        <input type="text" name="income" required value="<?php echo $income?>">
                        <?php echo '<p style="color:red">'.$incomeErr.'</p>';?>
                    </div>

                    <div class="input-group">
                        <label>Will you be using Lox Lift primarily for ? business or leisure</label>
                        <select name="lox_use">
                            <option value="business" <?php if($lox_use=='business'){echo "selected";}?>>Business
                            </option>
                            <option value="leisure" <?php if($lox_use=='leisure'){echo "selected";}?>>Leisure</option>
                        </select>
                        <?php echo '<p style="color:red">'.$lox_useErr.'</p>';?>
                    </div>
                    <?php }?>

                    <!-- Additional Fields required in usertype for PD LD CPD CPR CPL !-->
                    <?php if($user_type==2 || $user_type==3 || $user_type==4 || $user_type==5 || $user_type==6){?>

                    <div class="input-group">
                        <label>Profile Picture</label>
                        <input type="file" name="fileToUpload" id="fileToUpload">
                        <?php if(!empty($image_uploadErr)){echo '<p style="color:red">'.$image_uploadErr.'</p>';}?>
                    </div>

                    <div class="input-group">
                        <label>National I.D. or Passport Number</label>
                        <input type="text" name="id_pn" required value="<?php echo $id_pn?>">
                        <?php echo '<p style="color:red">'.$id_pnErr.'</p>';?>
                    </div>


                    <?php }?>


                    <!-- Additional Fields required in usertype for PD LD CPD  !-->
                    <?php if($user_type==2 || $user_type==3 || $user_type==4 ){?>

                    <div class="input-group">
                        <label>Driver's License Number</label>
                        <input type="text" name="driver_ln" required value="<?php echo $driver_ln?>">
                        <?php echo '<p style="color:red">'.$driver_lnErr.'</p>';?>
                    </div>




                    <?php }?>


                    <!-- Additional Fields required in usertype for PD  CPD  !-->
                    <?php if($user_type==2  || $user_type==4 ){?>

                    <div class="input-group">
                        <label>Vehicle Type</label>
                        <select name="vehcile_type">

                            <?php 
														$query	=	"select * from lox_vehicle_category ";
														$rs		 =	mysqli_query($conn,$query) or die(mysqli_error());
														while($row		=	mysqli_fetch_array($rs))
														{
															if ($vehcile_type	==	$row['vehicle_category'] )
															{
																$selected	= 'Selected';
															}
															else
															{
																$selected = '';
															}
															echo		'<option value="'.$row['vehicle_category'].'" '.$selected.'>'.$row['vehicle_category'].'</option>';
														}
																					
														?>
                        </select>
                        <?php if(!empty($vehcile_typeErr)){echo '<p style="color:red">'.$vehcile_typeErr.'</p>';}?>
                    </div>

                    <?php }?>


                    <!-- Additional Fields required in usertype for CPD CPR  !-->
                    <?php if($user_type==4  || $user_type==5 ){?>

                    <div class="input-group">
                        <label>Departure Date</label>
                        <input type="date" name="dept_date" required value="<?php echo $dept_date?>">
                        <?php echo '<p style="color:red">'.$dept_dateErr.'</p>';?>
                    </div>

                    <div class="input-group">
                        <label>Departure Time</label>
                        <input type="time" name="dept_time" required value="<?php echo $dept_time?>">
                        <?php echo '<p style="color:red">'.$dept_timeErr.'</p>';?>
                    </div>

                    <div class="input-group">
                        <label>Destination</label>
                        <input type="text" name="destination" required value="<?php echo $destination?>">
                        <?php echo '<p style="color:red">'.$destinationErr.'</p>';?>
                    </div>



                    <?php }?>

                    <!-- Additional Fields required in usertype for CPD CPR  !-->
                    <?php if($user_type==4){?>

                    <div class="input-group">
                        <label>Route Via</label>
                        <input type="text" name="route_via" required value="<?php echo $route_via?>">
                        <?php echo '<p style="color:red">'.$route_viaErr.'</p>';?>
                    </div>

                    <div class="input-group">
                        <label>Stage</label>
                        <input type="text" name="stage" required value="<?php echo $stage?>">
                        <?php echo '<p style="color:red">'.$stageErr.'</p>';?>
                    </div>

                    <div class="input-group">
                        <label>Number of Spaces Available</label>
                        <input type="text" name="space_available" required value="<?php echo $space_available?>">
                        <?php echo '<p style="color:red">'.$space_availableErr.'</p>';?>
                    </div>

                    <div class="input-group">
                        <label>License Plate No</label>
                        <input type="text" name="license_plate_no" required value="<?php echo $license_plate_no?>">
                        <?php echo '<p style="color:red">'.$license_plate_noErr.'</p>';?>
                    </div>

                    <?php }?>

                    <!-- Additional Fields required in usertype for CLR  !-->
                    <?php if($user_type==6){?>

                    <div class="input-group">
                        <label>Load Description</label>
                        <input type="text" name="load_desc" required value="<?php echo $load_desc?>">
                        <?php echo '<p style="color:red">'.$load_descErr.'</p>';?>
                    </div>

                    <div class="input-group">
                        <label>Pickup Date</label>
                        <input type="date" name="pickup_date" required value="<?php echo $pickup_date?>">
                        <?php echo '<p style="color:red">'.$pickup_dateErr.'</p>';?>
                    </div>

                    <div class="input-group">
                        <label>Pickup Time</label>
                        <input type="time" name="pickup_time" required value="<?php echo $pickup_time?>">
                        <?php echo '<p style="color:red">'.$pickup_timeErr.'</p>';?>
                    </div>

                    <div class="input-group">
                        <label>Delivery Date</label>
                        <input type="date" name="deliver_date" required value="<?php echo $deliver_date?>">
                        <?php echo '<p style="color:red">'.$deliver_dateErr.'</p>';?>
                    </div>

                    <div class="input-group">
                        <label>Delivery Time</label>
                        <input type="time" name="delivery_time" required value="<?php echo $delivery_time?>">
                        <?php echo '<p style="color:red">'.$delivery_timeErr.'</p>';?>
                    </div>

                    <div class="input-group">
                        <label>Delivery Destination</label>
                        <input type="text" name="delivery_desitnation" required
                            value="<?php echo $delivery_desitnation?>">
                        <?php echo '<p style="color:red">'.$delivery_desitnationErr.'</p>';?>
                    </div>

                    <?php }?>


                    <div class="input-group text-right login-button">
                        <input class="btn btn-success  btn-shadow" type="submit" value="<?php echo $update_profile?>"
                            name="register">
                    </div>
                </form>


            </div>

            <div class="col-md-4">
            </div>

        </div>

    </div>
</section>
<!-- End Page Content-->
<?php include "footer.php";}?>