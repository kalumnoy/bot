<?php
$access_token = '226HEM4w9ug9K7DFnZzynhgNw1L3RKMKWw2vNlcDHN5OYdJ4s6WKofNeZDSR6rMqLDzeN9nOPDfYTm6oCuQUS/ZP5jjnc6loBZz9XfLVwoAO4B01AdizKDtGUTLeGpzhx23o+2TdhjKMnpmyMuMhUgdB04t89/1O/w1cDnyilFU=';
$proxy = 'http://fixie:oBL9Yw6bHNTdR5j@velodrome.usefixie.com:80';
$proxyauth = 'kalumnoy.38@gmail.com:11august1992';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $text
			];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [
				{    	 "type":"text",
           				 "text":"Hello, user"
      				},
       				{
           				"type":"text",
          				"text":"May I help you?"
      				}
					      ],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($ch, CURLOPT_PROXY, $proxy);
			curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}
echo "OK";
