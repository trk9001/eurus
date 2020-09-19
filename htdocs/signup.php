<?php
if (isset($_COOKIE['UID'])) {
  header('Location: /');
  die();
}

session_start();
?>

<!doctype html>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sign Up - Eurus</title>

<h1>Eurus</h1>
<hr>

<br>

<!-- TODO: add action -->
<form action="" method="post">
  <fieldset>
    <legend>Sign Up</legend>
    <table>
      <tr>
        <td><label for="name">Name:</label></td>
        <td>
          <input type="text" id="name" name="name" autofocus>
          <span class="error">
          <?php
          if (isset($_SESSION['name_err'])) {
            echo $_SESSION['name_err'];
          }
          ?>
          </span>
        </td>
      </tr>
      <tr>
        <td><label for="email_address">Email Address:</label></td>
        <td>
          <input type="email" id="email_address" name="email_address" autofocus>
          <span class="error">
          <?php
          if (isset($_SESSION['email_address_err'])) {
            echo $_SESSION['email_address_err'];
          }
          ?>
          </span>
        </td>
      </tr>
      <tr>
        <td><label for="password">Password:</label></td>
        <td>
          <input type="password" id="password" name="password">
          <span class="error">
          <?php
          if (isset($_SESSION['password_err'])) {
            echo '* ' . $_SESSION['password_err'];
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

<!-- TODO: add links -->
<p><a href=""><code>&lt;log in/&gt;</code></a> &nbsp; <a href="/"><code>&lt;home/&gt;</code></a></p>

<?php
session_unset();
session_destroy();
?>
