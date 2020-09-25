<?php

$config = [
    'db' => [
        'host' => 'localhost',
        'dbname' => 'eurusdb',
        'username' => 'root',
        'password' => '',
    ],
];

if (!defined('TEMPLATES_DIR')) {
    define('TEMPLATES_DIR', realpath(dirname(__FILE__) . '/templates'));
}
