<?php

date_default_timezone_set('UTC');

header('HTTP/1.1 200 OK');
header('Content-Type: application/json');

echo '{ "time": "' . date('Y-m-d H:m:s') . ' UTC" }';

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
	echo "<p>Syncing contact failed. Error returned: " . $contact_sync->error . "</p>";
	exit();
}
    
// successful request
$contact_id = (int)$contact_sync->subscriber_id;
echo "<p>Contact synced successfully (ID {$contact_id})!</p>";
