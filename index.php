<?php
    include 'config/lib.php';
    $page = getPage(include 'config/pages.php');
    $link = mysqli_connect('localhost', 'root', '', 'GB');
    define('GALLERY_DIR', 'img');

    ob_start();
    include 'pages/' . $page;
    $content = ob_get_clean();


    $html = file_get_contents('main.html');
    echo str_replace('{HTML_TEXT}',$content,$html);
    