<?php  
//Function to send SMS to member using MobileSasa API
function sendSMS($name,$service)
{

	// Get the Mobile Sasa API Key
	$apikey = "---------------";

	 //Send code to approver
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.mobilesasa.com/v1/send/message',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS =>'{
    "senderID": "MOBILESASA",
    "message": "Hi '.$name.', you have registered for '.$service.' \n\nMy Church\n0722 000 000",
    "phone": "'.$phone.'"
    }',
    CURLOPT_HTTPHEADER => array(
       'Content-Type: application/json',
       'Accept: application/json',
       'Authorization: Bearer '.$apikey.''
     ),
   ));

    $response = curl_exec($curl);
    curl_close($curl); 

}

?>