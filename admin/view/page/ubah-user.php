<?php

include("config.php");

error_reporting(0);
session_start();

  if (!isset($_SESSION['token'])) {
      $_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(32));
  }
  
  if (!isset($_GET['submit-ubah-user']) && $_SESSION['token'] == $_GET['token_ubah_user']) {
      session_destroy();
  }


if (isset($_POST['submit-ubah-user'])) {
  $username = htmlspecialchars($_POST['username']);
  $email = htmlspecialchars($_POST['email']);
  $password = $_POST['password'] == '' ? '' : htmlspecialchars(md5($_POST['password']));
  $cpassword = $_POST['cpassword'] == '' ? '' : htmlspecialchars(md5($_POST['cpassword']));
  $id = $_POST['id'];


  //cek jika password tidak diupdate
  if ($password == '') {
    $sql = "UPDATE users set username='$username', email='$email' where id='$id'";

      $result = mysqli_query($conn, $sql);
      if ($result) {
        echo 
          "               
            <script>
            alert('Wow! Change User Completed.');
            document.location = 'admin.php?page=data-users';
            </script>
          ";
      } else {
        echo "<script>alert('gagal')</script>";
      }
  } 
  else {
    $sql = "UPDATE users set username='$username', email='$email' where id='$id'";

    if ($password == $cpassword) {
        $sql = "UPDATE users set username='$username', email='$email', password='$password' where id='$id'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
          echo 
            "               
              <script>
              alert('Wow! Change User Completed.');
              document.location = 'admin.php?page=data-users';
              </script>
            ";
        } else {
          echo "<script>alert('gagal')</script>";
        }
    } else {
      echo "<script>alert('Password Not Matched.')</script>";
    }
  }


}

$id = mysqli_real_escape_string($conn, htmlspecialchars(base64_decode($_GET['id'])));
$sql = "select * from users where id=$id limit 0,1";
$executedSql = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($executedSql);


?>

<div class="card card-info">
  <div class="card-header">
    <h3 class="card-title">Edit Users</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <form action="" method="POST">
      <input type="hidden" name="id" value="<?= $id ?>">
      <input type="hidden" name="token_ubah_user" value="<?= $_SESSION['token'] ?>">
      <div class="row">
        <div class="col-sm-6">
          <!-- text input -->
          <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" required class="form-control" value="<?= $data['username']; ?>">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" required value="<?= $data['email']; ?>"
              required>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" placeholder="Password" name="password"
              value="<?= $data['password']; ?>">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label>Masukan Ulang Password</label>
            <input type="password" class="form-control" placeholder="Comfirm Password" name="cpassword"
              value="<?= $data['cpassword']; ?>">
          </div>
        </div>

      </div>
      <div class="col-sm-2">
        <div class="form-group"><br>
          <button name="submit-ubah-user" class="btn btn-success">Success</button>
        </div>
      </div>
    </form>

  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->