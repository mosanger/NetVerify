<?php

error_reporting(E_ALL | E_STRICT);

$loader = require dirname(__DIR__) . '/vendor/autoload.php';
$loader->add('NetVerify\\', __DIR__);

