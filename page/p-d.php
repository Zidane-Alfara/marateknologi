<?php
require __DIR__."/../repository/content.php";

$id = mysqli_real_escape_string($conn, htmlspecialchars(base64_decode($_GET['id'])));

if(!$id){
  header("location: home");
}

$content = new contentRepository();

$contentById = mysqli_fetch_assoc($content->findId(mysqli_real_escape_string($conn, $id)));

?>


<?php include ('../component/head-project.php')?>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs" style="margin-top:0;padding-top:75px;background-color:rgba(40, 58, 90, 0.9);color:white">
      <div class="container">

        <ol>
          <li><a href="home.php">Home</a></li>
          <li>Project Details</li>
        </ol>
        <h2 class="text-white">Project Details</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-12">
            <img class="img-fluid" src="assets/img/portfolio/<?= $contentById['image'];?>" alt="">
          </div>

          <div class="col-lg-12">
            <div class="portfolio-info">
              <h3>Project information</h3>
              <ul>
                <li><strong>Category</strong>: <?= $contentById['category']; ?></li>
                <li><strong>Client</strong>: <?= $contentById['client'];?></li>
                <li><strong>Project date</strong>: <?= $contentById['date'];?> </li>
              </ul>
            </div>
            <div class="portfolio-description">
              <p> <?= htmlspecialchars_decode($contentById['content']); ?> </p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->

  <?php include ('../component/footer.php')?>