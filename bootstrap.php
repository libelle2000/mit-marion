<?php

declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', '0');
require_once __DIR__ . '/vendor/autoload.php';
$factory = new MitMarion\Factory(new \Shared\Factory());
