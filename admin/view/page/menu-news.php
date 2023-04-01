<?php

include('config.php');

include('delete-news.php');

?>

<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">DataTable with default features</h3>
        </div>
        <form class="form-inline my-3" style="margin-left: 18px;" action="" method="GET">
            <input type="hidden" name="page" value="menu-news">
            <input class="form-control col-sm-3" type="search" name="cari" placeholder="Seacrh">
            <button class="btn btn-primary mx-3" type="submit">Search</button>
        </form>
        <div style="margin-left: 20px; margin-bottom: 15px;">
            <a href="?page=tambah-news" class="btn btn-success">Tambah</a>
        </div>
        
        <!-- /.card-header -->
        <div class="card-body table-responsive">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Thumbnail</th>
                        <th>Judul</th>
                        <th>Content</th>
                        <th>Tanggal</th>
                        <th>Author</th> 
                        <th>Pagging</th>
                        <th>Page</th>
                        <th>Category</th>
                        <th>Views</th>
                        <th>operations</th>
                    </tr>
                </thead>

 

                <tbody>

                    <?php $i = 1; ?>
                    <?php

          if (isset($_GET['cari'])) {
              $cari = $_GET['cari'];
              $result = mysqli_query($conn, "SELECT * FROM tbl_news 
                    WHERE thumbnail like '%$cari%' 
                    OR judul like '%$cari%' 
                    OR content like '%$cari%' 
                    OR category like '%$cari%' 
                    OR tanggal like '%$cari%'");
          } else {
              $result = mysqli_query($conn, "SELECT * FROM tbl_news");
          }


          while ($content = mysqli_fetch_array($result, MYSQLI_ASSOC)):

          ?>

                    <tr>
                        <td>
                            <?= $i; ?>
                        </td>
                        <td>
                            <?php 
							if ($content['thumbnail'] == "") { ?>
								<img src="https://via.placeholder.com/500x500.png?text=PAS+FOTO+SISWA" style="width:100px;height:100px;">
							<?php }else{ ?>
								<img src="../../../news/assets/images/<?php echo $content['thumbnail']; ?>" style="width:100px;height:100px;">
							<?php } ?>
                        </td>
                        <td>
                            <?php echo $content["judul"]; ?>
                        </td>
                        <td>
                            <?php echo substr(strip_tags(htmlspecialchars_decode($content["content"])), 0, 50); ?>
                        </td>
                        <td>
                            <?php echo $content["tanggal"]; ?>
                        </td>
                        <td>
                            <?php echo $content["author"]; ?>
                        </td>
                        <td>
                            <?php echo $content["pagging"]; ?>
                        </td>
                        <td>
                            <?php echo $content["page"]; ?>
                        </td>
                        <td>
                            <?php echo $content["category"]; ?>
                        </td>
                        <td>
                            <?php echo $content["views"]; ?>
                        </td>
                        <td>
                            <a class="btn btn-edit btn-sm" href="?page=ubah-news&id=<?php echo base64_encode($content["id"]); ?>"><i
                                    class="fas fa-edit"></i> Edit </a>
                            <a class="btn btn-danger btn-sm"
                                href="?page=menu-news&action=delete-news&id=<?php echo base64_encode($content["id"]); ?>"><i
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