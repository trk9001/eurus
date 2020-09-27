<?php
if (isset($_COOKIE['UID'])) {
  header('Location: /');
  die();
}

session_start();

$errors = [];
if (isset($_SESSION['errors'])) {
  $errors = $_SESSION['errors'];
}

$page_title = 'Log In - Eurus';
require_once './resources/config.php';
require_once TEMPLATES_DIR . '/header.php';

?>

<form action="<?= PUBLIC_SCRIPTS_DIR . '/process_login.php' ?>" method="post">
  <fieldset>
    <legend>Log In</legend>
    <table>
      <tr>
        <td><label for="email_address">Email Address:</label></td>
        <td>
          <input type="email" id="email_address" name="email_address" required autofocus>
          <span class="error">
          <?php
          if (!empty($errors['email_address'])) {
            echo $errors['email_address'];
          }
          ?>
          </span>
        </td>
      </tr>
      <tr>
        <td><label for="password">Password:</label></td>
        <td>
          <input type="password" id="password" name="password" required>
          <span class="error">
          <?php
          if (!empty($errors['password'])) {
            echo $errors['password'];
          }
          ?>
          </span>
        </td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" value="Submit"></td>
      </tr>
    </table>
  </fieldset>
</form>

<p><a href="/signup.php"><code>&lt;sign up/&gt;</code></a> &nbsp; <a href="/"><code>&lt;home/&gt;</code></a></p>

<?php
session_unset();
session_destroy();
?>
