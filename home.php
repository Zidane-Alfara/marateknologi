<?php include ('component/head-home.php'); ?>
<?php include ('component/head.php'); ?>
<?php
// include ('component/head-index.php');
$page = $_GET['page'];

if(isset($page) && file_exists(__DIR__.'/page/'.$page.'.php'))
{
    include('page/'.$page.'.php');
} else {
    include ('page/home-page.php');
}


?>
<?php include ('component/footer.php'); ?>