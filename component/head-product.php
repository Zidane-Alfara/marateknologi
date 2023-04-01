<?php

session_start();

if (!isset($_SESSION['username_user'])) {
    header("Location: index");
}

include ('component/head.php');

?>

<!DOCTYPE html>
<html lang="en">

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-inner-pages p-0">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="home.php">MARATEKNOLOGI</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto " href="home">Home</a></li>
          <li><a class="nav-link scrollto" href="home">About</a></li>
          <li><a class="nav-link scrollto" href="home.">Services</a></li>
          <li><a class="nav-link  active scrollto" href="home">Project</a></li>
          <!--<li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li>
          -->

          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li class="dropdown"><a class="getstarted scrollto" href="#about"><?php echo $_SESSION['username_user']; ?></a>
          <ul>
            <li><a href="component/logout">Logout</a></li>
          </ul>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->