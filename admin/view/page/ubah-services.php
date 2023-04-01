<?php

include("config.php");

error_reporting(0);
session_start();

if (isset($_POST['submit-ubah-services'])) {
  $judul = htmlspecialchars($_POST['judul']);
  $isi = htmlspecialchars($_POST['isi']);
  $icon = htmlspecialchars($_POST['icon']);
  $id = $_POST['id'];


  //cek jika password tidak diupdate
  if ($isi == '') {
    $sql = "UPDATE tbl_service set judul='$judul', isi='$isi', icon='$icon' where id='$id'";

    $result = mysqli_query($conn, $sql);
    if ($result) {
      echo
        "               
            <script>
            alert('Wow! change services Completed.');
            document.location = 'admin.php?page=menu-services';
            </script>
          ";
    } else {
      echo "<script>alert('gagal')</script>";
    }
  } else {
    $sql = "UPDATE tbl_service set judul='$judul', isi='$isi', icon='$icon' where id='$id'";

    $sql = "UPDATE tbl_service set judul='$judul', isi='$isi', icon='$icon' where id='$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      echo
        "               
              <script>
              alert('Wow! Change Service Completed.');
              document.location = 'admin.php?page=menu-services';
              </script>
            ";
    } else {
      echo "<script>alert('gagal')</script>";
    }
  }
}




$id = mysqli_real_escape_string($conn, htmlspecialchars(base64_decode($_GET['id'])));
$sql = "select * from tbl_service where id=$id limit 0,1";
$executedSql = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($executedSql);


?>

<div class="card card-danger">
  <div class="card-header">
    <h3 class="card-title">Edit Services</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <form action="" method="POST">
      <input type="hidden" name="id" value="<?= $id ?>">
      <div class="row">
        <div class="col-sm-6">
          <!-- text input -->
          <div class="form-group">
            <label>Judul <?= $id ?></label>
            <input type="judul" name="judul" placeholder="Masukan Judul" required="" class="form-control"
              value="<?= $data['judul']; ?>">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="icon">Icon</label>
            <input type="icon" name="icon" placeholder="Masukan icon" required class="form-control" id="icon"
              value="<?= $data['icon']; ?>">
            <a href="https://boxicons.com/">Lihat icon disini</a>
          </div>
        </div>

        <div class="col-12">
          <div class="form-group">
            <label>Isi</label>
            <textarea type="isi" id="summernote" class="form-control" placeholder="Isi Judul" name="isi" 
              id="isi" required cols="10" rows="1"><?= $data['isi']; ?></textarea>
          </div>
        </div>
      </div>

      <script>
          $('#summernote').summernote({
            placeholder: 'Masukan Content',
            tabsize: 2,
            height: 100
          });
        </script>

      <div class="col-sm-2">
        <div class="form-group"><br>
          <button name="submit-ubah-services" class="btn btn-success">Success</button>
        </div>
      </div>
      

    </form>

  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->