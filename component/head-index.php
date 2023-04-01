<?php
  include 'head-register-user.php';
  include 'config.php';

  session_start();
  
  error_reporting(0);
  
  
  if (isset($_SESSION['username_user'])) {
      header("Location: https://marateknologi.com/home");
  }
  
  if (!isset($_SESSION['token'])) {
      $_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(32));
  }
  
  if (!isset($_POST['submit-user']) && $_SESSION['token'] == mysqli_real_escape_string($conn, htmlspecialchars($_POST['token_form']))) {
      session_destroy();
  }
  
  if (isset($_POST['submit-user'])) {
    $email = mysqli_real_escape_string($conn, htmlspecialchars($_POST['email']));
    $password = mysqli_real_escape_string($conn, htmlspecialchars(md5($_POST['password'])));
    
      $emailValid = ['gmail.com'];
      $emailUser = explode('@', $email);
      $emailUser = strtolower($emailUser[1]);
      if ( !in_array($emailUser, $emailValid)) {
          
          $_SESSION['gmail'] = "Must use gmail.com";
          
          echo "<script>document.location = 'https://marateknologi.com/'</script>";
         
          return false;
      }
  
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
      $row = mysqli_fetch_assoc($result);
      $_SESSION['username_user'] = $row['username'];
      
      setcookie("all", "300", time()+3600, "/", "marateknologi.com", false, true);
      
      header("Location: https://marateknologi.com/home");

    } else {
      echo "<script>alert('Woops! Email Atau Password anda Salah.')</script>";
    }
  }
  

?>

<!DOCTYPE html>
<html lang="en">

<body>

    <?php include("navbar.php") ?>
  

  