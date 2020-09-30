<?php
if (!isset($_COOKIE['UID'])) {
  header('Location: /login.php');
  die();
}

$page_title = 'Eurus';
require_once './resources/config.php';
require_once TEMPLATES_DIR . '/header.php';

?>

<link rel="stylesheet" href="/static/fontawesome/css/all.css">

<main class="container">
  <div class="row header px-5 py-4 justify-content-center">
    <div class="col-md-8">
      <div id="current-time"><span id="current-time-text"></span></div>
      <div id="current-date"><span id="current-date-text"></span></div>
      <div id="current-temperature-label">Temperature</div>
      <div id="current_temperature"></div>
    </div>
    <div class="col-md-4 my-4 py-5 border-left text-center">
      <i class="fas" id="current-time-icon"></i>
    </div>
  </div>

  <div class="row mb-1 today rounded-bottom">
    <div class="container">
      <div class="row m-2 px-1 justify-content-center">
        <div class="col-md-2 data-item">
          <h2>TODAY</h2>
        </div>
        <div class="col-md-2 data-item text-center">
          <h3>TEMPERATURE</h3>
          <span class="temperature"></span>
        </div>
        <div class="col-md-2 data-item text-center">
          <h3>PRESSURE</h3>
          <span class="pressure_mb"></span>
        </div>
        <div class="col-md-2 data-item text-center">
          <h3>WIND</h3>
          <span class="wind"></span>
        </div>
        <div class="col-md-2 data-item text-center">
          <h3>HUMIDITY</h3>
          <span class="humidity"></span>
        </div>
      </div>
    </div>
  </div>
</main>

<p><a href="/logout.php"><code>&lt;log out/&gt;</code></a></p>

<script src="/static/script.js"></script>
