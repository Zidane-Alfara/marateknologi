<?php

include("config.php");



if (isset($_GET['action']) && $_GET['action'] == 'delete-project') {

  $id = mysqli_real_escape_string($conn, htmlspecialchars(base64_decode($_GET['id'])));
  
  $get_foto = "SELECT * FROM tbl_content WHERE id='$id';";
  $data_foto = mysqli_query($conn, $get_foto);
  
  // Mengubah data yang diambil menjadi Array
  $foto_lama = mysqli_fetch_assoc($data_foto);

  // Menghapus Foto lama didalam folder FOTO
  unlink( __DIR__ ."/../../../assets/img/portfolio/".$foto_lama['image']);
  
  $query = "DELETE FROM tbl_content WHERE id = '$id';";
  if (mysqli_query($conn, $query)) {
  
      
    echo "                   
              <script>
              alert('Wow! Project Deleted.');
              document.location = 'admin.php?page=menu-project';
              </script>
            ";
  } else {
    echo "         
              <script>
              alert('Wow! Project Deleting failed.');
              document.location = 'admin.php?page=menu-project';
              </script>
            ";
  }
}

?>