<div class="col-xl-8 stretch-card grid-margin">
  <div class="row">
    <div class="row">
      <div class="col-xl-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-12">
                <h1 class="font-weight-600 mb-4">
                    
                  <?php
                  
                  if(isset($_GET['cari'])){
                    $cari = mysqli_real_escape_string($conn, htmlspecialchars($_GET['cari']));
                    echo "<b>HASIL PENCARIAN : ".mysqli_real_escape_string($conn, htmlspecialchars($cari))."</b>";
                  }
                  
                  ?>
                  
                </h1>
              </div>
              
              <?php 

              include("config.php");
              
              header("X-XSS-Protection: 1");

              if(isset($_GET['cari'])){
                $cari = mysqli_real_escape_string($conn, htmlspecialchars($_GET['cari']));
                $data = mysqli_query ($conn, "SELECT * FROM tbl_news WHERE judul like '%$cari%' OR content like '%$cari%' OR category like '%$cari%'");				
              } else {
                  $data = mysqli_query($conn, "SELECT * FROM tbl_news");
              }

              $i = 1; 
              
              while ($pencarian = mysqli_fetch_array($data)): ?>
              
              <div class="col-sm-4 grid-margin">
                <div class="position-relative">
                  <div class="rotate-img">
                    <img src="assets/images/<?= $pencarian['thumbnail']; ?>" alt="thumb" class="img-fluid" />
                  </div>
                  <div class="badge-positioned">
                    <span class="badge badge-danger font-weight-bold"><?= $pencarian['category']; ?></span>
                  </div>
                </div>
              </div>
              <div class="col-sm-8  grid-margin">
                <a href="index.php?pages=<?= $pencarian['page']; ?>&id=<?= mysqli_real_escape_string($conn, htmlspecialchars(base64_encode($pencarian['id']))); ?>" style="color: black;"><h2 class="mb-2 font-weight-600"><?= $pencarian['judul']; ?></h2></a>              
                <div class="fs-13 mb-2">
                <span class="mr-2"><i class="mdi mdi-calendar">&nbsp; <?= substr($pencarian['tanggal'], 0,10); ?></i></span>
                </div>
                <p class="mb-0"><?php echo substr(strip_tags(htmlspecialchars_decode($pencarian["content"])), 0,150); ?> ...</p>
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

<!-- main-panel ends -->
<!-- container-scroller ends -->