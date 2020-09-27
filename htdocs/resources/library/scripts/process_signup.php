<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root . '/resources/config.php';
require_once LIBRARY_DIR . '/includes/procinput.php';
require_once LIBRARY_DIR . '/includes/initdb.php';

$name = $email_address = $password_hash = null;
$errors = [];

if (empty($_POST['name'])) {
    $errors['name'] = 'Name is required';
    $errors_exist = true;
} else {
    $p = process_user_input($_POST['name'], 'name');
    if ($p['error']) {
        $errors['name'] = $p['error'];
    } else {
        $name = $p['data'];
    }
}

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
$query = "select count(*) as count from user where";
$query .= " email_address='$email_address'";
$res = mysqli_query($con, $query);
if (!$res) {
    die('MySQL query error: ' . mysqli_error($con));
} else {
    $row = mysqli_fetch_assoc($res);
    $count = $row['count'];
    if ($count != 0) {
        $errors['email_address'] = 'Email address already exists';
    }
}
mysqli_close($con);

if ($errors) {
    session_start();
    $_SESSION['errors'] = $errors;
    header('Location: /signup.php');
    die();
}

$con = mysqli_connection_procedural();
$name = mysqli_real_escape_string($con, $name);
$password_hash = mysqli_real_escape_string($con, $password_hash);
$query = "insert into user (name, email_address, password_hash)";
$query .= " values ('$name', '$email_address', '$password_hash')";
$res = mysqli_query($con, $query);
if (!$res) {
    die('MySQL query error: ' . mysqli_error($con));
}
mysqli_close($con);

header('Location: /login.php');
die();
?>
