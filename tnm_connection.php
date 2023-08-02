<?php 

$postData = array(
        'msisdn' => '265888416627',
        'amount'=>60000.00,
        'receiver_type' => 4,
        'receiver_identifier' => 'loxlift',
        'tran_id' => 'FDE243324',
        'remark' => 'Testing Api',
    );

    $Url ='http://41.78.250.114:7800/ussdpush/v1/TransactionRequest';

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
            
        var_dump($data);    
    }


?>