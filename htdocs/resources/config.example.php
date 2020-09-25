<?php

$config = [
    'db' => [
        'host' => 'localhost',
        'dbname' => 'eurusdb',
        'username' => 'root',
        'password' => '',
    ],
];

if (!defined('LIBRARY_DIR')) {
    define('LIBRARY_DIR', realpath(dirname(__FILE__) . '/library'));
}

if (!defined('TEMPLATES_DIR')) {
    define('TEMPLATES_DIR', realpath(dirname(__FILE__) . '/templates'));
}
