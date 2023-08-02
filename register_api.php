<?php 
$response = array(); 
include "config.php";
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
			$user_type 			=	strtolower($_POST['user_type']);
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

			if(empty($username))
			{
				$response['usernameErr']="This is required";
			}
			else
			{
				$query	=	"SELECT * FROM users WHERE username='".mysqli_real_escape_string($conn,$username)."' ";
				$rs		    	=	mysqli_query($conn,$query) or die(mysqli_error());
				$row		    =	mysqli_fetch_array($rs);
				if($row>0)
				{
					$response['usernameErr'] ="This username already existed please use different";
				}				
				if(ctype_space($username))
				{
					$response['usernameErr'] = "username must be without spaces";
				}
				if (!preg_match("/^[a-zA-Z-'0-9]*$/",$username))
				{
				  $response['usernameErr'] = "User name Only Contains letters and numbers";
				}
				if(strlen($username)<3 )
				{
					$response['usernameErr'] = "This field must contain greater than 3 characters";
				}
			}
			if(empty($password))
			{
				$response['passwordErr']="This is required";
			}
			if(empty($confirm_password))
			{
				$response['passwordErr']="This is required";
			}
			if($password != $confirm_password)
			{
				$response['passwordErr'] = "Passowrd and confirm password must be same";
			}
			else
			{
				if(strlen($password)<8 && strlen($confirm_password)<8)
				{
					$response['passwordErr'] = "Password must be greater than 8 characters";
				}
			}
			if(empty($name))
			{
				$response['nameErr']="This is required";
			}
			else
			{
					if(strlen($name)<3 )
				{
					$response['nameErr'] = "This field must contain greater than 3 characters";
				}
			}
			if(empty($mobile))
			{
				$response['mobileErr']="This is required";
			}
			else
			{
				if(!ctype_digit($mobile))
				{
					$response['mobileErr'] ="No must be without spaces";
				}
				if(strlen($mobile)>12 || strlen($mobile)<12)
				{
					$response['mobileErr'] ="Mobile no must be of 12 characters";
				}
			}
			if(empty($email))
			{
				$response['emailErr']="This is required";
			}
			else
			{
				if (!filter_var($email, FILTER_VALIDATE_EMAIL))
				{
					$response['emailErr'] = "Invalid email format";
				}
				$query	=	"select * from users where (email='".mysqli_real_escape_string($conn,$email)."') ";
				$rs		    	=	mysqli_query($conn,$query) or die(mysqli_error());
				$row		    =	mysqli_fetch_array($rs);
				if($row>0)
				{
					$response['emailErr'] ="This email already existed please use another";
				}
			}
			if(empty($cityname))
			{
				$response['citynameErr']="This is required";
			}
			

			if(empty($age))
			{
				$response['ageErr']="This is required";
			}
			
			if(empty($gender))
			{
				$response['genderErr']="This is required";
			}
			
			if($user_type==1)
			{
				if(empty($profession))
				{
					$response['professionErr'] ="This is required";
				}
				
				
				if(empty($income))
				{
					$response['incomeErr'] ="This is required";
				}
				
				
				if(empty($lox_use))
				{
					$response['lox_useErr'] ="This is required";
				}
				
				if(empty($address))
				{
					$response['addressErr']="This is required";
				}
				else
				{
					if(strlen($address)<5)
					{
						$response['addressErr'] ="This field must contain greater than 5 characters";
					}
				}
			}
			if($user_type==2 || $user_type==3 || $user_type==4 || $user_type==5 || $user_type==6)
			{
				//CAR_IMAGE_UPLOAD
				$target_dir = "uploads/";  //Where the file is going to be placed
				$filename = rand(10,100000). basename($_FILES["fileToUpload"]["name"]);
				$target_file = $target_dir . $filename;     //Path of the file to be uploaded
				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
				if($check === TRUE) 
				{
				   $response['image_uploadErr']= "File is not an image.";
				   
				} 
				// Check file size
				if ($_FILES["fileToUpload"]["size"] > 5000000) 
				{
				  $response['image_uploadErr']= "Sorry, your file is too large.";
				}
				// Allow certain file formats
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif" ) 
				{
				  $response['image_uploadErr']="Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				}

				
				if(empty($id_pn ))
				{
					$response['id_pnErr']  ="This is required";
				}

			}

			if($user_type==2 || $user_type==3 || $user_type==4 )
			{
				if(empty($driver_ln))
				{
					$response['driver_lnErr']  = "This is required";
				}
				if(strlen($driver_ln)<3)
				{
					$response['driver_lnErr'] = "This field must be greated than 3 characters";
				}
			}

			if($user_type==2  || $user_type==4 )
			{
				if(empty($vehcile_type))
				{
					$response['vehcile_typeErr'] = "This is required";
				}
			}

			if($user_type==4  || $user_type==5 )
			{
				if(empty($dept_date))
				{
					$response['dept_dateErr']  = "This is required";
				}
				if(empty($dept_time))
				{
					$response['dept_timeErr']  = "This is required";
				}
				if(empty($destination))
				{
					$response['destinationErr']  = "This is required";
				}
				
			}

			if($user_type==4)
			{
				if(empty($route_via))
				{
					$response['route_viaErr']  = "This is required";
				}
				if(empty($stage))
				{
					$response['stageErr']  = "This is required";
				}
				if(empty($space_available))
				{
					$response['space_availableErr']  = "This is required";
				}
				if(empty($license_plate_no))
				{
					$response['$license_plate_noErr'] = "This is required";
				}
				

			}

			if($user_type==6)
			{
				if(empty($load_desc))
				{
					$response['$load_descErr']  = "This is required";
				}
				if(empty($pickup_date))
				{
					$response['$pickup_dateErr']  = "This is required";
				}
				if(empty($pickup_time))
				{
					$response['$pickup_timeErr']= "This is required";
				}
				if(empty($deliver_date))
				{
					$response['$deliver_dateErr'] = "This is required";
				}
				if(empty($delivery_time))
				{
					$response['$delivery_timeErr'] = "This is required";
				}
				if(empty($delivery_desitnation))
				{
					$response['$delivery_desitnationErr'] = "This is required";
				}
			}

			if(!empty($response['usernameErr']) || !empty($response['passwordErr']) || !empty($response['confirm_passwordErr']) || !empty($response['nameErr']) || !empty($response['mobileErr']) || !empty($response['emailErr']) || !empty($response['citynameErr']) || !empty($response['addressErr']) || !empty($response['ageErr']) || !empty($response['genderErr']) || !empty($response['professionErr']) || !empty($response['incomeErr']) || !empty($response['lox_useErr']) || !empty($response['id_pnErr']) || !empty($response['driver_lnErr']) || !empty($response['vehcile_typeErr']) || !empty($response['dept_dateErr']) || !empty($response['dept_timeErr']) || !empty($response['destinationErr']) || !empty($response['route_viaErr']) || !empty($response['stageErr']) || !empty($response['space_availableErr']) || !empty($response['license_plate_noErr']) || !empty($response['load_descErr']) || !empty($response['pickup_dateErr']) || !empty($response['pickup_timeErr']) || !empty($response['deliver_dateErr']) || !empty($response['delivery_timeErr']) || !empty($response['delivery_desitnationErr']))
			{
				
				 // failed to insert row  
				 $response["success_msg "] = 0;  
				 $response["message"] = "An error occurred while registering a user!";  
				 // echoing JSON response  
				 echo json_encode($response);
				
			}
			else
			{		
				
				$date_created = date("l jS \of F Y h:i:s A");
				$password=md5(mysqli_real_escape_string($conn,$password));
				move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file) ;
					$query = " INSERT INTO users
					(role_id,username, password, name, mobile, email, 
					cityname, address, age, gender, profession,
					income, lox_use, picture, id_pn, driver_ln, 
					vehcile_type, dept_date, dept_time, destination,
					route_via, stage, space_available, license_plate_no,
					load_desc, pickup_date, pickup_time, deliver_date,
					delivery_time, delivery_desitnation, ip_address,status,date_created) 
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
					'".mysqli_real_escape_string($conn,$delivery_desitnation)."','".$_SERVER['REMOTE_ADDR']."','1','$date_created'
					)";
					
					$result =mysqli_query($conn,$query) or die(mysqli_error());
					// check if row inserted or not  
					  if ($result) {  
						 $response["success_msg"] = 1;  
						 $response["message"] = "User registered successfully.";  
						 echo json_encode($response);  
					  } else {  
						 // failed to insert row  
						 $response["success_msg "] = 0;  
						 $response["message"] = "An error occurred!";  
						 // echoing JSON response  
						 echo json_encode($response);  
					  } 
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
 
			}
			
				
		
	}	  
		
?>
