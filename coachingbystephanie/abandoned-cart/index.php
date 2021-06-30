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

