<?php

error_reporting(0);
session_start();

include("config.php");

if (isset($_POST['submit-ubah-news'])) {
  $thumbnail = htmlspecialchars($_FILES["thumbnail"]["name"]);
  $judul = htmlspecialchars($_POST['judul']);
  $content = htmlspecialchars($_POST['content']);
  $author = htmlspecialchars($_POST['author']);
  $pagging = htmlspecialchars($_POST['pagging']);
  $page = htmlspecialchars($_POST['page']);
  $category = htmlspecialchars($_POST['category']);
  $id = $_POST['id'];

  $target_dir = __DIR__ . "/../../../news/assets/images/";
  $target_file = $target_dir . basename($_FILES["thumbnail"]["name"]);
  $target_file1 = $target_dir1 . basename($_FILES["imaging"]["name"]);
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
    $sql = "UPDATE tbl_news SET thumbnail='$thumbnail', judul='$judul', content='$content', author='$author', pagging='$pagging', page='$page', category='$category' WHERE id='$id'";

    $result = mysqli_query($conn, $sql);
    if ($result) {
      echo
        "            
                <script>
                alert('Wow! Change News Completed.');
                document.location = 'admin.php?page=menu-news';
                </script>
              ";
      $uploadOk = 1;

    } else {
      echo "<script>alert('gagal')</script>";
      $uploadOk = 0;
    }
  } else {

    $sql = "UPDATE tbl_news set thumbnail='$thumbnail', judul='$judul', content='$content', author='$author', pagging='$pagging', page='$page', category='$category' WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      echo
        "               
                  <script>
                  alert('Wow! Change Project Completed.');
                  document.location = 'admin.php?page=menu-news';                
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
$sql = "SELECT * FROM tbl_news WHERE id=$id limit 0,1";
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
            <label for="thumbnail">Thumbnail</label>
            <input type="file" class="form-control" name="thumbnail" id="thumbnail" >
            <br>
            <?php 
							if ($data['thumbnail'] == "") { ?>
								<img src="https://via.placeholder.com/500x500.png?text=PAS+FOTO+SISWA" style="width:100px;height:100px;">
							<?php }else{ ?>
								<img src="../../../news/assets/images/<?php echo $data['thumbnail']; ?>" style="width:100px;height:100px;">
							<?php } ?>
          </div>
        </div>

        <div class="col-sm-6">
          <!-- text input -->
          <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" class="form-control" placeholder="Masukan Judul" name="judul"
              value="<?= $data['judul']; ?>" id="judul" required>
          </div>
        </div>        

        <div class="col-sm-6">
          <!-- text input -->
          <div class="form-group">
            <label for="author">Author</label>
            <input type="text" class="form-control" placeholder="Masukan Author" name="author"
              value="<?= $data['author']; ?>" id="author" required>
          </div>
        </div>

        <div class="col-sm-6">
          <div class="form-group">
            <label for="pagging">Pagging</label>
            <select class="form-control select2" style="width: 100%;" class="form-control" placeholder="Pilih Pagging"
              name="pagging" id="pagging" required>
              <option selected="selected"><?= $data['pagging']; ?></option>
              <option>tips-page</option>
              <option>tech-page</option>
              <option>cyber-page</option>
            </select>
          </div>
        </div>

        <div class="col-sm-6">
          <div class="form-group">
            <label for="page">Page</label>
            <select class="form-control select2" style="width: 100%;" class="form-control" placeholder="Pilih Page"
              name="page" id="page" required>
              <option selected="selected"><?= $data['page']; ?></option>
              <option>tips-details</option>
              <option>tech-details</option>
              <option>cyber-details</option>
            </select>
          </div>
        </div>

        <div class="col-sm-6">
          <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control select2" style="width: 100%;" class="form-control" placeholder="Pilih Category"
              name="category" id="category" required>
              <option selected="selected"><?= $data['category']; ?></option>
              <option>Tips</option>
              <option>Technology</option>
              <option>Cybersecurity</option>
            </select>
          </div>
        </div>

        <div class="col-12">
          <!-- text input -->
          <div class="form-group">
            <label for="content">Content</label>
            <textarea type="text" id="summernote" class="form-control" placeholder="Masukan Content" name="content"
              id="content" required><?= $data['content']; ?></textarea>
          </div>
        </div>      

        <div class="col-sm-6 m-2">
          <div class="form-group">
            <button type="submit" name="submit-ubah-news" class="btn btn-success">Success</button>
          </div>
        </div>
      </div>

    </form>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->