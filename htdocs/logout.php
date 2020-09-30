<?php
setcookie('UID', '', time() - 3600, '/');
setcookie('CID', '', time() - 3600, '/');
header('Location: /');
die();
?>
