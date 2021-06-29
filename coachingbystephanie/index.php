<?php

define("ACTIVECAMPAIGN_URL", "https://coachingbystephanie.api-us1.com");
define("ACTIVECAMPAIGN_API_KEY", "fced1b3f5c04f685abbf06da03622f73ddcbd97a1b8ee38bf6905fa37fd67c5c909119e6");
require_once("./activecampaign-api-php/includes/ActiveCampaign.class.php");
$ac = new ActiveCampaign(ACTIVECAMPAIGN_URL, ACTIVECAMPAIGN_API_KEY);

// Adjust the default cURL timeout
$ac->set_curl_timeout(10);

if (!(int)$ac->credentials_test()) {
	echo "<p>Access denied: Invalid credentials (URL and/or API key).</p>";
	exit();
}
	
echo "<p>Credentials valid! Proceeding...</p>";

$account = $ac->api("account/view");

echo "<pre>";
print_r($account);
echo "</pre>";

echo 'Hello Coaching By Stephanie';