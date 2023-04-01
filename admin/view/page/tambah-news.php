<?php

include('config.php');

error_reporting(0);
session_start();

if (isset($_POST['submit-tambah-news'])) {
  $thumbnail = htmlspecialchars($_FILES["thumbnail"]["name"]);
  $judul = htmlspecialchars($_POST['judul']);
  $content = htmlspecialchars($_POST['content']);
  $author = htmlspecialchars($_POST['author']);
  $pagging = htmlspecialchars($_POST['pagging']);
  $page = htmlspecialchars($_POST['page']);
  $category = htmlspecialchars($_POST['category']);

  $target_dir = __DIR__ . "/../../../news/assets/images/";
  $target_file = $target_dir . basename($_FILES["thumbnail"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  $check = getimagesize($_FILES["thumbnail"]["tmp_name"]);
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
    header("location:admin.php?page=menu-news");
  }  

  // Allow certain file formats
  if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "webp" ) {
    echo "Sorry, only JPG, WEBP, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }
  
  if ($uploadOk == 0) {
    echo "<script>
    alert('Sorry, your file was not uploaded.');
    </script>";
    // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file)) {
      echo "The file " . htmlspecialchars(basename($_FILES["thumbnail"]["tmp_name"])) . " has been uploaded.";
    } else {
      echo "<script>
      alert('Sorry, your file was not uploaded.');
      </script>";
    }    
  }

  if ($uploadOk == 1) {
    $sql = "SELECT * FROM tbl_news WHERE judul='$judul'";
    $result = mysqli_query($conn, $sql);
    if (!$result->num_rows > 0) {
      $sql = "INSERT INTO tbl_news (thumbnail, judul, content, author, pagging, page, category)
          VALUES ('$thumbnail', '$judul', '$content', '$author', '$pagging', '$page', '$category')";
      $result = mysqli_query($conn, $sql);
      if ($result) {

        echo "
                 
        <script>
        alert('Wow! Adding News Completed.');
        document.location = 'admin.php?page=menu-news';
        </script>";

        $thumbnail = "";
        $judul = "";
        $content = "";
        $author = "";
        $pagging = "";
        $page = "";
        $category = "";


      } else {
        echo("Error description: " . mysqli_error($conn));
        // echo "<script>alert('Woops! Something Wrong Went.')</script>";
      }
    } else {
      echo "<script>alert('Woops! Email Already Exists.')</script>";
    }
  }
}

?>

<div class="card card-danger">
  <div class="card-header">
    <h3 class="card-title">Tambah Menu News</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <form action="" method="POST" enctype="multipart/form-data">
      <div class="row">
        <div class="col-sm-6">
          <!-- text input -->
          <div class="form-group">
            <label for="thumbnail">Thumbnail</label>
            <input type="file" class="form-control" placeholder="Masukan Thumbnail" name="thumbnail" id="thumbnail" required>
          </div>
        </div>

        <div class="col-sm-6">
          <!-- text input -->
          <div class="form-group">
            <label for="judul">Judul</label>
            <input type="client" class="form-control" placeholder="Masukan Judul" name="judul"
              value="<?php echo $judul; ?>" id="judul" required>
          </div>
        </div>

        <div class="col-sm-6">
          <!-- text input -->
          <div class="form-group">
            <label for="author">Author</label>
            <input type="text" class="form-control" placeholder="Masukan Author" name="author"
              value="<?php echo $author; ?>" id="author" required>
          </div>
        </div>

        <div class="col-sm-6">
          <div class="form-group">
            <label for="pagging">Pagging</label>
            <select class="form-control select2" style="width: 100%;" class="form-control" placeholder="Masukan Pagging"
              name="pagging" value="<?= $pagging; ?>" id="pagging" required>
              <option selected="selected" disabled>Masukan Pagging</option>
              <option>cyber-page</option>
              <option>tech-page</option>
              <option>tips-page</option>
            </select>
          </div>
        </div>

        <div class="col-sm-6">
          <div class="form-group">
            <label for="page">Page</label>
            <select class="form-control select2" style="width: 100%;" class="form-control" placeholder="Masukan Page"
              name="page" value="<?= $page; ?>" id="page" required>
              <option selected="selected" disabled>Masukan Page</option>
              <option>cyber-details</option>
              <option>tech-details</option>
              <option>tips-details</option>
            </select>
          </div>
        </div>

        <div class="col-sm-6">
          <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control select2" style="width: 100%;" class="form-control" placeholder="Masukan Category"
              name="category" value="<?= $category; ?>" id="category" required>
              <option selected="selected" disabled>Masukan Category</option>
              <option>Cybersecurity</option>
              <option>Technology</option>
              <option>Tips</option>
            </select>
          </div>
        </div>

        <div class="col-12">
          <!-- text input -->
          <div class="form-group">
            <label for="content">Content</label>
            <textarea id="summernote" placeholder="Masukan Content" name="content"
              value="<?php echo $content; ?>" id="content" required> </textarea>
          </div>
        </div>       
                
        <div class="col-sm-6 m-2">
          <div class="form-group">
            <button type="submit" name="submit-tambah-news" class="btn btn-success">Success</button>
          </div>
        </div>
      </div>

    </form>
  </div>
  <!-- /.card-body -->
</div>