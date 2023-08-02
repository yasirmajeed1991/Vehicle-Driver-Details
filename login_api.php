<?php  $response = array(); 
include "config.php";
		 
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
	
		$email		=	$_POST['email'];
		$password 	=	$_POST['password'];
			
		//USEREMAIL
		if (empty($email)) 
		{
			$response['emailErr'] = "Email is required";
		}
		else
		{
			
			// check if e-mail address is well-formed
			if (!filter_var($email, FILTER_VALIDATE_EMAIL))
			{
				$response['emailErr']  = "Invalid email format";
			}
		}
  
		//PASSWORD 
		if (empty($password)) 
		{
			$response['passwordErr']  = "Password is required";
		} 
		else 
		{
				if ((strlen($password) <8) || (strlen($password) > 100))
				{
					$response['passwordErr'] = "Password must be greater than 8 character and less than 100 ";	
				}
		}
		
			//CHECKING FOR ERRORS IF THERE IS NOT ANY ERROR THAN THE FORM SHOULD BE SUBMITTED
			if(empty($emailErr) && empty($passwordErr) )
			{
					
						//CHECKING FOR RECORD IF USER  EXISTED	
						$password=md5($password);	
						$query			=	"SELECT * From users
						WHERE (email='".mysqli_real_escape_string($conn,$email)."' && password='".mysqli_real_escape_string($conn,$password)."' && status=1)"; 
						$rs		    	=	mysqli_query($conn,$query) or die(mysqli_error());
						$row		    =	mysqli_fetch_array($rs);
						$token_id		=	$row['id'];
						$token 			=	md5($token_id);
					if($row>0)
					{
						
						$response['token']  = $token;
						$response["success_msg"] = 1;  
						 $response["message"] = "User login successfully.";  
						echo json_encode($response); 
					}
					else
					{
						// failed to login row  
						 $response["success_msg "] = 0;  
						 $response["message"] = "Invalid user details";  
						 // echoing JSON response  
						 echo json_encode($response);
					}
					
			}
			else
			{
						// failed to login row  
						 $response["success_msg "] = 0;  
						 $response["message"] = "An error occurred!";  
						 // echoing JSON response  
						 echo json_encode($response); 
			}
	} 		

?>
