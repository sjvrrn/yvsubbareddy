<?php
 
if (!function_exists('send_sms')) {
   
    function send_sms($mobile, $message)
    {
    // http://bhashsms.com/api/sendmsg.php?user=amaraa&pass=amaraa1234&sender=amaraa&phone=9908372997&text=Test%20SMS&priority=ndnd&stype=normal
	// Message details
	$numbers = urlencode($mobile);
	$sender = urlencode('amaraa');
	$message = rawurlencode($message);
	$username = 'amaraa';
	$password = 'amaraa1234';
 
	// Prepare data for POST request
	$data = 'user='.$username.'&pass='.$password.'&sender='.$sender.'&phone='.$numbers.'&text='.$message.'&priority=ndnd&stype=normal';

	// Send the GET request with cURL
	$ch = curl_init('http://bhashsms.com/api/sendmsg.php?' . $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	
	// Process your response here
	echo $response;
 
    }
}
 