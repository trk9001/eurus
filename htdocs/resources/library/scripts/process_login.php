<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root . '/resources/config.php';
require_once LIBRARY_DIR . '/includes/procinput.php';
require_once LIBRARY_DIR . '/includes/initdb.php';

$name = $email_address = $password_hash = null;
$errors = [];

if (empty($_POST['email_address'])) {
    $errors['email_address'] = 'Email address is required';
    $errors_exist = true;
} else {
    $p = process_user_input($_POST['email_address'], 'email_address');
    if ($p['error']) {
        $errors['email_address'] = $p['error'];
    } else {
        $email_address = $p['data'];
    }
}

if (empty($_POST['password'])) {
    $errors['password'] = 'Password is required';
    $errors_exist = true;
} else {
    $p = process_user_input($_POST['password'], 'password');
    if ($p['error']) {
        $errors['password'] = $p['error'];
    } else {
        $password_hash = $p['data'];
    }
}

$con = mysqli_connection_procedural();
$email_address = mysqli_real_escape_string($con, $email_address);
$query = "select * from user where email_address='$email_address'";
$res = mysqli_query($con, $query);
if (!$res) {
    die('MySQL query error: ' . mysqli_error($con));
} else {
    $row = mysqli_fetch_assoc($res);
}
mysqli_close($con);

if (!$row) {
    $errors['email_address'] = 'Email address not found';
} else {
    if (strcmp($row['password_hash'], $password_hash)) {
        $errors['password'] = 'Incorrect password';
    }
}

if ($errors) {
    session_start();
    $_SESSION['errors'] = $errors;
    header('Location: /login.php');
    die();
}

setcookie('UID', $row['id'], time() + (86400 * 30), '/');
if (!empty($row['city_id'])) {
  setcookie('CID', $row['city_id'], time() + (86400 * 30), '/');
}

header('Location: /');
die();
?>
