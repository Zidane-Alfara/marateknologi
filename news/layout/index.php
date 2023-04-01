<!DOCTYPE html>
<html lang="zxx">

<head>
  <!-- Required meta tags -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>MARATEKNOLOGI</title>
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="./assets/vendors/mdi/css/materialdesignicons.min.css" />
  <link rel="stylesheet" href="assets/vendors/aos/dist/aos.css/aos.css" />

  <!-- End plugin css for this page -->
  <link rel="shortcut icon" href="assets/images/hero.png" />

  <!-- inject:css -->
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- endinject -->
</head>

<body>
    
    <?php
	header("Content-Security-Policy: default-src 'self'");
	header("X-Content-Type-Options: nosniff");
    ?>

  <?php include('config.php'); ?>

  <div class="container-scroller">
    <div class="main-panel">
      <!-- partial:partials/_navbar.html -->
      <header id="header">
        <div class="container">
          <nav class="navbar navbar-expand-lg navbar-light navbar-fixed-top">
            <div class="navbar-bottom pt-4">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h1 class="navbar-brand text-white font-weight-bold" style="font-size: 28px;">MARATEKNOLOGI</h1>
                </div>
                <div>
                  <button class="navbar-toggler" type="button" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="navbar-collapse justify-content-center collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-lg-flex justify-content-between align-items-center">
                      <li>
                        <button class="navbar-close">
                          <i class="mdi mdi-close"></i>
                        </button>
                      </li>
                      <li class="nav-item active">
                        <a class="nav-link" href="index">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="?pages=tech-page">TECHNOLOGY</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="?pages=cyber-page">CYBERSECURITY</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="?pages=tips-page">TIPS AND TRICKS</a>
                      </li>
                    </ul>
                  </div>
                </div>
                <ul class="social-media">
                  <li>
                    <a href="https://www.facebook.com/">
                      <i class="mdi mdi-facebook"></i>
                    </a>
                  </li>
                  <li>
                    <a href="https://www.youtube.com/@marateknologi4076">
                      <i class="mdi mdi-youtube"></i>
                    </a>
                  </li>
                  <li>
                    <a href="https://www.instagram.com/mara_teknologi/">
                      <i class="mdi mdi-instagram"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        </div>
      </header>

      <!-- partial -->
      <div class="content-wrapper" style="padding: 30px 0px;">
        <div class="container">
          <div class="row" data-aos="fade-up">

            <?php include(__DIR__ . '/../pages/' . $page . '.php'); ?>

            <div class="col-xl-4 grid-margin">
                <div class="card bg-dark text-white mb-4">
                  <div class="card-body">
   
                      <form action="" method="GET" autocomplete="off">
                          
                          <?php 
                          
                                        
                          if (!isset($_SESSION['token'])) {
                              $_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(32));
                          }
                          
                          if (!isset($_POST['cari']) && $_SESSION['token'] == mysqli_real_escape_string($conn, htmlspecialchars($_POST['token_cari']))) {
                              session_destroy();
                          }
                          
                          ?>

                          <div class="row">
                            <div class="col-8">
                              <input type="hidden" name="pages" value="searching">
                              <input class="form-control" style="margin-left: 3px;" type="search" name="cari" placeholder="Search" aria-label="Search">
                              <input type="hidden" name="token_cari" value="<?= $_SESSION['token'] ?>">
                            </div>   
                            <div style="float: right;">
                              <button type="submit" class="form-control btn btn-primary">Search</button>
                            </div>                   
                          </div>

                      </form>

                  </div>
                </div>

                <div class="card bg-dark text-white">
                  <div class="card-body">
                    <h2>Latest news</h2>

                    <?php

                      include('config.php');

                      $query = mysqli_query($conn, "SELECT * FROM tbl_news ORDER BY id DESC LIMIT 0,5");

                      while ($contentById = mysqli_fetch_assoc($query)) { ?>

                    <div class="d-flex border-bottom-blue pt-3 pb-4 align-items-center justify-content-between">
                      <div class="pr-3">
                        <a href="?pages=lp&id=<?= mysqli_real_escape_string($conn, htmlspecialchars(base64_encode($contentById['id']))); ?>">
                          <h5 title="<?= $contentById['judul']; ?>"><?= substr($contentById['judul'], 0,30); ?>...</h5>
                        </a>
                        <div class="fs-12">
                          <a href="?pages=<?= $contentById['pagging']; ?>" style="color: white;"><span
                              class="mr-2"><i class="fa fa-calendar"><?= $contentById['category']; ?></i></span></a>
                          <span class="mr-2"><i class="mdi mdi-calendar">&nbsp; <?= substr($contentById['tanggal'], 0,10); ?></i></span>
                        </div>
                      </div>
                      <div class="rotate-img">
                        <img src="assets/images/<?= $contentById['thumbnail']; ?>" alt="thumb" class="img-fluid img-lg">
                      </div>
                    </div>

                    <?php } ?>

                  </div>
                </div>

                <div class="row">
                  <div class="col-xl-12 mt-4">
                    <div class="card bg-dark text-white">
                      <div class="card-body">
                        <h2>Popular news</h2>

                        <?php

                          include('config.php');

                          $query = mysqli_query($conn, "SELECT * FROM tbl_news ORDER BY views DESC LIMIT 0,5");

                          while ($contentById = mysqli_fetch_assoc($query)) { ?>

                        <div class="d-flex border-bottom-blue pt-3 pb-4 align-items-center justify-content-between">
                          <div class="pr-3">
                            <a href="?pages=lp&id=<?= mysqli_real_escape_string($conn, htmlspecialchars(base64_encode($contentById['id']))); ?>">
                              <h5 title="<?= $contentById['judul']; ?>"><?= substr($contentById['judul'], 0,30); ?>...</h5>
                            </a>
                            <div class="fs-12">
                              <a href="?pages=<?= $contentById['pagging']; ?>" style="color: white;"><span
                                  class="mr-2"><i class="fa fa-calendar"></i><?= $contentById['category']; ?></span></a>
                              <span class="mr-2"><i class="mdi mdi-calendar">&nbsp; <?= substr($contentById['tanggal'], 0,10); ?></i></span>
                            </div>
                          </div>
                          <div class="rotate-img">
                            <img src="assets/images/<?= $contentById['thumbnail']; ?>" alt="thumb"
                              class="img-fluid img-lg" />
                          </div>
                        </div>

                        <?php } ?>

                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
          <div class="row" data-aos="fade-up">
            <!-- <div class="col-lg-8 stretch-card grid-margin">
                
              </div> -->
            <!-- <div class="col-lg-4 stretch-card grid-margin">
                
              </div> -->
          </div>

        </div>
      </div>
      <!-- main-panel ends -->
      <!-- container-scroller ends -->

      <!-- partial:partials/_footer.html -->
      <footer>
        <div class="footer-top">
          <div class="container">
            <div class="row">
              <div class="col-sm-5">
                <h1 class="font-weight-bold mb-3">SOCIAL MEDIA</h1>
                <h5 class="font-weight-normal mt-4 mb-5">
                  Newspaper is your news, entertainment, music fashion website. We
                  provide you with the latest breaking news and videos straight from
                  the entertainment industry.
                </h5>
                <ul class="social-media mb-5">
                  <li>
                    <a href="https://www.facebook.com/">
                      <i class="mdi mdi-facebook"></i>
                    </a>
                  </li>
                  <li>
                    <a href="https://www.youtube.com/@marateknologi4076">
                      <i class="mdi mdi-youtube"></i>
                    </a>
                  </li>
                  <li>
                    <a href="https://www.instagram.com/mara_teknologi/">
                      <i class="mdi mdi-instagram"></i>
                    </a>
                  </li>
                </ul>
              </div>
              <div class="col-sm-4">
                <h3 class="font-weight-bold mb-3">CONTACT</h3>

                <h5 class="font-weight-normal mt-4 mb-5">
                  <p>
                    Phone : +62 895-4214-63496 <br>
                    Email : info@marateknologi.com.</p>
                  <address>
                    Maguwo No.643A RT15/RW27 Banguntapan
                    Bantul Yogyakarta 55198
                    Indonesia
                  </address>
                </h5>                  

              </div>
              <div class="col-sm-3">
                <h3 class="font-weight-bold mb-3">CATEGORIES</h3>

                <?php

                  $query = mysqli_query($conn, "SELECT * FROM tbl_news WHERE category='technology'");

                  $jumlah = mysqli_num_rows($query);

                  ?>

                <div class="footer-border-bottom pb-2">
                  <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 font-weight-600">Technology</h5>
                    <div class="count"><?php echo $jumlah; ?></div>
                  </div>
                </div>

                <?php

                  $query = mysqli_query($conn, "SELECT * FROM tbl_news WHERE category='cybersecurity'");

                  $total = mysqli_num_rows($query);

                  ?>

                <div class="footer-border-bottom pb-2 pt-2">
                  <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 font-weight-600">Cybersecurity</h5>
                    <div class="count"><?php echo $total; ?></div>
                  </div>
                </div>

                <?php

                  $query = mysqli_query($conn, "SELECT * FROM tbl_news WHERE category='tips'");

                  $semua = mysqli_num_rows($query);

                  ?>

                <div class="footer-border-bottom pb-2 pt-2">
                  <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 font-weight-600">Tips and Tricks</h5>
                    <div class="count"><?php echo $semua; ?></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="footer-bottom">
          <div class="container">
            <div class="row">
              <div class="col-sm-12">
                <div class="d-sm-flex justify-content-between align-items-center">
                  <div class="fs-14 font-weight-600">
                    © 2023 @ <a href="https://www.bootstrapdash.com/" target="_blank" class="text-white">
                      marateknologi4076</a>. All rights reserved.
                  </div>
                  <div class="fs-14 font-weight-600">
                    Handcrafted by <a href="https://www.bootstrapdash.com/" target="_blank"
                      class="text-white">MARATEKNOLOGI</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </footer>

      <!-- partial -->
    </div>
  </div>
  <!-- inject:js -->
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <script src="assets/vendors/aos/dist/aos.js/aos.js"></script>
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="./assets/js/demo.js"></script>
  <script src="./assets/js/jquery.easeScroll.js"></script>
  <!-- End custom js for this page-->
</body>

</html>