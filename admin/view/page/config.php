<?php

$server = "localhost";
$user = "u214244441_maratek123";
$pass = "Marateknologi!1";
$database = "u214244441_database";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

?>