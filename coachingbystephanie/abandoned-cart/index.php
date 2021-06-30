<?php

date_default_timezone_set('UTC');

header('Content-Type: application/json');

if ($json = json_decode(file_get_contents("php://input"), true)) {
	$data = $json;
}
else {
	$data = $_POST;
}

http_response_code(200);

define("ACTIVECAMPAIGN_URL", "https://coachingbystephanie.api-us1.com");
define("ACTIVECAMPAIGN_API_KEY", "fced1b3f5c04f685abbf06da03622f73ddcbd97a1b8ee38bf6905fa37fd67c5c909119e6");
require_once(__DIR__.'/../activecampaign-api-php/includes/ActiveCampaign.class.php');
$ac = new ActiveCampaign(ACTIVECAMPAIGN_URL, ACTIVECAMPAIGN_API_KEY);

// Adjust the default cURL timeout
$ac->set_curl_timeout(10);

$contact = array(
	"email"              => "nsfitzgerald@gmail.com",
	"first_name"         => "Nathan",
	"last_name"          => "Fitzgerald",
	"p[{$list_id}]"      => 1,
	"status[{$list_id}]" => 1, // "Active" status
);

$contact_sync = $ac->api("contact/sync", $contact);

if (!(int)$contact_sync->success) {
	// request failed
	$response =  "Syncing contact failed. Error returned: " . $contact_sync->error;
}

else {
	// successful request
	$contact_id = (int)$contact_sync->subscriber_id;
	$response = "Contact synced successfully (ID {$contact_id})!";	
}

echo json_encode(array('status' => 'OK', 'code' => 1, 'payload' => array_merge($data, $response)));
