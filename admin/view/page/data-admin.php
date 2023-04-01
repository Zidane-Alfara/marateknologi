<?php 

include("config.php");

$result = mysqli_query($conn, "SELECT * FROM tbl_admin");

include("tambah-admin.php");

include("delete-admin.php");

?>

<div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Tambah Admin</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="" method="POST">
                  <input type="hidden" name="token_tambah_admin" value="<?= $_SESSION['token'] ?>">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="username">Username</label>
                        <input type="username" class="form-control" placeholder="Username" name="username" value="<?php echo $username; ?>" id="username" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo $email; ?>" id="email" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" id="password" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="cpassword" >Masukan Ulang Password</label>
                        <input type="password" class="form-control" placeholder="Comfirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" id="cpassword" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="nik" >NIK</label>
                        <input type="nik" class="form-control" placeholder="Masukan NIK" name="NIK" value="<?php echo $nik; ?>" id="nik" required>
                      </div>
                    </div>                      
                    <div class="col-sm-2 px-6">
                      <div class="form-group"><br>                      
                        <button name="submit-tambah-admin" class="btn btn-success">Success</button>
                      </div>
                    </div>
                  </div>
                    
                </form>                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <section class="content">
  
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th class="col-1">ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>NIK</th>
                    <th>Operations</th>
                  </tr>
                  </thead>

                  

                  <tbody>
                  
                  <?php $i = 1; ?>
                  <?php while($content = mysqli_fetch_array($result, MYSQLI_ASSOC)) :?>

                  <tr>
                    <td><?= $i; ?></td>
                    <td><?php echo $content["username"]; ?></td>
                    <td><?php echo $content["email"]; ?></td>
                    <td><?php echo $content["password"]; ?></td>
                    <td><?php echo $content["NIK"]; ?></td>
                    <td>
                      <a class="btn btn-edit btn-sm" href="?page=ubah-admin&id=<?php echo base64_encode($content["id"]); ?>"><i class="fas fa-edit"></i> Edit </a>
                      <a class="btn btn-danger btn-sm" href="?page=data-admin&action=delete-admin&id=<?php echo base64_encode($content["id"]); ?>"><i class="fas fa-trash"></i> Delete </a>
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