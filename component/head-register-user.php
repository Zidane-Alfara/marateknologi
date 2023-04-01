<?php

include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username_user'])) {
    header("Location: https://marateknologi.com/");
}

  if (!isset($_SESSION['token'])) {
      $_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(32));
  }
  
  if (!isset($_POST['submit-register-user']) && $_SESSION['token'] == mysqli_real_escape_string($conn, htmlspecialchars($_POST['token_form_register']))) {
      session_destroy();
  }

if (isset($_POST['submit-register-user'])) {
  $username = mysqli_real_escape_string($conn, htmlspecialchars($_POST['username']));
  $email = mysqli_real_escape_string($conn, htmlspecialchars($_POST['email']));
  $password = mysqli_real_escape_string($conn, htmlspecialchars(md5($_POST['password'])));
  $cpassword = mysqli_real_escape_string($conn, htmlspecialchars(md5($_POST['cpassword'])));

  $emailValid = ['gmail.com','marateknologi.com'];
  $emailUser = explode('@', $email);
  $emailUser = strtolower($emailUser[1]);
  if ( !in_array($emailUser, $emailValid)) {
      
      $_SESSION['register'] = "Must use gmail.com";
          
      echo "<script>document.location = 'https://marateknologi.com/'</script>";
      
      return false;
  }

  if ($password == $cpassword) {
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    if (!$result->num_rows > 0) {
      $sql = "INSERT INTO users (username, email, password)
          VALUES ('$username', '$email', '$password')";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        echo "<script>alert('Wow! User Registration Completed.')</script>";
        $username = "";
        $email = "";
        $password = $_POST['password'] = "";
        $cpassword = $_POST['cpassword'] = "";
      } else {
        echo "<script>alert('Woops! Something Wrong Went.')</script>";
      }
    } else {
      echo "<script>alert('Woops! Email Already Exists.')</script>";
    }

  } else {
    echo "<script>alert('Password Not Matched.')</script>";
  }
}

?> 