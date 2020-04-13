<?php
    include 'config/lib.php';
    $page = getPage(include 'config/pages.php');
    define('GALLERY_DIR', 'img');
    session_start();

    ob_start();
    include 'pages/' . $page;
    $content = ob_get_clean();


    $html = file_get_contents('../engine/main.html');

    $entry_html = include 'pages/component/entry.php';

    echo str_replace(['{HTML_TEXT}','{ENTRY}'],[$content,$entry_html],$html);
    