<?php 
$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'POST') {
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);
	
	$paramGeoCity = $json->queryResult->parameters->geo_city;
	
	/*
	echo $paramGeoCity;

	//echo $text;
	switch ($text) {
		case 'hi':
			$fulfillmentText = "Hi, Nice to meet you";
			break;
		case 'bye':
			$fulfillmentText = "Bye, good night";
			break;
		case 'anything':
			$fulfillmentText = "Yes, you can type anything here.";
			break;
		case 'dialog':
			$fulfillmentText = "Yes, you can type dialog here.";
			break;		
		default:
			$fulfillmentText = "Sorry, I didnt get that. Please ask me something else.";
			break;
	}
	*/
	$fullfilmentText = "We have 33 apartment listings below, which is the most suitable for you?";
	
	$response = new \stdClass();
	$response->fulfillmentText = $fulfillmentText;
	//$response->displayText = $fulfillmentText;
	//$response->source = "webhook";
	echo json_encode($response);
} else {
	echo "Method not allowed by els";
}
?>
