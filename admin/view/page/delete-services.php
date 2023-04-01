<?php

include("config.php");



if (isset($_GET['action']) && $_GET['action'] == 'delete-services') {

  $id = mysqli_real_escape_string($conn, htmlspecialchars(base64_decode($_GET["id"])));
  $sql = "DELETE FROM tbl_service WHERE id = $id";

  if (mysqli_query($conn, $sql)) {
    echo "                   
              <script>
              alert('Wow! Services Deleted.');
              document.location = 'admin.php?page=menu-services';
              </script>
            ";
  } else {
    echo "         
              <script>
              alert('Wow! services Deleting failed.');
              document.location = 'admin.php?page=menu-services';
              </script>
            ";
  }
}

?>