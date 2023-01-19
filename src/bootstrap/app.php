<?php

require_once 'base-paths.php';
require_once __BASE_PATH . '/../vendor/autoload.php';

use Project\System\App;

$app = new App();
$app->run();