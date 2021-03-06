<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'].'/bugout/common/header.php';
?>

<main>
  <h2>Log Into Bug Out Survival</h2>

  <?php
  if (isset($message))
    {
      echo $message;
    }
  else if (isset($_SESSION['message']))
    {
      echo "<p class='message'>".$_SESSION['message']."</p>";
    }
  ?>


  <form action="/bugout/accounts/index.php" method="POST">
    <label for="email">Email</label><br>
    <input name="email" id="email" type="email" required><br><br>
    <label for="password">Password</label><br>
    <input type="password" name="password" id="password" required><br><br>
    <input type="submit" value="Login" class="btn">

    <input type="hidden" name="action" value="login">
  </form><br>

<div class="sort">
  <button class="btn" onclick="location.href='/bugout/accounts/index.php?action=register'" title="Register for a Bugout Survival account.">Not a member yet?</button>
</div>

</main>

<?php
include $_SERVER['DOCUMENT_ROOT'].'/bugout/common/footer.php';
?>