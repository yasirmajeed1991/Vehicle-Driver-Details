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
include "../settime.php";
//Public Variable declartion for Passanger Registration
$username=$password=$confirm_password=$name=$mobile=$email=$cityname=$address=$age=$gender=$profession=$income=$lox_use=$user_type=$id_pn=$driver_ln=$vehcile_type=$dept_date=$dept_time=$destination=$route_via=$stage=$space_available=$license_plate_no=$load_desc=$pickup_date=$pickup_time=$deliver_date=$delivery_time=$delivery_desitnation='';	
 			
$usernameErr=$passwordErr=$confirm_passwordErr=$nameErr=$mobileErr=$emailErr=$citynameErr=$addressErr=$ageErr=$genderErr=$professionErr=$incomeErr=$lox_useErr=$id_pnErr=$driver_lnErr=$vehcile_typeErr=$dept_dateErr=$dept_timeErr=$destinationErr=$route_viaErr=$stageErr=$space_availableErr=$license_plate_noErr=$load_descErr=$pickup_dateErr=$pickup_timeErr=$deliver_dateErr=$delivery_timeErr=$delivery_desitnationErr='';				
				
	
		
			$username 			=	strtolower($_POST['username']);				
			$password 			=	$_POST['password'];
			$confirm_password 	=	$_POST['confirm_password'];
			$name 				=	$_POST['name'];
			$mobile 			=	$_POST['mobile'];
			$email 				=	strtolower($_POST['email']);
			$cityname 			=	$_POST['cityname'];
			$age 				=	$_POST['age'];
			$gender 			=	$_POST['gender'];
			$address 			=	$_POST['address'];    	//not in other sections,
			$profession 		=	$_POST['profession']; 	//not in other sections,
			$income 			=	$_POST['income']; 		//not in other sections,
			$lox_use 			=	$_POST['lox_use']; 		//not in other sections,
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



		if (isset($_POST['user_type']))
		{
			$user_type = $_POST['user_type'];
		}


		if (isset($_POST['register'])) 
		{

			

			if(empty($username))
			{
				$usernameErr="This is required";
			}
			else
			{
				$query	=	"SELECT * FROM users WHERE username='".mysqli_real_escape_string($conn,$username)."' ";
				$rs		    	=	mysqli_query($conn,$query) or die(mysqli_error());
				$row		    =	mysqli_fetch_array($rs);
				if($row>0)
				{
					$usernameErr ="This username already existed please use different";
				}				
				if(ctype_space($username))
				{
					$usernameErr = "username must be without spaces";
				}
				if (!preg_match("/^[a-zA-Z-'0-9]*$/",$username))
				{
				  $usernameErr = "User name Only Contains letters and numbers";
				}
				if(strlen($username)<5 )
				{
					$confirm_passwordErr = "This field must contain greater than 3 characters";
				}
			}
			if(empty($password))
			{
				$passwordErr="This is required";
			}
			if(empty($confirm_password))
			{
				$confirm_passwordErr="This is required";
			}
			if($password != $confirm_password)
			{
				$confirm_passwordErr = "Passowrd and confirm password must be same";
			}
			else
			{
				if(strlen($password)<8 && strlen($confirm_password)<8)
				{
					$confirm_passwordErr = "Password must be greater than 8 characters";
				}
			}
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
				if(strlen($mobile)>12 || strlen($mobile)<12)
				{
					$mobileErr ="Mobile no must be of 12 characters";
				}
			}
			if(empty($email))
			{
				$emailErr="This is required";
			}
			else
			{
				if (!filter_var($email, FILTER_VALIDATE_EMAIL))
				{
					$emailErr = "Invalid email format";
				}
				$query	=	"select * from users where (email='".mysqli_real_escape_string($conn,$email)."') ";
				$rs		    	=	mysqli_query($conn,$query) or die(mysqli_error());
				$row		    =	mysqli_fetch_array($rs);
				if($row>0)
				{
					$emailErr ="This email already existed please use another";
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
			if($user_type==2 || $user_type==3 || $user_type==4 || $user_type==5 ||$user_type==5)
			{
				//CAR_IMAGE_UPLOAD
				$target_dir = "../uploads/";  //Where the file is going to be placed
				$temp = explode(".", $_FILES["fileToUpload"]["name"]);
				$filename = round(microtime(true)) . '.' . end($temp);
				$target_file = $target_dir . $filename;     //Path of the file to be uploaded
				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
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

			if(empty($usernameErr) && empty($passwordErr) && empty($confirm_passwordErr) && empty($nameErr) && empty($mobileErr) && empty($emailErr) && empty($citynameErr) && empty($addressErr) && empty($ageErr) && empty($genderErr) && empty($professionErr) && empty($incomeErr) && empty($lox_useErr) && empty($id_pnErr) && empty($driver_lnErr) && empty($vehcile_typeErr) && empty($dept_dateErr) && empty($dept_timeErr) && empty($destinationErr) && empty($route_viaErr) && empty($stageErr) && empty($space_availableErr) && empty($license_plate_noErr) && empty($load_descErr) && empty($pickup_dateErr) && empty($pickup_timeErr) && empty($deliver_dateErr) && empty($delivery_timeErr) && empty($delivery_desitnationErr))
			{
				$date_updated = $time->format('Y-m-d H:i:s');
				$date_created = $time->format('Y-m-d H:i:s');
				$password=md5(mysqli_real_escape_string($conn,$password));
				move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file) ;
					$query = " INSERT INTO users
					(role_id,username, password, name, mobile, email, 
					cityname, address, age, gender, profession,
					income, lox_use, picture, id_pn, driver_ln, 
					vehcile_type, dept_date, dept_time, destination,
					route_via, stage, space_available, license_plate_no,
					load_desc, pickup_date, pickup_time, deliver_date,
					delivery_time, delivery_desitnation, ip_address,status,date_created,date_updated) 
						VALUES 
					('".mysqli_real_escape_string($conn,$user_type)."','".mysqli_real_escape_string($conn,$username)."',
					'".mysqli_real_escape_string($conn,$password)."',
					'".mysqli_real_escape_string($conn,$name)."','".mysqli_real_escape_string($conn,$mobile)."',
					'".mysqli_real_escape_string($conn,$email)."','".mysqli_real_escape_string($conn,$cityname)."',
					'".mysqli_real_escape_string($conn,$address)."','".mysqli_real_escape_string($conn,$age)."',
					'".mysqli_real_escape_string($conn,$gender)."','".mysqli_real_escape_string($conn,$profession)."',
					'".mysqli_real_escape_string($conn,$income)."','".mysqli_real_escape_string($conn,$lox_use)."',
					'".mysqli_real_escape_string($conn,$filename)."','".mysqli_real_escape_string($conn,$id_pn)."',
					'".mysqli_real_escape_string($conn,$driver_ln)."','".mysqli_real_escape_string($conn,$vehcile_type)."',
					'".mysqli_real_escape_string($conn,$dept_date)."','".mysqli_real_escape_string($conn,$dept_time)."',
					'".mysqli_real_escape_string($conn,$destination)."','".mysqli_real_escape_string($conn,$route_via)."',
					'".mysqli_real_escape_string($conn,$stage)."','".mysqli_real_escape_string($conn,$space_available)."',
					'".mysqli_real_escape_string($conn,$license_plate_no)."','".mysqli_real_escape_string($conn,$load_desc)."',
					'".mysqli_real_escape_string($conn,$pickup_date)."','".mysqli_real_escape_string($conn,$pickup_time)."',
					'".mysqli_real_escape_string($conn,$deliver_date)."','".mysqli_real_escape_string($conn,$delivery_time)."',
					'".mysqli_real_escape_string($conn,$delivery_desitnation)."','".$_SERVER['REMOTE_ADDR']."','1','$date_created','$date_updated'
					)";
					
					mysqli_query($conn,$query) or die(mysqli_error());
							//MAIL TO REGISTER USER
							$to = $email;
							$subject = "Welcome To Loxlift.com";
							$message = '<html>
								<head>
										<title>You are very Welcome To Our Services Please Enjoy At Your Ease!</title>
								</head>
								<body>
										<h3>Thanks For Becoming A Member of Loxlift.Com</h3>
									   
										<p>In case of any issue please write us @ support@loxlift.com</p>
										
										<p><span>Regards:</span><br>
											<span>Loxlift Team</span>
											
										</p>
								</body>
							</html>
											';
								// Always set content-type when sending HTML email
								$headers = "MIME-Version: 1.0" . "\r\n";
								$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
								// More headers
								$headers .= 'From: <do-not-reply@loxlift.com>' . "\r\n";
								mail($to,$subject,$message,$headers);

						header("location:functions.php?register_user_detail=ok");
						

			}
			
				
		}

?>


<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Add New User</strong>
                            </div>
                            <div class="card-body">
										<div class="card-body">
									<table class="table table-bordered ">
									
											<form   method="POST" enctype="multipart/form-data"> 
										 
										 <tr><td>Current User Status:</td><td><select name="user_type" class="form-control" onchange="this.form.submit()">
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
													</select></td></tr>
												</form>
											<form   method="POST" enctype="multipart/form-data"> 
											<tr><td>User Name:</td><td><input type="text" name="username"  class="form-control" required value="<?php echo $username?>">
												<?php echo '<p style="color:red">'.$usernameErr.'</p>';?></td></tr>
											
											<tr><td>Password:</td><td> <input type="password" name="password" class="form-control"  required value="<?php echo $password?>">
												<?php echo '<p style="color:red">'.$passwordErr.'</p>';?></td></tr>
											<tr><td>Confirm Password:</td><td> <input type="password" class="form-control"  name="confirm_password" required value="<?php echo $confirm_password?>">
												<?php echo '<p style="color:red">'.$confirm_passwordErr.'</p>';?></td></tr>


											</td><?php echo '<p style="color:red">'.$passwordErr.'</p>';?></tr> 
											<tr><td>Email:</td><td> <input type="email" name="email" class="form-control" required value="<?php echo $email?>">
												<?php echo '<p style="color:red">'.$emailErr.'</p>';?></td></tr>
											
											<tr><td>Full Name:</td><td> <input type="text" name="name" class="form-control" required value="<?php echo $name?>"><?php echo '<p style="color:red">'.$nameErr.'</p>';?></td></tr>
											

											<tr><td>Mobile:</td><td> <input type="text" name="mobile"  class="form-control" required value="<?php echo $mobile?>">
												<?php echo '<p style="color:red">'.$mobileErr.'</p>';?></td></tr>
												<input type="hidden" name="user_type" 
										value="<?php if(empty($user_type)){$user_type=1;echo $user_type;}else{echo $user_type;}?>">

											<tr><td>Age:</td><td> <select name="age" class="form-control" >
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

												<?php echo '<p style="color:red">'.$ageErr.'</p>';?></td></tr>
										
												<tr><td>Sex:</td><td> <select name="gender" class="form-control" >
												<option value="male" <?php if($gender=="male"){echo "selected";}?>>Male</option>
												<option value="female" <?php if($gender=="female"){echo "selected";}?>>Female</option>
												<option value="transgender" <?php if($gender=="transgender"){echo "selected";}?>>Transgender</option>
												</select>


												
												<?php echo '<p style="color:red">'.$genderErr.'</p>';?></td></tr>
										
										<input type="hidden" name="user_type" 
										value="<?php echo $user_type;?>">

									<tr><td>Location:</td><td> <select name="cityname"  class="form-control"  >
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
												</select> <?php echo '<p style="color:red">'.$citynameErr.'</p>';?></td></tr>


										<!-- Additional Fields required in usertype for passanger rider/passanger logistic !-->	
										<?php if($user_type==1 || $user_type==''){?>


											<tr><td>Address:</td><td><input type="text"  class="form-control" name="address" required value="<?php echo $address?>">
													<?php echo '<p style="color:red">'.$addressErr.'</p>';?></td></tr>


											<tr><td>Profession/Career:</td><td> <input type="text"  class="form-control" name="profession" required value="<?php echo $profession?>">
													<?php echo '<p style="color:red">'.$professionErr.'</p>';?></td></tr>
											 
											<tr><td>Annual Income:</td><td> <input type="text" class="form-control"  name="income" required value="<?php echo $income?>">
													<?php echo '<p style="color:red">'.$incomeErr.'</p>';?></td></tr>
											 
											<tr><td>Using Loxlift for?:</td><td> <select  class="form-control" name="lox_use">
														<option value="business" <?php if($lox_use=='business'){echo "selected";}?>>Business</option>
														<option value="leisure" <?php if($lox_use=='leisure'){echo "selected";}?>>Leisure</option>
													</select>
													<?php echo '<p style="color:red">'.$lox_useErr.'</p>';?></td></tr>
											
										<?php }?>

										<!-- Additional Fields required in usertype for PD LD CPD CPR CPL !-->	
										<?php if($user_type==2 || $user_type==3 || $user_type==4 || $user_type==5 || $user_type==6){?>
											<tr><td>Profile Picture:</td><td> <input type="file" class="form-control" required name="fileToUpload" id="fileToUpload" > 
													<?php if($user_type!=1 ){ if(empty($picture)){?>
								<img class="img-fluid" src="" alt="" srcset="../uploads/no_img.jpg 1x, uploads/no_img.jpg 1x"/>
								<?php }else{?>

									<img class="img-fluid" src="" alt="" srcset="<?php echo '../uploads/'.$picture.'';?> 5x, <?php echo 'uploads/'.$picture.'';?> 5x"/>

								<?php }}?><?php if(!empty($image_uploadErr)){echo '<p style="color:red">'.$image_uploadErr.'</p>';}?>	</td></tr>
											
													
										
											<tr><td>National I.D. <br> or Passport Number:</td><td> <input type="text"  class="form-control" name="id_pn" required value="<?php echo $id_pn?>">
													<?php echo '<p style="color:red">'.$id_pnErr.'</p>';?></td></tr>
											

											
										<?php }?>


										<!-- Additional Fields required in usertype for PD LD CPD  !-->	
										<?php if($user_type==2 || $user_type==3 || $user_type==4 ){?>
											<tr><td>Driver's License Number:</td><td> <input type="text" name="driver_ln"  class="form-control" required value="<?php echo $driver_ln?>">
													<?php echo '<p style="color:red">'.$driver_lnErr.'</p>';?></td></tr>
											
											

											
										<?php }?>


										<!-- Additional Fields required in usertype for PD  CPD  !-->	
										<?php if($user_type==2  || $user_type==4 ){?>
											<tr><td>Vehicle Type:</td><td> <select  class="form-control" name="vehcile_type">

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
														</select> <?php if(!empty($vehcile_typeErr)){echo '<p style="color:red">'.$vehcile_typeErr.'</p>';}?></td></tr>
											
	
										<?php }?>


										<!-- Additional Fields required in usertype for CPD CPR  !-->	
										<?php if($user_type==4  || $user_type==5 ){?>
											<tr><td>Departure Date:</td><td> <input type="date"  class="form-control" name="dept_date" required value="<?php echo $dept_date?>">
													<?php echo '<p style="color:red">'.$dept_dateErr.'</p>';?></td></tr>
											
											<tr><td>Departure Time:</td><td> <input type="time"  class="form-control" name="dept_time" required value="<?php echo $dept_time?>">
													<?php echo '<p style="color:red">'.$dept_timeErr.'</p>';?></td></tr>
											
											<tr><td>Destination:</td><td> <input type="text"  class="form-control" name="destination" required value="<?php echo $destination?>">
													<?php echo '<p style="color:red">'.$destinationErr.'</p>';?></td></tr>
												
										<?php }?>

										<!-- Additional Fields required in usertype for CPD CPR  !-->	
										<?php if($user_type==4){?>
											<tr><td>Route Via:</td><td> <input type="text"  class="form-control" name="route_via" required value="<?php echo $route_via?>">
													<?php echo '<p style="color:red">'.$route_viaErr.'</p>';?></td></tr>
											
											<tr><td>Stage:</td><td> <input type="text" name="stage"  class="form-control" required value="<?php echo $stage?>">
													<?php echo '<p style="color:red">'.$stageErr.'</p>';?></td></tr>
											
											<tr><td>Number of Spaces Available:</td><td> <input  class="form-control" type="text" name="space_available" required value="<?php echo $space_available?>">
													<?php echo '<p style="color:red">'.$space_availableErr.'</p>';?></td></tr>
											
											<tr><td>License Plate No:</td><td> <input type="text"  class="form-control" name="license_plate_no" required value="<?php echo $license_plate_no?>">
													<?php echo '<p style="color:red">'.$license_plate_noErr.'</p>';?></td></tr>
											

										<?php }?>

										<!-- Additional Fields required in usertype for CLR  !-->	
										<?php if($user_type==6){?>
											<tr><td>Load Description:</td><td> <input type="text"  class="form-control" name="load_desc" required value="<?php echo $load_desc?>">
													<?php echo '<p style="color:red">'.$load_descErr.'</p>';?></td></tr>
											
											<tr><td>Pickup Date:</td><td> <input type="date" class="form-control"  name="pickup_date" required value="<?php echo $pickup_date?>">
													<?php echo '<p style="color:red">'.$pickup_dateErr.'</p>';?></td></tr>
											
											<tr><td>Pickup Time:</td><td> <input type="time" class="form-control"  name="pickup_time" required value="<?php echo $pickup_time?>">
													<?php echo '<p style="color:red">'.$pickup_timeErr.'</p>';?></td></tr>
											
											<tr><td>Delivery Date<:</td><td> <input type="date"  class="form-control" name="deliver_date" required value="<?php echo $deliver_date?>">
													<?php echo '<p style="color:red">'.$deliver_dateErr.'</p>';?></td></tr>
											
											<tr><td>Delivery Time:</td><td> <input type="time" class="form-control"  name="delivery_time" required value="<?php echo $delivery_time?>">
													<?php echo '<p style="color:red">'.$delivery_timeErr.'</p>';?></td></tr>
											
											<tr><td>Delivery Destination:</td><td> <input  class="form-control" type="text" name="delivery_desitnation" required value="<?php echo $delivery_desitnation?>">
													<?php echo '<p style="color:red">'.$delivery_desitnationErr.'</p>';?></td></tr>
											

										<?php }?>







											
											
											 <tr><td></td><td><input type="submit"  class="btn btn-success" name="register" value="Register a New User"/> 
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