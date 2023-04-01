<?php 

include("config.php");

error_reporting(0);
session_start();

if (isset($_POST['submit-tambah-project'])) {
  $image = htmlspecialchars($_FILES["imaging"]["name"]);
  $client = htmlspecialchars($_POST['client']);
  $judul = htmlspecialchars($_POST['judul']);
  $content = htmlspecialchars($_POST['content']);
  $category = htmlspecialchars($_POST['category']);
  $tipe = htmlspecialchars($_POST['tipe']);

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
    echo "<script>
    alert('Sorry, your file was not uploaded.');
    </script>";
    // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["imaging"]["tmp_name"], $target_file)) {
      echo "The file " . htmlspecialchars(basename($_FILES["imaging"]["name"])) . " has been uploaded.";
    } else {
      echo "<script>
      alert('Sorry, your file was not uploaded.');
      </script>";
    }
  }

  if ($uploadOk == 1) {
    $sql = "SELECT * FROM tbl_content WHERE image='$image'";
    $result = mysqli_query($conn, $sql);
    if (!$result->num_rows > 0) {
      $sql = "INSERT INTO tbl_content (image, client, judul, content, category, tipe)
          VALUES ('$image', '$client', '$judul', '$content', '$category', '$tipe')";
      $result = mysqli_query($conn, $sql);
      if ($result) {

        echo "
                 
        <script>
        alert('Wow! Adding Project Completed.');
        document.location = 'admin.php?page=menu-project';
        </script>";

        $image = "";
        $client = "";
        $judul = "";
        $content = "";
        $category = "";
        $tipe = "";


      } else {
        echo "<script>alert('Woops! Something Wrong Went.')</script>";
      }
    } else {
      echo "<script>alert('Woops! Email Already Exists.')</script>";
    }
  }
}

?>

<div class="card card-success">
  <div class="card-header">
    <h3 class="card-title">Tambah Menu Project</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <form action="" method="POST" enctype="multipart/form-data">
      <div class="row">
        <div class="col-sm-6">
          <!-- text input -->
          <div class="form-group">
            <label for="image">Cover</label>
            <input type="file" class="form-control" placeholder="Masukan Image" name="imaging" id="image" required>
          </div>
        </div>

        <div class="col-sm-6">
          <!-- text input -->
          <div class="form-group">
            <label for="client">Client</label>
            <input type="client" class="form-control" placeholder="Nama Client" name="client"
              value="<?php echo $client; ?>" id="client" required>
          </div>
        </div>

        <div class="col-sm-6">
          <!-- text input -->
          <div class="form-group">
            <label for="judul">Judul</label>
            <input type="judul" class="form-control" placeholder="Masukan Judul" name="judul"
              value="<?php echo $judul; ?>" id="judul" required>
          </div>
        </div>

        <div class="col-sm-6">
          <!-- text input -->
          <div class="form-group">
            <label for="category">Category</label>
            <input type="category" class="form-control" placeholder="Category" name="category"
              value="<?php echo $category; ?>" id="category" required>
          </div>
        </div>

        <div class="col-sm-6">
          <div class="form-group">
            <label for="tipe">Type</label>
            <select class="form-control select2" style="width: 100%;" class="form-control" placeholder="Masukan Type"
              name="tipe" value="<?= $tipe; ?>" id="tipe" required>
              <option selected="selected" disabled>Masukan Type</option>
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

        <div class="col-sm-12">
          <!-- text input -->
          <div class="form-group">
            <label for="content">Content</label>
            <textarea type="text" id="summernote" class="form-control" placeholder="Isi Content" name="content" value="<?= $content; ?>"
              id="content" required cols="10" rows="1"></textarea>
          </div>
        </div>
        
        <div class="col-sm-6 m-2">
          <div class="form-group">
            <button type="submit" name="submit-tambah-project" class="btn btn-success">Success</button>
          </div>
        </div>
      </div>

    </form>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->

