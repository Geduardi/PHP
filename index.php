<?php
$html = file_get_contents('main.html');
$link = mysqli_connect('localhost', 'root', '', 'GB');



include 'gallery.php';
$gallery_html = galery_render('img', $link);

$time =  date('d.m.y H:i:s');
file_put_contents('log.txt', $time . PHP_EOL, FILE_APPEND);


if (!empty($_GET['item'])){
    $sql = "SELECT `id`, `name`, `size`, `descr`, `views` FROM `img` WHERE `id` = {$_GET['item']}";
    $result = mysqli_query($link, $sql);
    header('Location: /single.php?id=' . mysqli_fetch_assoc($result)['id']);
    exit;
}

echo str_replace('{Gallery}',$gallery_html,$html);
    