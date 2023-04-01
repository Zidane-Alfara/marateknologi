<?php

include("config.php");

include("delete-project.php");

?>

<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">DataTable with default features</h3>
    </div>
    <form class="form-inline my-3" style="margin-left: 18px;" action="" method="GET">
      <input type="hidden" name="page" value="menu-project">
      <input class="form-control col-sm-3" type="search" name="cari" placeholder="Seacrh">
      <button class="btn btn-primary mx-3" type="submit">Search</button>
    </form>
    <div style="margin-left: 20px; margin-bottom: 15px;">
            <a href="?page=tambah-project" class="btn btn-success">Tambah</a>
        </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Client</th>
            <th>Date</th>
            <th>Judul</th>
            <th>Content</th>
            <th>Category</th>
            <th>Tipe</th>
            <th>operations</th>
          </tr>
        </thead>

        <tbody>

          <?php $i = 1; ?>
          <?php

                  if (isset($_GET['cari'])) {
                    $cari = $_GET['cari'];
                    $result = mysqli_query($conn, "SELECT * FROM tbl_content WHERE image like '%$cari%' 
                    OR judul like '%$cari%' 
                    OR content like '%$cari%' 
                    OR category like '%$cari%' 
                    OR tipe like '%$cari%'");
                  } else {
                    $result = mysqli_query($conn, "SELECT * FROM tbl_content");
                  }


                  while ($content = mysqli_fetch_array($result, MYSQLI_ASSOC)):

                  ?>

          <tr>
            <td>
              <?= $i; ?>
            </td>
            <td>
              <?php 
							if ($content['image'] == "") { ?>
								<img src="https://via.placeholder.com/500x500.png?text=PAS+FOTO+SISWA" style="width:100px;height:100px;">
							<?php }else{ ?>
								<img src="../../../assets/img/portfolio/<?php echo $content['image']; ?>" style="width:100px;height:100px;">
							<?php } ?>
            </td>
            <td>
              <?php echo $content["client"]; ?>
            </td>
            <td>
              <?php echo $content["date"]; ?>
            </td>
            <td>
              <?php echo $content["judul"]; ?>
            </td>
            <td>
              <?php echo substr(strip_tags(htmlspecialchars_decode($content["content"])), 0,50); ?>
            </td>
            <td>
              <?php echo $content["category"]; ?>
            </td>
            <td>
              <?php echo $content["tipe"]; ?>
            </td>
            <td>
              <a class="btn btn-edit btn-sm" href="?page=ubah-project&id=<?php echo base64_encode($content["id"]); ?>"><i
                  class="fas fa-edit"></i> Edit </a>
              <a class="btn btn-danger btn-sm"
                href="?page=menu-project&action=delete-project&id=<?php echo base64_encode($content["id"]); ?>"><i
                  class="fas fa-trash"></i> Delete </a>
            </td>
          </tr>

          <?php $i++; ?>

          <?php endwhile; ?>

        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
  </div>

</section>
<!-- /.content -->