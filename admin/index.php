<?php

include '../component/config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username_admin'])) {
    header("Location: admin.php");
}

  
  if (!isset($_SESSION['token'])) {
      $_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(32));
  }
  
  if (!isset($_GET['submit-admin']) && $_SESSION['token'] == $_GET['token_admin']) {
      session_destroy();
  }

if (isset($_POST['submit-admin'])) {
	$email = mysqli_real_escape_string($conn, htmlspecialchars($_POST['email']));
	$password = mysqli_real_escape_string($conn, htmlspecialchars(md5($_POST['password'])));
	
	$emailValid = ['marateknologi.com'];
    $emailUser = explode('@', $email);
    $emailUser = strtolower($emailUser[1]);
    if ( !in_array($emailUser, $emailValid)) {
          
        echo "
        <script>alert('Woops! Must Use marateknologi')
        document.location = 'admin.php';</script>
        ";
         
        return false;
    }


	$sql = "SELECT * FROM tbl_admin WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username_admin'] = $row['username'];
		setcookie("nama_cookie", "nilai_cookie", time()+3600, "/", "domain.com", false, true);
		header("Location: admin.php");
	} else {
		echo "<script>alert('Woops! Email Atau Password anda Salah.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="../assets/img/hero.png" rel="icon">
    <link href="../assets/img/hero.png" rel="hero-img">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="dist/css/style.css">

	<title>Login</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email" autocomplete="off">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;"><img src="../assets/img/hero.png" style="width: 100px;" alt="hero"></p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<input type="hidden" name="token_admin" value="<?= $_SESSION['token'] ?>">
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit-admin" class="btn">Login</button>
			</div>
		</form>
	</div>
</body>
</html>
