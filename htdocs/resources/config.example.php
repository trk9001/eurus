<?php

$config = [
    'db' => [
        'host' => 'localhost',
        'dbname' => 'eurusdb',
        'username' => 'root',
        'password' => '',
    ],
    'OWM_API_KEY' => 'XXX',
];

if (!defined('LIBRARY_DIR')) {
    define('LIBRARY_DIR', realpath(__DIR__ . '/library'));
}

if (!defined('PUBLIC_SCRIPTS_DIR')) {
    $prefix = dirname(__DIR__);
    $pubscr_path = substr(__DIR__, strlen($prefix));
    // The `realpath` function doesn't seem to work for the next line.
    define('PUBLIC_SCRIPTS_DIR', $pubscr_path . '/library/scripts');
}

if (!defined('TEMPLATES_DIR')) {
    define('TEMPLATES_DIR', realpath(__DIR__ . '/templates'));
}
