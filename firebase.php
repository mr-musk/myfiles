<?php

	$token = $_GET['token'] ;
	$title = $_GET['title'];
    $body = $_GET['body'] ;		
	
    //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	$url = "https://fcm.googleapis.com/fcm/send";
    $serverKey = 'AAAA_VJZjMk:APA91bGMFeixpNsNo8RRTlux2ypvi28hJu5bAPQB42R-NAe2JT8z2Zy343RLQQ7-XklVZSEIM26Xs-n7YMa7herMYhb3g5FYEYnesgygGz-9EvsLQG1aRdPCVhk0k_gRErNYo8fK93YO';
	//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	

$datamsg = array(
    'title'   => $title,
    'body'  => $body
);

    $arrayToSend = array('to' => $token,'priority'=>'high', 'data'=> $datamsg);
    $json = json_encode($arrayToSend);
    $headers = array();
    $headers[] = 'Content-Type: application/json';
    $headers[] = 'Authorization: key='. $serverKey;
    
    
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
    //Send the request
    $response = curl_exec($ch);
    //Close request
    if ($response === FALSE) {
    die('FCM Send Error: ' . curl_error($ch));
    }
    curl_close($ch);
	

	
?>
