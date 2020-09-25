<?php
if (!isset($_COOKIE['UID'])) {
  header('Location: /login.php');
  die();
}

$page_title = 'Eurus';
require_once './resources/config.php';
require_once TEMPLATES_DIR . '/header.php';

?>

<p><em>There's an east wind coming, Watson.</em></p>
