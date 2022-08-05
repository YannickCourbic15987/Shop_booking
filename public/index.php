<?php

use App\Autoloader;

define('ROOT', dirname(__DIR__));

require_once '../Autoloader.php';

Autoloader::register();


$app = new Main();
