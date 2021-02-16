<?php
//Accounts controller
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/bugout/connections/dbconnect.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/bugout/model/accounts-model.php';

$action = filter_input(INPUT_POST, 'action');
if ($action == null)
{
  $action = filter_input(INPUT_GET, 'action');
}

switch ($action)
{
  case 'login':
    //filter and store the data
    $useremail = filter_input(INPUT_POST, 'email');
    $userpassword = filter_input(INPUT_POST, 'password');
    
    $user = login($useremail);

    $check = password_verify($userpassword, $user['userpassword']);

    if (!$check)
    {
      $message ='Invald email or password. Please try again.';
    } 
    else
    {
          $_SESSION['useremail'] = $useremail;
    print_r($_SESSION);

    }

    include '../view/login.php';
    break;

  case 'register':
    //filter and store the data
    $userfname = filter_input(INPUT_POST, 'userfname');
    $userlname = filter_input(INPUT_POST, 'userlname');
    $useremail = filter_input(INPUT_POST, 'useremail');
    $userpassword = filter_input(INPUT_POST, 'userpassword');
  
    //check for missing data
    if (empty($userfname) || empty($userlname) || empty($useremail) || empty($userpassword))
    {
      $message = "<p>*All fields are required*/p>";
      include '../view/register.php';
      exit;
    }

    //varify password
   // $passcheck = passcheck($userpassword);
    
//    if ($passcheck === 1)
//    {
      $outcome = register($userfname, $userlname, $useremail, $userpassword);
        if ($outcome === 1)
        {
          $message = "<h3>Thank you for registering $userfname. Please login to continue.</h3>";
          include '../view/login.php';
          exit;
        }
        else
        {
          $_SESSION['message'] = "<h3>Sorry $userfname, the registration failed. Please try again.</p>";
          header('Location: ../view/register.php');
          die();
          exit;
        }
 //   }

    break;

  default:
    include '../index.php';
    break;
}
?>