<?php

header('Content-Type as application/json');
date_default_timezone_set('UTC');
echo '{ "time": "' . date('Y-m-d H:m:s') . ' UTC" }';
exit;



