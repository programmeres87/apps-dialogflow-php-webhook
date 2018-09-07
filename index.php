<?php 
$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'POST') {
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);
	
	$paramGeoCity = ucfirst($json->queryResult->queryText);
	$paramBedroom = $json->queryResult->parameters->bedroom;
	
	//echo $paramGeoCity . " ~ " . $paramBedroom;
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
	$fulfillmentText = "We have " . rand(1, 1000) . " apartment listings at " . $paramGeoCity . " with " . $paramBedroom;
	
	$response = new \stdClass();
	$response->fulfillmentText = $fulfillmentText;
	//$response->displayText = $fulfillmentText;
	//$response->source = "webhook";
	echo json_encode($response);
} else {
	echo "Method not allowed by els";
}
?>
