<?php session_start();
   
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
        
        		$tnm_accountErr='';	
				$tnm_account = $_POST['tnm_account'];
		if (empty($tnm_account) ) 
		{
			echo	$tnm_accountErr = "<p class='alert alert-danger' id='error'>TNM Account is required.</p>";
		} 
					
		elseif ((strlen($tnm_account) <12) || (strlen($tnm_account) > 12))
		{
			echo	$tnm_accountErr = "<p class='alert alert-danger' id='error'>TNM number must be 12 digits including country code starts with 265</p>";	
		}
		elseif(!is_numeric($tnm_account))
		{
			echo	$tnm_accountErr = "<p class='alert alert-danger' id='error'>TNM number must be in digit</p>";
		}
		   	
		else
		{
			$tnm_accountErr='';
		}
		
        if(empty($tnm_accountErr))
        {   
         	include 'config.php';
	        $universal_id = $_SESSION['user_id'];
    		$service_type = $_POST['service_type'];
      
       		//Fetching data on the basis of selection to put payment record in a lox_payments table
            $query ="select * from lox_per_day_rate where md5(id)='$service_type' ";
            $rs = mysqli_query($conn,$query) or die(mysqli_error());
            $payment = mysqli_fetch_object($rs);
       		
       		$query ="select * from lox_payments where ((lox_user_id='$universal_id') && (lox_access_time_expiry=1) && (lox_passanger_type='$payment->lox_passanger_type'))";
            $rs = mysqli_query($conn,$query) or die(mysqli_error());
            $user_have_access = mysqli_fetch_array($rs);
            if($user_have_access>0)
            {
            
               echo $exist_already = "<p class='alert alert-danger' id='error' align='center'>User already have access to the specified section you can't access to same section before time expiry.</p>";
               
            }    
            else
            {	
		            $msisdn= $_POST['tnm_account'];
			       	$amount= $_POST['amount'];
			      	$receiver_type= $_POST['receiver_type'];
			       	$receiver_identifier= $_POST['receiver_identifier'];
			       	$tran_id= $_POST['tran_id'];
			       	$remark =$_POST['remark'];
			        $service_type =$_POST['type'];
			        $access_time =$_POST['access_time'];
			       	$postData = array(
								        'msisdn' => $msisdn,
								        'amount'=> $amount,
								        'receiver_type' => $receiver_type,
								        'receiver_identifier' => $receiver_identifier,
								        'tran_id' => $tran_id,
								        'remark' => $remark,
    								);
                    

     				 $Url ='http://41.78.250.114:7800/mpambaservice/v1/TransferFundsUSSDPush';

					    $ch = curl_init($Url);
					  
					    ini_set('display_errors', 1);
					    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
					    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
					    curl_setopt_array($ch, array(
					        CURLOPT_POST => TRUE,
					        CURLOPT_RETURNTRANSFER => TRUE,
					        CURLOPT_HTTPHEADER => array(
					            "access_token:6cb22d61244fdebca6fe85589b7f5eb331737b066e7a7d6a0bf578c2dc3d8193160b8e7c0ddac923759f74b52c511e6f3324b1994b0f6b3e39f6b4d5c541661f",
					            "api_caller:lox360",
					            "Content-Type: application/json"
					        ),
					        CURLOPT_POSTFIELDS => json_encode($postData)
					    ));

					    $response = curl_exec($ch);

					    if($response === FALSE)
					    {
					            echo $response;

					        die(curl_error($ch));
					    }
					    else
					    {
					        $data = json_decode($response, true);
					        
					        $trx_id = $data['transaction_id'];
					        $result_data=$data['result_desc'];
					        $response_time=$data['response_time'];
					        
					        
					        if($trx_id=='null')
					        {
					            
					            $query = "INSERT INTO lox_payments (lox_user_id,lox_payment_date,lox_passanger_type,lox_payment_amount,
					            lox_payment_status,lox_transaction_id,lox_payment_method,lox_access_time_expiry,access_time,lox_comments) 
					            VALUES ('".$universal_id."','".$response_time."','".$service_type."','".$amount."',0,0,'TNM',0,'".$access_time."','".$result_data."')";
					            mysqli_query($conn,$query) or die(mysqli_error());
					            echo "<p class='alert alert-danger' id='error' align='center'><strong> Transaction TimeOut!</strong><br> You are unable to complete the transaction or you have provided the incorrect TNM mobile account please try again.</p>"; 
					            
					            
					        }
					        else
					        {
					            $query = "INSERT INTO lox_payments (lox_user_id,lox_payment_date,lox_passanger_type,lox_payment_amount,
					            lox_payment_status,lox_transaction_id,lox_payment_method,lox_access_time_expiry,access_time,lox_comments) 
					            VALUES ('".$universal_id."','".$response_time."','".$service_type."','".$amount."',1,'".$trx_id."','TNM',1,'".$access_time."','".$result_data."')";
					            mysqli_query($conn,$query) or die(mysqli_error());
					       echo     "<p class='alert alert-success' id='error' align='center'><strong>Payment Successful!</strong><br> Thank You for your payment, you can now go to the concerned section and enjoy the contact full access details..</p>";
					        
					           
					        }
					    } 


			}		    


		    }
    
		}
	






?>