<?php
$link = mysqli_connect('localhost', 'root', '', 'GB');
define('GALLERY_DIR', 'img');

$time =  date('d.m.y H:i:s');
file_put_contents('log.txt', $time . PHP_EOL, FILE_APPEND);


$id = (int) $_GET['item'];
$page_html = '';

if (empty($id)){
    include 'gallery.php';
    $page_html = gallery_render(GALLERY_DIR, $link);
} else {
    include 'single.php';
    $page_html = page_render(GALLERY_DIR, $link, $id);
}


$html = file_get_contents('main.html');
echo str_replace('{Gallery}',$page_html,$html);
    