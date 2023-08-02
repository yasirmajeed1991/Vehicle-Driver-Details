<?php 
include 'config.php';
$postData = array(
        'msisdn' => '265888416627',
        'amount'=>100.00,
        'receiver_type' => 4,
        'receiver_identifier' => '601794',
        'tran_id' => 'FDE243324',
        'remark' => 'Testing Api',
    );

 //   $Url ='41.78.250.114:7800/ussdpush/v1/TransactionRequest';
      $Url ='http://41.78.250.114:7800/mpambaservice/v1/TransferFundsUSSDPush';

    $ch = curl_init($Url);
    error_reporting(E_ALL);
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

    if($response === FALSE){
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
            VALUES (32,'".$response_time."',2,100,0,0,'TNM',0,0,'".$result_data."')";
            mysqli_query($conn,$query) or die(mysqli_error());
            echo $result_data;
            
        }
        else
        {
            $query = "INSERT INTO lox_payments (lox_user_id,lox_payment_date,lox_passanger_type,lox_payment_amount,
            lox_payment_status,lox_transaction_id,lox_payment_method,lox_access_time_expiry,access_time,lox_comments) 
            VALUES (32,'".$response_time."',2,100,1,'".$trx_id."','TNM',1,1,'".$result_data."')";
            mysqli_query($conn,$query) or die(mysqli_error());
            echo 'Payment Successful!';
        }
       
          
    }


?>