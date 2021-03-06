<?php
//Accounts controller
session_start();

require_once 'connect.php';
require_once 'model.php';

$action = filter_input(INPUT_POST, 'action');
if ($action == null)
{
  $action = filter_input(INPUT_GET, 'action');
}

switch ($action)
{
  case 'register':
    $username = filter_input(INPUT_POST, 'username');
    $pass = filter_input(INPUT_POST, 'pass');
    $passconfirm = filter_input(INPUT_POST, 'passconfirm');

    if ($pass !== $passconfirm)
    {
      $message = $_SESSION['wrong'] = '<span color="red">Passwords do not match.</span>';
      $star = $_SESSION['star'] = '<span color="red">*</span>';
  
    }
    //check for missing data
    if (empty($username) || empty($pass))
    {
      $message = "<p>Please provide information for all fields</p>";
      header('Location: signup.php');
      die();
      exit;
    }

    $outcome = register($username, $pass);
    if ($outcome === 1)
    {
      $message = "<h3>Thank you for registering $username. Please login to continue.</h3>";
      header('Location: signin.php');
      die();
    }
    else
    {
      $message = "<h3>Sorry $username, the registration failed. Please try again.</p>";
      header('Location: signup.php');
      die();
    }

    break;

  case 'login':
    //filter and store the data
    $username = filter_input(INPUT_POST, 'username');
    $pass = filter_input(INPUT_POST, 'pass');

    $_SESSION['username'] = $username;
    $user = login($username);

    $check = password_verify($pass, $user['pass']);
    
    if (!$check)
    {
      $message = 'Invalid';
    }
        header('Location: index.php');
        die();
      
    
  
    include 'signin.php';

    break;
    

  default:
    include 'index.php';
    break;
}
?>