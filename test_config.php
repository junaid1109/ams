<?php

// Test if config loading works
require_once 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';

$container = $app;
$container->make('config')->set('app.debug', true);

$cookieConfig = $container->make('config')->get('cookie');

echo "Cookie config:\n";
var_dump($cookieConfig);

if (isset($cookieConfig['path'])) {
    echo "\n✓ 'path' key exists: " . $cookieConfig['path'] . "\n";
} else {
    echo "\n✗ 'path' key NOT FOUND\n";
}
