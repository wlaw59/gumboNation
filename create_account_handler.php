<?php
  session_start();

  $email = $_POST['email'];
  $password = $_POST['password'];
  $passwordv = $_POST['passwordv'];
  $name = $_POST['name1'];
  $errors = array();

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	$errors[]="Invalid email.";
}


  
  if ($password !=$passwordv) {
	   $errors[]="Invalid password.";
  }
  if (count($errors) > 0) {
    $_SESSION['messages'] = $errors;
    $_SESSION['class'] = "bad_mojo";
    header('Location: create_account.php');
    exit;
  } else {
    $_SESSION['class'] = "positive_vibes";
    $_SESSION['messages'] = array("Thanks for posting!");
  }
  $email = htmlspecialchars($email);
  $password = htmlspecialchars($password);
  // check the email and password
  require_once 'Dao.php';
  $dao = new Dao();
  $_SESSION['authenticated'] = $dao->createUser($email, $password, $name);

  if ($_SESSION['authenticated']) {
     header('Location: login.php');
     exit;
  } else {
     header('Location: create_account.php');
     exit;
  }

  
