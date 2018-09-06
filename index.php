<?php 

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);
	
	//var_dump($json);
	$text = $json->queryResult->parameters->text;
	
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
		
		default:
			$fulfillmentText = "Sorry, I didnt get that. Please ask me something else.";
			break;
	}

	$response = new \stdClass();
	$response->fulfillmentMessages = array($fulfillmentText);
	//$response->displayText = $fulfillmentText;
	//$response->source = "webhook";
	echo json_encode($response);
}
else
{
	echo "Method not allowed by els";
}

?>
