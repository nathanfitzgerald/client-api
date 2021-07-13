<?php

date_default_timezone_set('UTC');

// include ActiveCampaign API
define("ACTIVECAMPAIGN_URL", "https://coachingbystephanie.api-us1.com");
define("ACTIVECAMPAIGN_API_KEY", "fced1b3f5c04f685abbf06da03622f73ddcbd97a1b8ee38bf6905fa37fd67c5c909119e6");
require_once(__DIR__.'/../../activecampaign-api-php/includes/ActiveCampaign.class.php');
$ac = new ActiveCampaign(ACTIVECAMPAIGN_URL, ACTIVECAMPAIGN_API_KEY);

// Adjust the default cURL timeout
$ac->set_curl_timeout(10);

// add to main list
$list_id = 1;

$tagData = array(
	"contact" => "933",
	"tag" => "16"
);

$tagResponse = $ac->api("contact/tag_add", $tagData);

echo '<pre>';
print_r($tagResponse);
