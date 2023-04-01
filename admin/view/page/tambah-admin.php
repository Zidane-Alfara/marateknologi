<?php 

error_reporting(0);
session_start();

  if (!isset($_SESSION['token'])) {
      $_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(32));
  }
  
  if (!isset($_GET['submit-tambah-admin']) && $_SESSION['token'] == $_GET['token_tambah_admin']) {
      session_destroy();
  }


if (isset($_POST['submit-tambah-admin'])) {
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars(md5($_POST['password']));
    $cpassword = htmlspecialchars(md5($_POST['cpassword']));
    $nik = htmlspecialchars($_POST['NIK']);
    
    $emailValid = ['marateknologi.com'];
    $emailUser = explode('@', $email);
    $emailUser = strtolower($emailUser[1]);
    if ( !in_array($emailUser, $emailValid)) {
          
        echo "
        <script>alert('Woops! Must Use marateknologi')</script>
        document.location = 'admin.php?page=data-admin';
        ";
         
        return false;
    }
  
  
    if ($password == $cpassword) {
      $sql = "SELECT * FROM tbl_admin WHERE email='$email'";
      $result = mysqli_query($conn, $sql);
      if (!$result->num_rows > 0) {
        $sql = "INSERT INTO tbl_admin (username, email, password, NIK)
            VALUES ('$username', '$email', '$password', '$nik')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
          
          echo "
                   
          <script>
          alert('Wow! Adding Admin Completed.');
          document.location = 'admin.php?page=data-admin';
          </script>";

          $username = "";
          $email = "";
          $_POST['password'] = "";
          $_POST['cpassword'] = "";
          $nik = "";
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