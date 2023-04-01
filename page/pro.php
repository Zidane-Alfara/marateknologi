<?php

require __DIR__."/../repository/content_pro.php";

$id = mysqli_real_escape_string($conn, htmlspecialchars(base64_decode($_GET['id'])));

if(!$id){
  header("location: home");
}

$content = new contentRepository();

$contentById = mysqli_fetch_assoc($content->findId(mysqli_real_escape_string($conn, $id)));

?>

<?php include('../component/head-product.php'); ?>

<section id="breadcrumbs" class="breadcrumbs" style="margin-top:0;padding-top:75px;background-color:rgba(40, 58, 90, 0.9);color:white">
      <div class="container">

        <ol>
          <li><a href="index">Home</a></li>
          <li>Product</li>
        </ol>
        <h2 class="text-white">Product</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper">
              <div class="swiper-wrapper align-items-center">

                <div class="swiper-slide">
                  <img src="assets/img/product/<?= $contentById['thumbnail'];?>" alt="">
                </div>

                <div class="swiper-slide">
                  <img src="assets/img/product/<?= $contentById['thumbnail'];?>" alt="">
                </div>

                <div class="swiper-slide">
                  <img src="assets/img/product/<?= $contentById['thumbnail'];?>" alt="">
                </div>

              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info">

              <h3><?= $contentById['nama_barang'];?></h3>
              <ul>
                <li><strong>Harga</strong>: <?= $contentById['harga'];?></li>
                <li><strong>Kategori</strong>: <?= $contentById['kategori'];?></li>
                <li><strong>Merk</strong>: <?= $contentById['merk'];?></li>
                <li><strong>Kondisi</strong>: <?= $contentById['kondisi'];?></li>
              </ul>
            </div>
            <div class="portfolio-description">
              <h2>Deskripsi</h2>
              <p>
                <?= $contentById['deskripsi'];?>.
              </p>
            </div>

          </div>

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->
  
  <?php

include('../component/footer.php');

?>