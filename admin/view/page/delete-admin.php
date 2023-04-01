<?php

include("config.php");



if (isset($_GET['action']) && $_GET['action'] == 'delete-admin') {

  $id = mysqli_real_escape_string($conn, htmlspecialchars(base64_decode($_GET["id"])));
  $sql = "DELETE FROM tbl_admin WHERE id = $id";

  if (mysqli_query($conn, $sql)) {
    echo "                   
              <script>
              alert('Wow! Admin Deleted.');
              document.location = 'admin.php?page=data-admin';
              </script>
            ";
  } else {
    echo "         
              <script>
              alert('Wow! Admin Deleting failed.');
              document.location = 'admin.php?page=data-admin';
              </script>
            ";
  }
}

?>