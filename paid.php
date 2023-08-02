<?php 

include "config.php";
$TransID = $_GET['TransID'];
$TransactionToken = $_GET['TransactionToken'];
$PnrID = $_GET['PnrID'];
$CompanyRef = $_GET['CompanyRef'];
$CCDapproval = $_GET['CCDapproval'];

if(empty($CompanyRef) && empty($PnrID) && !empty($TransID) && !empty($TransactionToken) && !empty($CCDapproval))
{
    
    if($TransID==$TransactionToken)
    {
        date_default_timezone_set("Africa/Blantyre");
                        $current_date_time  = date('Y-m-d H:i:s');
        
        //Fetching data on the basis of selection to put payment record in a lox_payments table
            $query ="select * from lox_payments where lox_transaction_id='$TransactionToken' ";
            $rs = mysqli_query($conn,$query) or die(mysqli_error());
            $payment = mysqli_fetch_object($rs);
            if($payment->lox_comments == 'Transaction created')
            {
                $query ="UPDATE lox_payments SET lox_payment_date='$current_date_time',lox_payment_status=1,lox_access_time_expiry=1,lox_comments='Payment Successfull' where lox_transaction_id='$TransactionToken' ";
            $rs = mysqli_query($conn,$query) or die(mysqli_error());
           
             
?>


<html>
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
      <script>
         setTimeout(function(){
            window.location.href = 'https://loxlift.com/';
         }, 5000);
      </script>
    </body>
</html>





<?php
 }
            else
            {
                echo "Invalid parameter";
            }
        
        
        
    }
    
    
}




?>
