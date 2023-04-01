<?php 

include("config.php");

include("delete-services.php");


?>

<section class="content">
  
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <form class="form-inline my-3" style="margin-left: 18px;" action="" method="GET">
                <input type="hidden" name="page" value="menu-services">
                <input class="form-control col-sm-3" type="search" name="cari" placeholder="Seacrh">
                <button class="btn btn-primary mx-3" type="submit" >Search</button>
              </form>
              <div style="margin-left: 20px; margin-bottom: 15px;">
                <a href="admin.php?page=tambah-services" class="btn btn-success">Tambah</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Isi</th>
                    <th>Icon</th>
                    <th>Operations</th>
                  </tr>
                  </thead>              

                  <tbody>
                  
                  <?php $i = 1; ?>
                  <?php 

                  if(isset($_GET['cari'])){
                    $cari = $_GET['cari'];
                    $result = mysqli_query ($conn, "SELECT * FROM tbl_service WHERE judul like '%$cari%' OR isi like '%$cari%'");		
                  }else {
                    $result = mysqli_query($conn, "SELECT * FROM tbl_service");
                  }
                  
                  while($content = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
                  
                  :?>

                  <tr>
                    <td><?= $i; ?></td>
                    <td><?php echo $content["judul"]; ?></td>
                    <td><?php echo strip_tags(htmlspecialchars_decode($content["isi"])); ?></td>
                    <td><?php echo $content["icon"]; ?></td>
                    <td>
                      <a class="btn btn-edit btn-sm" href="?page=ubah-services&id=<?php echo base64_encode($content["id"]); ?>"><i class="fas fa-edit"></i> Edit </a>
                      <a class="btn btn-danger btn-sm" href="?page=menu-services&action=delete-services&id=<?php echo base64_encode($content["id"]); ?>"><i class="fas fa-trash"></i> Delete </a>
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