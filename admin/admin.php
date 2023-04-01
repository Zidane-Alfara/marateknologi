<?php
session_start();

if (!isset($_SESSION['username_admin'])) {
    header("Location: index.php");
}

$page = $_GET['page']??'home';


render($page);

function render($page, $layout='main'){
    include __DIR__.'/view/layout/'.$layout.'.php'; 
}

?>