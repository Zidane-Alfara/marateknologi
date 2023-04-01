<?php


$result = mysqli_query($conn, "SELECT * FROM tbl_content");
$service = mysqli_query($conn, "SELECT * FROM tbl_service");
$product = mysqli_query($conn, "SELECT * FROM tbl_product");

if (!isset($_GET['id'])) {
    header("location: index");
}


?>
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
          data-aos="fade-up" data-aos-delay="200">
          <h1>Better Solutions For Your Problem</h1>
          <h2>We are team of talented IT Spesialist</h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="#aboutus" class="btn-get-started scrollto">Get Started</a>
            <a href="https://youtu.be/HLJUrGMmi-4" class="glightbox btn-watch-video"><i
                class="bi bi-play-circle"></i><span>Watch Video</span></a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->
<main id="main">

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients section-bg">
      <div class="container">

        <div class="row" data-aos="zoom-in">

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/client-1.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/client-2.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/client-3.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/client-4.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/client-5.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/client-6.png" class="img-fluid" alt="">
          </div>

        </div>

      </div>
    </section><!-- End Cliens Section -->

<!-- ======= About Us Section ======= -->
<section id="aboutus" class="aboutus">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>About Us</h2>
    </div>
    <div class="row content">
      <div class="col-lg-12">
        <p>
          Mara Teknologi is a company engaged in online media services and other information media. We are a company
          that
          can help organizations or companies engaged in business or commercial.
          Not only service, but quality and price, are the best things to promote a company/business venture on the
          internet.
        </p>
        <ul>
          <i class="ri-check-double-line"></i> Fresh Ideas <br>
          <i class="ri-check-double-line"></i> More Grow <br>
          <i class="ri-check-double-line"></i> Good Management
        </ul>
      </div>
    </div>
  </div>
</section><!-- End About Us Section -->

<!-- ======= Services Section ======= -->
<section id="services" class="services section-bg">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Services</h2>
      <p>Here are the service offerings that we provide for you:</p>
    </div>

    <div class="row">

      <?php while ($content = mysqli_fetch_assoc($service)): ?>

      <div class="col-xl-4 col-md-6 d-absolute align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="100">
        <div class="icon-box">
          <div class="icon"><i class='bx bx-<?php echo $content["icon"]; ?>'></i></div>
          <h4><a href="">
              <?php echo $content["judul"]; ?>
            </a></h4>
          <p>
            <?php echo $content["isi"]; ?>
          </p>
        </div>
      </div>
      <?php endwhile; ?>
    </div>

  </div>
</section><!-- End Services Section -->


<section id="portfolio" class="portfolio">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Project</h2>
    </div>

    <ul id="portfolio-flters" class="d-absolute justify-content-center" data-aos="fade-up" data-aos-delay="100">
      <li data-filter="*" class="filter-active">All</li>
      <li data-filter=".filter-software">Software Development</li>
      <li data-filter=".filter-security">Security Audit</li>
      <li data-filter=".filter-network">Network Engineer</li>
      <li data-filter=".filter-digital">Digital Course</li>
      <li data-filter=".filter-internet">Internet Storage</li>
      <li data-filter=".filter-coorporate">Corporate Product</li>
      <li data-filter=".filter-it">IT Consultant</li>
    </ul>

    <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

      <?php $i = 1; ?>

      <?php 
      
      while ($content = mysqli_fetch_assoc($result)): 
      
      ?>

      <div class="col-lg-4 col-md-6 portfolio-item filter-<?php echo $content["tipe"]; ?>">
        <div class="portfolio-img"><img src="assets/img/portfolio/<?php echo $content["image"]; ?>" class="img-fluid"
            alt=""></div>
        <div class="portfolio-info">
          <h4>
            <?php echo substr($content["judul"], 0, 30); ?>
          </h4>
          <p>
            <?php echo substr(strip_tags(htmlspecialchars_decode($content["content"])), 0, 40); ?> ....
          </p>
          <a href="assets/img/portfolio/<?php echo $content["image"]; ?>" data-gallery="portfolioGallery"
            class="portfolio-lightbox preview-link" title="<?php echo $content["judul"]; ?>"><i class="bx bx-plus"></i></a>
          <a href="?page=p-d&id=<?php echo mysqli_real_escape_string($conn, htmlspecialchars(base64_encode($content["id"]))); ?>" class="details-link" title="More Details"><i
              class="bx bx-link">
              <script></script>
            </i></a>
        </div>
      </div>
      <?php $i++; ?>

      <?php endwhile; ?>

    </div>
  </div>
</section><!-- End Portfolio Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Products</h2>
          <p>We are here to provide a wide range of good quality products from various categories, and hope our clients enjoy them.</p>
        </div>

        <div class="row">
            
          <?php $i = 1; ?>

          <?php 
          
          while ($content = mysqli_fetch_assoc($product)): 
          
          ?>

          <div class="col-lg-6 mt-4">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
              <div class="pic"><img src="assets/img/product/<?php echo $content["thumbnail"]; ?>" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4><?php echo substr($content["nama_barang"], 0,70); ?> ...</h4>
                <p><b><?php echo $content["harga"]; ?></b></p>
                <span><?php echo $content["kategori"]; ?></span>
                <p>
                  <a class="btn btn-primary" href="?page=pro&id=<?php echo mysqli_real_escape_string($conn, htmlspecialchars(base64_encode($content["id"]))); ?>" >
                    Deskripsi
                  </a>
                </p>
                
              </div>
            </div>
          </div>
          
        <?php $i++; ?>

        <?php endwhile; ?>

        </div>

      </div>
    </section><!-- End Team Section -->

<!-- ======= Cta Section ======= -->
<section id="news" class="cta">
  <div class="container" data-aos="zoom-in">

    <div class="row">
      <div class="col-lg-9 text-center text-lg-start">
        <h3>BLOGS</h3>
        <p> We also provide a collection of news about technology such as CyberSecurity, the latest innovations around
          IT, and tutorials about running, understanding hardware and software.</p>
      </div>
      <div class="col-lg-3 cta-btn-container text-center">
        <a class="cta-btn align-middle" href="https://marateknologi.com/news/">See more Blogs</a>
      </div>
    </div>

  </div>
</section><!-- End Cta Section -->


</main><!-- End #main -->