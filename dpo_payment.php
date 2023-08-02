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
           
            //Fetching data on the basis of selection to put payment record in a lox_payments table
                    $query ="select * from lox_per_day_rate where md5(id)='$service_type' ";
                    $rs = mysqli_query($conn,$query) or die(mysqli_error());
                    $payment = mysqli_fetch_object($rs);
              
            //Fetching User Record        
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
                                //The XML string that you want to send.
                        date_default_timezone_set("Africa/Blantyre");
                        $current_date_time  = date('Y-m-d H:i:s');
                        
                        $xml_time = date('Y/m/d H:i');
                       
                        $fullname=explode(" ",$users->name);
                        
                        if(empty($users->address))
                        {
                            $address = $users->cityname;
                        }
                        else
                        {
                            $address = $users->address;
                        }



                        $xml = '<?xml version="1.0" encoding="utf-8"?>
                        <API3G>
                        <CompanyToken>FAD8D5CB-ACB7-4C69-8B86-087F03855B9C</CompanyToken>
                        <Request>createToken</Request>
                        <Transaction>
                                <PaymentAmount>'.$payment->lox_passanger_logistic_rate.'</PaymentAmount>
                                <PaymentCurrency>MWK</PaymentCurrency>
                                <PTL>1</PTL>
                                <DefaultPayment>CC</DefaultPayment>
                                <customerFirstName>'.$fullname[0].'</customerFirstName>
                                <customerLastName>'.$fullname[1] .' . '. $fullname[2].'</customerLastName>
                                <customerCity>'.$users->cityname.'</customerCity>
                                <customerCountry>MW</customerCountry>
                                <customerAddress>'.$address.'</customerAddress>
                                <CardHolderName>'.$users->name.'</CardHolderName>
                                <customerEmail>'.$users->email.'</customerEmail>
                                <customerPhone>'.$users->mobile.'</customerPhone>
                                <DefaultPaymentCountry>Malawi</DefaultPaymentCountry>
                                <RedirectURL>https://www.loxlift.com/paid.php</RedirectURL>
                                <BackURL>https://www.loxlift.com/cancel.php</BackURL>
                            </Transaction>
                        <Services>
                          <Service>
                            <ServiceType>43905</ServiceType>
                            <ServiceDescription>Drivers Full Record Access For '.$payment->lox_passanger_logistic_time.' Hour in '.$payment->lox_passanger_logistic_rate.'.00 MWK.</ServiceDescription>
                            <ServiceDate>'.$xml_time.'</ServiceDate>
                          </Service>
                        </Services>
                        </API3G>';
                        //The URL that you want to send your XML to.
                        $url = 'https://secure.3gdirectpay.com/API/v6/';
                        //Initiate cURL
                        $curl = curl_init($url);
                        //Set the Content-Type to text/xml.
                        curl_setopt ($curl, CURLOPT_HTTPHEADER, array("Content-Type: text/xml"));
                        //Set CURLOPT_POST to true to send a POST request.
                        curl_setopt($curl, CURLOPT_POST, true);
                        //Attach the XML string to the body of our request.
                        curl_setopt($curl, CURLOPT_POSTFIELDS, $xml);
                        //Tell cURL that we want the response to be returned as
                        //a string instead of being dumped to the output.
                        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                        //Execute the POST request and send our XML.
                        $result = curl_exec($curl);
                        //Do some basic error checking.
                        if(curl_errno($curl)){
                            throw new Exception(curl_error($curl));
                        }
                        //Close the cURL handle.
                        curl_close($curl);
                        //Print out the response output.
                        $xml=simplexml_load_string($result);

                        $TransToken = $xml->TransToken;
                        if(!empty($TransToken))
                        {
                            $query = "INSERT INTO lox_payments (lox_user_id,lox_payment_date,lox_passanger_type,lox_payment_amount,
            lox_payment_status,lox_transaction_id,lox_payment_method,lox_access_time_expiry,access_time,lox_comments) 
            VALUES ('".$universal_id."','".$current_date_time."','".$payment->lox_passanger_type."','".$payment->lox_passanger_logistic_rate."',0,'".$xml->TransToken."','DPO',0,'".$payment->lox_passanger_logistic_time."','".$xml->ResultExplanation."')";
                        mysqli_query($conn,$query) or die(mysqli_error());
                            header("Location:  https://secure.3gdirectpay.com/pay.asp?ID=$TransToken");
                        }
                        else
                        {
                            echo 'There is problem';
                        }
                    }
        }

    }    
?>