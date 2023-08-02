<?php $response = array(); 
		$time_access=array();	
		error_reporting(0);
include "config.php";
	$token_id = mysqli_real_escape_string($conn,$_GET['token']);
	$cat_id = mysqli_real_escape_string($conn,$_GET["cat_id"]);
	$city  = mysqli_real_escape_string($conn,$_GET['city']);
	$vehicle_type  = mysqli_real_escape_string($conn,$_GET['vehicle_type']);
	
  if (isset($_GET["cat_id"]) && isset($_GET['token']))
  {
    	
		$query	=	"select * from lox_payments where (md5(lox_user_id) ='$token_id' && lox_passanger_type ='$cat_id'  && lox_access_time_expiry=1)";
		$rs		 =	mysqli_query($conn,$query) or die(mysqli_error());
		$row		=	mysqli_fetch_array($rs);
		$payment_date = $row['lox_payment_date'];	
		$row_id		  = $row['id'];	
		$current_date =  date('y-m-d H:i:s');
		$old_date  = date($payment_date);
		$time1 = new DateTime($old_date);
		$time2 = new DateTime($current_time);
		$timediff = $time1->diff($time2);
		$time_expire =$timediff->format('%h hour %i minute %s second');
		$time_extend = $timediff->d;
		if (($time_extend>0) && ($row['lox_access_time_expiry'])==1)
		{
			$query = "update lox_payments set lox_access_time_expiry='0' where id=$row_id";
			mysqli_query($conn,$query) or die(mysqli_error());
		}
		else 
		{
			if($row['lox_access_time_expiry']==1)
			{				
				$ok = 1;
				$time_access['expire_message']	= 'Access Time '.$row['access_time'].' Hours';
				$time_access['time_expire'] = 'Time utilized ' . $timediff->format('%h hour %i minute %s second');
				
			}
			else
			{
				$ok=0;
				$time_access['expire_message']	= '';
				$time_access['time_expire']	=	'';
			}	
		}	
		
  }
				//The city must be selected before searching from database
				if ($city!="" && $vehicle_type!="")
				{
		 			$query	=	"SELECT  * FROM users  WHERE status=1 and role_id='$cat_id' and cityname='".$city."' and vehcile_type='".$vehicle_type."' ";
				}
				elseif($city!="" && $vehicle_type=="")
				{
		 			$query	=	"SELECT  * FROM users  WHERE status=1 and role_id='$cat_id' and cityname='".$city."'  ";
				}
				elseif($city=="" && $vehicle_type!="")
				{
		 			$query	=	"SELECT  * FROM users  WHERE status=1 and role_id='$cat_id' and vehcile_type='".$vehicle_type."'  ";
				}
				else
				{
		 			$query	= "SELECT  * FROM users WHERE status=1 and role_id='$cat_id' ";
				}
				//STORING A VALUE TO CHECK WHEATHER USER IS ACCESSING DIRECTLY OR LOCATION WISE
				$rs1		 =	mysqli_query($conn,$query) or die(mysqli_error());
				if (mysqli_num_rows($rs1)==0)
				{
					$response["success_msg"] = 0;  
					$response["message"] = "No record found!";  
					echo json_encode($response); 
				}	
				else 
				{
					while($row1		=	mysqli_fetch_array($rs1))
					{
						$user_record = $row1['id'];
						//COUNTING THE TOTAL RIDES OF THE DRIVER		
								$count	= "SELECT COUNT(id) FROM  lox_customer_feedback  
								WHERE (user_id = ".$user_record.")"; 
								$count = mysqli_query($conn,$count) or die(mysqli_error());
								$count= mysqli_fetch_array($count);
								$count = $count[0];
								$response["totalrides"]=$count;
						//CALCULATING RATING NUMBER ON THE BASIS OF THEIR RIDES		
							$rating_no=0;
							$rating_total=0;
						//RATING STARS COUNTED	
								$query54	= "SELECT * FROM  lox_customer_feedback  
								WHERE (user_id = $user_record )"; 
								$result12 = mysqli_query($conn,$query54) or die(mysqli_error());
								while ($row234= mysqli_fetch_array($result12))
								{
									$rating_no= $row234['stars'];
									$rating_total = $rating_total + $rating_no;
								}
								$average_rating_no = $rating_total/$count;
								
							if($average_rating_no==0 )
							{
								$response["totalstar"]=0;
							}	
							if($average_rating_no>0 AND $average_rating_no<=1)
							{
								$response["totalstar"]=1;
							}
							if($average_rating_no>1 AND $average_rating_no<=2)							
							{
								$response["totalstar"]=2;
							}
							if($average_rating_no>2 AND $average_rating_no<=3)
							{
								$response["totalstar"]=3;
							}
							if($average_rating_no>3 AND $average_rating_no<=4)
							{
								$response["totalstar"]=4;
							}
							if($average_rating_no>4 AND $average_rating_no<=5)
							{
								$response["totalstar"]=5;
							}
						//Searching for record to see the user is logged and paid the amount and have full access to service providers detail-->	
								$picture = $row1['picture'];
								$response["picture"]='uploads/'.$picture;
								if($ok==1)
								{
									$response["email"]= $row1['email']; 
									$response["mobile"]=$row1['mobile'];
									$response["showfulldetails"]='details.php?id='.md5($row1["id"]).'&&section='.md5(3).'"';
									$response["cityname"] = $row1['cityname'];			
									echo json_encode($response); 
								}
								else
								{	
									$response["email"] = substr($row1['email'], 0, 4) . str_repeat("*", strlen($row1['email'])-2); 
									$response["mobile"] = substr($row1['mobile'], 0, 2) . str_repeat("*", strlen($row1['mobile'])-2);
									$response["cityname"] = $row1['cityname'];
									$response["showfulldetails"]='pricing.php';
									echo json_encode($response); 
								}
								
					}	
		
				}
			echo json_encode ($time_access);
				

?>
						 
						