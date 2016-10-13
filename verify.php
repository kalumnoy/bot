<?php
$access_token = '226HEM4w9ug9K7DFnZzynhgNw1L3RKMKWw2vNlcDHN5OYdJ4s6WKofNeZDSR6rMqLDzeN9nOPDfYTm6oCuQUS/ZP5jjnc6loBZz9XfLVwoAO4B01AdizKDtGUTLeGpzhx23o+2TdhjKMnpmyMuMhUgdB04t89/1O/w1cDnyilFU=';
$proxy = 'http://fixie:oBL9Yw6bHNTdR5j@velodrome.usefixie.com:80';
$proxyauth = 'kalumnoy.38@gmail.com:11august1992';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_PROXY, $proxy);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);

curl_setopt($ch, CURLOPT_PROXY, $proxy);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);

$result = curl_exec($ch);
curl_close($ch);

echo $result;
