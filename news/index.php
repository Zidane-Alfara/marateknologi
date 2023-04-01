<?php

$page = $_GET['pages'];

if(isset($page) && $page!==''){
    render($page);
} else {
    render('home');
}


function render($page, $layout='index'){
    include __DIR__.'/layout/'.$layout.'.php'; 
}

?>