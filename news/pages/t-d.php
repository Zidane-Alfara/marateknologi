<div class="col-xl-8 stretch-card grid-margin">
  <div class="row">
    <div class="row">
      <div class="col-xl-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-lg-12">

                <?php

              include('config.php');

              $id = mysqli_real_escape_string($conn, htmlspecialchars(base64_decode($_GET['id'])));
              mysqli_query($conn, "UPDATE tbl_news SET views=views + 1 WHERE id='$id'");

              $query = mysqli_query($conn, "SELECT * FROM tbl_news WHERE id='$id'");

              while ($contentById = mysqli_fetch_assoc($query)) {

              ?>


                <div>
                  <h1 class="font-weight-600 mb-1">
                    <?= $contentById['judul']; ?>
                  </h1>
                  <p class="fs-13 text-muted mb-0">
                    <span class="mr-2"><i class="mdi mdi-account"></i>&nbsp; <?= $contentById['author']; ?></span><i
                      class="mdi mdi-calendar"></i>&nbsp; <?= substr($contentById['tanggal'], 0,10); ?>
                  </p>
                  <div class="rotate-img">
                    <img src="assets/images/<?= $contentById['thumbnail']; ?>" alt="banner"
                      class="img-fluid mt-4" />
                  </div>
                  <p class="mb-2 fs-15">
                    <?= htmlspecialchars_decode($contentById['content']); ?>
                  </p>
                </div>
                
                <div class="d-lg-flex mt-5">
                  <span class="fs-16 font-weight-600 mr-2 mb-1">Tags</span>
                  <span class="badge badge-outline-dark mr-2 mb-1">Trending</span>
                  <span class="badge badge-outline-dark mr-2 mb-1">Trending</span>
                  <div class="d-lg-flex justify-content-end" style="float: right;">
                    <div>
                      <ul class="social-media mb-3">
                        <li>
                          <a href="#">
                            <i class="mdi mdi-facebook"></i>
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <i class="mdi mdi-youtube"></i>
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <i class="mdi mdi-twitter"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
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
</div>

<!-- main-panel ends -->
<!-- container-scroller ends -->