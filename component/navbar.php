<!-- ======= Header ======= -->
  <header id="header" class="fixed-top p-0">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="https://marateknologi.com/">MARATEKNOLOGI</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#aboutus">About Us</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto" href="#portfolio">Project</a></li>
          <li><a class="nav-link scrollto" href="#team">Product</a></li>
          <li><a class="nav-link scrollto" href="#news">Blogs</a></li>
          <li><a class="getstarted" href="#" onclick="document.getElementById('login').style.display='block'" style="width:auto;">Sign In</a></li>
          <div id="login" class="modal">
              
              <form class="modal-content animate" style="width: 350px;" action="" method="POST" autocomplete="off">
                <div class="imgcontainer">
                  <span onclick="document.getElementById('login').style.display='none'" class="close" title="Close Modal">&times;</span>
                  <img src="assets/img/hero.png" alt="Avatar" class="avatar">
                </div>
                <div class="container">
                  <label for="email" class="mb-2"><b>Email</b></label>
                  <div class="input-group">
                    <input type="email" placeholder="Email" id="email" name="email" value="<?= mysqli_real_escape_string($conn, htmlspecialchars($email)); ?>" >
                  </div>
                  
                  <input type="hidden" name="token_form" value="<?= $_SESSION['token'] ?>">
            
                  <label for="password"><b>Password</b></label>
                  <div class="input-group mb-4">
                    <input type="password" placeholder="Password" id="password" name="password" value="<?= mysqli_real_escape_string($conn, htmlspecialchars($_POST['password'])); ?>" >
                  </div>
    
                  <div class="input-group">
                    <button name="submit-user" class="btn">Login</button>
                  </div>
                  
                  <?php if(isset($_SESSION['gmail'])) : ?>
                  
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong><?= $_SESSION['gmail']; ?></strong>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  
                  <?php session_destroy(); endif; ?>
    
                </div>
    
              </form>
            </div>
          
          <li><a class="getstarted" href="#" onclick="document.getElementById('register').style.display='block'" style="width:auto;">Register</a></a>
    
                <div id="register" class="modal">
                    <form action="" method="POST" class="modal-content animate" style="width: 350px;" autocomplete="off">
                    <div class="imgcontainer">
                      <span onclick="document.getElementById('register').style.display='none'" class="close" title="Close Modal">&times;</span>
                      <img src="assets/img/hero.png" alt="Avatar" class="avatar">
                    </div>
                    <div class="container">
                        
                          <h1 class="login-text text-center" style="font-size: 2rem; font-weight: 800;">Register</h1>
                          <div class="input-group mb-4">
                            <input type="text" placeholder="Username" name="username" value="<?php echo mysqli_real_escape_string($conn, htmlspecialchars($username)); ?>" required>
                          </div>
                          <div class="input-group">
                            <input type="email" placeholder="Email" name="email" value="<?php echo mysqli_real_escape_string($conn, htmlspecialchars($email)); ?>" required>
                          </div>
                          <input type="hidden" name="token_form_register" value="<?= mysqli_real_escape_string($conn, $_SESSION['token']) ?>">
                          <div class="input-group">
                            <input type="password" placeholder="Password" name="password" value="<?php echo mysqli_real_escape_string($conn, htmlspecialchars($_POST['password'])); ?>" required>
                          </div>
                          <div class="input-group">
                            <input type="password" placeholder="Comfirm Password" name="cpassword" value="<?php echo mysqli_real_escape_string($conn, htmlspecialchars($_POST['cpassword'])); ?>" required>
                          </div>
                          <div class="input-group">
                            <button name="submit-register-user" class="btn">Register</button>
                          </div>
                          
                           <?php if(isset($_SESSION['register'])) : ?>
                  
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                              <strong><?= $_SESSION['register']; ?></strong>
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                          
                          <?php session_destroy(); endif; ?>
                        
                    </div>
                    </form>
                </div>
    
    
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->