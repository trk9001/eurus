<?php
if (!isset($_COOKIE['UID'])) {
  header('Location: /login.php');
  die();
}

require_once './resources/config.php';

$api_url = "http://api.openweathermap.org/data/2.5/weather?";
$api_url .= "q=Dhaka&units=metric&appid={$config['OWM_API_KEY']}";
$json_data_in = file_get_contents($api_url);
$data_in = json_decode($json_data_in);

$data_out = [
  'temperature' => $data_in->main->temp,
  'pressure_mb' => $data_in->main->pressure,
  'wind' => $data_in->wind->speed,
  'humidity' => $data_in->main->humidity,
];
$json_data_out = json_encode($data_out);
header('Content-Type: application/json');
echo $json_data_out;

?>
