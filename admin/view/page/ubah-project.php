<?php

error_reporting(0);
session_start();

include("config.php");

if (isset($_POST['submit-ubah-project'])) {
  $image = htmlspecialchars($_FILES["imaging"]["name"]);
  $client = htmlspecialchars($_POST['client']);
  $judul = htmlspecialchars($_POST['judul']);
  $content = htmlspecialchars($_POST['content']);
  $category = htmlspecialchars($_POST['category']);
  $tipe = htmlspecialchars($_POST['tipe']);
  $id = $_POST['id'];

  $target_dir = __DIR__ . "/../../../assets/img/portfolio/";
  $target_file = $target_dir . basename($_FILES["imaging"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  $check = getimagesize($_FILES["imaging"]["tmp_name"]);

  if ($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }

  // Check if file already exists
  if (file_exists($target_file)) {
    echo "<script>
            alert('File sudah ada!');
            </script>";
    $uploadOk = 0;
    header("location:admin.php?page=menu-project");
  }

  // Allow certain file formats
  if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
  ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }

  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["imaging"]["tmp_name"], $target_file)) {
      echo "The file " . htmlspecialchars(basename($_FILES["imaging"]["name"])) . " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }

  if ($uploadOk == 1) {
    $sql = "UPDATE tbl_content set image='$image', client='$client', judul='$judul', content='$content', category='$category', tipe='$tipe' where id='$id'";

    $result = mysqli_query($conn, $sql);
    $foto_lama = mysqli_fetch_array($result);

    unlink("/../../../assets/img/portfolio/".$foto_lama['image']);
    
    if ($result) {
      echo
        "            
                <script>
                alert('Wow! Change Project Completed.');
                document.location = 'admin.php?page=menu-project';
                </script>
              ";
      $uploadOk = 1;

    } else {
      echo "<script>alert('gagal')</script>";
      $uploadOk = 0;
    }
  } else {

    $sql = "UPDATE tbl_content set image='$image', client='$client', judul='$judul', content='$content', category='$category', tipe='$tipe' where id='$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      echo
        "               
                  <script>
                  alert('Wow! Change Project Completed.');
                  document.location = 'admin.php?page=menu-project';                
                  </script>
                ";
      $uploadOk = 1;

    } else {
      echo "<script>alert('gatot')</script>";
      $uploadOk = 0;
    }
  }
}




$id = mysqli_real_escape_string($conn, htmlspecialchars(base64_decode($_GET['id'])));
$sql = "SELECT * FROM tbl_content WHERE id=$id limit 0,1";
$executedSql = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($executedSql);

?>

<div class="card card-danger">
  <div class="card-header">
    <h3 class="card-title">Ubah Project</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <form action="" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?= $id ?>">
      <div class="row">
        <div class="col-sm-6">
          <!-- text input -->
          <div class="form-group">
            <label for="image">Cover</label>
            <input type="file" class="form-control" placeholder="Masukan Image" name="imaging" id="image" required>
            <br>
            <?php 
							if ($data['image'] == "") { ?>
								<img src="https://via.placeholder.com/500x500.png?text=PAS+FOTO+SISWA" style="width:100px;height:100px;">
							<?php }else{ ?>
								<img src="../../../assets/img/portfolio/<?php echo $data['image']; ?>" style="width:100px;height:100px;">
							<?php } ?>
          </div>
        </div>

        <div class="col-sm-6">
          <!-- text input -->
          <div class="form-group">
            <label for="client">Client</label>
            <input type="client" class="form-control" placeholder="Nama Client" name="client"
              value="<?= $data['client']; ?>" id="client" required>
          </div>
        </div>

        <div class="col-sm-6">
          <!-- text input -->
          <div class="form-group">
            <label for="judul">Judul</label>
            <input type="judul" class="form-control" placeholder="Masukan Judul" name="judul"
              value="<?= $data['judul']; ?>" id="judul" required>
          </div>
        </div>

        <div class="col-sm-6">
          <!-- text input -->
          <div class="form-group">
            <label for="category">Category</label>
            <input type="category" class="form-control" placeholder="Category" name="category"
              value="<?= $data['category']; ?>" id="category" required>
          </div>
        </div>
       
        <div class="col-sm-6">
          <div class="form-group">
            <label for="tipe">Type</label>
            <select class="form-control select2" style="width: 100%;" class="form-control" placeholder="Masukan Type"
              name="tipe" id="tipe" required>
              <option selected="selected"><?= $data['tipe']; ?></option>
              <option>software</option>
              <option>security</option>
              <option>network</option>
              <option>digital</option>
              <option>internet</option>
              <option>coorporate</option>
              <option>it</option>
            </select>
          </div>
        </div>

        <div class="col-12">
          <!-- text input -->
          <div class="form-group">
            <label for="content">Content</label>
            <textarea type="text" id="summernote" class="form-control" placeholder="Isi Content" name="content"
              id="content" required cols="10" rows="1"><?= $data['content']; ?></textarea>
          </div>
        </div>

        <div class="col-sm-6 m-2">
          <div class="form-group">
            <button type="submit" name="submit-ubah-project" class="btn btn-success">Success</button>
          </div>
        </div>
      </div>

    </form>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->