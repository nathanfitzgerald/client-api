<?php

header('HTTP/1.1 200 OK');
header('Content-Type: application/json');
date_default_timezone_set('UTC');
echo '{ "time": "' . date('Y-m-d H:m:s') . ' UTC" }';
exit;



