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
    //SHOWING RECORD OF USERS OR PASSANGERS IN NAV HIDDEN OR SHOW BAR
    $universal_id = $_SESSION['user_id'];
    $service_type = $_GET['service_id'];
    if ($_SESSION['name']=="passanger") 
    {   
       //Fetching data on the basis of selection to put payment record in a lox_payments table
            $query ="select * from lox_per_day_rate where md5(id)='$service_type' ";
            $rs = mysqli_query($conn,$query) or die(mysqli_error());
            $payment = mysqli_fetch_object($rs);
       //Fetching data on the basis of selection to put payment record in a lox_payments table
            $query ="select * from users where id='$universal_id' ";
            $rs = mysqli_query($conn,$query) or die(mysqli_error());
            $users = mysqli_fetch_object($rs);


       $query ="select * from lox_payments where ((lox_user_id='$universal_id') && (lox_access_time_expiry=1) && (lox_passanger_type='$payment->lox_passanger_type'))";
            $rs = mysqli_query($conn,$query) or die(mysqli_error());
            $user_have_access = mysqli_fetch_array($rs);
            if($user_have_access>0)
            {
            
                $_SESSION['message_success'] = "<p class='alert alert-danger'>User already have access to the specified section you can't access to same section before time expiry.</p>";
                header('location:pricing.php');
            }     

    else
    {        


    
?>
        <!-- Page Title-->
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
          color: #49b01f;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-weight: 900;
          font-size: 40px;
          
        }
        p {
          color: #404F5E;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-size:20px;
          
        }
      
      .card {
        background: white;
        padding: 20px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
      }
    </style>
    <body>
      <div class="card">
       <h1>TNM Payment is in progress....</h1>
         <p>Please check your mobile screen a flash message has been sent on your mobile number <?php echo $users->mobile?>. Enter your TNM pin to complete the transaction!</p>
                    </p>
        <p></p>
      
          <p><iframe src="payment_confirmation.php?msisdn=<?php echo $users->mobile?>&amount=<?php echo $payment->lox_passanger_logistic_rate?>&
receiver_type=4&receiver_identifier=601794&tran_id=<?php mt_srand(mktime());echo(mt_rand());?>&remark=TNM Payment&type=<?php echo $payment->lox_passanger_type?>&access_time=<?php echo $payment->lox_passanger_logistic_time ?> 

" frameborder="0" width="100%" height="100%" style="overflow:hidden;"></iframe></p>        

</div>
                            </div>
                                  
                                
                           
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
         
        <!-- End Page Content-->
   <?php  }}}}

?>
 </body>
</html>