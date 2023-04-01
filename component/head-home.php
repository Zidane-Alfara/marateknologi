<?php
session_start();

if (!isset($_SESSION['username_user'])) {
    header("Location: ../index.php");
}

include("config.php");

$result = mysqli_query($conn, "SELECT * FROM tbl_content");
$service = mysqli_query($conn, "SELECT * FROM tbl_service");



?>

<head>
    <link href="../assets/img/hero.png" rel="icon">
  <link href="../assets/img/hero.png" rel="hero-img">
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top p-0">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="https://marateknologi.com/home">MARATEKNOLOGI</a></h1>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#aboutus">About Us</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto" href="#project">Project</a></li>
          <li><a class="nav-link scrollto" href="#team">Products</a></li>
          <li><a class="nav-link scrollto" href="#news">Blogs</a></li>
          <li class="dropdown"><a class="getstarted scrollto" href="#"><?php echo $_SESSION['username_user']; ?></a></a>
          <ul>
            <li><p class="login-register-text mb-0 p-0"><a href="component/logout" class="btn p-0">Logout</a></p></li>            
          </ul>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->