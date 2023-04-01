<?php

include("config.php");

error_reporting(0);
session_start();

if (isset($_POST['submit-ubah-admin'])) {
  $username = htmlspecialchars($_POST['username']);
  $email = htmlspecialchars($_POST['email']);
  $password = $_POST['password'] == '' ? '' : htmlspecialchars(md5($_POST['password']));
  $cpassword = $_POST['cpassword'] == '' ? '' : htmlspecialchars(md5($_POST['cpassword']));
  $nik = htmlspecialchars($_POST['NIK']);
  $id = $_POST['id'];


  //cek jika password tidak diupdate
  if ($password == '') {
    $sql = "UPDATE tbl_admin set username='$username', email='$email', NIK='$nik' where id='$id'";

      $result = mysqli_query($conn, $sql);
      if ($result) {
        echo 
          "               
            <script>
            alert('Wow! Change Admin Completed.');
            document.location = 'admin.php?page=data-admin';
            </script>
          ";
      } else {
        echo "<script>alert('gagal')</script>";
      }
  } 
  else {
    $sql = "UPDATE tbl_admin set username='$username', email='$email', NIK='$nik' where id='$id'";

    if ($password == $cpassword) {
        $sql = "UPDATE tbl_admin set username='$username', email='$email', password='$password', NIK='$nik' where id='$id'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
          echo 
            "               
              <script>
              alert('Wow! Change Admin Completed.');
              document.location = 'admin.php?page=data-admin';
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
$sql = "select * from tbl_admin where id=$id limit 0,1";
$executedSql = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($executedSql);


?>

<div class="card card-danger">
  <div class="card-header">
    <h3 class="card-title">Edit Admin</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <form action="" method="POST">
      <input type="hidden" name="id" value="<?= $id ?>">
      <div class="row">
        <div class="col-sm-6">
          <!-- text input -->
          <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" required="" class="form-control" value="<?= $data['username']; ?>">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" placeholder="Email" name="email" value="<?= $data['email']; ?>"
              required>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" placeholder="Password" name="password"
              value="">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label>Masukan Ulang Password</label>
            <input type="password" class="form-control" placeholder="Comfirm Password" name="cpassword"
              value="">
          </div>
        </div>

        <div class="col-sm-6">
          <div class="form-group">
            <label>NIK</label>
            <input type="nik" class="form-control" placeholder="Email" name="NIK" value="<?= $data['NIK']; ?>"
              required>
          </div>
        </div>

      </div>
      <div class="col-sm-2">
        <div class="form-group"><br>
          <button name="submit-ubah-admin" class="btn btn-success">Success</button>
        </div>
      </div>
    </form>

  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->