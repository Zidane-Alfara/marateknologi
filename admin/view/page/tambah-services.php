<?php 

error_reporting(0);
session_start();

if (isset($_POST['submit-tambah-services'])) {
  $judul = htmlspecialchars($_POST['judul']);
  $isi = htmlspecialchars($_POST['isi']);
  $icon = htmlspecialchars($_POST['icon']);

  if ($isi == $isi) {
    $sql = "SELECT * FROM tbl_service WHERE judul='$judul'";
    $result = mysqli_query($conn, $sql);
    if (!$result->num_rows > 0) {
      $sql = "INSERT INTO tbl_service (judul, isi, icon)
          VALUES ('$judul', '$isi', '$icon')";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        
        echo "
                 
        <script>
        alert('Wow! Adding Service Completed.');
        document.location = 'admin.php?page=menu-services';
        </script>";

        $judul = "";
        $isi = "";
        $icon = "";

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

<div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Tambah Menu Services</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="" method="POST">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="judul" class="form-control" placeholder="Masukan Judul" name="judul" value="<?php echo $judul; ?>" id="judul" required>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="icon">Icon</label>
                        <input type="icon" class="form-control" placeholder="Masukan icon" name="icon" value="<?php echo $icon; ?>" id="icon" required>
                        <a href="https://boxicons.com/">Lihat icon disini</a>
                      </div>
                    </div>

                    <div class="col-sm-12">
                      <div class="form-group">
                        <label for="isi">Isi</label>
                        <textarea type="text" id="summernote" class="form-control" placeholder="Isi Judul" name="isi" value="<?php echo $isi; ?>" id="isi" required cols="10" rows="1"></textarea>
                      </div>
                    </div>

                    <script>
                      $('#summernote').summernote({
                        placeholder: 'Masukan Content',
                        tabsize: 2,
                        height: 100
                      });
                    </script>                    

                    <div class="col-sm-2 px-6">
                      <div class="form-group"><br>                      
                        <button name="submit-tambah-services" class="btn btn-success">Success</button>
                      </div>
                    </div>
                  </div>
                    
                </form>                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            