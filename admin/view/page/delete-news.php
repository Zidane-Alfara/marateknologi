<?php

include("config.php");



if (isset($_GET['action']) && $_GET['action'] == 'delete-news') {

  $id = mysqli_real_escape_string($conn, htmlspecialchars(base64_decode($_GET['id'])));
  
  $get_foto = "SELECT * FROM tbl_news WHERE id='$id';";
  $data_foto = mysqli_query($conn, $get_foto);
  
  // Mengubah data yang diambil menjadi Array
  $foto_lama = mysqli_fetch_assoc($data_foto);

  // Menghapus Foto lama didalam folder FOTO
  unlink( __DIR__ ."/../../../news/assets/images/".$foto_lama['thumbnail']);
  
  $query = "DELETE FROM tbl_news WHERE id = '$id';";
  if (mysqli_query($conn, $query)) {
    echo "                   
              <script>
              alert('Wow! News Deleted.');
              document.location = 'admin.php?page=menu-news';
              </script>
            ";
  } else {
    echo "         
              <script>
              alert('Wow! Project Deleting failed.');
              document.location = 'admin.php?page=menu-news';
              </script>
            ";
  }
}

?>