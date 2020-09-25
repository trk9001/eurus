<?php

$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root . '/resources/config.php';

function mysqli_connection_procedural() {
    global $config;
    $conn = mysqli_connect(
        $config['db']['host'],
        $config['db']['username'],
        $config['db']['password'],
        $config['db']['dbname']
    );

    if (mysqli_connect_errno()) {
        die('Connection to MySQL failed: ' . mysqli_connect_error());
    }

    return $conn;
}
