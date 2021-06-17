<?php
session_start();
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://test.www.instamojo.com/api/1.1/payment-requests/');
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:test_93798f2cb362e1b23b666d7a82f",
                  "X-Auth-Token:test_9982e61d7b516f41fb39ca36ac2"));
$payload = Array(
    'purpose' => 'Buy domain name',
    'amount' => '10',
    'phone' => '8988789765',
    'buyer_name' => 'Sangeeta Malviya',
    'redirect_url' => 'http://localhost/APIs/web/redirect.php',
    'send_email' => true,
    'send_sms' => true,
    'email' => 'phpsangeeta@gmail.com',
    'allow_repeated_payments' => false
);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
$response = curl_exec($ch);
curl_close($ch); 
$response=json_decode($response);

echo '<pre>';

print_r($response);

?>