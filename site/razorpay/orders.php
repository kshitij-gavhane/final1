<?php
$name = $_GET['name'];
$email = $_GET['email'];

$key = "rzp_test_K8jOPBaJ3H42yz";
$token = "YlZjeHmEWsE9MIqnru0YhOjf";
$url = "https://api.razorpay.com/v1/orders ";
$rec = "NMC_".date('Y'.'m'.'d'.'H'.'i'.'s');
$ch=curl_init();
curl_setopt($ch, CURLOPT_URL  ,$url);
curl_setopt($ch, CURLOPT_POST  ,true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,true);
curl_setopt($ch, CURLOPT_USERPWD  ,$key.":".$token  );
curl_setopt($ch, CURLOPT_HTTPHEADER  ,array('content-type:application/json'));
$data = <<< JSON
{
    "amount": 500,
    "currency": "INR",
    "receipt": $rec,
    "partial_payment": true,
    "first_payment_min_amount": 230
    "notes": {
        "name": "$name",
        "email": "$email"
    }
}
JSON;
curl_setopt($ch, CURLOPT_POSTFIELDS, $url);
$response = curl_exec($ch);
$decode = json_decode($response);
$orderID = $decode ->id;

//  echo"$response";
?>