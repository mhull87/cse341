<?php
session_start();

if (isset($message))
{
  echo $message;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign-Up</title>
</head>

<body>
  <h1>Sign-up</h1>

  <form method='post' action="controller.php">
    <label for="username">Username: </label>
    <input type="text" id="username" name="username">
    <label for="pass">Password: </label>
    <input type="password" id="pass" name="pass">
    <input type="submit" value="Register">
    <input type="hidden" name="action" value="register">
  </form>

  <a href="signin.php">Sign In Here</a>
</body>

</html>