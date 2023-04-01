<?php

include("config.php");


$tbl = mysqli_query($conn, "SELECT * FROM tbl_news WHERE category='tips' ORDER BY tanggal DESC");

?>

<div class="col-xl-8 stretch-card grid-margin">
  <div class="row">
    <div class="row">
      <div class="col-xl-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-12">
                <h1 class="font-weight-600 mb-4">
                  TIPS AND TRICKS
                </h1>
              </div>

              <?php $i = 1; ?>

              <?php while ($tips = mysqli_fetch_assoc($tbl)): ?>

              <div class="col-sm-4 grid-margin">
                <div class="position-relative">
                  <div class="rotate-img">
                    <img src="assets/images/<?= $tips['thumbnail']; ?>" alt="thumb" class="img-fluid" />
                  </div>
                  <div class="badge-positioned">
                    <span class="badge badge-danger font-weight-bold"><?= $tips['category']; ?></span>
                  </div>
                </div>
              </div>
              <div class="col-sm-8  grid-margin">
                <a href="?pages=t-d&id=<?= mysqli_real_escape_string($conn, htmlspecialchars(base64_encode($tips['id']))); ?>" style="color: black;">
                  <h2 class="mb-2 font-weight-600"><?= $tips['judul']; ?></h2>
                </a>
                <div class="fs-13 mb-2">
                  <span class="mr-2"><i class="mdi mdi-calendar">&nbsp; <?= substr($tips['tanggal'], 0,10); ?></i></span>
                </div>
                <p class="mb-0"><?php echo substr(strip_tags(htmlspecialchars_decode($tips["content"])), 0, 150); ?></p>
              </div>

              <?php $i++; ?>

              <?php endwhile; ?>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>