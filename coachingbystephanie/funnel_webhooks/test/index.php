<?php

date_default_timezone_set('UTC');

header('HTTP/1.1 200 OK');
header('Content-Type: application/json');

echo '{ "time": "' . date('Y-m-d H:m:s') . ' UTC" }';