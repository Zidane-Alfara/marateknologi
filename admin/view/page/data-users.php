<?php

include("config.php");

$result = mysqli_query($conn, "SELECT * FROM users");

include("tambah-user.php");

include("delete-users.php");

?>

<!-- general form elements disabled -->
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Users</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="" method="POST" autocomplete="off">
                  <input type="hidden" name="token_tambah_user" value="<?= $_SESSION['token'] ?>">
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
                    
                  </div>
                  <div class="col-sm-2">
                      <div class="form-group"><br>                      
                        <button name="submit-tambah-user" class="btn btn-success">Success</button>
                      </div>
                    </div>
                </form>                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

<!-- general form elements disabled -->

<!-- Main content -->
<section class="content">
  
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th class="col-1">ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
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
                    <td>
                      <a class="btn btn-edit btn-sm" href="?page=ubah-user&id=<?php echo base64_encode($content["id"]); ?>"><i class="fas fa-edit"></i> Edit </a>
                      <input type="hidden" name="token_delete" value=" <?= $_SESSION['token'] ?>">
                      <a class="btn btn-danger btn-sm" href="?page=data-users&action=delete-user&id=<?php echo base64_encode($content["id"]); ?>"><i class="fas fa-trash"></i> Delete </a>
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