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
       
        include "config.php";
       $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
       $universal_id = $_SESSION['user_id'];
       $msisdn= $_GET['msisdn'];
       $amount= $_GET['amount'];
       $receiver_type= $_GET['receiver_type'];
       $receiver_identifier= $_GET['receiver_identifier'];
       $tran_id= $_GET['tran_id'];
       $remark =$_GET['remark'];
        $service_type =$_GET['type'];
        $access_time =$_GET['access_time'];
       $postData = array(
        'msisdn' => $msisdn,
        'amount'=>$amount,
        'receiver_type' => $receiver_type,
        'receiver_identifier' => $receiver_identifier,
        'tran_id' => $tran_id,
        'remark' => $remark,
    );


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
            VALUES ('".$universal_id."','".$response_time."','".$service_type."','".$amount."',0,0,'TNM',0,'".$access_time."','".$result_data."')";
            mysqli_query($conn,$query) or die(mysqli_error());
            echo '<p ><html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
  </head>
    <style>
      body {
        text-align: center;
       
        background: #EBF0F5;
      }
        h1 {
          color: #B01F70;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-weight: 900;
          font-size: 40px;
         
        }
        p {
          color: #404F5E;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-size:20px;
          margin: 0;
        }
      i {
        color: #B01F70;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
      }
      .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        
      }
    </style>
    <body>
      <div class="card">
      <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
        <i class="checkmark">X</i>
      </div>
        <h1>Oops!</h1> 
        <p>There is problem in your payment. Please be sure that your screen is not timeout and you have enough balance to complete this transaction.</p>
        <p></p>
      </div>
    </body>
</html>'; 
            
            
        }
        else
        {
            $query = "INSERT INTO lox_payments (lox_user_id,lox_payment_date,lox_passanger_type,lox_payment_amount,
            lox_payment_status,lox_transaction_id,lox_payment_method,lox_access_time_expiry,access_time,lox_comments) 
            VALUES ('".$universal_id."','".$response_time."','".$service_type."','".$amount."',1,'".$trx_id."','TNM',1,'".$access_time."','".$result_data."')";
            mysqli_query($conn,$query) or die(mysqli_error());
            echo'<p ><html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
  </head>
    <style>
      body {
        text-align: center;
        
        background: #EBF0F5;
      }
        h1 {
          color: #88B04B;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-weight: 900;
          font-size: 40px;
         
        }
        p {
          color: #404F5E;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-size:20px;
          margin: 0;
        }
      i {
        color: #9ABC66;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
      }
      .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
       
      }
    </style>
    <body>
      <div class="card">
      <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
        <i class="checkmark">✓</i>
      </div>
        <h1>Success</h1> 
        <p>Your payment is successfull.</p>
       
      </div>
    </body>
</html>'; 
           
        }
       
          
    }
   }

}

?>
