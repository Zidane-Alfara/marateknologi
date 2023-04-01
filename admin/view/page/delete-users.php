<?php

include("config.php");

if (isset($_GET['action']) && $_GET['action'] == 'delete-user') {

  $id = mysqli_real_escape_string($conn, htmlspecialchars(base64_decode($_GET["id"])));
  $sql = "DELETE FROM users WHERE id = $id";

  if (mysqli_query($conn, $sql)) {
    echo "                   
              <script>
              alert('Wow! User Deleted.');
              document.location = 'admin.php?page=data-users';
              </script>
            ";
  } else {
    echo "         
              <script>
              alert('Wow! User Deleting failed.');
              document.location = 'admin.php?page=data-users';
              </script>
            ";
  }
}

?>