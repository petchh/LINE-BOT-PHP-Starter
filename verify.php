<?php
$access_token = 'mdUfi036U4HKokM8zkcdBmj5imHO0bw7lvrCHU6oMuA4y2U+dM0kjKqgpSwYVz6r/5Dn3S7qL+OyYaI2S7YTivOsVtD3Oy9S7yivMUAnvPZxHdPPT6Vkl+LjO3PncXf913PbKdos1qkWz1oOPOCQswdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;

